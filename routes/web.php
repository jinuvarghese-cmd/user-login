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
Route::get('/myAccountAddress', [MyAccountController::class, 'myAccountAddress']);
Route::get('/logout', [MyAccountController::class, 'logout']);
Route::post('/saveUserDetails', [MyAccountController::class, 'saveUserDetails']);
Route::post('/myAccount/fetchUserDetails', [MyAccountController::class, 'fetchUserDetails'])->name('myAccount.fetchUserDetails');
Route::post('/myAccount/fetchAddress', [MyAccountController::class, 'fetchAddress'])->name('myAccount.fetchAddress');
Route::post('/myAccount/addAddress', [MyAccountController::class, 'addAddress'])->name('myAccount.addAddress');
Route::post('/myAccount/updateAddress', [MyAccountController::class, 'updateAddress'])->name('myAccount.updateAddress');
Route::post('/myAccount/deleteAddress', [MyAccountController::class, 'deleteAddress'])->name('myAccount.deleteAddress');
