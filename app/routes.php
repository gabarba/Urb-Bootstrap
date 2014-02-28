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
	//return Cache::get('2351_id');
	//return Product::find(2351)->getAttributeValueByCode(snake_case('ca_ebay_store_cat_1'));
	$products = Product::where('sku','LIKE','%E-%')->where('name','LIKE','%eyepiece%')->get()->each(function($product) {$product->categories()->attach(10);});
	return $products;
	/*
	$eyepiece = Eyepieces::take(500)->get()->each(function($eyepiece)
		{
			$eyepiece->withAttributes(array_flip(Eyepieces::getEyepieceAttributes()));
		});
	/*
	foreach(Eyepieces::getEyepieceAttributes() as $key=>$value)
	{
		$attributes[$key] = $eyepiece->$key;
	}
	*/
	//var_dump($eyepiece);

	//return $eyepiece->CaEpAfov;
	//$method = 'getCaEpSeriesBucketAttribute';
	//return snake_case(substr($method,3,-9));
	//return $eyepiece->toJSON();
	//var_dump(Cache::);
	//return $attributes;
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
	/*
	return Product::whereHas('attributes', function($q){
		$q->where('name','ca_ebay_store_cat_1')->where('value','1150296010');
	})->get();
	*/
 	//$testUnion = Product::FilterByAttributes(array('manufacturer'=>'William Optics','sku'=>array('PAMA-WO-M-DDS','T-WO-AF98-BUNDLE','PAMA-WO-M-DDS-COMBO'),'price'=>'199'))->get();
	//var_dump(ProductAttributes::ReturnAllValues('manufacturer'));
	//return Product::find(36)->getAttributeValueByCode('thumbnail');
	//return Route::getCurrentRoute()->getName();
	//return ProductAttributes::returnAttributeValues(Eyepieces::getEyepieceAttributesForFilter());
 	//return Product::FilterByAttributes(array('ca_adapter_selector'=>'0.965" Eyepiece Holder'/*array('0.965" Eyepiece Holder','0.965" Nosepiece','0.965" Eyepiece Holder , 1.25" Nosepiece')*/))->remember(1)->count();//->get(array('id','sku','name','brand'))->toJSON();
	//->wherePivot('value','PAMA-WO-M-DDS-COMBO')->get();
	//return View::make('pages.index');
	
	//return Category::find(1)->returnCategoryTree();
	//return Product::with('attributes.attribute')->where('id',1)->get(); 
	//return Product::find(1)->attributesToArray();
	//return ProductAttributes::all()->lists('code');
	//return array_merge(Product::find(1)->returnFillable(),ProductAttributes::all()->lists('code'));
	//return ProductAttributes::all(array('id','code'));
}));
Route::get('testRoute', array(function() {
	var_dump(Route::getCurrentRoute()->getName());
}));
///////////////////////// PUBLIC ROUTES ////////////////////////////////////////////////////////////////
Route::get('categoriesjson', array('as'=>'categories.json','uses' =>'CategoryController@returnCategoryTreeJson'));
Route::get('categories', array('as'=>'categories.jquery','uses' =>'CategoryController@categoryTreeJquery'));
Route::resource('eyepieces','EyepiecesController');
// index Routes
Route::get('pages/{product}', array('as' => 'pages.show', 'uses' => 'App\Controllers\PagesController@show'));

// Product Routes
Route::get('products', array('as' =>'products.index', 'uses' =>'ProductsController@index'));
Route::get('products/{id}', array('as' =>'products.show', 'uses' =>'ProductsController@show'));

// Admin Login Routes
Route::get('logout',  array('as' => 'admin.logout',      'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('login',   array('as' => 'admin.login',       'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('login',  array('as' => 'admin.login.post',  'uses' => 'App\Controllers\Admin\AuthController@postLogin'));
Route::controller('import','ImportController');

///////////////////////// ADMIN ROUTES ////////////////////////////////////////////////////////////////

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
        //Route::any('/',                				'App\Controllers\PagesController@index');
       // Route::resource('products',    				'ProductsController');
        //Route::resource('reviews',     				'App\Controllers\ReviewsController');
        //Route::resource('pages',       				'App\Controllers\PagesController');
       	//Route::resource('product-attributes',       'App\Controllers\ProductAttributesController');
       	
});



// App Error Routes



////////////////////////////////////////////////////////////////////////////
// View Composers (Will need to relocate this code else where in the future)
////////////////////////////////////////////////////////////////////////////


// Retrieve category tree for all views

/*
View::composer('*', function($view) 
{
	
       $view->with('categories',returnCategoryTree());
});
*/