<?php

use App\Mail\TestMail1;
use App\Mail\TestMail2;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

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


Auth::routes(['verify' => true]);

//Auth::routes();
Route::get('/', function (){
    return view('welcome');
});
//Route::resource('/home', 'App\Http\Controllers\EmprestimoController')->name('home')->middleware('verified');
Route::get('/home', 'App\Http\Controllers\EmprestimoController@home')->name('home2')->middleware('verified');
Route::get('/tarefa', 'App\Http\Controllers\EmprestimoController@home')->name('home')->middleware('verified');

Route::resource('/usuario', 'App\Http\Controllers\UsuariosController')->middleware('verified');
Route::resource('/emprestimo', 'App\Http\Controllers\EmprestimoController')->middleware('verified');
Route::resource('/livro', 'App\Http\Controllers\LivroController')->middleware('verified');
Route::get('/logout', 'App\Http\Controllers\HomeController@logout')->middleware('verified');


//Route::get('tarefa/exportacao/{extensao}', 'App\Http\Controllers\TarefaController@exportacao')->name('tarefa.exportacao');
//Route::get('tarefa/exportar', 'App\Http\Controllers\TarefaController@exportar')->name('tarefa.exportar');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
//Route::resource('tarefa', 'App\Http\Controllers\TarefaController')->middleware('verified')  ;