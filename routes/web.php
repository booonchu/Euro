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
    return redirect('admin/dashboard');
});

Route::get('contact/{category}', function ($category) {
    return 'HELLO FROM '.$category. ' CONTACT';
});

Route::get('/contact', function () {
 return view('contact');
});

Route::group(['middlewareGroups' => ['web']], function () {
	//Room Routing
	Route::get('/editRoom/{id}','RoomsController@show');//Load data for edit/insert room
	Route::post('/updateRoom/{id}', 'RoomsController@store');//for update room
	Route::post('/createRoom/{id}', 'RoomsController@create');//for create room
	Route::get('/deleteRoom/{id}','RoomsController@destroy');//for delete Room
	Route::get('/editRoom', 'RoomsController@index');//for load all room
	
	Route::get('/reportRoom/{id}', 'RoomsController@report');//Test Report Room
 	
});