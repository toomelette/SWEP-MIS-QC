<?php

namespace App\Swep\Services\HRU;

use App\Models\HRU\OApplicants;

class PublicationApplicantService
{
    public function findBySlug($slug){
        $applicant = OApplicants::query()
            ->with([
                'educationalBackground',
                'eligibilities',
                'workExperiences',
                'trainings',
                'publicationItem',
            ])
            ->where('slug','=',$slug)
            ->first();
        return $applicant ?? abort(503,'Applicant not found.');
    }
}