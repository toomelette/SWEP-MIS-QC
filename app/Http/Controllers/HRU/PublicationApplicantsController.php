<?php

namespace App\Http\Controllers\HRU;

use App\Http\Controllers\Controller;
use App\Swep\Services\HRU\PublicationDetailService;

class PublicationApplicantsController extends Controller
{
    public function __construct(protected PublicationDetailService $publicationDetailService)
    {
    }

    public function index($publicationDetailSlug){
        return view('dashboard.hru.publication_applicants.index')->with([
            'publicationDetail' => $this->publicationDetailService->findBySlug($publicationDetailSlug),
        ]);
    }
}