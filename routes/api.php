<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\password;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\ProdutoController;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    // Rotas de autenticação já protegidas pelo middleware auth:api
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    // Novas rotas protegidas pelo middleware auth:api
    Route::resource('produto', ProdutoController::class);
    Route::resource('estoque', EstoqueController::class);
    Route::resource('financeiro', FinanceiroController::class);
});

