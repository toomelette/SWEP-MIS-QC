<?php

namespace App\Swep\ViewComposers;


use View;
use Auth;
use App\Swep\Interfaces\UserMenuInterface;


class UserMenuComposer{
   


    protected $user_menu_repo;
	protected $auth;




	public function __construct(UserMenuInterface $user_menu_repo){

        $this->user_menu_repo = $user_menu_repo;
		$this->auth = auth();
    
	}





    public function compose($view){

        $user_menus_u = [];
        $user_menus_su = [];
        $user_menus_acctg = [];
        $user_menus_hr = [];


//        if($this->auth->check()){
//
//            $user_menus_u = $this->user_menu_repo->getByCategory('U');
//
//            $user_menus_su = $this->user_menu_repo->getByCategory('SU');
//
//            $user_menus_acctg = $this->user_menu_repo->getByCategory('ACCTG');
//
//            $user_menus_hr = $this->user_menu_repo->getByCategory('HR');
//
//            $user_menus_records = $this->user_menu_repo->getByCategory('RECORDS');
//
//        }
//
//
//    	$view->with([
//            'global_user_menus_u' => $user_menus_u,
//            'global_user_menus_acctg' => $user_menus_acctg,
//            'global_user_menus_hr' => $user_menus_hr,
//            'global_user_menus_su' => $user_menus_su,
//            'global_user_menus_records' => $user_menus_records,
//        ]);


    }






}