<?php


namespace App\Models\Budget;


use App\Models\PPU\Pap;
use Illuminate\Database\Eloquent\Model;

class ORSProjectsApplied extends Model
{
    protected $table = 'budget_projects_applied';

    public function ors(){
        return $this->belongsTo(ORS::class,'ors_slug','slug');
    }

    public function pap(){
        return $this->hasOne(Pap::class,'pap_code','pap_code');
    }
}