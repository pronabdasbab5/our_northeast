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

            Route::namespace('News')->group(function () {
                Route::get('english_new_news_post', 'NewsController@newPost')->name('english_new_news_post');
                Route::put('english_add_news_post', 'NewsController@addPost')->name('english_add_news_post');
                Route::post('retrive_sub_category_english/{top_category_id}', 'NewsController@retriveSubCategory');
                Route::get('all_english_news_post', 'NewsController@allPost')->name('all_english_news_post');
                Route::post('all_english_news_post_data', 'NewsController@allPostData')->name('all_english_news_post_data');
                Route::get('view_english_news/{newsId}', 'NewsController@viewNews')->name('view_english_news');
                Route::get('english_news_cover_image/{file_name}', 'NewsController@imageView')->name('english_news_cover_image');
                Route::get('edit_english_news/{newsId}', 'NewsController@showNewsEditForm')->name('edit_english_news');
                Route::put('update_english_news/{newsId}', 'NewsController@updateNews')->name('update_english_news');
                Route::get('change_english_news_status/{newsId}/{status}', 'NewsController@changeStatus')->name('change_english_news_status');
                Route::get('delete_english_news/{newsId}', 'NewsController@deleteNews')->name('delete_english_news');
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
                Route::get('all_assamese_news_post', 'NewsController@allPost')->name('all_assamese_news_post');
                Route::post('all_assamese_news_post_data', 'NewsController@allPostData')->name('all_assamese_news_post_data');
                Route::get('view_assamese_news/{newsId}', 'NewsController@viewNews')->name('view_assamese_news');
                Route::get('assamese_news_cover_image/{file_name}', 'NewsController@imageView')->name('assamese_news_cover_image');
                Route::get('edit_assamese_news/{newsId}', 'NewsController@showNewsEditForm')->name('edit_assamese_news');
                Route::put('update_assamese_news/{newsId}', 'NewsController@updateNews')->name('update_assamese_news');
                Route::get('change_assamese_news_status/{newsId}/{status}', 'NewsController@changeStatus')->name('change_assamese_news_status');
                Route::get('delete_assamese_news/{newsId}', 'NewsController@deleteNews')->name('delete_assamese_news');
            });
        });

        Route::namespace('Positive')->group(function () {

            /** Assamese Positive News */
            Route::get('assamese_positive_new_news_post', 'ANewsController@newPost')->name('assamese_positive_new_news_post');
            Route::put('assamese_positive_add_news_post/{top_category_id}', 'ANewsController@addPost')->name('assamese_positive_add_news_post');
            Route::get('all_assamese_positive_news_post', 'ANewsController@allPost')->name('all_assamese_positive_news_post');
            Route::post('all_assamese_positive_news_post_data', 'ANewsController@allPostData')->name('all_assamese_positive_news_post_data');
            Route::get('view_assamese_positive_news/{newsId}', 'ANewsController@viewNews')->name('view_assamese_positive_news');
            Route::get('assamese_positive_news_cover_image/{file_name}', 'ANewsController@imageView')->name('assamese_positive_news_cover_image');
            Route::get('edit_assamese_positive_news/{newsId}', 'ANewsController@showNewsEditForm')->name('edit_assamese_positive_news');
            Route::put('update_assamese_positive_news/{newsId}', 'ANewsController@updateNews')->name('update_assamese_positive_news');
            Route::get('change_assamese_positive_news_status/{newsId}/{status}', 'ANewsController@changeStatus')->name('change_assamese_positive_news_status');
            Route::get('delete_assamese_positive_news/{newsId}', 'ANewsController@deleteNews')->name('delete_assamese_positive_news');
            /** End of Assamese News **/

            /** English Positive News */
            Route::get('english_positive_new_news_post', 'ENewsController@newPost')->name('english_positive_new_news_post');
            Route::put('english_positive_add_news_post/{top_category_id}', 'ENewsController@addPost')->name('english_positive_add_news_post');
            Route::get('all_english_positive_news_post', 'ENewsController@allPost')->name('all_english_positive_news_post');
            Route::post('all_english_positive_news_post_data', 'ENewsController@allPostData')->name('all_english_positive_news_post_data');
            Route::get('view_english_positive_news/{newsId}', 'ENewsController@viewNews')->name('view_english_positive_news');
            Route::get('english_positive_news_cover_image/{file_name}', 'ENewsController@imageView')->name('english_positive_news_cover_image');
            Route::get('edit_english_positive_news/{newsId}', 'ENewsController@showNewsEditForm')->name('edit_english_positive_news');
            Route::put('update_english_positive_news/{newsId}', 'ENewsController@updateNews')->name('update_english_positive_news');
            Route::get('change_english_positive_news_status/{newsId}/{status}', 'ENewsController@changeStatus')->name('change_english_positive_news_status');
            Route::get('delete_english_positive_news/{newsId}', 'ENewsController@deleteNews')->name('delete_english_positive_news');
            /** End of English News **/
        });

        Route::namespace('LCR')->group(function () {

            /** Assamese Positive News */
            Route::get('assamese_lcr_new_news_post', 'ANewsController@newPost')->name('assamese_lcr_new_news_post');
            Route::put('assamese_lcr_add_news_post/{top_category_id}', 'ANewsController@addPost')->name('assamese_lcr_add_news_post');
            Route::get('all_assamese_lcr_news_post', 'ANewsController@allPost')->name('all_assamese_lcr_news_post');
            Route::post('all_assamese_lcr_news_post_data', 'ANewsController@allPostData')->name('all_assamese_lcr_news_post_data');
            Route::get('view_assamese_lcr_news/{newsId}', 'ANewsController@viewNews')->name('view_assamese_lcr_news');
            Route::get('assamese_lcr_news_cover_image/{file_name}', 'ANewsController@imageView')->name('assamese_lcr_news_cover_image');
            Route::get('edit_assamese_lcr_news/{newsId}', 'ANewsController@showNewsEditForm')->name('edit_assamese_lcr_news');
            Route::put('update_assamese_lcr_news/{newsId}', 'ANewsController@updateNews')->name('update_assamese_lcr_news');
            Route::get('change_assamese_lcr_news_status/{newsId}/{status}', 'ANewsController@changeStatus')->name('change_assamese_lcr_news_status');
            Route::get('delete_assamese_lcr_news/{newsId}', 'ANewsController@deleteNews')->name('delete_assamese_lcr_news');
            /** End of Assamese News **/

            /** English Positive News */
            Route::get('english_lcr_new_news_post', 'ENewsController@newPost')->name('english_lcr_new_news_post');
            Route::put('english_lcr_add_news_post/{top_category_id}', 'ENewsController@addPost')->name('english_lcr_add_news_post');
            Route::get('all_english_lcr_news_post', 'ENewsController@allPost')->name('all_english_lcr_news_post');
            Route::post('all_english_lcr_news_post_data', 'ENewsController@allPostData')->name('all_english_lcr_news_post_data');
            Route::get('view_english_lcr_news/{newsId}', 'ENewsController@viewNews')->name('view_english_lcr_news');
            Route::get('english_lcr_news_cover_image/{file_name}', 'ENewsController@imageView')->name('english_lcr_news_cover_image');
            Route::get('edit_english_lcr_news/{newsId}', 'ENewsController@showNewsEditForm')->name('edit_english_lcr_news');
            Route::put('update_english_lcr_news/{newsId}', 'ENewsController@updateNews')->name('update_english_lcr_news');
            Route::get('change_english_lcr_news_status/{newsId}/{status}', 'ENewsController@changeStatus')->name('change_english_lcr_news_status');
            Route::get('delete_english_lcr_news/{newsId}', 'ENewsController@deleteNews')->name('delete_english_lcr_news');
            /** End of English News **/
        });

        Route::namespace('Transform')->group(function () {

            /** Assamese Positive News */
            Route::get('assamese_transform_new_news_post', 'ANewsController@newPost')->name('assamese_transform_new_news_post');
            Route::put('assamese_transform_add_news_post/{top_category_id}', 'ANewsController@addPost')->name('assamese_transform_add_news_post');
            Route::get('all_assamese_transform_news_post', 'ANewsController@allPost')->name('all_assamese_transform_news_post');
            Route::post('all_assamese_transform_news_post_data', 'ANewsController@allPostData')->name('all_assamese_transform_news_post_data');
            Route::get('view_assamese_transform_news/{newsId}', 'ANewsController@viewNews')->name('view_assamese_transform_news');
            Route::get('assamese_transform_news_cover_image/{file_name}', 'ANewsController@imageView')->name('assamese_transform_news_cover_image');
            Route::get('edit_assamese_transform_news/{newsId}', 'ANewsController@showNewsEditForm')->name('edit_assamese_transform_news');
            Route::put('update_assamese_transform_news/{newsId}', 'ANewsController@updateNews')->name('update_assamese_transform_news');
            Route::get('change_assamese_transform_news_status/{newsId}/{status}', 'ANewsController@changeStatus')->name('change_assamese_transform_news_status');
            Route::get('delete_assamese_transform_news/{newsId}', 'ANewsController@deleteNews')->name('delete_assamese_transform_news');
            /** End of Assamese News **/

            /** English Positive News */
            Route::get('english_transform_new_news_post', 'ENewsController@newPost')->name('english_transform_new_news_post');
            Route::put('english_transform_add_news_post/{top_category_id}', 'ENewsController@addPost')->name('english_transform_add_news_post');
            Route::get('all_english_transform_news_post', 'ENewsController@allPost')->name('all_english_transform_news_post');
            Route::post('all_english_transform_news_post_data', 'ENewsController@allPostData')->name('all_english_transform_news_post_data');
            Route::get('view_english_transform_news/{newsId}', 'ENewsController@viewNews')->name('view_english_transform_news');
            Route::get('english_transform_news_cover_image/{file_name}', 'ENewsController@imageView')->name('english_transform_news_cover_image');
            Route::get('edit_english_transform_news/{newsId}', 'ENewsController@showNewsEditForm')->name('edit_english_transform_news');
            Route::put('update_english_transform_news/{newsId}', 'ENewsController@updateNews')->name('update_english_transform_news');
            Route::get('change_english_transform_news_status/{newsId}/{status}', 'ENewsController@changeStatus')->name('change_english_transform_news_status');
            Route::get('delete_english_transform_news/{newsId}', 'ENewsController@deleteNews')->name('delete_english_transform_news');
            /** End of English News **/
        });

        Route::namespace('Video')->group(function () {
            Route::get('new_video', 'VideoController@showVideoAddForm')->name('new_video');
            Route::post('add_video', 'VideoController@addVideo')->name('add_video');
            Route::get('all_video', 'VideoController@allVideo')->name('all_video');
            Route::get('delete_video/{videoId}', 'VideoController@deleteVideo')->name('delete_video');
        });
    });
});
