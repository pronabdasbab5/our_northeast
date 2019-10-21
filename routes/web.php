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

require_once 'website.php';

Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::namespace('Auth')->group(function () {

        Route::namespace('English')->group(function () {
            Route::namespace('TCategory')->group(function () {
                Route::get('english_tcategory', 'TCategoryController@allTCategory')->name('english_tcategory');
                Route::get('edit_etcategory/{tcategoryId}', 'TCategoryController@showTCategoryEditForm')->name('edit_etcategory');
                Route::post('update_etcategory/{tcategoryId}', 'TCategoryController@updateTCategory')->name('admin.update_etcategory');
            });

            Route::namespace('SubCategory')->group(function () {
                Route::get('english_scategory', 'SubCategoryController@allSCategory')->name('english_scategory');
                // Route::get('edit_etcategory/{tcategoryId}', 'TCategoryController@showTCategoryEditForm')->name('edit_etcategory');
                // Route::post('update_etcategory/{tcategoryId}', 'TCategoryController@updateTCategory')->name('admin.update_etcategory');
            });
        });

        Route::namespace('Assamese')->group(function () {
            Route::namespace('TCategory')->group(function () {
                Route::get('assamese_tcategory', 'TCategoryController@allTCategory')->name('assamese_tcategory');
                Route::get('edit_atcategory/{tcategoryId}', 'TCategoryController@showTCategoryEditForm')->name('edit_atcategory');
                Route::post('update_atcategory/{tcategoryId}', 'TCategoryController@updateTCategory')->name('admin.update_atcategory');
            });
        });
    });
});
