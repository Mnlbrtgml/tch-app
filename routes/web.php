<?php

use App\Http\Controllers\AdoptController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/cats', [CatController::class, 'Index'])->name('cats.index');
Route::post('/cats/store', [CatController::class, 'store'])->name('cats.store');

Route::get('/adopts', [AdoptController::class, 'Index'])->name('adopts.index');
Route::post('/adopts/store', [AdoptController::class, 'store'])->name('adopts.store');

Route::get('/schedules', [ScheduleController::class, 'Index'])->name('schedules.index');
Route::post('/schedules/store', [ScheduleController::class, 'store'])->name('schedules.store');

Route::get('/volunteers', [VolunteerController::class, 'Index'])->name('volunteers.index');
Route::post('/volunteers/store', [VolunteerController::class, 'store'])->name('volunteers.store');
