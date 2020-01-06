<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Models\Department;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:api', 'cors']], function () {
    Route::post('auth/logout', 'Auth\LoginController@logout');

    Route::get('/user', function (Request $request) {
        return ['item' => $request->user()];
    });

    Route::group(['prefix' => 'manage', 'namespace' => 'Manage'], function() {
        Route::resource('users', 'User\UserController')->except(['create', 'edit', 'show']);
        Route::resource('roles','User\RoleController')->except(['create', 'edit', 'show']);

        Route::post('/filemanager/upload', 'UploadController@upload');
        Route::post('/filemanager/delete', 'UploadController@delete');

        Route::group(['namespace' => 'Content'], function() {
            Route::resource('pages', 'PageController')->except(['create', 'edit', 'show']);
            Route::resource('news', 'NewsController')->except(['create', 'edit', 'show']);
            Route::resource('actions', 'ActionController')->except(['create', 'edit', 'show']);
        });

        Route::group(['namespace' => 'Directory'], function() {
            Route::resource('cities', 'CityController')->only(['index']);
            Route::resource('categories', 'CategoryController')->only(['index']);
            Route::resource('brands', 'BrandController')->only(['index']);
            Route::resource('products', 'ProductController')->except(['create', 'edit', 'show']); // todo
        });

        Route::group(['namespace' => 'Department', 'prefix' => 'departments'], function() {
            Route::resource('/', 'DepartmentController')->only(['index']);
            Route::resource('markets', 'MarketController')->except(['create', 'edit', 'show']);
            Route::resource('services', 'ServiceController')->except(['create', 'edit', 'show']);
            Route::resource('specializations', 'SpecializationController')->except(['create', 'edit', 'show']);
        });

//        Route::group(['prefix' => 'users', 'namespace' => 'Users'], function() {
//            Route::patch('/', 'UsersController@list');
//        });

        Route::group(['prefix' => 'personal', 'namespace' => 'Personal'], function() {
            Route::patch('profile', 'ProfileController@update');
            Route::patch('password', 'PasswordController@update');
        });
    });
});

Route::group(['prefix' => 'exchange/v1', 'namespace' => 'Exchange\V1', 'middleware' => ['api']], function() {
    Route::post('category', 'CategoryController@update');
    Route::post('brand', 'BrandController@update');
    Route::post('product', 'ProductController@update');
    Route::post('image', 'ImageController@update');
    Route::delete('image', 'ImageController@delete');
    Route::post('properties', 'PropertyController@update');
    Route::post('property_values', 'PropertyController@updateValue');
    Route::post('update_store', 'StoreController@update_store');
    Route::resource('orders', 'OrderController')->except(['create', 'edit']);
//        Route::get('model/{mark_id}/models', 'AutoMarkController@models_by_mark');
});

Route::group(['prefix' => '/api/v1', 'namespace' => 'Site', 'middleware' => ['api']], function() { // todo: api key check
    Route::resource('products', 'ProductController')->only(['index', 'show']);
    Route::resource('orders', 'OrderController')->except(['create', 'edit']);
    Route::get('products/{product}/stores', 'ProductController@stores');
    Route::resource('departments', 'DepartmentController')->only(['index', 'show']);
    Route::resource('actions', 'ActionController')->only(['index', 'show']);
    Route::get('search', 'SearchController@search');
    Route::get('automodels', 'AutoModelController@all');
    Route::get('shorts', 'AutoModelShortController@all');
    Route::get('automodifications', 'AutoModificationController@filter');
});

Route::group(['middleware' => ['guest:api', 'cors']], function () {
    Route::post('auth/login', 'Auth\LoginController@login');
    Route::post('auth/register', 'Auth\RegisterController@register');

    Route::post('auth/forgot-password', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('auth/reset-password', 'Auth\ResetPasswordController@reset');
});
