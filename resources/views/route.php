<?php
Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home
	'));
//unauthenticated users
Route::group(array('before' => 'guest'), function() {
	// protection ggroup
Route::group(array('before' => 'csrf' function() {

}));
}