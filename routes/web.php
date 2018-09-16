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

/*Route::get('/', function () {
    return view('welcomesite');
})->middleware('can:usuario');*/

/*Route::get('/', function () {
    return view('welcomesite');
});*/



//------SITE--------------------------------------------------------------------------
Route::resource('/aqa', 'UserSiteController');

//------CADASTROS SITE--------------------------------------------------------------------------
Route::get('/pre-cadastro', function (){
    return view('site.cadastro.pre-cadastro');
    //return 'teste';
})->name('pre-cadastro');

Route::get('/cadastrodoador', function (){
    return view('site.cadastro.cadastrodoador');
    //return 'teste';
})->name('cadastrodoador');


//---------------------------------------------------------------------------------------------------




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/site/eventos', function () {
    return view('site/eventos');
});
Route::get('/site/evento', function () {
    return view('site/evento');
});


Route::get('/admin', function () {
    return view('welcome');
});

Route::group(['prefix' => '/admin', 'middleware' => 'can:admin'], function (){
Route::resource('/eventos', 'EventoController');
Route::resource('/itens', 'ItemController');
Route::resource('/entidades', 'EntidadeController');
Route::resource('/users', 'UserController');
Route::resource('/campanhas', 'CampanhaController');
});
//Route::resource('/admin', 'AdminController');

Route::resource('/faleconosco', 'FaleConoscoController');




Route::get('/login/social', 'Auth\LoginController@loginSocial');
Route::get('/login/callback', 'Auth\LoginController@loginCallback');

