<?php


namespace App\Models\SqlServer;


use Illuminate\Database\Eloquent\Model;

class BURDet extends Model
{
    protected $connection = 'sqlsrv_accounting2017';
    protected $table = 'dbo.BURDet';

    public function BURParentData(){
        return $this->belongsTo(BUR::class,'BURNo','BURNo');
    }
}