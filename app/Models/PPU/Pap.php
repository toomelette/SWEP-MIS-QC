<?php


namespace App\Models\PPU;

use App\Models\Budget\ORS;
use App\Models\Budget\ORSProjectsApplied;
use App\Models\PPBTMS\Transactions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pap extends Model
{
    public static function boot()
    {
        $user = Auth::user();
        parent::boot();
        static::updating(function($a) use ($user){
            $a->project_id = $user->project_id;
        });

        static::creating(function ($a) use ($user){
            $a->project_id = $user->project_id;
        });
    }

    protected $table = 'budget_pap';
//    protected $connection = 'mysql_ppu';

    public function __construct() {
        $this->table = \DB::connection($this->connection)->getDatabaseName() . '.' . $this->table;
    }

    public function responsibilityCenter(){
        return $this->belongsTo(PPURespCodes::class,'resp_center','rc_code');
    }

    public function orsAppliedProjects(){
        return $this->hasMany(ORSProjectsApplied::class,'pap_code','pap_code');
    }

    public function procurements(){
        return $this->hasMany(Transactions::class,'pap_code','pap_code')->where('ref_book','=','PR')->orWhere('ref_book','=','JR');
    }

    public function procurementsPr(){
        return $this->hasMany(Transactions::class,'pap_code','pap_code')->where('ref_book','=','PR');
    }

    public function procurementsJr(){
        return $this->hasMany(Transactions::class,'pap_code','pap_code')->where('ref_book','=','JR');
    }


    public function scopeWithoutChargedToIncome(Builder $query): void{
        $query->where('charge_to_income','!=',1)
            ->orWhereNull('charge_to_income');
    }

}