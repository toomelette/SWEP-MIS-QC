<?php


namespace App\Models\SqlServer;


use Illuminate\Database\Eloquent\Model;

class BURProjApplied extends Model
{
    protected $connection = 'sqlsrv_accounting2017';
    protected $table = 'dbo.BURProjApplied';

    public function BURParentData(){
        return $this->belongsTo(BUR::class,'BURNo','BURNo');
    }
}