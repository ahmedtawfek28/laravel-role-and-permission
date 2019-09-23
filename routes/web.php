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

Route::get('/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('welcome');
});
Route::get('/', function () {
    return redirect('/en');
});
Route::get('/500', function () {
    return view('page500');
})->name('page500');

/**
 * Admin login route
 */
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.post');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


/**
 * route only for Admin profile
 */
Route::group(['as' => 'Admin.', 'prefix' => 'Admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('permissioncategories','PermissioncategoryController');
    Route::resource('permissions','PermissionController');
    Route::resource('options','OptionController');
    Route::resource('localization','LocalizationController');
    Route::get('web_setting','WebSettingController@index')->name('websetting.index');
    Route::put('web_setting','WebSettingController@update')->name('web_setting.update');
    Route::resource('category','CategoryController');
    Route::resource('subcategory','SubCategoryController');

});


/**
 * teacher login route
 */
Route::get('/teacher/login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
Route::post('/teacher/login', 'Auth\TeacherLoginController@login')->name('teacher.login.post');
Route::post('/teacher/logout', 'Auth\TeacherLoginController@logout')->name('teacher.logout');


/**
 * route only for teacher profile
 */
Route::group(['middleware'=>'teacher'], function() {

    Route::get('/teacher/home', 'Teacher\HomeController@index');

});

/**
 * student login route
 */
Route::get('/student/login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
Route::post('/student/login', 'Auth\StudentLoginController@login')->name('student.login.post');
Route::post('/student/logout', 'Auth\StudentLoginController@logout')->name('student.logout');


/**
 * route only for teacher profile
 */
Route::group(['middleware'=>'student'], function() {

    Route::get('/student/home', 'Student\HomeController@index');

});
