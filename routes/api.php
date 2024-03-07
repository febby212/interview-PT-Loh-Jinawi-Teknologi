<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\Quots\QuotsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//alredy auth with api
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('qotd', [QuotsController::class, 'showQuots']);

    Route::post('qotd/byCategory', [QuotsController::class, 'showByCategory']);
});

Route::get('/{any}', function () {
    return response()->json(['message' => 'Not Found'], Response::HTTP_NOT_FOUND);
})->where('any', '.*');