<?php


namespace App\Swep\Services\Budget;


use App\Models\Budget\AnnualBudget;

class AnnualBudgetService
{
    public function findBySlug($slug){
        $ab = AnnualBudget::query()->where('slug','=',$slug)->first();
        return $ab ?? abort(503,'Data not found.');
    }
}