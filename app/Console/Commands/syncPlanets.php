<?php

namespace App\Console\Commands;

use App\Services\SwapiApiService;
use Illuminate\Console\Command;

class syncPlanets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncPlanets:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private SwapiApiService $swapiApiService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiUrl = env('SWAPI_URL');
        $planetsUrl = '/api/planets/';
        $response = $this->swapiApiService->receiveData($apiUrl . $planetsUrl, 'GET');

        if ($response->status() >= 400) {
            return 1;
        }

        $content = $response->body();


        dd($content);

        return 0;
    }
}
