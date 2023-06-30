<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class Plantilla extends Model{
    

    use Sortable, LogsActivity;

	protected $table = 'hr_plantillas';

    protected $dates = ['created_at', 'updated_at'];

    public $sortable = ['department_unit_id', 'name', 'is_vacant'];

	public $timestamps = false;

    protected static $logName = 'plantilla';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;
    public function getActivitylogOptions():LogOptions {
        return LogOptions::defaults();
    }


    protected $attributes = [

        'slug' => '',
        'plantilla_id' => '',
        'department_unit_id' => '',
        'name' => '',
        'is_vacant' => '',
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];





    /** RELATIONSHIPS **/
    public function applicant() {
        return $this->hasMany('App\Models\Applicant','plantilla_id','plantilla_id');
    }


    public function departmentUnit() {
        return $this->belongsTo('App\Models\DepartmentUnit','department_unit_id','department_unit_id');
    }






}
