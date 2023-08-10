<?php

namespace App\Swep\Services\HRU;

use App\Models\HRPayPlanitilla;

class PlantillaService
{
    public function findByItemNo($item_no){
        $p = HRPayPlanitilla::query()->where('item_no','=',$item_no)->get();
        if($p->count() > 1){
            abort(503,'Many duplicate items were found.');
        }else{
            return $p->first() ?? null;
        }
    }
}