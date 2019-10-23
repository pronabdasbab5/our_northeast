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
                Route::get('new_escategory/{tcategoryId}', 'TCategoryController@showSCategoryForm')->name('new_escategory');
                Route::post('add_escategory/{tcategoryId}', 'TCategoryController@addSubCategory')->name('add_escategory');
            });

            Route::namespace('SubCategory')->group(function () {
                Route::get('english_scategory', 'SubCategoryController@allSCategory')->name('english_scategory');
                Route::get('edit_escategory/{scategoryId}', 'SubCategoryController@showSCategoryEditForm')->name('edit_escategory');
                Route::post('update_escategory/{scategoryId}', 'SubCategoryController@updateSCategory')->name('admin.update_escategory');
            });
        });

        Route::namespace('Assamese')->group(function () {
            Route::namespace('TCategory')->group(function () {
                Route::get('assamese_tcategory', 'TCategoryController@allTCategory')->name('assamese_tcategory');
                Route::get('edit_atcategory/{tcategoryId}', 'TCategoryController@showTCategoryEditForm')->name('edit_atcategory');
                Route::post('update_atcategory/{tcategoryId}', 'TCategoryController@updateTCategory')->name('admin.update_atcategory');
                Route::get('new_ascategory/{tcategoryId}', 'TCategoryController@showSCategoryForm')->name('new_ascategory');
                Route::post('add_ascategory/{tcategoryId}', 'TCategoryController@addSubCategory')->name('add_ascategory');
            });

            Route::namespace('SubCategory')->group(function () {
                Route::get('assamese_scategory', 'SubCategoryController@allSCategory')->name('assamese_scategory');
                Route::get('edit_ascategory/{scategoryId}', 'SubCategoryController@showSCategoryEditForm')->name('edit_ascategory');
                Route::post('update_ascategory/{scategoryId}', 'SubCategoryController@updateSCategory')->name('admin.update_ascategory');
            });

            Route::namespace('News')->group(function () {
                Route::get('assamese_new_news_post', 'NewsController@newPost')->name('assamese_new_news_post');
                Route::put('assamese_add_news_post', 'NewsController@addPost')->name('assamese_add_news_post');
                Route::post('retrive_sub_category/{top_category_id}', 'NewsController@retriveSubCategory');
                // Route::get('edit_ascategory/{scategoryId}', 'SubCategoryController@showSCategoryEditForm')->name('edit_ascategory');
                // Route::post('update_ascategory/{scategoryId}', 'SubCategoryController@updateSCategory')->name('admin.update_ascategory');
            });
        });
    });
});
