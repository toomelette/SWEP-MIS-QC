<?php


namespace App\Models\SqlServer;


use Illuminate\Database\Eloquent\Model;

class BUR extends Model
{
    protected $connection = 'sqlsrv_accounting2017';
    protected $table = 'dbo.BUR';

    public function BURDetails(){
        return $this->hasMany(BURDet::class,'BURNo','BURNo')->where('BURorDV','=','BUR');
    }

    public function BURDetailsAll(){
        return $this->hasMany(BURDet::class,'BURNo','BURNo');
    }

    public function BURProjApplied(){
        return $this->hasMany(BURProjApplied::class,'BURNo','BURNo');
    }

    public function certified(){
        return $this->hasOne(Cert::class,'Initials','CertifiedByInitial');
    }

    public function budget(){
        return $this->hasOne(Cert::class,'Initials','CertifiedBudget');
    }
}