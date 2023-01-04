<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
verbo http
get 
post
put
patch
delete
options
*/

Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware(LogAcessoMiddleware::class);
Route::get('/sobre_nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login{erro?}', 'LoginController@login')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao')->prefix('/app')->group(function() {

    Route::get('/home', 'homeController@home')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::get('/produtos', 'ProdutosController@index')->name('app.produtos');
    Route::get('/produtos/create', 'ProdutosController@create')->name('app.produtos.create');
    Route::post('/produtos/store', 'ProdutosController@store')->name('app.produtos.store');
    Route::get('/produtos/show/{produto}', 'ProdutosController@show')->name('app.produtos.show');
    Route::get('/produtos/show/{produto}/edit', 'ProdutosController@edit')->name('app.produtos.edit');
    Route::post('/produtos/update/{produto}', 'ProdutosController@update')->name('app.produtos.update');
    Route::post('/produtos/destroy/{produto}', 'ProdutosController@destroy')->name('app.produtos.destroy');

    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::post('/fornecedores/listar', 'FornecedorController@listar')->name('app.fornecedores.listar');
    Route::get('/fornecedores/listar', 'FornecedorController@listar')->name('app.fornecedores.listar');
    Route::get('/fornecedores/adicionar', 'FornecedorController@adicionar')->name('app.fornecedores.adicionar');
    Route::post('/fornecedores/adicionar', 'FornecedorController@adicionar')->name('app.fornecedores.adicionar');    
    Route::get('/fornecedores/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedores.editar');
    Route::post('/fornecedores/editar/{id}', 'FornecedorController@concluir_edicao')->name('app.fornecedores.editar');
    Route::get('/fornecedores/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedores.excluir');

    Route::resource('produto-detalhe', 'ProdutoDetalhesController');
    Route::resource('cliente', 'ClienteController');
    Route::resource('pedido', 'PedidoController');
    Route::resource('pedido-produto', 'PedidoProdutoController');

    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedido_id}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

/*Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');*/

//Route::redirect('/rota2', '/rota1');
Route::fallback(function() {
    echo 'a rota acessada não existe. volte para a página inicial. <a href="'. route('site.index') . '">início</a>';
});

