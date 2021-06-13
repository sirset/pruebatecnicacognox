<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;

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



Route::group(['middleware' => 'prevent-back-history'],function(){
    
    Route::get('/',[customerController::class,"login"])->name("Login");
    Route::post('/ingresar',[customerController::class,"Ingresar"])->name("Ingresar");

    Route::middleware("customer")->group(function(){
    
    
        Route::get('/home',[customerController::class,"home"])->name("Home");
        Route::get('/estado',[customerController::class,"estadoCuenta"])->name("Estado");
        Route::post('/estado',[customerController::class,"estadoCuentapost"])->name("EstadoPost");

        Route::get('/transferencias',[customerController::class,"transferencias"])->name("Transferencias");

        Route::get('/transferencias/cuentaspropias',[customerController::class,"transferenciapropias"])->name("Transferenciapropias");
        Route::post('/transferencias/cuentaspropias',[customerController::class,"transferenciapropiaspost"])->name("TransferenciapropiasPost");

        Route::get('/transferencias/terceros',[customerController::class,"transferenciaterceros"])->name("Transferenciterceros");
        Route::post('/transferencias/terceros',[customerController::class,"transferenciatercerospost"])->name("TransferenciatercerosPost");

    });

    Route::get('/salir',[customerController::class,"salir"])->name("Salir");

});