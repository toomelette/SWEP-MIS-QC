<?php


namespace App\Models\Budget;


use App\Models\PPU\Pap;
use App\Models\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ORSProjectsApplied extends Model
{
    public static function boot()
    {
        $user = Auth::user();
        parent::boot();
        static::updating(function($a) use ($user){
            $a->project_id = $user->project_id;
        });

        static::creating(function ($a) use ($user){
            $a->project_id = $user->project_id;
        });

        static::addGlobalScope(new ProjectScope);
    }
    protected $table = 'budget_projects_applied';

    public function ors(){
        return $this->belongsTo(ORS::class,'ors_slug','slug');
    }

    public function pap(){
        return $this->hasOne(Pap::class,'pap_code','pap_code');
    }
}