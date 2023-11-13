<?php
 
namespace App\Swep\Services;


use App\Swep\Interfaces\EmployeeInterface;
use App\Swep\Interfaces\UserInterface;
use App\Swep\BaseClasses\BaseService;



class HomeService extends BaseService{



    protected $employee_repo;
    protected $user_repo;



    public function __construct(EmployeeInterface $employee_repo, UserInterface $user_repo){

        $this->employee_repo = $employee_repo;
        $this->user_repo = $user_repo;
        parent::__construct();

    }





    public function view(){

        return view('dashboard.home.index');

    }






    private function getEmpByDept(){

        $afd = $this->employee_repo->getByDepartmentId('D1001')->count();
        $iad = $this->employee_repo->getByDepartmentId('D1002')->count();
        $ppd = $this->employee_repo->getByDepartmentId('D1003')->count();
        $rde = $this->employee_repo->getByDepartmentId('D1004')->count();
        $rd = $this->employee_repo->getByDepartmentId('D1005')->count();
        $legal = $this->employee_repo->getByDepartmentId('D1006')->count();

        return ['AFD' => $afd,'IAD' => $iad,'PPD' => $ppd,'RDE' => $rde,'RD' => $rd,'LEGAL' => $legal];

    }








}