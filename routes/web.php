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

Route::resource('/aqa', 'SiteController');

Route::resource('/entidade-site', 'SiteEntidadeController');
Route::resource('/entidade-site/minhas-campanhas', 'SiteEntidadeController@minhasCampanhas');


Route::resource('/usuario-site', 'SiteUsuarioController');

Route::resource('/site/campanha', 'SiteCampanhaController');
Route::resource('/site/campanhas', 'SiteCampanhaController');
Route::resource('/site/evento', 'SiteEventoController');
Route::resource('/site/eventos', 'SiteEventoController');
Route::resource('/faleconosco', 'SiteFaleConoscoController');

/**
 * Rota para seguir uma campanha
 */
Route::get('/site/campanhas/{campanha}/seguir', 'SiteUsuarioController@seguirCampanha')->name('seguir-campanha');

/**
 * Renomeado como entidades para não conflitar com a rota de entidades
 * do admin.
 * Para chamar essa rota utiliza-se entidades.entidades.'o metodo que se quer chamar dentro da rota'
 */
Route::resource('site/entidades', 'SiteUserController',
    ['as' => 'entidades']);

/*Route::get('/site/evento', function () {
    return view('site/evento/evento');
});*/

/*Route::get('/site/campanhas', function () {
    return view('site/campanha/campanhas');
});*/

/*Route::get('/site/campanha', function () {
    return view('site/campanha/campanha');
});*/

/*Route::get('/site/entidades', function () {
    return view('site/entidade/entidades');
});*/

/*Route::get('/site/entidade', function () {
    return view('site/entidade/entidade');
});*/




//------CADASTROS E LOGIN DO SITE--------------------------------------------------------------------------
//------PRE CADASTRO--------------------------------------------------------------------------
Route::get('/pre-cadastro', function (){
    return view('site.cadastro.pre-cadastro');
    //return 'teste';
})->name('pre-cadastro');

//------CADASTRO DE USUARIOS--------------------------------------------------------------------------
Route::get('/cadastrodoador', function (){
    return view('site.cadastro.cadastrodoador');
    //return 'teste';
})->name('cadastrodoador');

//------CADASTRO DE ENTIDADES--------------------------------------------------------------------------
Route::get('/cadastroentidade', function (){
    return view('site.cadastro.cadastroentidade');
    //return 'teste';
})->name('cadastroentidade');

Route::post('cadastroentidade', 'SiteController@storeentidade')
    ->name('storeentidade');

//------LOGIN--------------------------------------------------------------------------
Route::get('/aqa-login', function (){
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

Route::group(['prefix' => '/admin', 'middleware' => 'can:admin'], function (){
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

//Route::resource('/admin', 'AdminController');













