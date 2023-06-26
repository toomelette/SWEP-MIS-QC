<?php


namespace App\Models\PPU;

use App\Models\Budget\ORSProjectsApplied;
use App\Models\PPBTMS\Transactions;
use Illuminate\Database\Eloquent\Model;

class Pap extends Model
{
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
}