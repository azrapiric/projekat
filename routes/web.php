<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/change-language/{locale}', function ($locale) {
    App::setLocale($locale);
    //dd(Config::get('app.locale'));
    return view('test');
});


Route::get('kreiraj-vijest','NewsController@create')->name('kreiraj-vijesti');
Route::post('snimi-vijest','NewsController@store')->name('snimi-vijest');
Route::get('index','NewsController@index')->name('index');
Route::get('show/{id}','NewsController@show')->name('show');
Route::get('pdf','NewsController@generatePDF')->name('pdf');
Route::get('email','NewsController@sendEmail')->name('email');
Route::get('home','NewsController@home')->name('home');
Route::post('search','NewsController@search')->name('search');
Route::get('prikazi-vijest/{id}','NewsController@showPost')->name('prikazi-vijest');
Route::get('edit/{id}','NewsController@edit')->name('izmijeni');
Route::post('update','NewsController@update')->name('update');
Route::get('create-file','NewsController@logging');
Route::get('postavi-cookies','NewsController@cookies');
Route::get('provjeri-cookies','NewsController@getCookies');
Route::get('query','NewsController@query');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('izbrisi-vijesti','NewsController@deleteNews')->name('izbrisi-vijesti');
Route::get('/dashboard',function(){


    if(Auth::user()->role == 'admin'){
        return view('');
    }elseif(Auth::user()->role=='manager'){

    }
    else{
        return view('');
    }

});

Auth::routes();
Route::group(['middleware' => ['adminRoutes']], function () {
    Route::get('kreiraj-vijest','NewsController@create')->name('kreiraj-vijesti');
Route::post('snimi-vijest','NewsController@store')->name('snimi-vijest');

});
//Route::get('/home', 'HomeController@index')->name('home');
