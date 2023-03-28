<?php


namespace App\Models\SqlServer;


use Illuminate\Database\Eloquent\Model;

class IncentiveTemplate extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'dbo.PayTemplateINC';

    public function incentive(){
        return $this->hasOne(Incentives::class,'IncCode','IncCode');
    }


}