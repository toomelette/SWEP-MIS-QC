<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\OApplicantFormRequest;
use App\Models\Applicant;
use App\Models\HRU\OApplicantEducation;
use App\Models\HRU\OApplicantEligibility;
use App\Models\HRU\OApplicantPositionApplied;
use App\Models\HRU\OApplicants;
use App\Models\HRU\OApplicantTraining;
use App\Models\HRU\OApplicantWork;
use App\Models\HRU\PublicationDetails;
use App\Swep\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class ApplicantFormController extends Controller
{
    public function index(){
        return view('public.applicant.registration_personal');
    }

    public function submit(OApplicantFormRequest $request){

        if(!empty($request->position_applied)){
            $positionArray = [];
            foreach ($request->position_applied as $pubDetailSlug){
                $pd = PublicationDetails::query()
                    ->with(['publication'])
                    ->where('slug','=',$pubDetailSlug)->first();
                $publicationSlug = $pd->publication_slug;
                //$pubDetailSlug
                $slug = Str::random(52);
                $applicant = new OApplicants();
                $applicant->slug = Str::random();
                $applicant->publication_slug = $publicationSlug;
                $applicant->publication_detail_slug = $pubDetailSlug;
                $applicant->item_no = $pd->item_no;
                $applicant->thru = 'ONLINE';
                $applicant->firstname = $request->firstname;
                $applicant->middlename = $request->middlename;
                $applicant->lastname = $request->lastname;
                $applicant->name_ext = $request->name_ext;
                $applicant->gender = $request->gender;
                $applicant->date_of_birth = $request->date_of_birth;
                $applicant->civil_status = $request->civil_status;
                $applicant->citizenship = $request->citizenship;
                $applicant->citizenship_type = $request->citizenship_type;
                $applicant->contact_no = $request->contact_no;
                $applicant->email = $request->email;
                $applicant->res_block = $request->res_block;
                $applicant->res_street = $request->res_street;
                $applicant->res_subdivision = $request->res_subdivision;
                $applicant->res_barangay = $request->res_barangay;
                $applicant->res_city = $request->res_city;
                $applicant->res_province = $request->res_province;



                $test = 0;
                /*POSITIONS*/
                if(!empty($request->position_applied)){
                    $positionArray = [];
                    foreach ($request->position_applied as $pubDetailSlug){
                        array_push($positionArray,[
                            'slug' => Str::random(),
                            'applicant_slug' => $applicant->slug,
                            'publication_detail_slug' => $pubDetailSlug,
                        ]);
                    }
                    $test = OApplicantPositionApplied::insert($positionArray) ? 1 : 0;
                }

                /*EDUCATION*/
                $educationArray = [];
                foreach ($request->educations as $education){
                    $education['slug'] = Str::random();
                    $education['applicant_slug'] = $applicant->slug;
                    array_push($educationArray,$education);
                }
                $test = OApplicantEducation::insert($educationArray) ?  1 : 0;

                /*ELIGIBILITY*/
                $eligibilitiesArray = [];
                foreach ($request->eligibilities as $eligibility){
                    $eligibility['slug'] = Str::random();
                    $eligibility['applicant_slug'] = $applicant->slug;
                    array_push($eligibilitiesArray,$eligibility);
                }
                $test = OApplicantEligibility::insert($eligibilitiesArray) ? 1: 0;

                /*WORK EXPERIENCE*/
                $workExperiencesArray = [];
                foreach ($request->work_experiences as $work_experience){
                    $work_experience['slug'] = Str::random();
                    $work_experience['applicant_slug'] = $applicant->slug;
                    $work_experience['monthly_salary'] = Helper::sanitizeAutonum($work_experience['monthly_salary']);
                    array_push($workExperiencesArray,$work_experience);
                }
                $test = OApplicantWork::insert($workExperiencesArray) ? 1 : 0;


                /*TRAININGS*/
                $trainingsArray = [];
                foreach ($request->trainings as $training){
                    $training['slug'] = Str::random();
                    $training['applicant_slug'] = $applicant->slug;
                    array_push($trainingsArray,$training);
                }
                $test = OApplicantTraining::insert($trainingsArray) ? 1 : 0;

                if($test == 1){
                    if($applicant->save()){
                        return  $applicant->only('slug');
                    }
                }
            }
        }
        abort(503,'Error saving data.');
        $slug = Str::random(52);
        $applicant = new Applicant();
        $applicant->slug = Str::random();
        $applicant->thru = 'ONLINE';
        $applicant->firstname = $request->firstname;
        $applicant->middlename = $request->middlename;
        $applicant->lastname = $request->lastname;
        $applicant->name_ext = $request->name_ext;
        $applicant->gender = $request->gender;
        $applicant->date_of_birth = $request->date_of_birth;
        $applicant->civil_status = $request->civil_status;
        $applicant->citizenship = $request->citizenship;
        $applicant->citizenship_type = $request->citizenship_type;
        $applicant->contact_no = $request->contact_no;
        $applicant->email = $request->email;
        $applicant->res_block = $request->res_block;
        $applicant->res_street = $request->res_street;
        $applicant->res_subdivision = $request->res_subdivision;
        $applicant->res_barangay = $request->res_barangay;
        $applicant->res_city = $request->res_city;
        $applicant->res_province = $request->res_province;

        $test = 0;
        /*POSITIONS*/
        if(!empty($request->position_applied)){
            $positionArray = [];
            foreach ($request->position_applied as $pubDetailSlug){
                array_push($positionArray,[
                    'slug' => Str::random(),
                    'applicant_slug' => $applicant->slug,
                    'publication_detail_slug' => $pubDetailSlug,
                ]);
            }
            $test = OApplicantPositionApplied::insert($positionArray) ? 1 : 0;
        }

        /*EDUCATION*/
        $educationArray = [];
        foreach ($request->educations as $education){
            $education['slug'] = Str::random();
            $education['applicant_slug'] = $applicant->slug;
            array_push($educationArray,$education);
        }
        $test = OApplicantEducation::insert($educationArray) ?  1 : 0;

        /*ELIGIBILITY*/
        $eligibilitiesArray = [];
        foreach ($request->eligibilities as $eligibility){
            $eligibility['slug'] = Str::random();
            $eligibility['applicant_slug'] = $applicant->slug;
            array_push($eligibilitiesArray,$eligibility);
        }
        $test = OApplicantEligibility::insert($eligibilitiesArray) ? 1: 0;

        /*WORK EXPERIENCE*/
        $workExperiencesArray = [];
        foreach ($request->work_experiences as $work_experience){
            $work_experience['slug'] = Str::random();
            $work_experience['applicant_slug'] = $applicant->slug;
            $work_experience['monthly_salary'] = Helper::sanitizeAutonum($work_experience['monthly_salary']);
            array_push($workExperiencesArray,$work_experience);
        }
        $test = OApplicantWork::insert($workExperiencesArray) ? 1 : 0;


        /*TRAININGS*/
        $trainingsArray = [];
        foreach ($request->trainings as $training){
            $training['slug'] = Str::random();
            $training['applicant_slug'] = $applicant->slug;
            array_push($trainingsArray,$training);
        }
        $test = OApplicantTraining::insert($trainingsArray) ? 1 : 0;
        if($test == 1){
            $applicant->save();
        }
        return $request->eligibilities;
    }

    public function getQs(Request $request){
        $pd = PublicationDetails::query()
            ->whereIn('slug',$request->positions)
            ->get();
        return view('public.applicant.qs')->with([
            'pds' => $pd,
        ]);
    }
}