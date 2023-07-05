<?php


namespace App\Swep\Services\Budget;


use App\Models\Budget\ORS;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ORSService
{
    public function newOrsNumber($fund){
        //check if this year has data
        $year = Carbon::now()->format('Y');
        $ors = ORS::query()->where('created_at','like',$year.'%')->first();
        if(!empty($ors)){
            $orsStartForChecking = $fund.'-'.Carbon::now()->format('y');
            $o = ORS::query()
                ->where('ors_no','like',$orsStartForChecking.'%')
                ->orderBy('ors_no','desc')
                ->limit(1)
                ->first();
            if(!empty($o)){
                $baseOrsNumber = $o->base_ors_no+1;
            }else{
                $baseOrsNumber = 1;
            }
        }else{
            $baseOrsNumber = 1;
        }
        $newOrsNumber = $fund.'-'.Carbon::now()->format('y-m').'-'.str_pad($baseOrsNumber,4,'0',STR_PAD_LEFT);

        return [
            'newOrsNumber' => $newOrsNumber,
            'baseOrsNumber' => str_pad($baseOrsNumber,4,'0',STR_PAD_LEFT),
        ];
    }

    public function findBySlug($slug){
        $ors = ORS::query()->with(['accountEntries.chartOfAccount','accountEntries.responsibilityCenter.description','projectsApplied.pap.responsibilityCenter.description','dvEntries.chartOfAccount'])->where('slug','=',$slug)->first();
        return $ors ?? abort(510,'ORS not found.');
    }

    public function __typeAhead_payee(Request $request){
        if($request->query != ''){
            $q = $request->get('query');
            $ors  = ORS::query()
                ->select(\DB::raw('payee , 
                    case when payee like "%'.$q.'" then 3
                        when payee like "%'.$q.'% " then 2
                        when payee like "'.$q.'%" then 1 
                        else 1000
                    end
                    as priority
                    '))
                ->groupBy('payee')
                ->orderBy('priority','asc')
                ->get();
            return $ors->map(function ($data){
                return [
                    'id' => 0,
                    'name' => $data->payee,
                ];
            });
        }
    }
}