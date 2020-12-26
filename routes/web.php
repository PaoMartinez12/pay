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


/* ========= PANEL DE CLIENTE ========== */
    //Informacion de Inicio de Cliente
Route::get('cliente/home', 'ClientController@index')->name('home');
    //Mostrar todas las Facturas
Route::get('cliente/invoices', 'ClientController@allInvoices')->name('all_Invoices');
    //Detalle de la Factura seleccionada
Route::get('/cliente/invoice/{id}',[
            'uses'	=>	'ClientController@detailInvoice',
            'as'	=>	'invoice'
        ]);
    //Formulario de Pago
    /*
Route::get('/cliente/payform/{id}',[
    'uses'	=>	'ClientController@payForm',
    'as'	=>	'pay'
]);
*/

/* ===================================== */

/* ======== FUNCIONES DE PAGO ========== */

    //Formulario de Pago
Route::get('/cliente/payform/{id}',[
    'uses'	=>	'PaymentController@payForm',
    'as'	=>	'payForm'
]);
    //
Route::post('/pay',[
    'uses'	=>	'PaymentController@pay',
    'as'	=>	'pay'
]);

/* ===================================== */



?>
