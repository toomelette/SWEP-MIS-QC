<?php


namespace App\Models\PPU;


use Illuminate\Database\Eloquent\Model;

class PPURespCodes extends Model
{
    protected $table = 'resp_codes';
    protected $connection = 'mysql_ppu';
    public function description(){
        return $this->belongsTo(RCDesc::class,'rc','rc');
    }
}