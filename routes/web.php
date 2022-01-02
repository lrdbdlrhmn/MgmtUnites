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
    return view('auth.login');
});


Route::get('/dashboard','DashboardController@index');

Route::group(['prefix' => 'agents'], function(){
    Route::get('/parametrage','ParametragesController@parametrage');
    Route::post('/perso','ParametragesController@storePerso');
    Route::post('/mat','ParametragesController@storeMat');
    Route::post('/qua','ParametragesController@storeQua');

    Route::get('/import', 'ImportationsController@import');
    Route::post('/store', 'ImportationsController@store');

});

Route::group(['prefix' => 'statistiques'], function(){
    Route::get('/', 'StatistiquesController@index');
    Route::get('/bataillon', 'StatistiquesController@getBataillons')->name('bataillons');
    Route::get('/unite', 'StatistiquesController@getUnites')->name('unites');
    Route::get('/anydata', 'StatistiquesController@anyData')->name('anydata');
    
});

Route::group(['prefix' => 'rapports'], function(){
    Route::get('/', 'ReportingsController@index');
    Route::post('/rapport' , 'ReportingsController@rapport');
});
//Route::group(['prefix' => 'error-pages'], function(){
   // Route::get('error-404', function () { return view('pages.erreurs.404'); });
    //Route::get('error-500', function () { return view('pages.erreurs.500'); });
//});







// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.erreurs.404');
})->where('page','.*');

