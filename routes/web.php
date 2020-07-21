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

Route::get('/', 'HomeController@index')->name('base');

Route::get('/home', 'HomeController@index')->name('home');
// Login
Route::get('/login', 'Authentication\LoginController@index')->name('login');
Route::post('/login', 'Authentication\LoginController@login')->name('login');
Route::post('/logout', 'Authentication\LogoutController@logout')->name('logout');
// Loan register
Route::get('/check', 'LoanRegister\LoanRegisterController@check')->name('loan.check');
