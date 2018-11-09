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


Auth::routes();

Route::post('/inspection', 'InspectionController@store')->name('inspection.store')->middleware('auth');
Route::delete('/inspection/delete/{inspection}', 'InspectionController@destroy')->name('inspection.delete')->middleware('auth');
Route::get('/inspection_data', 'InspectionController@data')->name('inspection.data')->middleware('auth');

Route::get('/dot', 'DotController@index')->name('dot.index')->middleware('auth');
Route::post('/dot', 'DotController@store')->name('dot.store')->middleware('auth');
Route::delete('/dot/delete/{dot}', 'DotController@destroy')->name('dot.delete')->middleware('auth');
Route::get('/dot_data', 'DotController@data')->name('dot.data')->middleware('auth');

Route::get('/dot_fg', 'DotController@show_fg')->name('dot.show_fg')->middleware('auth');
Route::post('/dot_fg', 'DotController@fg_store')->name('dot.fg_store')->middleware('auth');


Route::get('/customer', 'CustomerController@index')->name('customer.index')->middleware('auth');
Route::post('/customer', 'CustomerController@store')->name('customer.store')->middleware('auth');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit')->middleware('auth');
Route::post('/customer/edit', 'CustomerController@editsave')->name('customer.editsave')->middleware('auth');
Route::get('/customer_data', 'CustomerController@data')->name('customer.data')->middleware('auth');


Route::get('/logout','LogoutController@index')->name('logout.logout');

Route::get('/test','TestController@index')->name('test');

Route::get('/', 'InspectionController@index')->name('inspection.index')->middleware('auth');


Route::post('/exportInspection', 'InspectionController@exportInspection')->name('inspection.exportInspection');

Route::get('/exportUser', 'InspectionController@exportUser')->name('inspection.exportUser');

/*

Route::get('importExport', 'MaatwebsiteDemoController@importExport');

Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');

Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');

Route::get('exportUser', 'MaatwebsiteDemoController@exportUser');

Route::get('exportUserByExportable', 'MaatwebsiteDemoController@exportUserByExportable');

Route::get('exportExamplePhpSpreadSheet', 'MaatwebsiteDemoController@exportExamplePhpSpreadSheet');
*/


/*

Route::get('/', 'QuestionsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions', 'QuestionsController')->except('show');
// Route::post('/questions/{question}/answers', 'AnswersController@store')->name('answers.store');
Route::resource('questions.answers', 'AnswersController')->except(['index', 'create', 'show']);
Route::get('/questions/{slug}', 'QuestionsController@show')->name('questions.show');
Route::post('/answers/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');

Route::post('/questions/{question}/favorites', 'FavoritesController@store')->name('questions.favorite');
Route::delete('/questions/{question}/favorites', 'FavoritesController@destroy')->name('questions.unfavorite');

Route::post('/questions/{question}/vote', 'VoteQuestionController');
Route::post('/answers/{answer}/vote', 'VoteAnswerController');
*/
