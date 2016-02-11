<?php
Route::get('/', [
	'as' => 'Home',
	
	'uses' => 'HomeController@getIndex'
]);
Route::get('/home', [
	'as' => 'Home',
	'uses' => 'HomeController@getIndex'
]);
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Registration routes...
Route::get('auth/register', 'HomeController@getRegister');
Route::post('auth/register', 'HomeController@postRegister');
//not yet done. cebu.php
Route::get('/cebu',[
	'uses' =>'HomeController@getCebu'
	]);

//not yet done. makati.php
Route::get('/makati',[
	'uses' =>'HomeController@getMakati'
	]);

//not yet done. main.php
Route::get('/main',[
	'uses' =>'HomeController@getMain'
	]);

//not yet done. aboutus.php
Route::get('/aboutUs',[
	'uses' =>'HomeController@getAboutUs'
	]);
//not yet done. storage/preparation.html
Route::get('/storage-and-preparation-equipment',[
	'uses' =>'HomeController@getStorageAndPreparationEquipment'
	]);
//not yet done. cooking.php
Route::get('/cooking-equipment',[
	'uses' =>'HomeController@getCookingEquipment'
	]);
//
Route::get('/foodService',[
	'uses' =>'HomeController@getFoodService'
	]);
// //not yet done. 
// Route::get('/register',[
// 	'uses' =>'HomeController@getRegister'
// 	]);
//get item description
Route::get('/product/{id}',[
	'uses' =>'HomeController@getItemDescription'
	]);
Route::post('/product/{id}',[
	'uses' =>'HomeController@postItemDescription'
	]);
Route::get('/mycart',[
	'uses' =>'HomeController@getMyCart'
	]);
Route::post('/mycart',[
	'uses' =>'HomeController@postMyCart'
	]);
$uses = (Auth::Check()) ? 'HomeController@postCheckoutFinal': 'HomeController@postCheckout';

Route::post('/checkout',[
	'uses' => $uses
	]);
Route::get('/checkout',[
	'uses' => $uses
	]);
Route::post('/review',[
	'uses' => 'HomeController@postCheckoutFinal'
	]);
Route::get('/review',[
	'uses' => 'HomeController@getCheckoutFinal',
	'middleware' => 'auth'
	]);
Route::get('/myaccount',[
	'uses' => 'HomeController@getMyAccount',
	'middleware' => 'auth'
	]);
Route::post('/myaccount',[
	'uses' => 'HomeController@postMyAccount',
	'middleware' => 'auth'
	]);
Route::get('/myorders',[
	'uses' => 'HomeController@getMyOrders',
	'middleware' => 'auth'
	]);

Route::get('/order/{id}', [
	'middleware' => 'auth',
	'uses' => 'HomeController@getOrder'
]);
?>