<?php


namespace App\Http\Controllers;


use App\Http\Requests\Budget\ORSFormRequest;
use App\Models\Budget\ORS;
use App\Models\Budget\ORSAccountEntries;
use App\Models\Budget\ORSProjectsApplied;
use App\Swep\Helpers\Arrays;
use App\Swep\Helpers\Helper;
use App\Swep\Services\Budget\ORSService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ORSController extends Controller
{
    protected $orsService;
    public function __construct(ORSService $orsService)
    {
        $this->orsService = $orsService;
    }

    public function index(Request $request){
        if($request->ajax() && $request->has('draw')){
            $ors = ORS::query()->with(['projectsApplied']);
            return DataTables::of($ors)
                ->addColumn('action',function($data){
                    return view('dashboard.budget.ors.dtActions')->with([
                        'data' => $data,
                    ]);
                })
                ->addColumn('details',function($data){
                    return view('dashboard.budget.ors.dtDetails')->with([
                        'data' => $data,
                    ]);
                })
                ->editColumn('amount',function($data){
                    return number_format($data->amount,2);
                })
                ->editColumn('ors_date',function($data){
                    return $data->ors_date != null ? Carbon::parse($data->ors_date)->format('M. d, Y') : '';
                })
                ->escapeColumns([])
                ->setRowId('slug')
                ->toJson();
        }
        return view('dashboard.budget.ors.index');
    }

    public function create(){
        return view('dashboard.budget.ors.create');
    }

    public function store(ORSFormRequest $request){
        $ors = new ORS;
        $ors->slug = Str::random();
        $ors->ors_no = $this->orsService->newOrsNumber($request->funds)['newOrsNumber'];
        $ors->base_ors_no = $this->orsService->newOrsNumber($request->funds)['baseOrsNumber'];
        $ors->ors_date = $request->ors_date;
        $ors->funds = $request->funds;
        $ors->payee = $request->payee;
        $ors->office = $request->office;
        $ors->address = $request->address;
        $ors->ref_book = $request->ref_book;
        $ors->ref_doc = $request->ref_doc;
        $ors->amount = Helper::sanitizeAutonum($request->amount);
        $ors->particulars = $request->particulars;
        $ors->certified_by = $request->certified_by;
        $ors->certified_by_position = $request->certified_by_position;
        $ors->certified_budget_by = $request->certified_budget_by;
        $ors->certified_budget_by_position = $request->certified_budget_by_position;

        $rcs = Arrays::respCodeList();
        if(!empty($request->account_entries)){
            $arr = [];
            $ct = 0;
            foreach ($request->account_entries as $account_entry){
                array_push($arr,[
                    'slug' => Str::random(),
                    'ors_slug' => $ors->slug,
                    'type' => $account_entry['type'],
                    'seq_no' => $ct++,
                    'resp_center' => $account_entry['resp_center'],
                    'dept' => $rcs[$account_entry['resp_center']]['dept_alias'],
                    'unit' => $rcs[$account_entry['resp_center']]['sec'] == '' ? $rcs[$account_entry['resp_center']]['div'] : $rcs[$account_entry['resp_center']]['sec'],
                    'account_code' => $account_entry['account_code'],
                    'debit' => Helper::sanitizeAutonum($account_entry['debit']),
                    'credit' => Helper::sanitizeAutonum($account_entry['credit']),
                ]);
            }
            ORSAccountEntries::insert($arr);
        }

        if(!empty($request->applied_projects)){
            $arr = [];
            foreach ($request->applied_projects as $applied_project){
                array_push($arr,[

                    'slug' => Str::random(),
                    'ors_slug' => $ors->slug,
                    'pap_code' => $applied_project['pap_code'],
                    'co' => Helper::sanitizeAutonum($applied_project['co']),
                    'mooe' => Helper::sanitizeAutonum($applied_project['mooe']),
                    'total' => Helper::sanitizeAutonum($applied_project['co'] ?? 0) + Helper::sanitizeAutonum($applied_project['mooe'] ?? 0),
                ]);
            }
            ORSProjectsApplied::insert($arr);
        }
        if($ors->save()){
            return $ors->only('slug');
        }
        abort(503,'Error saving ORS');
    }

    public function print($slug){
        return view('printables.ors.ors')->with([
            'ors' => $this->orsService->findBySlug($slug),
        ]);
    }

    public function edit($slug){
        return view('dashboard.budget.ors.edit')->with([
            'ors' => $this->orsService->findBySlug($slug),
        ]);
    }

    public function update(ORSFormRequest $request,$slug){

        $ors = $this->orsService->findBySlug($slug);
        $ors->ors_date = $request->ors_date;
        $ors->funds = $request->funds;
        $ors->payee = $request->payee;
        $ors->office = $request->office;
        $ors->address = $request->address;
        $ors->ref_book = $request->ref_book;
        $ors->ref_doc = $request->ref_doc;
        $ors->amount = Helper::sanitizeAutonum($request->amount);
        $ors->particulars = $request->particulars;
        $ors->certified_by = $request->certified_by;
        $ors->certified_by_position = $request->certified_by_position;
        $ors->certified_budget_by = $request->certified_budget_by;
        $ors->certified_budget_by_position = $request->certified_budget_by_position;
        if($ors->update()){
            $rcs = Arrays::respCodeList();
            if(!empty($request->account_entries)){
                $arr = [];
                $ct = 0;
                foreach ($request->account_entries as $account_entry){
                    array_push($arr,[
                        'slug' => Str::random(),
                        'ors_slug' => $ors->slug,
                        'type' => $account_entry['type'],
                        'seq_no' => $ct++,
                        'resp_center' => $account_entry['resp_center'],
                        'dept' => $rcs[$account_entry['resp_center']]['dept_alias'],
                        'unit' => $rcs[$account_entry['resp_center']]['sec'] == '' ? $rcs[$account_entry['resp_center']]['div'] : $rcs[$account_entry['resp_center']]['sec'],
                        'account_code' => $account_entry['account_code'],
                        'debit' => Helper::sanitizeAutonum($account_entry['debit']),
                        'credit' => Helper::sanitizeAutonum($account_entry['credit']),
                    ]);
                }
                $ors->accountEntries()->delete();
                ORSAccountEntries::insert($arr);
            }

            if(!empty($request->applied_projects)){
                $arr = [];
                foreach ($request->applied_projects as $applied_project){
                    array_push($arr,[

                        'slug' => Str::random(),
                        'ors_slug' => $ors->slug,
                        'pap_code' => $applied_project['pap_code'],
                        'co' => Helper::sanitizeAutonum($applied_project['co']),
                        'mooe' => Helper::sanitizeAutonum($applied_project['mooe']),
                        'total' => Helper::sanitizeAutonum($applied_project['co'] ?? 0) + Helper::sanitizeAutonum($applied_project['mooe'] ?? 0),
                    ]);
                }
                $ors->projectsApplied()->delete();
                ORSProjectsApplied::insert($arr);
            }
        }
    }

    public function show($slug){
        $ors = $this->orsService->findBySlug($slug);
        return view('dashboard.budget.ors.show')->with([
            'ors' => $ors,
        ]);
    }

    public function reports(){
        return view('dashboard.budget.ors.reports');
    }

    public function reportGenerate($type){
        $request = Request::capture();

        switch ($type){
            case 'summary_of_ors':
                $baseSql = ORS::query()
                    ->with('projectsApplied.pap.responsibilityCenter.description')
                    ->whereBetween('ors_date',[
                        $request->date_from, $request->date_to
                    ]);
                if(!empty($request->resp_center) && $request->resp_center != ''){
                    $baseSql = $baseSql->whereHas('projectsApplied.pap.responsibilityCenter.description',function ($q) use ($request){
                        $q->where('rc','=',$request->resp_center);
                    });
                }

                if(!empty($request->fund_source) && $request->fund_source != ''){
                    $baseSql = $baseSql->where('funds','=',$request->fund_source);
                }


                $baseSql = $baseSql->orderBy('ors_no','asc');
                $ors = $baseSql->get();

                $groupedProjects = ORSProjectsApplied::with([
                        'ors',
                        'pap' => function($query){
                            $query->groupBy('resp_center');
                        },
                        'pap.responsibilityCenter.description',
                    ])
                    ->whereHas('ors',function ($q) use ($request){
                        $q->whereBetween('ors_date',[
                            $request->date_from, $request->date_to
                        ]);
                    })
                    ->get();

                $groupedProjectsArray = [];
                $groupedProjectsArrayNull = [];
                foreach ($groupedProjects as $groupedProject){
                    if(!empty($groupedProject->pap->responsibilityCenter->description)){
                        $groupedProjectsArray[$groupedProject->pap->responsibilityCenter->description->rc] = $groupedProject->pap->responsibilityCenter->description->name;
                        $groupedProjectsArrayNull[$groupedProject->pap->responsibilityCenter->description->rc] = ['mooe' => null,'co' => null, 'total' => null];
                    }
                }


//                asort($groupedProjectsArray);
//                asort($groupedProjectsArrayNull);
                $orsArray = [];
                foreach ($ors as $or){
                    $orsArray[$or->slug]['obj'] = $or;
                    $orsArray[$or->slug]['projectsApplied'] = $groupedProjectsArrayNull;
                    if(count($or->projectsApplied) > 0){
                        foreach ($or->projectsApplied as $projectApplied) {
                            if(!empty($projectApplied->pap->responsibilityCenter)){
                                $department = $projectApplied->pap->responsibilityCenter->description;

                                $orsArray[$or->slug]['projectsApplied'][$department->rc ?? 'N/A']['mooe'] = $orsArray[$or->slug]['projectsApplied'][$department->rc ?? 'N/A']['mooe'] + $projectApplied->mooe;
                                $orsArray[$or->slug]['projectsApplied'][$department->rc ?? 'N/A']['co'] = $orsArray[$or->slug]['projectsApplied'][$department->rc ?? 'N/A']['co'] + $projectApplied->co;
                                $orsArray[$or->slug]['projectsApplied'][$department->rc ?? 'N/A']['total'] = $orsArray[$or->slug]['projectsApplied'][$department->rc ?? 'N/A']['total'] + $projectApplied->total;
                            }
                        }
                    }
                }

                return view('printables.ors.reports.summary_of_ors')->with([
                    'ors' => $ors,
                    'groupedProjects' => $groupedProjectsArray,
                    'groupedProjectsNull' => $groupedProjectsArrayNull,
                    'orsArray' => $orsArray,
                ]);
                break;
            default:
                return 1;
                break;
        }
    }

    public function destroy($slug){
        $ors = $this->orsService->findBySlug($slug);
        if($ors->delete()){
            $ors->accountEntries()->delete();
            $ors->projectsApplied()->delete();
            return 1;
        }
        abort(503,'Error deleting ORS.');
    }
}