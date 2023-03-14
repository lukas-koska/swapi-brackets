<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class SwapiApiService
{

    public function receiveData(string $url, string $method) : Response
    {
        switch ($method) {
            default:
                $response = Http::get($url);
                break;
        }

        return $response;
    }
}
