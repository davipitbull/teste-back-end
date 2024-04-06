<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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

Route::get('produtos', [ProdutoController::class, 'index']);
Route::post('produtos', [ProdutoController::class, 'store']);
Route::put('produtos/{id}', [ProdutoController::class, 'update']);
Route::delete('produtos/{id}', [ProdutoController::class, 'destroy']);

Route::post('produtos/search/name-and-category', [ProdutoController::class, 'searchByNameAndCategory']);
Route::post('produtos/search/category', [ProdutoController::class, 'searchByCategory']);
Route::post('produtos/search/image', [ProdutoController::class, 'searchByImage']);
Route::get('produtos/{id}', [ProdutoController::class, 'searchById']);

