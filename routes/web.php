<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/','QueryController@index')->name('index');

Route::post('/','QueryController@checkToken')->name('checkToken');


Route::post('/query2','QueryController@query1')->name('query1');

Route::post('/query3','QueryController@query2')->name('query2');


Route::post('/query4','QueryController@query3')->name('query3');

// Route::post('/query4','QueryController@query2')->name('query4');

Route::post('/form','QueryController@queryForm')->name('queryForm');


Route::get('/query2','QueryController@index');
Route::get('/query3','QueryController@index');
Route::get('/query4','QueryController@index');
Route::get('/form','QueryController@index');



Auth::routes();

Route::get('/home', 'HomeController@tokens')->name('home');
Route::get('/ranking', 'HomeController@ranking')->name('ranking');
Route::get('/pytanie2', 'HomeController@pytanie2')->name('pytanie2');
Route::get('/pytanie3', 'HomeController@pytanie3')->name('pytanie3');
Route::get('/pytanie4', 'HomeController@pytanie4')->name('pytanie4');
Route::get('/pytanie5', 'HomeController@pytanie5')->name('pytanie5');
Route::get('/pytanie6', 'HomeController@pytanie6')->name('pytanie6');
Route::get('/opinions', 'HomeController@opinions')->name('opinions');
Route::get('/opinion/{idUser}', 'HomeController@showOpinion')->name('showOpinion');
