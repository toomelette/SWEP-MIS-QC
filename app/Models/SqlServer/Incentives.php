<?php


namespace App\Models\SqlServer;


use Illuminate\Database\Eloquent\Model;

class Incentives extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'dbo.PayIncTable';
}