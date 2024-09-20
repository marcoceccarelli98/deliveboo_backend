<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantApiController;
use App\Http\Controllers\Api\DishApiController;
use App\Http\Controllers\Api\TypeApiController;
use App\Http\Controllers\ContactTestController;
use App\Http\Controllers\Api\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', [RestaurantApiController::class, 'index']);
Route::get('/restaurants/{slug}', [RestaurantApiController::class, 'show']);

Route::get('/dishes', [DishApiController::class, 'index']);
Route::get('/dishes/{slug}', [DishApiController::class, 'show']);

Route::get('/types', [TypeApiController::class, 'index']);

//test invio mail
Route::get('/test-contact', [ContactTestController::class, 'testNewContact']);

//Process Payment
Route::post('/process-payment', [PaymentController::class, 'processPayment']);
