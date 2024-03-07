<?php

use App\Http\Controllers\WEB\AuthController;
use App\Http\Controllers\WEB\Quots\QuotsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('auth', [AuthController::class, 'auth'])->name('login');

Route::get('qotd/dash', [QuotsController::class, 'dashQuots'])->name('dashQuots');
Route::get('qotd/web', [QuotsController::class, 'Quots'])->name('qotd');
Route::get('find-quots', [QuotsController::class, 'showSearch'])->name('showSearch');
Route::get('find-quots/{category}', [QuotsController::class, 'findQuots'])->name('findQuots');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
