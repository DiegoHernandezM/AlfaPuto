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

// User dependency injection
Route::bind('user', function($user){
    return App\User::find($user);
});

// Slider dependency injection
Route::bind('slider', function($slider){
    return App\Slider::find($slider);
});

Route::get('/', [
	'as' => 'index',
	'uses' => 'StoreController@index'
	]);

Route::get('fu', [
    'as' => 'slider',
    'uses' => 'StoreController@panel'
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

Route::get('cart/update/{product}/{quantity?}', [
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
    'uses' => 'Auth\LoginController@getLogin'
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
    'uses' => 'Auth\RegistrerController@getRegister'
]);

Route::post('auth/register', [
    'as' => 'register-post',
    'uses' => 'Auth\RegisterController@postRegister'
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

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin'], function(){

Route::resource('providers', 'ProvidersController');

Route::get('providers',[
    'uses' => 'ProvidersController@index',
    'as' => 'admin.providers.index'
]);

Route::get('providers/edit/{providers}', [
    'uses' => 'ProvidersController@edit',
    'as' => 'admin.providers.edit'
]);

Route::put('providers/update/{providers}', [
    'uses' => 'ProvidersController@update',
    'as' => 'admin.providers.update'
]);

            //Eliminar proveedor
Route::delete('providers/delete/{providers}', [
    'uses' => 'ProvidersController@destroy',
    'as' => 'admin.providers.destroy'
]);

/*
 * Rutas para la seccion de productos
*/

Route::resource('products', 'ProductController');

Route::get('products/index', [
    'uses' => 'ProductController@index',
    'as' => 'admin.products.index'
]);
Route::get('products/edit/{product}', [
    'uses' => 'ProductController@edit',
    'as' => 'admin.products.edit'
]);

Route::post('product/store', [
    'uses' => 'ProductController@store',
    'as' => 'admin.products.store'
]);

Route::put('product/update/{product}', [
    'uses' => 'ProductController@update',
    'as' => 'admin.products.update'
]);

Route::delete('product/delete/{product}', [
    'uses' => 'ProductController@destroy',
    'as' => 'admin.product.destroy'
]);


// RUTAS PARA Categorias
Route::resource('category', 'CategoryController');

Route::get('category',[
    'uses' => 'CategoryController@index',
    'as' => 'admin.category.index'
]);

Route::get('category/edit/{category}', [
    'uses' => 'CategoryController@edit',
    'as' => 'admin.category.edit'
]);

Route::put('category/update/{category}', [
    'uses' => 'CategoryController@update',
    'as' => 'admin.category.update'
]);

Route::delete('category/delete/{category}', [
    'uses' => 'CategoryController@destroy',
    'as' => 'admin.category.destroy'
]);


/*/---- RUTAS DEL SLIDER*/

Route::resource('sliders', 'SliderController');

Route::get('sliders',[
    'uses' => 'SliderController@index',
    'as' => 'admin.sliders.index'
]);

Route::get('sliders/edit/{slider}', [
    'uses' => 'SliderController@edit',
    'as' => 'admin.sliders.edit'
]);

Route::put('sliders/update/{slider}', [
    'uses' => 'SliderController@update',
    'as' => 'admin.sliders.update'
]);

Route::delete('sliders/delete/{slider}', [
    'uses' => 'SliderController@destroy',
    'as' => 'admin.sliders.destroy'
]);

//Ruta del USUARIO
Route::resource('user', 'UserController');

Route::get('user/index', [
    'uses' => 'UserController@index',
    'as' => 'admin.user.index'
]);

Route::get('user/edit/{user}', [
    'uses' => 'UserController@edit',
    'as' => 'admin.user.edit'
]);

Route::put('user/update/{user}', [
    'uses' => 'UserController@update',
    'as' => 'admin.user.update'
]);

Route::delete('user/delete/{user}', [
    'uses' => 'UserController@destroy',
    'as' => 'admin.user.destroy'
]);

});

//Generar PDF
Route::get('pdf-factura', [
    'uses' => 'PdfController@invoice',
    'as' => 'pdf.index'
]);

//Rutas de correo
Route::resource('mail', 'MailController');
