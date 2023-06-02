<?php


namespace App\Swep\Services\Budget;


use App\Models\Budget\ORSProjectsApplied;
use App\Models\PPU\Pap;

class PapService
{
    public function getBalancesBySlug($slug){
        $pap = $this->findBySlug($slug);
        $appliedProjects = ORSProjectsApplied::query()
            ->selectRaw('sum(mooe) as mooe, sum(co) as co')
            ->where('pap_code','=',$pap->pap_code)->first();
        $arr = [
            'budget' => [
                'mooe' => $pap->mooe ?? 0,
                'co' => $pap->co ?? 0,
            ],
            'utilized' => [
                'mooe' => $appliedProjects->mooe ?? 0,
                'co' => $appliedProjects->co ?? 0,
            ],
        ];
        $arr['balance'] = [
            'mooe' => $arr['budget']['mooe'] - $arr['utilized']['mooe'],
            'co' => $arr['budget']['co'] - $arr['utilized']['co'],
        ];
        return $arr;
    }


    public function findBySlug($slug){
        $pap = Pap::query()->where('slug','=',$slug)->first();
        return $pap ?? abort(503,'PAP not found.');
    }
}