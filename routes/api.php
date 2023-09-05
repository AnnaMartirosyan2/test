<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('App\Http\Controllers\Api\V1')->prefix('v1')->group(function() {
    Route::namespace('Payment')->prefix('payments')->group(function() {
        Route::controller(PaymentCrudController::class)->group(function() {
            Route::post('/', 'store');
        });
    });

    Route::namespace('User')->prefix('users')->group(function() {
        Route::controller(UserInfoController::class)->group(function() {
            Route::get('/', 'index');
            Route::get('/{userAccount}', 'show');
        });
    });
});
