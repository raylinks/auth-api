<?php

use App\Http\Controllers\AuthenticationController;
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
Route::get('/', function () {
    return ['status' => true, 'message' => 'Ray Api Assets Service'];
})->name('welcome');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum' ], function(){

});

Route::post('register/doctor', [AuthenticationController::class, 'doctorRegister'])->name('register');

Route::post('register/healthseeker', [AuthenticationController::class, 'healthSeekerRegister'])->name('register');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('register', [AuthenticationController::class, 'register'])->name('register');
    Route::post('login', [AuthenticationController::class, 'login'])->name('login');
});
