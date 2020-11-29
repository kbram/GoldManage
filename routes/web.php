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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/SystemInformation','PagesController@system');
Route::get('/services', 'PagesController@services');
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::resource('posts','PostsController');
Route::resource('tasks','TasksController');
Route::resource('/manage', 'UsersController');
Route::resource('/users', 'UsersController');
Route::resource('/products', 'ProductsController');
Route::resource('/employees', 'EmployeesController');
Route::resource('/suppliers', 'SuppliersController');

Route::resource('accounts','AccountsController');
Route::resource('deliveries','DeliveriesController');
Route::get('account/{id}','AccountsController@createacc');
Route::put('account/{id}','AccountsController@storeacc');

Route::get('delivery/{id}','DeliveriesController@createdel');
Route::put('delivery/{id}','DeliveriesController@storedel');

Route::get('/complete/{id}','TasksController@complete');
Route::put('/complete/{id}','TasksController@updateComplete');

Auth::routes();
Route::get('/dashboard', 'DashboardController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

