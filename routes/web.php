<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicoController;

Route::get('/', function () {
    return view('welcome');
});


//Rotas Serviços
Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos');
Route::get('/getservicos', [ServicoController::class, 'getServico'])->name('getServicos');
Route::post('/storeservicos', [ServicoController::class, 'store'])->name('storeServicos'); 
Route::post('/deleteservicos/{id}', [ServicoController::class, 'delete'])->name('destroyServicos'); 
Route::post('/updateservicos', [ServicoController::class, 'update'])->name('updateServicos');

//Rotas Clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
Route::get('/getclientes', [ClienteController::class, 'getCliente'])->name('getClientes');
Route::post('/store', [ClienteController::class, 'store'])->name('storeClientes'); 
Route::post('/delete/{id}', [ClienteController::class, 'delete'])->name('destroyClientes'); 
Route::post('/updatecliente', [ClienteController::class, 'update'])->name('updateClientes');
