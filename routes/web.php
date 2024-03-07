<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('qotd/dash', [QuotsController::class, 'dashQuots'])->name('dashQuots');
Route::get('qotd/web', [QuotsController::class, 'Quots'])->name('qotd');
Route::get('find-quots', [QuotsController::class, 'showSearch'])->name('showSearch');
Route::get('find-quots/{category}', [QuotsController::class, 'findQuots'])->name('findQuots');
