<?php


namespace App\Models\SqlServer;


use Illuminate\Database\Eloquent\Model;

class Cert extends Model
{
    protected $connection = 'sqlsrv_accounting2017';
    protected $table = 'dbo.Cert';
}