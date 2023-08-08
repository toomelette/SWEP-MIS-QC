<?php


namespace App\Models\Budget;


use App\Models\Scopes\ProjectScope;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Model;

class ORS extends Model
{
    protected $table = 'budget_ors';

    public static function boot()
    {
        $user = Auth::user();
        parent::boot();
        static::updating(function($a) use ($user){
            $a->user_updated = $user->user_id;
            $a->ip_updated = request()->ip();
            $a->updated_at = \Carbon::now();
            $a->project_id = $user->project_id;
        });

        static::creating(function ($a) use ($user){
            $a->user_created = $user->user_id;
            $a->ip_created = request()->ip();
            $a->created_at = \Carbon::now();
            $a->project_id = $user->project_id;
        });

        static::addGlobalScope(new ProjectScope);
    }

    public function accountEntries(){
        return $this->hasMany(ORSAccountEntries::class,'ors_slug','slug');
    }

    public function orsEntries(){
        return $this->hasMany(ORSAccountEntries::class,'ors_slug','slug')->where('type','=','ORS');
    }

    public function dvEntries(){
        return $this->hasMany(ORSAccountEntries::class,'ors_slug','slug')->where('type','=','DV');
    }


    public function projectsApplied(){
        return $this->hasMany(ORSProjectsApplied::class,'ors_slug','slug');
    }

    public function creator(){
        return $this->hasOne(User::class,'user_id','user_created');
    }

    public function updater(){
        return $this->hasOne(User::class,'user_id','user_updated');
    }

}