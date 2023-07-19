<?php


namespace App\Models\Temp;


use Illuminate\Database\Eloquent\Model;

class SRVConso extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'dbo.Consolidated';
}