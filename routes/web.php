<?php

use App\Http\Controllers\SolicitacoesController;
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

Route::get('/', [SolicitacoesController::class, 'index'])->name('solicitacoes.index');
Route::get('solicitacao/create', [SolicitacoesController::class, 'create'])->name('solicitacoes.create');

Route::post('/solicitacoes', [SolicitacoesController::class, 'store'])->name('solicitacoes.store');