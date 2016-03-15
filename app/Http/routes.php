<?php
Route::get('/resendemailconfirmation/{username}', ['as' => 'resendemailconfirmation', 'uses' => 'HomeController@getResendConfirmationEmail']);
Route::get('/register/confirm/{activation}', [
	'as' => 'Home',
	
	'uses' => 'HomeController@getActivateUser'
]);

Route::get('/', [
	'as' => 'Home',
	
	'uses' => 'HomeController@getIndex'
]);
Route::get('/home', [
	'as' => 'Home',
	'uses' => 'HomeController@getIndex'
]);
// Authentication routes...
Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'login']);
Route::post('auth/login', 'AuthController@postIndex');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Registration routes...
Route::get('auth/register', 'HomeController@getRegister');
Route::post('auth/register', 'HomeController@postRegister');
Route::get('/main',[
	'uses' =>'HomeController@getMain'
	]);

Route::get('/aboutUs',[
	'uses' =>'HomeController@getAboutUs'
	]);
Route::get('/contactUs',[
	'uses' =>'HomeController@getContactUs'
	]);
Route::get('/storage-and-preparation-equipment',[
	'uses' =>'HomeController@getStorageAndPreparationEquipment'
	]);
Route::get('/cooking-equipment',[
	'uses' =>'HomeController@getCookingEquipment'
	]);
Route::get('/foodService',[
	'uses' =>'HomeController@getFoodService'
	]);
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
Route::post('/order/{id}', [
	'middleware' => 'auth',
	'uses' => 'HomeController@postOrder'
]);

Route::get('/searchproduct', [
	'uses' => 'HomeController@postSearchProduct'
]);

?>