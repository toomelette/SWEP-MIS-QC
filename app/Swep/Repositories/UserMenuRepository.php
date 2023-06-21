<?php

namespace App\Swep\Repositories;
 
use App\Swep\BaseClasses\BaseRepository;
use App\Swep\Interfaces\UserMenuInterface;

use Route;
use App\Models\UserMenu;


class UserMenuRepository extends BaseRepository implements UserMenuInterface {
	


    protected $user_menu;



	public function __construct(UserMenu $user_menu){

        $this->user_menu = $user_menu;
        parent::__construct();

    }






    public function store($user, $menu){

    	$user_menu = new UserMenu;
        $user_menu->user_menu_id = $this->getUserMenuIdInc();
        $user_menu->user_id = $user->user_id;
        $user_menu->menu_id = $menu->menu_id;
        $user_menu->category = $menu->category;
        $user_menu->name = $menu->name;
        $user_menu->route = $menu->route;
        $user_menu->icon = $menu->icon;
        $user_menu->is_menu = $menu->is_menu;
        $user_menu->is_dropdown = $menu->is_dropdown; 
        $user_menu->save();

        return $user_menu;
        
    }







    public function getUserMenuIdInc(){

        $id = 'UM10000001';

        $usermenu = $this->user_menu->select('user_menu_id')->orderBy('user_menu_id', 'desc')->first();

        if($usermenu != null){
            if($usermenu->user_menu_id != null){
                $num = str_replace('UM', '', $usermenu->user_menu_id) + 1;
                $id = 'UM' . $num;
            }
        }
        
        return $id;
        
    }








    public function getByCategory($cat){
        $user_menus_u = $this->user_menu->with(['user'])->where('user_id', $this->auth->user()->user_id)
            ->where('category', $cat)
            ->with('userSubMenu')
            ->get();
        return $user_menus_u;
    }








    public function isExist() {

        $user_id = $this->auth->user()->user_id;
        $route_name = Route::currentRouteName();

        $user_menu = $this->user_menu->where('route', $route_name)
            ->where('user_id', $user_id)
            ->exists();

        return $user_menu;

    }








}