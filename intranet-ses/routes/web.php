<?php

use Illuminate\Contracts\View\View;
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

 /* ROTAS DE AUTENTICACAO DO SISTEMA*/
Route::any('/login', [
		'as' => 'auth.login',
		'uses' => 'Auth\LoginController@login'
]);

Route::any('/entrar', [
		'uses' => 'Auth\LoginController@getEntrar'
]);

Route::any('/logout', [
		'uses' => 'Auth\LoginController@logout'
]);

/* ROTAS DE USUÁRIO*/
Route::any('/cadastro-usuario', [
		'as' => 'usuario.cadastro',
		'uses' => 'UsuarioController@getInserir'
]);

Route::any('/inserir-usuario', [
		'uses' => 'UsuarioController@inserirUsuario'
]);

Route::any('/listaUsuario', function () {
	return view('/usuario/listaUsuario');
});

Route::group(['prefix' => '/usuario'], function () {

	//Listar Usuários em DataTable
	Route::any('/lista-usuario.json', [
			'as' => 'usuario.lista-usuario.json',
			'uses' => 'UsuarioController@getListaUsuarioJson'
	]);
	
	Route::any('/excluir-usuario/{id_usuario?}', [
			'as' => 'usuario.excluir-usuario',
			'uses' => 'UsuarioController@excluirUsuario'
	]);
	
	Route::any('/inativar-usuario/{id_usuario?}', [
			'uses' => 'UsuarioController@inativarUsuario'
	]);
	
	Route::any('/ativar-usuario/{id_usuario?}', [
			'uses' => 'UsuarioController@ativarUsuario'
	]);
	
	Route::any('/alterar/{id_usuario?}', [
			'as' => 'usuario.alterar',
			'uses' => 'UsuarioController@getAlterarUsuario'
	]);
	
	Route::any('/alterar-usuario', [
			'as' => 'usuario.alterar-usuario',
			'uses' => 'UsuarioController@alterarUsuario'
	]);
});
//FIM USUÁRIO

//PÁGINAS DO SITE

Route::any('/gabSes', function () {
		return view('gabSes');
});

Route::any('/sei-info', function () {
		return view('sei-info');
});

Route::get('/sei-info', array('uses'=>'intranet\PaginasController@sei'));

//ROTAS DE VISUALIZACAO DA ÁREA ADMINISTRATIVA
Route::any('/admin', function () {
		return view('/admin/homeAdmin');
});

Route::get('/admin', array('uses'=>'intranetAdmin\HomeAdminController@index'));

Route::any('/inserirBanner', [
			'as' => 'admin.ascon.inserirBanner',
			'uses' => 'intranetAdmin\bannerController@index'
]);
	
Route::any('/inserirLink', function () {
		return view('/admin/ctinf/inserirLink');
	});

Route::any('/listaLink', function () {
		return view('/admin/ctinf/listaLink');
	});

Route::any('/inserirVideo', function (){
		return view('/admin/ctinf/inserirVideo');
	});

Route::any('/noticias-editor', array('uses'=>'intranet\PaginasController@mostraPagina'));

Route::any('/noticia', array('uses'=>'intranet\PaginasController@noticia'));

Route::any('/menuSuperior', array('uses'=>'intranet\MenuController@mostraMenu'));
Route::any('/menuAdmin', array('uses'=>'intranet\MenuController@menuAdmin'));

