<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Swep\Helpers\__static;
use App\Swep\Services\MenuService;
use App\Http\Requests\Menu\MenuFormRequest;
use App\Http\Requests\Menu\MenuFilterRequest;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use function foo\func;


class MenuController extends Controller{


    protected $menu;



    public function __construct(MenuService $menu){

        $this->menu = $menu;

    }


    
    public function index(MenuFilterRequest $request){
        $menus = Menu::with('submenu')->get();
        if(request()->ajax()){
            $dt = DataTables::of($menus)
                ->addColumn('submenus',function($data){
                    if($data->submenu->count() > 0){
                        $submenus = '';
                        foreach ($data->submenu as $submenu){
                            if(str_contains($submenu->name,'Store')){
                                $bg = 'bg-green-active';
                            }elseif(str_contains($submenu->name,'Edit')){
                                $bg = 'bg-blue';
                            }elseif(str_contains($submenu->name,'Destroy') || str_contains($submenu->name,'Delete')){
                                $bg = 'bg-red';
                            }elseif(str_contains($submenu->name,'Create')){
                                $bg = 'bg-green';
                            }elseif(str_contains($submenu->name,'Update')){
                                $bg = 'bg-blue-active';
                            }elseif(str_contains($submenu->name,'Report')){
                                $bg = 'bg-purple';
                            }elseif(str_contains($submenu->name,'List')){
                                $bg = 'bg-yellow-active';
                            }elseif(str_contains($submenu->name,'Show')){
                                $bg = 'bg-teal';
                            }elseif(str_contains($submenu->name,'Print')){
                                $bg = 'bg-orange';
                            }else{
                                $bg = 'bg-gray';
                            }
                            $submenus = $submenus.' <div style="margin-bottom: 5px; display: inline-block; font-size: 16px"><span class="submenu-badges label '.$bg.'">'.$submenu->name.'</span></div>';
                        }
                        return $submenus;
                        //return substr($submenus,2);
                    }
                })
                ->addColumn('action',function($data){
                    $destroy_route = "'".route("dashboard.menu.destroy","slug")."'";
                    $slug = "'".$data->slug."'";
                    return '<div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm list_submenus_btn" menu_id="'.$data->menu_id.'" data="'.$data->slug.'" data-toggle="modal" data-target="#list_submenus" title="" data-placement="left" data-original-title="Submenus">
                                    <i class="fa fa-list"></i>
                                </button>
                                <button type="button" data="'.$data->slug.'" class="btn btn-default btn-sm edit_menu_btn" data-toggle="modal" data-target="#edit_menu_modal" title="" data-placement="top" data-original-title="Edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" onclick="delete_data('.$slug.','.$destroy_route.')" data="'.$data->slug.'" class="btn btn-sm btn-danger" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>';
                })
//                ->editColumn('category', function ($data){
//                    return __html::sidenav_labeler($data->category);
//                })
                ->editColumn('icon',function ($data){
                    return '<i class="fa '.$data->icon.'"></i>';
                })
                ->editColumn('is_menu',function ($data){
                    return __html::boolToCheck($data->is_menu);
                })
                ->editColumn('is_dropdown',function ($data){
                    return __html::boolToCheck($data->is_dropdown);
                })
                ->escapeColumns([])
                ->setRowid('slug')
                ->toJson();

            return $dt;
        }
        return $this->menu->fetch($request);

    }

    

    public function create(){
        
        return view('dashboard.menu.create');

    }

   

    public function store(MenuFormRequest $request){
        $menu = new Menu;
        $menu->slug = Str::random(15);
        $menu->menu_id = strtoupper(Str::random(6));
        $menu->name = $request->name;
        $menu->route = $request->route;
        $menu->category = $request->category;
        $menu->icon = $request->icon;
        $menu->is_dropdown = $request->is_dropdown;
        $menu->is_menu = $request->is_menu;
        $menu->portal = $request->portal;
        $menu->save();
        return $menu->only('slug');
        return $this->menu->store($request);

    }
 



    public function edit($slug){
        $menu = Menu::with('submenu')->where('slug',$slug)->first();
        return view('dashboard.menu.edit')->with([
            'menu' => $menu,
        ]);
        return $this->menu->edit($slug);

    }




    public function update(MenuFormRequest $request, $slug){
        $menu = Menu::query()->where('slug',$slug)->first();
        $menu->name = $request->name;
        $menu->route = $request->route;
        $menu->category = $request->category;
        $menu->icon = $request->icon;
        $menu->is_menu = $request->is_menu;
        $menu->is_dropdown = $request->is_dropdown;
        $menu->portal = $request->portal;
        $menu->update();
        return $menu->only('slug');
        return $this->menu->update($request, $slug);

    }

    


    public function destroy($slug){
        $menu = Menu::query()->where('slug',$slug)->first();
        $menu->submenu()->delete();
        $menu->delete();
        return 1;
    }



    
}
