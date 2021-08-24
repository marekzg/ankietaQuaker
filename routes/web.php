<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryController;

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

//check routs to laravel 8

//Route::get('/','QueryController@index')->name('index');
Route::get('/',[QueryController::class,'index'])->name('index');

//Route::post('/','QueryController@checkToken')->name('checkToken');
Route::post('/',[QueryController::class,'checkToken'])->name('checkToken');

//Route::post('/query2','QueryController@query1')->name('query1');
Route::post('/query2',[QueryController::class,'query1'])->name('query1');

//Route::post('/query3','QueryController@query2')->name('query2');
Route::post('/query3',[QueryController::class,'query2'])->name('query2');

//Route::post('/query4','QueryController@query3')->name('query3');
Route::post('/query4',[QueryController::class,'query3'])->name('query3');

//Route::post('/form','QueryController@queryForm')->name('queryForm');
Route::post('/form',[QueryController::class,'queryForm'])->name('queryForm');


//Route::get('/query2','QueryController@index');
Route::get('/query2',[QueryController::class,'index']);
//Route::get('/query3','QueryController@index');
Route::get('/query3',[QueryController::class,'index']);
//Route::get('/query4','QueryController@index');
Route::get('/query4',[QueryController::class,'index']);
//Route::get('/form','QueryController@index');
Route::get('/form',[QueryController::class,'index']);

Auth::routes();

//Route::get('/home', 'HomeController@tokens')->name('home');
Route::get('/home', [HomeController::class,'tokens'])->name('home');
Route::get('/ranking', [HomeController::class,'ranking'])->name('ranking');
Route::get('/pytanie2', [HomeController::class,'pytanie2'])->name('pytanie2');
Route::get('/pytanie3', [HomeController::class,'pytanie3'])->name('pytanie3');
Route::get('/pytanie4', [HomeController::class,'pytanie4'])->name('pytanie4');
Route::get('/pytanie5', [HomeController::class,'pytanie5'])->name('pytanie5');
Route::get('/pytanie6', [HomeController::class,'pytanie6'])->name('pytanie6');
Route::get('/opinions', [HomeController::class,'opinions'])->name('opinions');
Route::get('/opinion/{idUser}', [HomeController::class,'showOpinion'])->name('showOpinion');
Route::get('/randomUserWin/{start?}', [HomeController::class,'randomUserWin'])->name('randomUserWin');
Route::get('/randomOrganization/{start?}', [HomeController::class,'randomOrganization'])->name('randomOrganization');
