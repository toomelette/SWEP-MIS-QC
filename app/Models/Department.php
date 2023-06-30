<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


/**
 * @property mixed name
 * @property mixed department_id
 * @property mixed slug
 */
class Department extends Model{

    public static function boot()
    {
        parent::boot();
        static::creating(function ($a){
            $a->user_created = Auth::user()->user_id;
            $a->ip_created = request()->ip();
        });

        static::updating(function ($a){
            $a->user_updated = Auth::user()->user_id;
            $a->ip_updated = request()->ip();
        });
    }

    use Sortable, LogsActivity;

    protected $table = 'su_departments';

    protected $dates = ['created_at', 'updated_at'];

//    public $sortable = ['name'];

	public $timestamps = true;

    protected static $logName = 'department';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions():LogOptions {
        return LogOptions::defaults();
    }

//
//    protected $attributes = [
//
//        'slug' => '',
//        'department_id' => '',
//        'name' => '',
//        'created_at' => null,
//        'updated_at' => null,
//        'ip_created' => '',
//        'ip_updated' => '',
//        'user_created' => '',
//        'user_updated' => '',
//
//    ];


    /** RELATIONSHIPS **/
    public function employee() {
        return $this->hasMany('App\Models\Employee','department_id','department_id');
    }


	public function projectCode() {
        return $this->hasMany('App\Models\ProjectCode','department_id','department_id');
    }


    public function departmentUnit() {
        return $this->hasMany('App\Models\DepartmentUnit','department_id','department_id');
    }

    public function departmentUnits(){
        return $this->hasMany(DepartmentUnit::class,'department_id','department_id');
    }





}
