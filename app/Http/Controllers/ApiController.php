<?php

namespace App\Http\Controllers;

use App\Models\SubMenu;
use App\Models\Account;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentUnit;
use Illuminate\Cache\Repository as Cache;

class ApiController extends Controller{



	protected $cache;
	protected $submenu;
	protected $department;
	protected $department_unit;
	protected $accounts;





	public function __construct(Cache $cache, SubMenu $submenu, Department $department, DepartmentUnit $department_unit, Account $account){

		$this->cache = $cache;
		$this->submenu = $submenu;
		$this->department = $department;
		$this->department_unit = $department_unit;
		$this->account = $account;
		

	}






	public function selectResponseSubmenuFromMenu(Request $request, $key){

    	if($request->Ajax()){

    		$response_submenu = $this->cache->remember('api:response_submenus_from_menu:byMenuId:'. $key .'', 240, function() use ($key){

        		return $this->submenu->select('submenu_id', 'name')
        		                     ->where('menu_id', $key)
        		                     ->get();

       		});

	    	return json_encode($response_submenu);
	    }

	    return abort(404);

    }






    public function selectResponseDepartmentUnitsFromDepartments(Request $request, $key){

    	if($request->Ajax()){

    		$response_department_units = $this->cache->remember('api:response_department_units_from_department:byDepartment:'. $key .'', 240, function() use ($key){

        		return $this->department_unit->select('name', 'department_unit_id', 'description')
        									 ->where('department_name', $key)
        									 ->orwhere('department_id', $key)
        									 ->get();

       		});

	    	return json_encode($response_department_units);

	    }

	    return abort(404);
	    
    }






    public function selectResponseAccountsFromDepartments(Request $request, $key){

    	if($request->Ajax()){

    		$response_accounts = $this->cache->remember('api:response_accounts_from_department:byDepartment:'. $key .'', 240, function() use ($key){
        		
        		return $this->account->select('account_code')
        		                     ->where('department_name', $key)
        		                     ->orwhere('department_id', $key)
        		                     ->get();

       		});

	    	return json_encode($response_accounts);
	    }

	    return abort(404);
	    
    }






    public function textboxResponseDepartmentNameFromDepartmentId(Request $request, $key){

    	if($request->Ajax()){

    		$response_department_name = $this->cache->remember('api:response_departments_from_department:byDepartmentId:'. $key .'', 240, function() use ($key){

        		return $this->department->select('name')
        		                        ->where('department_id', $key)
        		                        ->get();
        		                        
       		});

	    	return json_encode($response_department_name);

	    }

	    return abort(404);
	    
    }





    
}
