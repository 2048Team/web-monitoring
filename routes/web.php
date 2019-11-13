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

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/bots/list', 'BotController@index');
Route::get('/bots/fetch_data', 'BotController@fetch_data');

Route::get('/bots/map', 'BotController@map');

Route::get('/transactions/', 'TransactionController@index');
Route::get('/transactions/all', 'TransactionController@index');
Route::get('/transactions/detail/{transaction_id}', 'TransactionController@detail');
Route::get('/transactions/fetch_data', 'TransactionController@fetch_data');
Route::post('/transactions/searchresult', 'TransactionController@search');
//Route::get('/bots/list', function () {
//    return view('bots.list');
//});

Route::get('/bots/map', function () {
    return view('bots.map');
});

Route::get('/transactions/search', function () {
    return view('transactions.search');
});

