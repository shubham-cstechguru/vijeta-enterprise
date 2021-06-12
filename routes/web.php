<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
	Route::group(['prefix' => '/', 'as' => 'home.', 'namespace' => 'Frontend'], function () {
		Route::get('/image', function () {
			Artisan::call('storage:link'); // this will do the command line job
		});
		Route::get('/', 'HomeController@index')->name('index');
		Route::group(['prefix' => '/category', 'as' => 'product.'], function () {
			Route::get('{slug}', 'ProductController@index')->name('category');
		});
		Route::group(['prefix' => '/product', 'as' => 'product.'], function () {
			Route::get('{slug}', 'ProductController@single')->name('product');
		});
		Route::group(['prefix' => '/account', 'namespace' => 'Auth'], function () {
			Route::get('login', 'UserAuthController@getLogin')->name('login');
			Route::post('login', 'UserAuthController@postLogin')->name('login.post');
			Route::get('register', 'UserAuthController@getRegister')->name('register');
			Route::post('register', 'UserAuthController@postRegister')->name('register.post');
			Route::get('logout', 'UserAuthController@logout')->name('logout');
		});
		Route::group(['middleware' => 'userauth'], function () {
			Route::resources([
				'cart' => 'CartController'
			]);
		});
	});

	Route::group(['prefix' => 'admin-control', 'as' => 'admin.'], function () {
		Route::group(['namespace' => 'Auth'], function () {
			Route::get('login', 'AdminAuthController@getLogin')->name('login');
			Route::post('login', 'AdminAuthController@postLogin')->name('login.post');
			Route::get('logout', 'AdminAuthController@logout')->name('logout');
		});
		Route::group(['middleware' => 'adminauth'], function () {
			Route::get('/', 'AdminController@dashboard')->name('dashboard');

			Route::resources([
				'category' => 'CategoryController',
				'product' => 'ProductController',
				'lense' => 'LenseController',
				'mirror' => 'MirrorController',
			]);
			Route::group(['prefix' => 'product/{product}'], function () {
				Route::resources([
					'productvariant' => 'ProductvariantController'
				]);
			});
		});
	});
});
