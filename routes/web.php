<?php

use App\Http\Controllers\Admin\Finance\ProductWalletController;
use App\Http\Controllers\Admin\Manager\ProductController;
use App\Http\Controllers\Admin\Mk\BlogController;
use App\Http\Controllers\Client\App\AppController;
use App\Http\Controllers\Client\Finance\ExtractController;
use App\Http\Controllers\Client\Finance\WalletController;
use App\Http\Controllers\Client\User\ForgoutController;
use App\Http\Controllers\Client\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('index'); })->name('login');
Route::get('/registrer', function () { return view('registrer'); })->name('registrer');

Route::get('/forgout-password/{code?}', [ForgoutController::class, 'index'])->name('forgout-password');
Route::post('forgout', [ForgoutController::class, 'forgout'])->name('forgout');
Route::post('new-password', [ForgoutController::class, 'newPassword'])->name('new-password');

Route::post('logon', [UserController::class, 'logon'])->name('logon');
Route::post('createUser', [UserController::class, 'createUser'])->name('createUser');

Route::middleware(['auth'])->group(function () {

    Route::get('/app/{id?}', [AppController::class, 'app'])->name('app');

    Route::get('/product', [ProductController::class, 'product'])->name('product');
    Route::post('createProduct', [ProductController::class, 'createProduct'])->name('createProduct');
    Route::post('deleteProduct', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::post('updateProduct', [ProductController::class, 'updateProduct'])->name('updateProduct');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('updateUser', [UserController::class, 'updateUser'])->name('updateUser');
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::post('deleteUser', [UserController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/wallet/{year?}', [ProductWalletController::class, 'wallet'])->name('wallet');
    Route::get('/profitability', [ProductWalletController::class, 'profitability'])->name('profitability');
    Route::post('createProfitability', [ProductWalletController::class, 'createProfitability'])->name('createProfitability');
    
    Route::post('createWallet', [WalletController::class, 'createWallet'])->name('createWallet');

    Route::get('/extract', [ExtractController::class, 'extract'])->name('extract');
    Route::get('/payment/{user?}/{status?}', [ExtractController::class, 'payment'])->name('payment');
    Route::post('createWithdraw', [ExtractController::class, 'createWithdraw'])->name('createWithdraw');
    Route::post('deleteWithdraw', [ExtractController::class, 'deleteWithdraw'])->name('deleteWithdraw');
    Route::post('approvedWithdraw', [ExtractController::class, 'approvedWithdraw'])->name('approvedWithdraw');

    Route::get('/posts', [BlogController::class, 'viewPosts'])->name('posts');
    Route::get('/viewPost/{id}', [BlogController::class, 'viewPost'])->name('viewPost');
    Route::post('createPost', [BlogController::class, 'createPost'])->name('createPost');
    Route::post('updatePost', [BlogController::class, 'updatePost'])->name('updatePost');
    Route::post('deletePost', [BlogController::class, 'deletePost'])->name('deletePost');

    Route::get('/blog/{tag?}', [BlogController::class, 'blog'])->name('blog');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});