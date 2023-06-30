<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class Applicant extends Model{

    public static function boot()
    {
        parent::boot();
        static::updating(function($a){
            $a->user_updated = Auth::user()->user_id;
            $a->ip_updated = request()->ip();
            $a->updated_at = \Carbon::now();
        });

        static::creating(function ($a){
            $a->user_created = Auth::user()->user_id;
            $a->ip_created = request()->ip();
            $a->created_at = \Carbon::now();
            $a->ip_updated = request()->ip();
            $a->updated_at = \Carbon::now();
        });
    }
	use Sortable, LogsActivity;

    protected $table = 'hr_applicants';

    protected $dates = ['date_of_birth', 'received_at', 'created_at', 'updated_at'];

    public $sortable = ['plantilla_id', 'course_id', 'fullname', 'date_of_birth','received_at', 'is_on_short_list'];

	public $timestamps = false;

    protected static $logName = 'applicant';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions():LogOptions {
        return LogOptions::defaults();
    }

    protected $attributes = [

        'slug' => '',
        'department_unit_id' => '',
        'applicant_id' => '',
        'course_id' => '',
        'plantilla_id' => '',
        'lastname' => '',
        'firstname' => '',
        'middlename' => '',
        'fullname' => '',
        'gender' => '',
        'date_of_birth' => null,
        'civil_status' => '',
        'address' => '',
        'contact_no' => '',
        'school' => '',
        'remarks' => '',
        'is_on_short_list' => false,
        'received_at' => null, 
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];





    /** RELATIONSHIPS **/
    public function applicantEducationalBackground() {
        return $this->hasMany('App\Models\ApplicantEducationalBackground','applicant_id','applicant_id');
    }


	public function applicantExperience() {
        return $this->hasMany('App\Models\ApplicantExperience','applicant_id','applicant_id');
    }


    public function applicantTraining() {
        return $this->hasMany('App\Models\ApplicantTraining','applicant_id','applicant_id');
    }


    public function applicantEligibility() {
        return $this->hasMany('App\Models\ApplicantEligibility','applicant_id','applicant_id');
    }



    public function plantilla() {
        return $this->belongsTo('App\Models\Plantilla','plantilla_id','plantilla_id');
    }


    public function course() {
        return $this->belongsTo('App\Models\Course','course_id','course_id');
    }


    public function departmentUnit() {
        return $this->belongsTo('App\Models\DepartmentUnit','department_unit_id','department_unit_id');
    }
    
    public function positionApplied(){
        return $this->hasMany('App\Models\ApplicantPositionApplied','applicant_slug','slug');
    }

    
}
