<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\UserLogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('{language}')
    ->where(['language' => '[a-zA-Z]{2}'])
    ->middleware('setLanguage')
    ->group(function () {
        Route::get('/', [HomepageController::class, 'show']);
        Route::get('/planets', [PlanetController::class, 'show']);
        Route::get('/logs', [UserLogController::class, 'show']);
    });

Route::get('/', function () {
    return redirect(config('app.available_languages')[0]);
});

Route::get('/welcome', function () {
    return view('welcome');
});
