<?php

namespace App\Swep\Services\HRU;

use App\Models\HRU\PublicationDetails;

class PublicationDetailService
{
    public function findBySlug($slug){
        $pub = PublicationDetails::query()->with(['publication','applicants'])
            ->where('slug','=',$slug)
            ->first();
        return $pub ?? abort(503,'Publication not found.');
    }
}