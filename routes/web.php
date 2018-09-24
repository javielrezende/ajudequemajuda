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

Route::resource('/s', 'SiteUserController');


//------SITE--------------------------------------------------------------------------
Route::get('/', function () {
    return redirect()->to(url('/aqa'));
});

Route::resource('/aqa', 'SiteController');

Route::get('/site/eventos', function () {
    return view('site/eventos');
});

Route::get('/site/evento', function () {
    return view('site/evento');
});

Route::get('/site/campanhas', function () {
    return view('site/campanha/campanhas');
});

Route::get('/site/campanha', function () {
    return view('site/campanha/campanha');
});

Route::get('/site/entidades', function () {
    return view('site/entidade/entidades');
});

Route::get('/site/entidade', function () {
    return view('site/entidade/entidade');
});

Route::resource('/faleconosco', 'SiteFaleConoscoController');



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













