<?php

namespace App\Models\Temp\Sida;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
//    protected $connection = 'mysql_sida';
    protected $table = 'regions';

    public function provinces(){
        return $this->hasMany(Provinces::class,'region','region');
    }
}