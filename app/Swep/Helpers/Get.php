<?php


namespace App\Swep\Helpers;


use App\Models\SuSettings;
use Carbon\Carbon;

class Get
{
    public static function startAndEndOfQuarter($quarter,$year){
        $quarter = $quarter * 3;
        return [
            'startOfQuarter' => Carbon::parse($year.'-'.str_pad($quarter,2,'0',STR_PAD_LEFT).'-01')->startOfQuarter()->format('Y-m-d'),
            'endOfQuarter' => Carbon::parse($year.'-'.str_pad($quarter,2,'0',STR_PAD_LEFT).'-01')->lastOfQuarter()->format('Y-m-d'),
        ];
    }

    public static function setting($setting){
        $s = SuSettings::query()->where('setting','=',$setting)->first();
        return $s;
    }
}