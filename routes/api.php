<?php

use App\Http\Controllers\Client\Finance\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('webhook', [WalletController::class, 'webhook'])->name('webhook');