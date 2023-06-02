<?php


namespace App\Models\PPU;

use Illuminate\Database\Eloquent\Model;

class Pap extends Model
{
    protected $table = 'pap';
    protected $connection = 'mysql_ppu';

    public function __construct() {
        $this->table = \DB::connection($this->connection)->getDatabaseName() . '.' . $this->table;
    }

    public function responsibilityCenter(){
        return $this->belongsTo(PPURespCodes::class,'resp_center','rc_code');
    }
}