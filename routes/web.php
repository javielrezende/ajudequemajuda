<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//------SITE--------------------------------------------------------------------------
Route::get('/', function () {
    return redirect()->to(url('/aqa'));
});


Route::group(['middleware' => 'can:entidade'], function () {
    Route::resource('/entidade-site', 'SiteEntidadeController');
    Route::resource('/minhas-campanhas', 'MinhasCampanhasController');
    Route::resource('/meus-eventos', 'MeusEventosController');
    Route::resource('/doacao-confirmar', 'DoacaoConfirmarController');
    Route::resource('/relatorios', 'RelatorioController');
});


Route::resource('/aqa', 'SiteController');


Route::resource('/usuario-site', 'SiteUsuarioController');

Route::resource('/site/campanha', 'SiteCampanhaController');
Route::resource('/site/campanhas', 'SiteCampanhaController');

Route::resource('/site/evento', 'SiteEventoController');
Route::resource('/site/eventos', 'SiteEventoController');

Route::resource('/doar', 'DoarController');


Route::resource('/faleconosco', 'SiteFaleConoscoController');

Route::resource('/campanhas-interessantes', 'CampanhasInteressantesController');
Route::resource('/alterar-senha', 'TrocarSenhaController');

/**
 * Rota para seguir uma campanha
 */
Route::get('/site/campanhas/{campanha}/seguir', 'SiteUsuarioController@seguirCampanha')->name('seguir-campanha');

/**
 * Rota para curtir uma campanha
 */
Route::get('/site/campanhas/{campanha}/curtir', 'SiteUsuarioController@curtirCampanha')->name('curtir-campanha');

/**
 * Rota para curtir uma entidade
 */
Route::get('/site/entidades/{entidade}/curtir', 'SiteUsuarioController@curtirEntidade')->name('curtir-entidade');

/**
 * Rota para comentar uma entidade
 */
Route::post('/site/entidades/{entidade}/comentar', 'SiteUsuarioController@comentarEntidade')->name('comentar-entidade');

Route::get('/resultado', 'RelatorioController@resultado')->name('resultado');

Route::get('/pdf', 'RelatorioController@pdf')->name('pdf');


/**
 * Rota para envio de email
 */
Route::post('/enviar-email', 'EnviarEmailParaSeguidores@enviarEmail')->name('enviar-email');

/**
 * Renomeado como entidades para não conflitar com a rota de entidades
 * do admin.
 * Para chamar essa rota utiliza-se entidades.entidades.'o metodo que se quer chamar dentro da rota'
 */
Route::resource('site/entidades', 'SiteUserController',
    ['as' => 'entidades']);


//------CADASTROS E LOGIN DO SITE--------------------------------------------------------------------------
//------PRE CADASTRO--------------------------------------------------------------------------
Route::get('/pre-cadastro', function () {
    return view('site.cadastro.pre-cadastro');
    //return 'teste';
})->name('pre-cadastro');

//------CADASTRO DE USUARIOS--------------------------------------------------------------------------
Route::get('/cadastrodoador', function () {
    return view('site.cadastro.cadastrodoador');
    //return 'teste';
})->name('cadastrodoador');

//------CADASTRO DE ENTIDADES--------------------------------------------------------------------------
Route::get('/cadastroentidade', function () {
    return view('site.cadastro.cadastroentidade');
    //return 'teste';
})->name('cadastroentidade');

Route::post('cadastroentidade', 'SiteController@storeentidade')
    ->name('storeentidade');

//------LOGIN--------------------------------------------------------------------------
Route::get('/aqa-login', function () {
    return view('site.cadastro.loginsite');
    //return 'teste';
})->name('aqa-login');

//------FACEBOOK--------------------------------------------------------------------------
Route::get('/login/social', 'Auth\LoginController@loginSocial');
Route::get('/login/callback', 'Auth\LoginController@loginCallback');

//---------------------------------------------------------------------------------------------------


//------ADMIN--------------------------------------------------------------------------
Route::get('/admin', function () {
    return view('welcome');
});

//com acl para soente adm entrar no admin
/*Route::group(['prefix' => '/admin', 'middleware' => 'can:admin'], function (){
    Route::resource('/eventos', 'EventoController');
    Route::resource('/itens', 'ItemController');
    Route::resource('/entidades', 'EntidadeController');
    Route::resource('/users', 'UserController');
    Route::resource('/campanhas', 'CampanhaController');
    Route::resource('/faleconoscoadmin', 'FaleConoscoController');
});*/

//sem acl para soente adm entrar no admin
Route::group(['prefix' => '/admin'], function () {
    Route::resource('/eventos', 'EventoController');
    Route::resource('/itens', 'ItemController');
    Route::resource('/entidades', 'EntidadeController');
    Route::resource('/users', 'UserController');
    Route::resource('/campanhas', 'CampanhaController');
    Route::resource('/faleconoscoadmin', 'FaleConoscoController');
});
//---------------------------------------------------------------------------------------------------


/*Route::get('/', function () {
    return view('welcomesite');
})->middleware('can:usuario');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::post('/login', function () {
    return redirect()->to(url('/aqa-login'));
});*/

//Route::resource('/admin', 'AdminController');













