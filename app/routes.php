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

Route::get('/', array('as'=>'index',function()
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

	//return View::make('pages.index');
	//return Product::with('attributes.attribute')->where('id',1)->get(); 
	//return Product::find(1)->attributesToArray();
	//return ProductAttributes::all()->lists('code');
	//return array_merge(Product::find(1)->returnFillable(),ProductAttributes::all()->lists('code'));
	return ProductAttributes::all(array('id','code'));
}));

///////////////////////// PUBLIC ROUTES ////////////////////////////////////////////////////////////////

// Page Routes
Route::get('pages/{id}', array('as' => 'pages.show', 'uses' => 'App\Controllers\PagesController@show'));

// Product Routes
Route::get('products', array('as' =>'products.index', 'uses' =>'ProductsController@index'));
Route::get('products/{id}', array('as' =>'products.show', 'uses' =>'ProductsController@show'));

// Admin Login Routes
Route::get('admin/logout',  array('as' => 'admin.logout',      'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login',   array('as' => 'admin.login',       'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login',  array('as' => 'admin.login.post',  'uses' => 'App\Controllers\Admin\AuthController@postLogin'));


///////////////////////// ADMIN ROUTES ////////////////////////////////////////////////////////////////

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
        Route::any('/',                				'App\Controllers\PagesController@index');
        Route::resource('products',    				'ProductsController');
        Route::resource('reviews',     				'App\Controllers\ReviewsController');
        Route::resource('pages',       				'App\Controllers\PagesController');
       	Route::resource('product-attributes',       'App\Controllers\ProductAttributesController');
       	Route::controller('import',                 'ImportController');
});


// App Error Routes

