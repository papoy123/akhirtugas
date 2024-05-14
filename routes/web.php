<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopupController;

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('pakets', TopupController::class);
});
route::get('/home',[HomeController::class,'index']);

require __DIR__.'/auth.php';

Route::middleware(['admin'])->group(function () {
    // Your routes here
});

Route::get('/ujilogin', function () {
    return view('admin');

})->middleware('my-login');

