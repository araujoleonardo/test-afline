<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});


//Rotas Students
Route::get('/students', [StudentController::class, 'index']);
Route::get('/getall', [StudentController::class, 'getStudent'])->name('getStudent');
Route::post('/storestudents', [StudentController::class, 'store']); 
Route::post('/destroystudents', [StudentController::class, 'destroy'])->name('destroy'); 
Route::post('/updatestudents', [StudentController::class, 'update']);

//Rotas Clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
Route::get('/getclientes', [ClienteController::class, 'getCliente'])->name('getClientes');
Route::post('/store', [ClienteController::class, 'store'])->name('storeClientes'); 
Route::post('/delete/{id}', [ClienteController::class, 'delete'])->name('destroyClientes'); 
Route::post('/updatecliente', [ClienteController::class, 'update'])->name('updateClientes');
