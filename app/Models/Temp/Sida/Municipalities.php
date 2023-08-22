<?php

namespace App\Models\Temp\Sida;

use Illuminate\Database\Eloquent\Model;

class Municipalities extends Model
{
    protected $connection = 'mysql_sida';
    protected $table = 'municipality';

    public function barangays(){
        return $this->hasMany(Barangays::class,'municipality','municipality');
    }
}