<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StatisticController;
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

    // ORDERS
    Route::resource('/orders', OrderController::class)->parameters([
        'orders' => 'order:id'
    ])->names('admin.orders');

    Route::delete('/admin/orders/{order}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

    // STATISTICHE
    Route::get('/statistiche', [StatisticController::class, 'index'])->name('admin.statistics.index');
});

require __DIR__ . '/auth.php';
