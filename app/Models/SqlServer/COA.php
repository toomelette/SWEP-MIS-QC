<?php


namespace App\Models\SqlServer;


use Illuminate\Database\Eloquent\Model;

class COA extends Model
{
    protected $connection = 'sqlsrv_accounting2017';
    protected $table = 'dbo.COA';
}