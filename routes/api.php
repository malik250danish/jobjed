<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DictionryController; 
use App\Http\Controllers\AirAdOptionController; 
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\LoginController; 

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
Route::get('checkdataupdates', [AirAdOptionController::class, 'checkLastDataUpdates']);
Route::get('dictionry', [DictionryController::class, 'Dictionry']);
Route::post('advertiser-register', [RegisterController::class, 'advertiserRegister']);
Route::post('login', [LoginController::class, 'apiLogin']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::any('user',[LoginController::class, 'getUser']);
    Route::any('logout',[LoginController::class, 'apiLogout']);
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
