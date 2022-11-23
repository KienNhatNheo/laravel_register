<?php

use App\Http\Controllers\SignUp;
use App\Http\Controllers\SignIn;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/signin', function () {
    return view('signin');
})->name('signin');

Route::post('/handlesignup', [SignUp::class, 'HandleSignUp'])->name('handlesignup');
Route::post('/handlesignin', [SignIn::class, 'HandleSignIn'])->name('handlesignin');