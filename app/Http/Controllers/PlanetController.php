<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use App\Repositories\PlanetsRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanetController extends Controller
{
    public function __construct(
        protected PlanetsRepository $planetsRepository,
        protected PlanetSpeciesController $planetSpeciesController,
    ) {
        // Nothing have to be done here
    }

    /**
     * Show the page with planets filter
     * @param Request $request
     * @return View
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

        $page = 0;
        if (array_key_exists('page', $validatedFields)) {
            $page = $validatedFields['page'];
            unset($validatedFields['page']);
        }

        return view('planetspage', [
            'planetsCount' => $this->planetsRepository->getPlanetCounts(),
            'gravities' => $this->planetsRepository->getPlanetsGravity(),
            'planets' => $this->planetsRepository->filterPlanets($validatedFields, $page),
            'fields' => $validatedFields,
        ]);
    }

    /**
     * Prepare aggregated data for API endpoint
     * Get 10 largest planets
     * Get terrains
     * Get species distribution for these planets
     * @return array<string, array<int, array<string, mixed>>|int>|int
     */
    public function planetsApiResponse() : array|int
    {

        $aggregatedData = $this->getAggregatedData();
        // Provide data
        return [
            "status" => count($aggregatedData) > 0 ? 1 : 0,
            "data" => $aggregatedData,
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getAggregatedData($json = false) : array
    {
        // Prepare data
        $planets = Planet::orderBy('diameter', 'DESC')->paginate(10);
        $aggregatedData = [];
        foreach ($planets->items() as $planet) {
            $aggregatedData[] = [
                'name' => $planet['name'],
                'terrain' => $json ? json_encode($this->getTerrainForPieChart($planet)) : $this->getTerrainForPieChart($planet),
                'species' => $this->planetSpeciesController->getSpeciesForPlanets($planet),
            ];
        }

        return $aggregatedData;
    }

    /**
     * Create random terrain proportions for planets (according to assignment?)
     * @param Planet $planet
     * @return array<string, float|int>
     */
    private function getTerrainForPieChart(Planet $planet): array
    {
        $terrains = explode(', ', $planet['terrain']);
        if (count($terrains) === 1) {
            $terrains[0] = str_replace(' ', '_', $terrains[0]);
            return [$terrains[0] => 1];
        }
        $pieChartArray = [];
        foreach ($terrains as $key => $terrain) {
            $terrain = str_replace(' ', '_', $terrain);
            if ($key === count($terrains) - 1) {
                $pieChartArray[$terrain] = 1 - array_sum($pieChartArray);
                break;
            }
            $pieChartArray[$terrain] = round(rand(1, (int)round(99 - (array_sum($pieChartArray) * 100))) / 100, 2);
        }

        return $pieChartArray;
    }
}
