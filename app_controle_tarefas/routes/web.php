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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mail', function () {
    Mail::to('leo.lino.meyer@gmail.com')->send(new TestMail1());
});

Route::get('/mail2', function () {
    return new TestMail2();
});

Auth::routes(['verify' => true]);

//Auth::routes();

Route::get('tarefa/exportacao/{extensao}', 'App\Http\Controllers\TarefaController@exportacao')->name('tarefa.exportacao');
Route::get('tarefa/exportar', 'App\Http\Controllers\TarefaController@exportar')->name('tarefa.exportar');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::resource('tarefa', 'App\Http\Controllers\TarefaController')->middleware('verified')  ;