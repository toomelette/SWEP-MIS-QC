<?php


namespace App\Models\PPBTMS;


use App\Models\PPU\Pap;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';
    protected $connection = 'mysql_ppu';

    public function __construct() {
        $this->table = \DB::connection($this->connection)->getDatabaseName() . '.' . $this->table;
    }

    public function pap(){
        return $this->belongsTo(Pap::class,'pap_code','pap_code');
    }
}