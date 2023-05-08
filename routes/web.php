<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ConsignmentController;
use App\Http\Controllers\Admin\MotorcycleController;
use App\Http\Controllers\Admin\UserController;
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

Route::prefix('admin')->namespace('Admin')->group(function (){
    route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    route::resource('/city', CityController::class);
    route::resource('/motorcycle', MotorcycleController::class);
    route::resource('/consignment', ConsignmentController::class);
    route::resource('/user', UserController::class);
});

Route::get('/test', function () {
    \App\Models\Motorcycle::factory()->count(5)->create();
});
