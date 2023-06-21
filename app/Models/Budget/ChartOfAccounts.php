<?php


namespace App\Models\Budget;


use Illuminate\Database\Eloquent\Model;

class ChartOfAccounts extends Model
{
    protected $table = 'acctg_chart_of_accounts';

    public function orsEntries(){
        return $this->hasMany(ORSAccountEntries::class,'account_code','account_code');
    }
}