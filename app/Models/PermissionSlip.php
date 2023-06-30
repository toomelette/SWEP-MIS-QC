<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class PermissionSlip extends Model{

    use Sortable, LogsActivity;
    
	protected $table = 'hr_permission_slip';

    protected $dates = ['date', 'created_at', 'updated_at'];

    public $sortable = ['ps_id', 'date', 'time_out', 'time_in'];

	public $timestamps = false;

    protected static $logName = 'permission slip';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions():LogOptions {
        return LogOptions::defaults();
    }

    protected $attributes = [

        'slug' => '',
        'ps_id' => '',
        'employee_no' => '',
        'date' => null,
        'time_out' => null,
        'time_in' => null,
        'with_ps' => false,
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];




    /** RELATIONSHIPS **/
    public function employee() {
    	return $this->belongsTo('App\Models\Employee','employee_no','employee_no');
    }




    /** Scopes **/
    public function scopeMonthlyPS($query, $df, $dt){

        return $query->select('ps_id', 'employee_no', 'date', 'time_out', 'time_in', 'with_ps')
                     ->whereBetween('date', [$df, $dt])
                     ->get();

    }




    public function scopeMonthlyPS2($query, $month, $year){

        return $query->select('time_out', 'time_in')
                     ->whereMonth('date', $month)
                     ->whereYear('date', $year)
                     ->get();

    }




    public function scopeDailyPS($query, $date){

        return $query->select('date', 'time_out', 'time_in')
                     ->where('date', $date)
                     ->get();

    }



    
}
