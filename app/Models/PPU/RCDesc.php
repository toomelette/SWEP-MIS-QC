<?php


namespace App\Models\PPU;


use Illuminate\Database\Eloquent\Model;

class RCDesc extends Model
{
    protected $table = 'budget_rc_description';
//    protected $connection = 'mysql_ppu';

    public function __construct() {
        $this->table = \DB::connection($this->connection)->getDatabaseName() . '.' . $this->table;
    }
}