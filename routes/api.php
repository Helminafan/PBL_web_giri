<?php

use App\Http\Controllers\API\ApiMojopanggungController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\kewargaancontroller;
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
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/add_mojopanggung', [ApiMojopanggungController::class, 'store']);
    Route::get('/view_mojopanggung', [ApiMojopanggungController::class, 'index']);
    

});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::post('/add_kewargaan', [kewargaancontroller::class, 'store']);
Route::get('/view_kewargaan', [kewargaancontroller::class, 'index']);