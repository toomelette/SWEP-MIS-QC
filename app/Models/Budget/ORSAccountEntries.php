<?php


namespace App\Models\Budget;


use Illuminate\Database\Eloquent\Model;

class ORSAccountEntries extends Model
{
    protected $table = 'budget_ors_details';

    public function ors(){
        return $this->belongsTo(ORS::class,'ors_slug','slug');
    }

    public function chartOfAccount(){
        return $this->hasOne(ChartOfAccounts::class,'account_code','account_code');
    }
}