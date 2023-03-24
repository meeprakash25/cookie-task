<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('buy/{cookies}', function ($cookies) {
    $user = Auth::user();
    $wallet = $user->wallet;
    // dd($wallet - $cookies * 1);
    $user->update(['wallet' => $wallet - $cookies * 1]);
    Log:info('User ' . $user->email . ' have bought ' . $cookies . ' cookies'); // we need to log who ordered and how much
    return 'Success, you have bought ' . $cookies . ' cookies!';
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
