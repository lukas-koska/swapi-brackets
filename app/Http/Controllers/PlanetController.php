<?php

namespace App\Http\Controllers;

use App\Models\Planet;
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

    public function planetsApiResponse()
    {
        $planets = Planet::orderBy('diameter', 'DESC')->paginate(10);
        $aggregatedData = [];
        foreach ($planets as $planet) {
            $aggregatedData[] = [
                'name' => $planet['name'],
                'terrain' => $this->getTerrainForPieChart($planet),
            ];
            dump($this->getTerrainForPieChart($planet));
        }
        return [
            "status" => 1,
            "data" => $aggregatedData
        ];
    }

    private function getTerrainForPieChart(Planet $planet): array
    {
        $terrains = explode(', ', $planet['terrain']);
        if (count($terrains) === 1) {
            return [$terrains[0] => 1];
        }
        $pieChartArray = [];
        foreach ($terrains as $key => $terrain) {
            if ($key === count($terrains) - 1) {
                $pieChartArray[$terrain] = 1 - array_sum($pieChartArray);
                break;
            }
            $pieChartArray[$terrain] = round(rand(1, 99 - (array_sum($pieChartArray) * 100)) / 100, 2);
        }

        return $pieChartArray;
    }
}
