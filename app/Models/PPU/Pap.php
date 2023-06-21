<?php


namespace App\Models\PPU;

use App\Models\Budget\ORSProjectsApplied;
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


}