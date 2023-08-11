<?php

namespace App\Models\HRU;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;

class OApplicantEducation extends Model
{

    protected $table = 'hr_o_applicant_education';
    public $timestamps = false;

    protected $guarded = [];
    public function applicant(){
        return $this->belongsTo(Applicant::class,'applicant_slug','slug');
    }
}