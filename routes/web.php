<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if(auth()->user()){
        return redirect()->route('home');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('car', [CarController::class, 'index'])->name('car.index');
Route::get('car/create', [CarController::class, 'create'])->name('car.create');
Route::post('car/store', [CarController::class, 'store'])->name('car.store');
Route::get('car/edit/{car}', [CarController::class, 'edit'])->name('car.edit');
Route::get('car/show/{car}', [CarController::class, 'show'])->name('car.show');
Route::put('car/update/{car}', [CarController::class, 'update'])->name('car.update');
Route::delete('car/destroy/{car}', [CarController::class, 'destroy'])->name('car.destroy');

