<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Services\SwapiApiService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PeopleController extends Controller
{
    public function __construct(
        protected SwapiApiService $swapiApiService,
    ) {
        // Nothing have to be done here
    }


    public function getAllPeoples() : Response
    {
        $apiUrl = env('SWAPI_URL');
        $peopleUrl = '/api/people/';
        $response = $this->swapiApiService->receiveData($apiUrl . $peopleUrl, 'GET');

        if ($response->status() >= 400) {
            return response([], $response->status());
        }

        $content = $response->body();
        $contentArray = json_decode($content, true);

        $peoples = [];
        if (array_key_exists('results', $contentArray)) {
            foreach ($contentArray['results'] as $peopleApi) {

                $people = new People($peopleApi);
                $peoples[] = $people;

            }

        }

        return response($peoples);
    }
}
