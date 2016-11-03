<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('/foo', function () {
    return 'Hello World1';
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('contact/{category}', function ($category) {
    return 'HELLO FROM '.$category. ' CONTACT';
});

Route::get('contact/verified/{category}', function ($category) {
    return "HELLO FROM {$category} CONTACT";
});

Route::get('/home', function () {
 return view('home');
});

Route::get('/contact', function () {
 return view('contact');
});

Route::group(['middlewareGroups' => ['web']], function () {
	Route::get('/view', 'ClassController@showAll');
	Route::get('/new', 'ClassController@showNew');
	Route::get('/edit', 'ClassController@showEdit');
	Route::get('/viewRoom', 'RoomsController@showAll');
	//Route::get('/newRoom', 'RoomsController@showNew');
	Route::get('/newRoom/{id}','RoomsController@show');
	Route::post('/saveRoom/{id}', 'RoomsController@store');
	
	Route::get('/editRoom', 'RoomsController@showEdit');
	Route::get('/reportRoom/{id}', 'RoomsController@report');
	//Route::get('/editRoom/{id}','RoomsController@edit');
 	Route::post('/edited_data/{id}','RoomsController@update');
 	Route::get('/deleteRoom/{id}','RoomsController@destroy');
 	

});