<?php

/**
* Index
*/
Route::get('/', 'IndexController@getIndex');


/**
* User Routing
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );


/**
* Tracker Routing
*/
Route::get('/tracker', 'TrackerController@getIndex');
Route::get('/tracker/edit/{id}', 'TrackerController@getEdit');
Route::post('/tracker/edit', 'TrackerController@postEdit');
Route::get('/tracker/create', 'TrackerController@getCreate');
Route::post('/tracker/create', 'TrackerController@postCreate');
Route::post('/tracker/delete', 'TrackerController@postDelete');
/*To List  My Trackers*/
Route::get('/tracker/mytracker', 'TrackerController@getMytracker');


/**
* Addexistingtracker Routing
*/
Route::get('/addexistingtracker/add/{id}', 'AddexistingtrackerController@getAdd');
Route::post('/addexistingtracker/add', 'AddexistingtrackerController@postAdd');
Route::get('/addexistingtracker/edit/{id}', 'AddexistingtrackerController@getEdit');
Route::post('/addexistingtracker/edit', 'AddexistingtrackerController@postEdit');
Route::post('/addexistingtracker/delete', 'AddexistingtrackerController@postDelete');


/**
* Account Routing
*/
Route::get('/account', 'AccountController@getAccount');
Route::get('/account/edit/{id}', 'AccountController@getEdit');
Route::post('/account/edit', 'AccountController@postEdit');
Route::get('/account/create', 'AccountController@getCreate');
Route::post('/account/create', 'AccountController@postCreate');
Route::post('/account/delete', 'AccountController@postDelete');


/**
* Debug Routing
*/
Route::controller('debug', 'DebugController');














