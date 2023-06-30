<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class LeaveApplication extends Model{





	use Sortable, LogsActivity;

	protected $table = 'hr_leave_application';

    protected $dates = ['working_days_date_from', 'working_days_date_to', 'created_at', 'updated_at'];

	public $timestamps = false;

    protected static $logName = 'leave application';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions():LogOptions {
        return LogOptions::defaults();
    }


    protected $attributes = [
        
        'slug' => '',
        'leave_application_id' => '',
        'doc_no' => '',
        'agency' => 'Sugar Regulatory Administration',
        'lastname' => '',
        'firstname' => '',
        'middlename' => '',
        'date_of_filing' => null,
        'position' => '',
        'salary' => 0.00,
        'type' => '',
        'type_vacation' => '',
        'type_vacation_others_specific' => '',
        'type_others_specific' => '',
        'spent_vacation' => '',
        'spent_vacation_abroad_specific' => '',
        'spent_sick' => '',
        'spent_sick_inhospital_specific' => '',
        'spent_sick_outpatient_specific' => '',
        'working_days' => '',
        'working_days_date_from' => null,
        'working_days_date_to' => null,
        'commutation' => '',
        'immediate_superior' => '',
        'immediate_superior_position' => '',
        'personnel_officer' => '',
        'personnel_officer_position' => '',
        'authorized_official' => '',
        'authorized_official_position' => '',
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];





	/** RELATIONSHIPS **/
    public function user(){
        return $this->hasOne('App\Models\User', 'user_id', 'user_id');
    }







}
