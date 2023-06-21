<?php


namespace App\Models\Budget;


use App\Models\PPU\PPURespCodes;
use Illuminate\Database\Eloquent\Model;

class ORSAccountEntries extends Model
{
    protected $table = 'budget_ors_details';

    public function ors(){
        return $this->belongsTo(ORS::class,'ors_slug','slug');
    }

    public function chartOfAccount(){
        return $this->belongsTo(ChartOfAccounts::class,'account_code','account_code');
    }

    public function responsibilityCenter(){
        return $this->belongsTo(PPURespCodes::class,'resp_center','rc_code');
    }
}