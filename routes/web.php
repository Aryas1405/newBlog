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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/category/restore/{category}','CategoryController@restore')->name('category.restore');
    Route::get('/category/deleted/','CategoryController@deleted')->name('category.deleted');    
    Route::get('/categories','CategoryController@index')->name('category.index');
    Route::get('/category/create','CategoryController@create')->name('category.create');
    Route::post('/category/store','CategoryController@store');
    Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
    Route::put('/category/update/{id}','CategoryController@update')->name('category.update');
    Route::get('category/delete/','CategoryController@destroy')->name('category.delete');

    Route::resource('tag','TagController');
    Route::get('/tag/edit/{slug}','TagController@edittag')->name('tag.slug_edit');
});
Route::resource('blog','BlogController');

Route::get('/roles','AuthorizationController@role_index')->name('role.index');
Route::get('/role/create','AuthorizationController@role_create')->name('role.create');
Route::post('/role/store','AuthorizationController@role_store');
Route::get('/role/edit/{id}','AuthorizationController@role_edit')->name('role.edit');
Route::put('/role/update/{id}','AuthorizationController@role_update')->name('role.update');
Route::delete('role/delete/{id}','AuthorizationController@role_destroy')->name('role.delete');

Route::get('/permissions','AuthorizationController@permission_index')->name('permission.index');
Route::get('/permission/create','AuthorizationController@permission_create')->name('permission.create');
Route::post('/permission/store','AuthorizationController@permission_store');
Route::get('/permission/edit/{id}','AuthorizationController@permission_edit')->name('permission.edit');
Route::put('/permission/update/{id}','AuthorizationController@permission_update')->name('permission.update');
Route::delete('permission/delete/{id}','AuthorizationController@permission_destroy')->name('permission.delete');

Route::get('/user_role','AuthorizationController@user_role_index')->name('user.role.index');
Route::post('/user_role/store','AuthorizationController@user_role_store')->name('user.role.store');
Route::get('/user_role/edit/{id}','AuthorizationController@user_role_edit')->name('user.role.edit');
Route::put('/user_role/update/{id}','AuthorizationController@user_role_update')->name('user.role.update');

Route::get('/role_permission','AuthorizationController@role_permission')->name('role.permission.index');
Route::post('/role_permission/store','AuthorizationController@role_permission_store')->name('role.permission.store');
Route::get('/role_permission/edit/{id}','AuthorizationController@role_permission_edit')->name('role.permission.edit');
Route::put('/role_permission/update/{id}','AuthorizationController@role_permission_update')->name('role.permission.update');



