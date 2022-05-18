<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/sintomas', [WebsiteController::class, 'sintomas']);
Route::middleware('api')->get('/signos', [WebsiteController::class, 'signos']);
Route::middleware('api')->get('/citas', [WebsiteController::class, 'citas']);

Route::middleware('api')->post('/register', [WebsiteController::class, 'register']);
Route::middleware('api')->post('/login', [WebsiteController::class, 'login']);
Route::middleware('api')->post('/citas', [WebsiteController::class, 'createCite']);
// Route::post('/consultDisease', 'App\Http\Controllers\WebsiteController@consultDisease');