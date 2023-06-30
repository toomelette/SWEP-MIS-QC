<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
/**
 * @property mixed description
 * @property mixed id
 * @property mixed slug
 * @property mixed department_id
 * @property mixed name
 * @property mixed department_no
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed user_created
 * @property mixed user_updated
 * @property mixed ip_created
 * @property mixed ip_updated
 */

class DepartmentUnit extends Model{


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

    protected $table = 'su_department_units';

    protected $dates = ['created_at', 'updated_at'];


	public $timestamps = false;


    protected static $logName = 'unit';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions():LogOptions {
        return LogOptions::defaults();
    }


    /** RELATIONSHIPS **/
	public function department() {
      return $this->belongsTo(Department::class,'department_id','department_id');
    }


    public function employee(){
        return $this->hasMany('App\Models\Employee', 'department_unit_id', 'department_unit_id');
    }


    public function applicant() {
        return $this->hasMany('App\Models\Applicant','department_unit_id','department_unit_id');
    }







}
