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

Route::get('', 'HomeController@standings');
Route::get('/schedule','HomeController@schedule');
Route::get('/result','HomeController@result');
Route::get('/show/team/{id}','HomeController@info');
Route::get('/subscribe/{id}','HomeController@subscribe');

Route::post('/search','HomeController@search');

Auth::routes();

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin','AdminController@index');

    Route::get('/admin/teams','TeamsController@read');
    Route::match(['get','post'], '/admin/teams/create','TeamsController@create');
    Route::get('/admin/teams/delete/{id}','TeamsController@delete');
    Route::match(['get','post'],'/admin/teams/update/{id}','TeamsController@update');

    Route::get('/admin/matches','MatchesController@read');
    Route::match(['get','post'], '/admin/matches/create','MatchesController@create');
    Route::get('/admin/matches/delete/{id}','MatchesController@delete');
    Route::match(['get','post'],'/admin/matches/update/{id}','MatchesController@update');
});
