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
        $validatedFields = $request->validate([
            'diameter' => 'nullable|numeric',
            'rotation_period' => 'nullable|numeric',
            'gravity' => 'nullable|string',
            'page' => 'nullable|int',
        ]);

        if (array_key_exists('gravity', $validatedFields)) {
            $validatedFields['gravity'] = htmlspecialchars($validatedFields['gravity']);
        }

        return view('planetspage', [
            'planetsCount' => $this->planetsRepository->getPlanetCounts(),
            'gravities' => $this->planetsRepository->getPlanetsGravity(),
            'planets' => $this->planetsRepository->filterPlanets($validatedFields, 0),
            'fields' => $validatedFields,
        ]);
    }
}
