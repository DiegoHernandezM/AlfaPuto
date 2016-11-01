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
Route::bind('product', function($slug){
    return App\Products::where('slug', $slug)->first();
});

Route::bind('provider', function($providers){

	return App\Providers::find($providers);
});

// Category dependency injection
Route::bind('category', function($category){
    return App\Category::find($category);
});

Route::get('/', [
	'as' => 'index',
	'uses' => 'StoreController@index'
	]);


Route::get('/questions', [
	'as' => 'questions',
	'uses' => 'StoreController@questions'
	]);

Route::get('/about', [
	'as' => 'about',
	'uses' => 'StoreController@about'
	]);

Route::get('/contact', [
	'as' => 'contact',
	'uses' => 'StoreController@contact'
	]);
Route::get('/mapsite', [
	'as' => 'mapsite',
	'uses' => 'StoreController@mapsite'
	]);

Route::get('/privacy', [
	'as' => 'privacy',
	'uses' => 'StoreController@privacy'
	]);
Route::get('product/{slug}', [
	'as' => 'product-detail',
	'uses' => 'StoreController@show'
	]);

// Carrito -------------

Route::get('cart/show', [
		'as' => 'cart-show',
		'uses' => 'CartController@show'
]);

Route::get('cart/add/{product}', [
		'as' => 'cart-add',
		'uses' => 'CartController@add'
]);

Route::get('cart/delete/{product}',[
		'as' => 'cart-delete',
		'uses' => 'CartController@delete'
]);

Route::get('cart/trash', [
		'as' => 'cart-trash',
		'uses' => 'CartController@trash'
]);

Route::get('cart/update/{product}/{quantity}', [
    'as' => 'cart-update',
    'uses' => 'CartController@update'
]);

Route::get('order-detail', [
		'middleware' => 'auth',
		'as' => 'order-detail',
		'uses' => 'CartController@orderDetail'
]);

// Authentication routes...
Route::get('auth/login', [
    'as' => 'login-get',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('auth/login', [
    'as' => 'login-post',
    'uses' => 'Auth\LoginController@postLogin'
]);

Route::get('auth/logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@getLogout'
]);

// Registration routes...
Route::get('auth/register', [
    'as' => 'register-get',
    'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('auth/register', [
    'as' => 'register-post',
    'uses' => 'Auth\AuthController@postRegister'
]);


Auth::routes();

Route::get('/home', 'HomeController@index');

// Paypal

// Enviamos nuestro pedido a PayPal
Route::get('payment', array(
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment',
));

// Después de realizar el pago Paypal redirecciona a esta ruta
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus',
));

//-----ADMIN

/*
 * Rutas para la seccion de proveedores
*/

Route::resource('admin/providers', 'Admin\ProvidersController');

Route::get('admin/providers',[
    'uses' => 'Admin\ProvidersController@index',
    'as' => 'admin.providers.index'
]);

Route::get('providers/edit/{providers}', [
    'uses' => 'Admin\ProvidersController@edit',
    'as' => 'admin.providers.edit'
]);

Route::put('providers/update/{providers}', [
    'uses' => 'Admin\ProvidersController@update',
    'as' => 'admin.providers.update'
]);

            //Eliminar proveedor
Route::delete('providers/delete/{providers}', [
    'uses' => 'Admin\ProvidersController@destroy',
    'as' => 'admin.providers.destroy'
]);

/*
 * Rutas para la seccion de productos
*/

Route::resource('admin/products', 'Admin\ProductController');

Route::get('products/index', [
    'uses' => 'Admin\ProductController@index',
    'as' => 'admin.products.index'
]);
Route::get('products/edit/{product}', [
    'uses' => 'Admin\ProductController@edit',
    'as' => 'admin.products.edit'
]);

Route::put('product/update/{product}', [
    'uses' => 'Admin\ProductController@update',
    'as' => 'admin.products.update'
]);

Route::delete('product/delete/{product}', [
    'uses' => 'Admin\ProductController@destroy',
    'as' => 'admin.product.destroy'
]);


// RUTAS PARA Categorias
Route::resource('admin/category', 'Admin\CategoryController');

Route::get('admin7category',[
    'uses' => 'Admin\CategoryController@index',
    'as' => 'admin.category.index'
]);

Route::get('category/edit/{category}', [
    'uses' => 'Admin\CategoryController@edit',
    'as' => 'admin.category.edit'
]);

Route::put('category/update/{category}', [
    'uses' => 'Admin\CategoryController@update',
    'as' => 'admin.category.update'
]);

Route::delete('category/delete/{category}', [
    'uses' => 'Admin\CategoryController@destroy',
    'as' => 'admin.category.destroy'
]);


/*/---- RUTAS DEL SLIDER
Route::get('slider', [
                'uses' => 'SliderController@index',
                'as' => 'admin.slider'
            ]);

            Route::post('slider', [
                'uses' => 'SliderController@store',
                'as' => 'admin.slider.store'
            ]);

            Route::delete('slider/{id}', [
                'uses' => 'SliderController@destroy',
                'as' => 'admin.slider.destroy'
            ]);

            Route::put('slider/update', [
                'uses' => 'SliderController@update',
                'as' => 'admin.slider.update'
            ]);

            Route::get('slider/show/{id}', [
                'uses' => 'SliderController@show',
                'as' => 'admin.slider.show'
            ]);*/


Route::resource('admin/sliders', 'Admin\SliderController');