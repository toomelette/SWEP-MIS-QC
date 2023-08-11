<?php

namespace App\Http\Controllers\HRU;

use App\Http\Controllers\Controller;
use App\Models\HRU\OApplicantEducation;
use App\Models\HRU\OApplicantEligibility;
use App\Models\HRU\OApplicants;
use App\Models\HRU\OApplicantTraining;
use App\Models\HRU\OApplicantWork;
use App\Swep\Services\HRU\PublicationApplicantService;
use App\Swep\Services\HRU\PublicationDetailService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PublicationApplicantsController extends Controller
{
    public function __construct(
        protected PublicationDetailService $publicationDetailService,
        protected PublicationApplicantService $publicationApplicantService,
    )
    {
    }

    public function index($publicationDetailSlug,Request $request){
        if($request->ajax() && $request->has('draw')){
            $applicants = OApplicants::query()
                ->with([
                    'educationalBackground',
                    'eligibilities',
                    'workExperiences',
                    'trainings',
                ])
                ->where('publication_detail_slug','=',$publicationDetailSlug);
            return DataTables::of($applicants)
                ->editColumn('lastname',function($data){
                    return view('dashboard.hru.publication_applicants.dtFullname')->with([
                        'data' => $data,
                    ]);
                })
                ->addColumn('education',function($data){
                    return view('dashboard.hru.publication_applicants.dtEducation')->with([
                        'data' => $data,
                    ]);
                })
                ->addColumn('eligibility',function($data){
                    return view('dashboard.hru.publication_applicants.dtEligibility')->with([
                        'data' => $data,
                    ]);
                })
                ->addColumn('experience',function($data){
                    return view('dashboard.hru.publication_applicants.dtWorkExperiences')->with([
                        'data' => $data,
                    ]);
                })
                ->addColumn('training',function($data){
                    return view('dashboard.hru.publication_applicants.dtTrainings')->with([
                        'data' => $data,
                    ]);
                })
                ->addColumn('actions',function($data){
                    return view('dashboard.hru.publication_applicants.dtActions')->with([
                        'data' => $data,
                    ]);
                })
                ->escapeColumns([])
                ->setRowId('slug')
                ->toJson();

        }
        return view('dashboard.hru.publication_applicants.index')->with([
            'publicationDetail' => $this->publicationDetailService->findBySlug($publicationDetailSlug),
        ]);
    }

    public function assess($slug){
        $applicant = $this->publicationApplicantService->findBySlug($slug);
        return view('dashboard.hru.publication_applicants.assess')->with([
            'applicant' => $applicant,
        ]);
    }

    public function assessPost($applicantSlug,Request $request){
        $applicant = $this->publicationApplicantService->findBySlug($applicantSlug);
        /*EDUCATION*/
        $applicant->educationalBackground()
            ->update([
                'selected' => null,
            ]);
        $collection = collect($request->educationalBackground);
        $array = $collection->map(function ($val){
            return [
                'id' => $val,
                'selected' => 1,
            ];
        })->toArray();
        OApplicantEducation::upsert($array,['id'],['selected']);

        /*ELIGIBILITIES*/
        $applicant->eligibilities()
            ->update([
                'selected' => null,
            ]);
        $collection = collect($request->eligibilities);
        $array = $collection->map(function ($val){
            return [
                'id' => $val,
                'selected' => 1,
            ];
        })->toArray();
        OApplicantEligibility::upsert($array,['id'],['selected']);


        /*EXPERIENCES*/
        $applicant->workExperiences()
            ->update([
                'selected' => null,
            ]);
        $collection = collect($request->workExperiences);
        $array = $collection->map(function ($val){
            return [
                'id' => $val,
                'selected' => 1,
            ];
        })->toArray();
        OApplicantWork::upsert($array,['id'],['selected']);

        /*TRAININGS*/
        $applicant->trainings()
            ->update([
                'selected' => null,
            ]);
        $collection = collect($request->trainings);
        $array = $collection->map(function ($val){
            return [
                'id' => $val,
                'selected' => 1,
            ];
        })->toArray();
        OApplicantTraining::upsert($array,['id'],['selected']);

        return $applicant->only('slug');
    }


}