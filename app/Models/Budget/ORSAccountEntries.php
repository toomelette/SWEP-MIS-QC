<?php


namespace App\Models\Budget;


use App\Models\PPU\PPURespCodes;
use App\Models\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ORSAccountEntries extends Model
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
    protected $table = 'budget_ors_details';
    protected $fillable  = [
        'project_id',
    ];
    protected $attributes  = [
        'project_id' => 3,
    ];
    public function ors(){
        return $this->belongsTo(ORS::class,'ors_slug','slug');
    }

    public function chartOfAccount(){
        return $this->belongsTo(ChartOfAccounts::class,'account_code','account_code');
    }

    public function responsibilityCenter(){
        return $this->belongsTo(PPURespCodes::class,'resp_center','rc_code');
    }
}