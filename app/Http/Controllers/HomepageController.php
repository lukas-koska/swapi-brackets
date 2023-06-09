<?php

namespace App\Http\Controllers;

use App\Repositories\PlanetsRepository;
use Illuminate\View\View as View;

class HomepageController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected PlanetsRepository $planetsRepository
    ) {
        // Nothing have to be done here
    }

    /**
     * Show the HOMEPAGE
     */
    public function show(): view
    {
        return view('homepage', [
            'planetsCount' => $this->planetsRepository->getPlanetCounts()
        ]);
    }
}