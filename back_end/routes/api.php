<?php

use App\Http\Controllers\EletrodomesticoController;
use App\Http\Controllers\MarcaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/marcas', [MarcaController::class, 'get_marcas'])->name('marcas.get_marca');

Route::controller(EletrodomesticoController::class)->group(function () {
    Route::post('/eletrodomestico/salvar', 'store');
    Route::get('/eletrodomestico/', 'index');
    Route::get('/eletrodomestico/view/{id}', 'show');
    Route::get('/eletrodomestico/edit/{id}', 'edit');
    Route::post('/eletrodomestico/update/', 'update');
    Route::post('/eletrodomestico/delete/', 'delete');
    Route::post('/eletrodomestico/search/', 'busca');
});