<?php

namespace App\Http\Controllers;

use App\Repositories\PlanetsRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanetController extends Controller
{
    public function __construct(
        protected PlanetsRepository $planetsRepository
    ) {
        // Nothing have to be done here
    }

    /**
     * Show the HOMEPAGE
     */
    public function show(Request $request): View
    {
        $validated = $request->validate([
            'diameter' => 'nullable|float',
            'rotation_period' => 'nullable|float',
            'gravity' => 'nullable|float',
            'page' => 'nullable|int',
        ]);

        dump($request);
        dump($validated);

        return view('planetspage', [
            'planetsCount' => $this->planetsRepository->getPlanetCounts(),
            'planets' => $this->planetsRepository->filterPlanets([], 0),
        ]);
    }
}
