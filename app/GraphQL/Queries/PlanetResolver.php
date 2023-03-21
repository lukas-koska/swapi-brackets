<?php
namespace App\GraphQL\Queries;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\PlanetSpeciesController;
use App\Repositories\PlanetSpeciesRepository;
use App\Repositories\PlanetsRepository;
use App\Repositories\SpeciesRepository;
use App\Services\SwapiApiService;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class PlanetResolver
{
    /**
     * @param mixed $rootValue
     * @param array<mixed> $args
     * @param GraphQLContext $context
     * @param ResolveInfo $resolveInfo
     * @return array<int, array<string, mixed>>
     */
    public function resolve(mixed $rootValue,array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $planetSpeciesRepository = new PlanetSpeciesRepository();
        $planeSpeciesController = new PlanetSpeciesController($planetSpeciesRepository);

        $speciesRepository = new SpeciesRepository();
        $swapiApiService = new SwapiApiService();
        $planetRepository = new PlanetsRepository($speciesRepository, $planetSpeciesRepository, $swapiApiService);

        $planetController = new PlanetController($planetRepository, $planeSpeciesController);

        return $planetController->getAggregatedData(true);
    }
}
