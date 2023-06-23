<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\RecuperarSenhaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticacaoController;



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

Route::get('/',[AutenticacaoController::class,'index'])->name('index');
Route::get('/login',[AutenticacaoController::class,'login'])->name('login');
Route::post('/loginsubmit',[AutenticacaoController::class,'loginsubmit'])->name('loginsubmit');
Route::get('/dashboard', [AutenticacaoController::class,'dashboard'])->name('dashboard');
Route::get('/logout', [AutenticacaoController::class,'logout'])->name('logout');

Route::get('/cadastro',[AutenticacaoController::class,'cadastroview']);
Route::post('/cadastro', [AutenticacaoController::class,'cadastro'])->name('cadastro');

Route::get('/redefinir-senha',[AutenticacaoController::class,'redefinirSenhaView'])->name('redefinirSenhaView');
Route::patch('/redefinir-senha',[AutenticacaoController::class,'redefinirSenha'])->name('redefinir-senha');

Route::get('/recuperar-senha', [RecuperarSenhaController::class,'index'])->name('recuperar-senha');
Route::post('/enviar-email', [RecuperarSenhaController::class,'enviarEmail'])->name('enviar-email');






