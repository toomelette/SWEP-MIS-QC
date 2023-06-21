<?php


namespace App\Swep\Helpers;


use App\Models\Budget\ORS;

class Listing
{
    public static function ors($for){
        $ors = ORS::query()->select($for)->groupBy($for)->orderBy($for,'asc')->pluck($for);
        return $ors;
    }

}