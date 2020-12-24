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



Route::get('/', function () {
    return view('login');
});


Route::post('/login',[
    'uses'	=>	'LoginController@login',
    'as'	=>	'login'
]);


Route::get('portfolio', 'PortfolioController@show')->name('portfolio');



?>
