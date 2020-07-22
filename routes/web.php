<?php

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

Route::middleware('auth')->get('/', 'HomeController@index')->name('base');
Route::middleware('auth')->get('/home', 'HomeController@index')->name('home');
// Login
Route::get('/login', 'Authentication\LoginController@index')->name('login');
Route::post('/login', 'Authentication\LoginController@login')->name('login');
Route::middleware('auth')->post('/logout', 'Authentication\LogoutController@logout')->name('logout');

// Register user
Route::get('/register', 'Authentication\RegisterController@index')->name('register');
Route::post('/register', 'Authentication\RegisterController@register')->name('register');

// Loan register
Route::middleware('auth')->prefix('loan')->group(function () {
    Route::get('/check', 'LoanRegister\LoanRegisterController@check')->name('loan.check');
    Route::post('/submit', 'LoanRegister\LoanRegisterController@submit')->name('loan.submit');
});
// Repayments
Route::middleware('auth')->prefix('repayments')->group(function () {
    Route::get('', 'Repayment\RepaymentController@index')->name('repayments.list');
    Route::put('{id}', 'Repayment\RepaymentController@submit')->name('repayments.submit');
});
