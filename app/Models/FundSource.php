<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class FundSource extends Model{





	use Sortable, LogsActivity;

    protected $table = 'acctg_fund_sources';

    protected $dates = ['created_at', 'updated_at'];

    public $sortable = ['description'];

	public $timestamps = false;

    protected static $logName = 'fund source';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions():LogOptions {
        return LogOptions::defaults();
    }

    protected $attributes = [

        'slug' => '',
        'fund_source_id' => '',
        'description' => '',
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];






    /** RELATIONSHIPS **/
    public function disbursementVoucher() {
      return $this->belongsTo('App\Models\DisbursementVoucher','fund_source_id','fund_source_id');
    }








}
