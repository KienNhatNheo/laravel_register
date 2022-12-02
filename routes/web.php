<?php

use App\Http\Controllers\SignUp;
use App\Http\Controllers\SignIn;
use App\Http\Controllers\Listgogo;
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
    return view('welcome');
});

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/signin', function () {
    return view('signin');
})->name('signin');

Route::post('/handlesignup', [SignUp::class, 'HandleSignUp'])->name('handlesignup');
Route::post('/handlesignin', [SignIn::class, 'HandleSignIn'])->name('handlesignin');

Route::get('/list', [Listgogo::class, 'list']);
Route::prefix('list')->group(function(){
    Route::get('/',[Listgogo::class, 'list'])->name('list');
    Route::get('/add',function(){
        return view('add_form');
    });
    Route::post('/handleadd',[Listgogo::class,'handleadd'])->name('handleadd');
    Route::get('/delete/{id}',[Listgogo::class,'delete']);
    Route::get('/edit/{id}',[Listgogo::class,'edit']);
    Route::post('/handleedit',[Listgogo::class,'handleedit'])->name('handleedit');
    Route::get('/logout',[SignIn::class,'logout'])->name('logout');
    Route::post('/search',[Listgogo::class,'search'])->name('search');
});