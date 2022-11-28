<?php

use App\Http\Controllers\AdoptController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ClientAdoptController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Cat;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Auth/Login');
// });

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'cats' => Cat::all()
        ]);
    })->name('dashboard');

    Route::resource('cats', CatController::class);


    Route::get('adopts', [AdoptController::class, 'index'])->name('adopts.index');
    Route::get('adoptsNow', [AdoptController::class, 'client'])->name('adopts.client');
    Route::post('adoptsStore', [AdoptController::class, 'store'])->name('adopts.store');
    Route::put('adoptsUpdate', [AdoptController::class, 'update'])->name('adopts.update');
    Route::delete('adoptsUpdate', [AdoptController::class, 'destroy'])->name('adopts.destroy');
    // Route::delete('adoptsDestroy', [AdoptController::class, 'destroy'])->name('adopts.destroy');

    Route::resource('schedules', ScheduleController::class);
    Route::resource('clientadopt', ClientAdoptController::class);
    Route::resource('volunteers', VolunteerController::class);
});


// Route::get('volunteers', [VolunteerController::class, 'index'])->name('volunteers.index');
// Route::post('volunteers/store', [VolunteerController::class, 'store'])->name('volunteers.store');
