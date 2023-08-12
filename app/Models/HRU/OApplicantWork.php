<?php

namespace App\Models\HRU;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OApplicantWork extends Model
{
    protected $table = 'hr_o_applicant_work_experiences';
    public $timestamps = false;
    public function applicant(){
        return $this->belongsTo(Applicant::class,'applicant_slug','slug');
    }

    public function scopeSelected(Builder $query){
        $query->where('selected','=',1);
    }

}