<?php


namespace App\Http\Controllers;


use __static;
use App\Models\EmployeeFile201;
use App\Models\NewsAttachments;
use App\Swep\Repositories\UserSubmenuRepository;
use File;
use Route;

class ViewDocument extends Controller
{
    protected $userSubmenuRepo;
    public function __construct(UserSubmenuRepository $user_submenu_repo)
    {
        $this->userSubmenuRepo = $user_submenu_repo;
    }

    public function index($id,$type){
        if($id == null || $type == null){
            abort(505,'Missing Parameters');
        }
        if($type == 'view_201File'){
            if(!$this->userSubmenuRepo->isExist('dashboard.file201.index')){
                abort(405);
            }
            $attachment = EmployeeFile201::query()->where('slug','=',$id)->first();
            if(empty($attachment)){
                abort(504,'Attachment not available. The file maybe moved or deleted.');
            }

            if(\request()->has('download')) {
                return $dl = \Storage::disk('local_hru')->download($attachment->full_path);
            }

            $fullPathRelativeToStorage = \Storage::disk('local_hru')->path($attachment->full_path);
            if(!\Storage::disk('local_hru')->exists($attachment->full_path)){
                abort(404,'File not found');
            }
            $file = File::get($fullPathRelativeToStorage);
            $type = File::mimeType($fullPathRelativeToStorage);
            $response = response()->make($file, 200);
            $response->header("Content-Type", $type);
            return $response;
        }
        abort(504,'Invalid type: <b>'.$type.'</b>');
    }
}