<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class Course extends Model{


    use Sortable, LogsActivity;

	protected $table = 'hr_courses';
    protected $dates = ['created_at', 'updated_at'];

    public $sortable = ['acronym', 'name'];

	public $timestamps = false;

    protected static $logName = 'course';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions():LogOptions {
        return LogOptions::defaults();
    }


    protected $attributes = [

        'slug' => '',
        'course_id' => '',
        'acronym' => '',
        'name' => '',
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];
    


    
}
