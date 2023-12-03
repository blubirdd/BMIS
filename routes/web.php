<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ToDoListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\ResidentController;
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

Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::view('about', 'about')->name('about');
    Route::resource('barangay', BarangayController::class);
    Route::get('barangay/{id}/resident', [BarangayController::class, 'showResidents'])->name('resident');

    Route::resource('barangay.resident', ResidentController::class)->parameters([
        'barangay' => 'barangay_id',
    ]);


    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});
