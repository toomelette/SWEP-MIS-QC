<?php
 
namespace App\Swep\Services;

use App\Swep\Interfaces\EmployeeServiceRecordInterface;
use App\Swep\BaseClasses\BaseService;



class EmployeeServiceRecordService extends BaseService{



    protected $employee_sr_repo;



    public function __construct(EmployeeServiceRecordInterface $employee_sr_repo){

        $this->employee_sr_repo = $employee_sr_repo;
        parent::__construct();

    }





    public function index($slug){

        $employee_sr = $this->employee_sr_repo->fetchByEmpNo($slug); 

        return view('dashboard.employee.service_record')->with($employee_sr);

    }






    public function store($request, $slug){
        $employee_sr = $this->employee_sr_repo->store($request, $slug);

        return $employee_sr;

    }






    public function update($request, $slug){

        $employee_sr = $this->employee_sr_repo->update($request, $slug);

        return $employee_sr;
        $this->event->dispatch('employee_service_record.update', $employee_sr);
        return redirect()->route('dashboard.employee.service_record', $emp_slug);

    }






    public function destroy($slug){
        
        $employee_sr = $this->employee_sr_repo->destroy($slug);
        return $employee_sr;
//        $this->event->dispatch('employee_service_record.destroy', $employee_sr);
//        return redirect()->back();

    }






    public function print($slug){

        $employee_sr = $this->employee_sr_repo->fetchByEmpNo($slug);

        return view('printables.employee.service_record')->with([
        ]);

    }






}