<?php

namespace App\Models\Temp\Sida;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $connection = 'mysql_sida';
    protected $table = 'province';

    public function municipalities(){
        return $this->hasMany(Municipalities::class,'province','province');
    }
}