<?php

Route::get('/clear-cache', function() {
     Artisan::call('cache:clear');
    // return what you want
});

Route::namespace('Website')->group(function () {
	Route::namespace('Assamese')->group(function () {
    	/** News Section **/
    	Route::get('/', 'IndexController@index')->name('index');
    	Route::get('news_list/{sub_category_id}', 'IndexController@newsList')->name('news_list');
    	Route::get('news_detail/{news_id}', 'IndexController@newsDetail')->name('news_detail');
        Route::get('all_news_list', 'IndexController@allNewsList')->name('all_news_list');

    	/** Positive News Section **/
    	Route::get('positive_news_list/{top_category_id}', 'IndexController@positiveNewsList')->name('positive_news_list');
    	Route::get('positive_news_detail/{positive_news_id}', 'IndexController@positiveNewsDetail')->name('positive_news_detail');

    	/** Left-Center-Right News Section **/
    	Route::get('left_center_right_news_list/{top_category_id}', 'IndexController@leftcenterrightNewsList')->name('left_center_right_news_list');
    	Route::get('left_center_right_news_detail/{left_center_right_news_id}', 'IndexController@leftcenterrightNewsDetail')->name('left_center_right_news_detail');

        /** Transform News Section **/
        Route::get('transform_news_list/{top_category_id}', 'IndexController@transformNewsList')->name('transform_news_list');
        Route::get('transform_news_detail/{transform_news_id}', 'IndexController@transformNewsDetail')->name('transform_news_detail');
    });

    Route::namespace('English')->group(function () {
        /** News Section **/
        Route::get('english', 'IndexController@index')->name('english.index');
        Route::get('english_news_list/{sub_category_id}', 'IndexController@newsList')->name('english.news_list');
        Route::get('english_news_detail/{news_id}', 'IndexController@newsDetail')->name('english.news_detail');
        Route::get('english_all_news_list', 'IndexController@allNewsList')->name('english.all_news_list');

        /** Positive News Section **/
        Route::get('english_positive_news_list/{top_category_id}', 'IndexController@positiveNewsList')->name('english_positive_news_list');
        Route::get('english_positive_news_detail/{positive_news_id}', 'IndexController@positiveNewsDetail')->name('english_positive_news_detail');

        /** Left-Center-Right News Section **/
        Route::get('english_left_center_right_news_list/{top_category_id}', 'IndexController@leftcenterrightNewsList')->name('english_left_center_right_news_list');
        Route::get('english_left_center_right_news_detail/{left_center_right_news_id}', 'IndexController@leftcenterrightNewsDetail')->name('english_left_center_right_news_detail');

        /** Transform News Section **/
        Route::get('english_transform_news_list/{top_category_id}', 'IndexController@transformNewsList')->name('english_transform_news_list');
        Route::get('english_transform_news_detail/{transform_news_id}', 'IndexController@transformNewsDetail')->name('english_transform_news_detail');
    });

    Route::namespace('JPeople')->group(function () {
        Route::get('joining_people', 'JPeopleController@showJPeopleForm')->name('joining_people');
        Route::post('add_people', 'JPeopleController@addPeople')->name('add_people');
    });

    Route::namespace('Contact')->group(function () {
        Route::get('contact_form', 'ContactController@showContactForm')->name('contact_form');
        Route::post('send_email', 'ContactController@sendEmail')->name('send_email');
    });
});
?>