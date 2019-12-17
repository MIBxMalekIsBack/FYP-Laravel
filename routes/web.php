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

//for unregistered customer
Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', 'ItemController@viewMenu'); 

Route::get('/about', function () {
    return view('about');
});



//Owner 
Auth::routes();
Route::prefix('owner')->group(function(){
	Route::get('/login', 'Auth\OwnerLoginController@showLoginForm')->name('owner.login');
	Route::post('/login', 'Auth\OwnerLoginController@login')->name('owner.login.submit');

	Route::get('/home', 'OwnerController@index')->name('owner.home');
	Route::get('/listCustomer', 'OwnerController@listCustomer')->name('owner.listCustomer');
    Route::get('/viewOrder', 'OwnerController@viewOrder')->name('owner.viewOrder');

    Route::get('/updateStatus', 'OwnerController@updateStatus'); //untuk update status order
    Route::post('/updateStatus2/{id}', 'OwnerController@updateStatus2'); //untuk update status order
    
    Route::get('/addMenu', 'OwnerController@viewAddMenu');
    Route::post('/addMenu', 'OwnerController@addMenu');

    Route::get('/editMenuForm/{id}', 'OwnerController@editMenuForm');
    Route::post('/updateMenu', 'OwnerController@updateMenu');
    

});



//for registered customer
Route::group(['middleware' => ['auth']], function () {
    Route::get('/viewCustomerOrder', 'CustomerController@viewCustomerOrder');
    Route::get('/customerMenu', 'CustomerController@customerMenu');
    Route::get('/customerAbout', 'CustomerController@customerAboutUs');
    Route::get('/customerHome', 'CustomerController@customerHome');

    Route::post('/order/create', 'OrderController@create'); //for customer
    Route::get('/order', 'OrderController@view');

    Route::get('/home', 'HomeController@index'); //homepage registered customer [FOR NOW ONLY]
    Route::get('/invoice/{id}', 'CustomerController@viewReceipt');

    
});





