<?php


namespace App\Models\Budget;


use App\Models\PPU\RCDesc;
use Illuminate\Database\Eloquent\Model;

class AnnualBudget extends Model
{
    protected $table = 'budget_annual_budget';

    public function chartOfAccount(){
        return $this->hasOne(ChartOfAccounts::class,'account_code','account_code');
    }

    public function dept(){
        return $this->belongsTo(RCDesc::class,'department','rc');
    }
}