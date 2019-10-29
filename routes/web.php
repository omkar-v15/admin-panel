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
    return view('welcome');
});

Route::get('/home', 'PagesController@home' );

Route::get('/about', 'PagesController@about');

Route::get('/users', 'PagesController@users');

Route::get('/transaction', 'PagesController@transaction');
Route::get('/transaction', 'TransactionsController@todayTransaction');
Route::get('/transaction/today', 'TransactionsController@todayTransaction');
Route::get('/transaction/yesterday', 'TransactionsController@yesterdayTransaction');
Route::get('/transaction/thisweek', 'TransactionsController@thisweekTransaction');
Route::get('/transaction/lastweek', 'TransactionsController@lastweekTransaction');
Route::get('/transaction/thismonth', 'TransactionsController@thismonthTransaction');
Route::get('/transaction/lastmonth', 'TransactionsController@lastmonthTransaction');

Route::get('/transaction/chart', 'TransactionsController@todayChartTransaction');

