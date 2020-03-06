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
    return redirect()->route('app.home');
});

Auth::routes(['register' => false]);

Route::get('/apps', 'AppStoreController@home')->name('app.home');
Route::get('/apps/{app}/plist', 'AppStoreController@plist')->name('app.download');

Route::get('/apps/search', 'AppStoreController@search')->name('apps.search');
Route::post('/apps/search', 'AppStoreController@handleSearch');

Route::get('/api/apps/all', 'ApiController@all');

Route::get('/api/apps/{app}/details', 'ApiController@details');
Route::get('/api/apps/{app}/download', 'ApiController@download');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/ipas', 'AppController@home')->name('home');
	Route::post('/ipas', 'AppController@new');

	Route::get('/ipas/{app}/delete', 'AppController@delete')->name('delete');
	Route::get('/ipas/{app}/favortie', 'AppController@favorite')->name('favorite');
	Route::get('/ipas/{app}/unfavortie', 'AppController@unfavorite')->name('unfavorite');
});

