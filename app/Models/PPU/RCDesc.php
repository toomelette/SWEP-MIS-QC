<?php


namespace App\Models\PPU;


use App\Models\Department;
use App\Models\RC;
use Illuminate\Database\Eloquent\Model;

class RCDesc extends Model
{
    protected $table = 'budget_rc_description';
//    protected $connection = 'mysql_ppu';

    public function __construct() {
        $this->table = \DB::connection($this->connection)->getDatabaseName() . '.' . $this->table;
    }

    public function responsibilityCenters(){
        return $this->hasMany(PPURespCodes::class,'rc','rc');
    }
}