<?php

namespace App\Models\HRU;

use Illuminate\Database\Eloquent\Model;

class PublicationDetails extends Model
{

    public static function boot()
    {
        parent::boot();
        $user = \Auth::user();
        static::updating(function($a) use ($user){
            $a->updated_at = \Carbon::now();
        });

        static::creating(function ($a) use ($user){
            $a->created_at = \Carbon::now();
        });
    }

    protected $table = 'hr_publications_details';

    public function publication(){
        return $this->belongsTo(Publications::class,'publication_slug','slug');
    }

    public function applicants(){
        return $this->hasMany(OApplicants::class,'publication_detail_slug','slug');
    }
}