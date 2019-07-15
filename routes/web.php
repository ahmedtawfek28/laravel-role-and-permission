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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/500', function () {
    return view('page500');
})->name('page500');

// Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/**
 * admin login route
 */
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.post');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


/**
 * route only for teacher profile
 */
Route::group(['as' => 'Admin.', 'prefix' => 'Admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
//Route::group(['middleware'=>'admin'], function() {
//    Route::get('home', 'HomeController@index');
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('permissioncategories','PermissioncategoryController');
    Route::resource('permissions','PermissionController');
    Route::resource('category','CategoryController');
    Route::resource('subcategory','SubCategoryController');
});


/**
 * student login route
 */
Route::get('/customer/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
Route::post('/customer/login', 'Auth\CustomerLoginController@login')->name('customer.login.post');
Route::post('/customer/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');


/**
 * route only for student profile
 */
Route::group(['middleware'=>'customer'], function() {

    Route::get('/customer/home', 'Customer\HomeController@index');

});
