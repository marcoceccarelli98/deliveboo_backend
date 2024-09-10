<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // DASHBOARD
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // RESTAURANTS
    Route::resource('restaurants', RestaurantController::class)->parameters(
        [
            'restaurants' => 'restaurant:slug'
        ]
    );

    Route::get('/restaurant', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::patch('/restaurant', [RestaurantController::class, 'update'])->name('restaurant.update');
    Route::delete('/restaurant', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');

    // DISHES
    Route::resource('dishes', DishController::class)->parameters(
        [
            'dishes' => 'dish:slug'
        ]
    );

    Route::get('/dish', [RestaurantController::class, 'create'])->name('dish.create');
    Route::get('/dish', [RestaurantController::class, 'edit'])->name('dish.edit');
    Route::patch('/dish', [RestaurantController::class, 'update'])->name('dish.update');
    Route::delete('/dish', [RestaurantController::class, 'destroy'])->name('dish.destroy');
});

require __DIR__ . '/auth.php';
