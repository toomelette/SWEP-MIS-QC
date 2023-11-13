<?php

namespace App\Http\Controllers;


use App\Models\Applicant;
use App\Models\Budget\ORS;
use App\Models\Budget\ORSProjectsApplied;
use App\Models\Course;
use App\Models\Document;
use App\Models\DocumentDisseminationLog;
use App\Models\EmailContact;
use App\Models\Employee;
use App\Models\JoEmployees;
use App\Models\LeaveApplication;
use App\Models\News;
use App\Models\PermissionSlip;
use App\Swep\Services\HomeService;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;


class HomeController extends Controller{
    



	protected $home;




    public function __construct(HomeService $home){

        $this->home = $home;

    }


    public function index(Request $request){


    	return $this->home->view();
    }

    private function birthdayCelebrantsView($this_month){

        $union = Employee::query()
            ->select('lastname','firstname','middlename','date_of_birth as birthday',DB::raw("LPAD(MONTH(date_of_birth),2,'0') as month_bday"), DB::raw("'PERM' as type") ,'employee_no')
            ->where(DB::raw("LPAD(MONTH(date_of_birth),2,'0')") , '=',Carbon::parse($this_month)->format('m'))
            ->where('is_active','=','ACTIVE')
            ->where('locations' ,'!=','RETIREE')
            ->get();

        $bday_celebrants = [];
        $bday_celebrants['prev'] = [];
        $bday_celebrants['upcoming'] = [];
        $bday_celebrants['today'] = [];
        foreach ($union as $emp) {

            if(Carbon::parse($emp->birthday)->format('md') < Carbon::now()->format('md')){
                $bday_celebrants['prev'][Carbon::parse($emp->birthday)->format('md')][$emp->employee_no] = $emp;
            }elseif(Carbon::parse($emp->birthday)->format('md') == Carbon::now()->format('md')){
                $bday_celebrants['today'][Carbon::parse($emp->birthday)->format('md')][$emp->employee_no] = $emp;
            }else{
                $bday_celebrants['upcoming'][Carbon::parse($emp->birthday)->format('md')][$emp->employee_no] = $emp;
            }
        }
        krsort($bday_celebrants['prev']);
        ksort($bday_celebrants['upcoming']);
        return view('dashboard.home.birthday_celebrants')->with([
            'bday_celebrants' => $bday_celebrants,
            'requested_month' => $this_month,
        ])->render();
    }
    private  function stepIncrements($month,$year = null){

        if($year == ''){
            $year = Carbon::now()->format('Y');
        }
        $emps = Employee::query()->where('adjustment_date','!=',null)
            ->where('is_active','=','ACTIVE')
            ->where(function ($query){
                $query  ->where('locations','=','LUZON/MINDANAO')
                    ->orWhere('locations','=','VISAYAS');
            })
            ->whereMonth('adjustment_date','=',$month)
            ->orderBy('lastname','asc')
            ->get();
        $employees_with_adjustments = [];

        foreach ($emps as $emp){
            $diff = ($year)-(Carbon::parse($emp->adjustment_date)->format('Y'));
            if($diff%3 == 0 && Carbon::now()->format('Y') != Carbon::parse($emp->adjustment_date)->format('Y')){
                $employees_with_adjustments[$emp->slug] = $emp;
            }
        }

        return view('dashboard.home.step_increments')->with([
            'employees_with_adjustments' => $employees_with_adjustments,
            'year_step' => $year
        ])->render();
    }
    private function milestones($yr = null){
        $year = $yr == null ? Carbon::now()->format('Y') : $yr;
        $loyaltys = Employee::query()
            ->select('slug','employee_no','lastname','firstname','firstday_gov',DB::raw('YEAR(firstday_gov) as firstday_gov_year'),DB::raw('YEAR(firstday_gov) as firstday_gov_year'),DB::raw($year.' - YEAR(firstday_gov) as years_in_gov'))
            ->where(DB::raw('('.$year.' - YEAR(firstday_gov)) % 5'),'=',0)
            ->where(DB::raw($year.' - YEAR(firstday_gov)'),'>',9)
            ->where('locations','!=', 'COS-VISAYAS')
            ->where('locations','!=', 'COS-LM')
            ->where('locations','!=','RETIREE')
            ->where('is_active','!=','INACTIVE')
            ->orderBy('firstday_gov','desc')
            ->orderBy('lastname','asc')
            ->get();
        $loyaltysArr = [];
        foreach ($loyaltys as $loyalty) {
            $loyaltysArr[$loyalty->slug] = $loyalty;
        }
        return view('dashboard.home.milestones')->with([
                'loyaltys' => $loyaltysArr,
            ]
        )->render();
    }


}
