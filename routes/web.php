<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\ProfileController;
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
    return redirect()->route('dashboard');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RESTAURANTS
    Route::get('/restaurant/{restaurant:slug}/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::patch('/restaurant/{restaurant:slug}', [RestaurantController::class, 'update'])->name('restaurant.update');
    // Route::get('/restaurant', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    // Route::patch('/restaurant', [RestaurantController::class, 'update'])->name('restaurant.update');
    // Route::delete('/restaurant', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');

    // DISHES
    Route::resource('dishes', DishController::class)->parameters(
        [
            'dishes' => 'dish:slug'
        ]
    );

    Route::delete('/dishes/{dish}', [DishController::class, 'destroy'])->name('dishes.destroy');

    // Route::get('/dishes/{dish:slug}/edit', [DishController::class, 'edit'])->name('dishes.edit');

    // Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create');

    // Route::get('/dish/{dish}/edit', [DishController::class, 'edit'])->name('dish.edit');
    // Route::patch('/dish/{dish}', [DishController::class, 'update'])->name('dish.update');
});

require __DIR__ . '/auth.php';
