<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*

Rotas do tipo POST normalmente são utilizados para cadastrar algo no sistema.
Rotas do tipo PUT ou PATH são para editar algum registro.
Rotas do tipo de DELETE são para deletar algo.
E por último, rotas do tipo OPTIONS





// 'middleware' =>'auth'     ---- garante que somente um usuario autenticado no sitema acesse a rota
Route::group(['prefix' => 'painel', 'middleware' =>'auth'],function(){  //Define um prefixo para a rota exemplo wwww.teste.com/painel/ ... geupo1 ou grupo2 painel ja esta pre definido para o grupo

	Route::get('users', function(){
		return 'Controle de usuarios';
	});
	Route::get('financeiro', function(){
		return 'Financeiro Painel';
	});

	Route::get('/', function(){
		return 'Dashboard';
	});


});

Route::get('/login', function(){ 
	return 'Form Login';
});

Route::get('/categoria2/{idCat?}', function($idCat=1){ //idCat esta com ? que quer dizer que e opcional na function esta setado padrao 1 caso esteja vazio no id cat

	return "Posts da categoria {$idCat}";

});

Route::get('/categoria/{idCat}', function($idCat){

	return "Posts da categoria {$idCat}";

});

Route::get('/nome/nome2/nome6', function () {

	return 'Rota Grande';
})->name('rota.nomeada');

Route::match(['get','post'], '/match', function(){ //aceita rota get ou post
	return 'Route match';
});

Route::post('/post', function () {

	return 'Route Post';
});

Route::get('/contato', function () {

	return 'contato';
});

Route::get('/empresa', function () {

	return view('empresa');
});

Route::get('/', function () {
    return redirect()->route('rota.nomeada');  // Redireciona para a rota identificada com name
});


*/

Route::get('/categoria/{id}','Site\SiteController@categoria');
Route::get('/categoria2/{id?}','Site\SiteController@categoriaOp'); // rota com valor opcional por isso o ? depois do id
Route::get('/', 'Site\SiteController@index'); // Direciona para a rota controler metodo index.
Route::get('/contato', 'Site\SiteController@contato'); 