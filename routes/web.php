<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/complaints', function () {
    return view('complaints');
})->middleware(['auth', 'verified'])->name('complaints');

Route::post('/complaints', "App\Http\Controllers\ComplaintsController@store")->middleware(['auth', 'verified'])->name('complaints.store');

Route::get('/complaints', "App\Http\Controllers\ComplaintsController@index")->middleware(['auth', 'verified'])->name('complaints.index');



Route::get('/booking', function () {
    return view('booking');
})->middleware(['auth', 'verified'])->name('booking');


Route::post('/booking', "App\Http\Controllers\BookingController@store")->middleware(['auth', 'verified'])->name('booking.store');

Route::get('/booking', "App\Http\Controllers\BookingController@index")->middleware(['auth', 'verified'])->name('booking.index');

// page that admin can use to add new items that is bookable
Route::get('/additem', function () {
    return view('additem');
})->middleware(['auth', 'verified'])->name('additem');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