//PÁGINAS DO SITE - SUBMENUS
Route::get('/home', array('uses'=>'HomeController@index'));
Route::any('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::any('/paginas/{submenu}', array('uses'=>'intranet\PaginasController@paginaGeral'));
//FIM SUBMENUS

Route::any('/conteudoPagina', array('uses'=>'intranetAdmin\AdminConteudoController@index'));

/* Route::any('/conteudoPagina', [
		'as' => 'admin.conteudoPagina',
		'uses' => 'intranetAdmin\AdminConteudoController@index'
]);  */

Route::any('/meus-conteudos', array('uses'=>'intranetAdmin\AdminConteudoController@getListaConteudo'));

//ROTAS DA ADMINISTRAÇÃO DAS PÁGINAS
Route::group(['prefix' => '/admin'], function () {
	
	Route::any('/inserir-conteudo', [
			'uses' => 'intranetAdmin\AdminConteudoController@inserirConteudo'
	]);
	
	//Lista de conteúdos cadastrados em DataTable
     Route::any('/lista-conteudo.json/{id_pagina?}', [
    		'as' => 'admin.lista-conteudo.json',
    		'uses' => 'intranetAdmin\AdminConteudoController@getListaConteudoJson'
    ]);
	
	Route::any('/excluir-conteudo/{id_conteudo}', [
			'uses' => 'intranetAdmin\AdminConteudoController@excluirConteudo'
	]);
	
	Route::any('/inativar-conteudo/{id_banner?}', [
			'uses' => 'intranetAdmin\AdminConteudoController@inativarConteudo'
	]);
	
	Route::any('/ativar-conteudo/{id_conteudo?}', [
			'uses' => 'intranetAdmin\AdminConteudoController@ativarConteudo'
	]);
	
	Route::any('/alterar/{id_conteudo?}', [
			'as' => 'admin.alterar',
			'uses' => 'intranetAdmin\AdminConteudoController@getAlterarConteudo'
	]);
	
	Route::any('/alterar-conteudo', [
			'as' => 'admin.ascon.alterar-conteudo',
			'uses' => 'intranetAdmin\AdminConteudoController@alterarConteudo'
	]);
	
});

//ROTAS DAS PÁGINAS ASCON
Route::group(['prefix' => '/admin/ascon'], function () {

	//Inserção
    Route::post('/inserir-banner', [
            'uses' => 'intranetAdmin\bannerController@inserirBanner'
      ]);
    
    //Listar Banner em DataTable
     Route::any('/lista-banner.json', [
    		'as' => 'admin.ascon.lista-banner.json',
    		'uses' => 'intranetAdmin\bannerController@getListaBannerJson'
    ]);
    
    Route::any('/excluir-banner/{id_banner?}', [
    		'uses' => 'intranetAdmin\bannerController@excluirBanner'
    ]);
    
    Route::any('/inativar-banner/{id_banner?}', [
    		'uses' => 'intranetAdmin\bannerController@inativarBanner'
    ]);
    
    Route::any('/ativar-banner/{id_banner?}', [
    		'uses' => 'intranetAdmin\bannerController@ativarBanner'
    ]);
    
    Route::any('/alterar/{id_banner?}', [
    		'as' => 'admin.ascon.alterar',
    		'uses' => 'intranetAdmin\bannerController@getAlterarBanner'
    ]);
    
    Route::any('/alterar-banner', [
    		'as' => 'admin.ascon.alterar-banner',
    		'uses' => 'intranetAdmin\bannerController@alterarBanner'
    ]);
    
    //Inserir conteúdo da página de notícias
    Route::any('/inserir-noticia', [
    		'uses' => 'intranet\PaginasController@inserirConteudo'
    ]);
    
});

//ROTAS DAS PÁGINAS CTINF
Route::group(['prefix' => '/admin/ctinf'], function () {
	
	//Inserção
	Route::any('/inserir-link', [
			'uses' => 'intranetAdmin\linkController@inserirLink'
	]);
	
	//Listar Links em DataTable
	Route::any('/lista-link.json', [
            'as' => 'admin.ctinf.lista-link.json',
            'uses' => 'intranetAdmin\linkController@getListaLinkJson'
      ]);
	
	Route::any('/excluir-link/{id_link?}', [
			'as' => 'admin.ctinf.excluir-link',
			'uses' => 'intranetAdmin\linkController@excluirLink'
	]);
	
	Route::any('/inativar-link/{id_link?}', [
			'uses' => 'intranetAdmin\linkController@inativarLink'
	]);
	
	Route::any('/ativar-link/{id_link?}', [
			'uses' => 'intranetAdmin\linkController@ativarLink'
	]);
	
	Route::any('/alterar/{id_link?}', [
			'as' => 'admin.ctinf.alterar',
			'uses' => 'intranetAdmin\linkController@getAlterarLink'
	]);
	
	Route::any('/alterar-link', [
			'as' => 'admin.ctinf.alterar-link',
			'uses' => 'intranetAdmin\linkController@alterarlink'
	]);
	
	Route::any('/lista-video.json', [
			'as' => 'admin.ctinf.lista-video.json',
			'uses' => 'intranetAdmin\VideoController@getListaVideoJson'
	]);
	
	Route::any('/inserir-video', [
			'uses' => 'intranetAdmin\VideoController@inserirVideo'
	]);
	
	Route::any('/excluir-video/{id_video?}', [
			'as' => 'admin.ctinf.excluir-video',
			'uses' => 'intranetAdmin\VideoController@excluirVideo'
	]);
	
	Route::any('/inativar-video/{id_video?}', [
			'uses' => 'intranetAdmin\VideoController@inativarVideo'
	]);
	
	Route::any('/ativar-video/{id_video?}', [
			'uses' => 'intranetAdmin\VideoController@ativarVideo'
	]);
	
	Route::any('/altera-video/{id_video?}', [
			'as' => 'admin.ctinf.alterar',
			'uses' => 'intranetAdmin\VideoController@getAlterarVideo'
	]);
	
	Route::any('/alterar-video', [
			'as' => 'admin.ctinf.alterar-video',
			'uses' => 'intranetAdmin\VideoController@alterarVideo'
	]);
	
});
	Route::any('/email-senha', [
			'as' => 'auth.emailSenha',
			'uses' => 'auth\ForgotPasswordController@showEmail'
	]);
	
	Route::any('/envia-resta-senha', [
				'as' => 'auth.envia-reseta-senha',
				'uses' => 'auth\ForgotPasswordController@enviaEmail'
	]);


