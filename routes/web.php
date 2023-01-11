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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', "App\Http\Controllers\dashboardController@index")->middleware(['auth', 'verified'])->name('dashboard.index');

Route::post(
    '/dashboard/confirmcomplaint',
    "App\Http\Controllers\dashboardController@confirmComplaint"
)->middleware(['auth', 'verified'])->name('dashboard.confirmcomplaint');




Route::get('/complaints', function () {
    return view('complaints');
})->middleware(['auth', 'verified'])->name('complaints');

Route::post('/complaints', "App\Http\Controllers\ComplaintsController@store")->middleware(['auth', 'verified'])->name('complaints.store');
Route::post('/complaints/confirm', "App\Http\Controllers\ComplaintsController@confirm")->middleware(['auth', 'verified'])->name('complaints.confirm');

Route::get('/complaints', "App\Http\Controllers\ComplaintsController@index")->middleware(['auth', 'verified'])->name('complaints.index');



Route::get('/booking', function () {
    return view('booking');
})->middleware(['auth', 'verified'])->name('booking');

Route::post('/booking', "App\Http\Controllers\BookingController@store")->middleware(['auth', 'verified'])->name('booking.store');

Route::get('/booking', "App\Http\Controllers\BookingController@index")->middleware(['auth', 'verified'])->name('booking.index');

Route::post('/booking/confirm', "App\Http\Controllers\BookingController@confirm")->middleware(['auth', 'verified'])->name('booking.confirm');

Route::get('/addbooking', function () {
    return view('addbooking');
})->middleware(['auth', 'verified'])->name('addbooking');



Route::get('/addbookingSuccess', function () {
    return view('addbookingSuccess');
})->middleware(['auth', 'verified'])->name('addbookingSuccess');

Route::post('/addbooking', "App\Http\Controllers\addbookingController@store")->middleware(['auth', 'verified'])->name('addbooking.store');

// qrconfirmbooking
Route::get('/qrconfirmbooking', function () {
    // empty bookings and false statusDone
    return view('qrconfirmbooking', ['bookings' => [], 'doneStatus' => false]);
})->middleware(['auth', 'verified'])->name('qrconfirmbooking');

Route::post('/qrconfirmbooking', "App\Http\Controllers\qrconfirmbookingController@getBookingsFromQR")->middleware(['auth', 'verified'])->name('qrconfirmbooking.getBookingsFromQR');


// page that admin can use to add new items that is bookable
Route::get('/additem', function () {
    return view('additem');
})->middleware(['auth', 'verified'])->name('additem');

Route::post('/additem', "App\Http\Controllers\additemController@store")->middleware(['auth', 'verified'])->name('additem.store');

Route::get('/additem', "App\Http\Controllers\additemController@index")->middleware(['auth', 'verified'])->name('additem.index');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
