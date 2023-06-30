<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class EmailContact extends Model{


	use Sortable, LogsActivity;

	protected $table = 'rec_email_contacts';

    protected $dates = ['created_at', 'updated_at'];

    public $sortable = ['fullname', 'email', 'contact_no'];


	public $timestamps = false;

    protected static $logName = 'email contact';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at','ip_updated','user_updated'];
    protected static $logOnlyDirty = true;

    protected $attributes = [
        
        'slug' => '',
        'email_contact_id' => '',
        'name' => '',
        'email' => '',
        'contact_no' => '',
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];

    public function getActivitylogOptions():LogOptions {
        return LogOptions::defaults();
    }



    // Relationships
    public function documentDisseminationLogAll(){
        return $this->hasMany('App\Models\DocumentDisseminationLog', 'email_contact_id', 'email_contact_id');
    }

    public function documentDisseminationLog(){
        return $this->hasMany('App\Models\DocumentDisseminationLog', 'email_contact_id', 'email_contact_id')->whereNull('send_copy');
    }


    public function documentDisseminationLogSendCopy(){
        return $this->hasMany('App\Models\DocumentDisseminationLog', 'email_contact_id', 'email_contact_id')->where('send_copy','=', 1);
    }

    
}
