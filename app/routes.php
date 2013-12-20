<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('/', function()
{
	return View::make('hello');
});

*/

Route::get('/', function()
{
	/*
	Sentry::getUserProvider()->create(array(
		'email' => 'george@agenaastro.com',
		'password' => 'gabmaster',
		'first_name' => 'George',
		'last_name' => 'Barba', 
		'activated' => 1));

	Sentry::getGroupProvider()->create(array(
		'name' => 'Admin', 
		'permissions' => array('admin'=>1)
		));
	$adminUser = Sentry::getUserProvider()->findByLogin('george@agenaastro.com');
	$adminGroup = Sentry::getGroupProvider()->findByName('Admin');
	$adminUser->addGroup($adminGroup);
	*/
	return Product::with('reviews')->get();
});

Route::get('admin/logout',  array('as' => 'admin.logout',      'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login',   array('as' => 'admin.login',       'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login',  array('as' => 'admin.login.post',  'uses' => 'App\Controllers\Admin\AuthController@postLogin'));

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
        Route::any('/',                'App\Controllers\Admin\PagesController@index');
        Route::resource('products',    'App\Controllers\Admin\ProductsController');
        Route::resource('reviews',     'App\Controllers\Admin\ReviewsController');
        Route::resource('pages',       'App\Controllers\Admin\PagesController');
});