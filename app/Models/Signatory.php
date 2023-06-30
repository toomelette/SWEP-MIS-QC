<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class Signatory extends Model{




    use Sortable, LogsActivity;

    protected $table = 'su_signatories';

    protected $dates = ['created_at', 'updated_at'];

    public $sortable = ['employee_name', 'employee_position', 'type'];

	public $timestamps = false;


    protected static $logName = 'signatory';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;
    public function getActivitylogOptions():LogOptions {
        return LogOptions::defaults();
    }


    protected $attributes = [

        'slug' => '',
        'signatory_id' => '',
        'employee_name' => '', 
        'employee_position' => '', 
        'type' => '',
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];







}