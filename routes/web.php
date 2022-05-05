<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MyAccountController;

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
    return view('login');
});


Route::post('/checklogin', [MainController::class, 'checklogin']);
Route::get('/myAccount', [MainController::class, 'myAccount']);
Route::get('/logout', [MainController::class, 'logout']);
Route::post('/myAccount/fetchData', [MyAccountController::class, 'fetchData'])->name('myAccount.fetchData');