<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('website.template.partials.aheader', function ($view) {

            $north_east_sub_menu_item = DB::table('assamese_sub_category')
                ->where('top_category_id', 3)
                ->get();

            $explore_sub_menu_item = DB::table('assamese_sub_category')
                ->where('top_category_id', 5)
                ->get();

            $data = [
                'north_east_sub_menu_item' => $north_east_sub_menu_item,
                'explore_sub_menu_item' => $explore_sub_menu_item,
            ];
            
            $view->with('menu_data', $data);
        });

        View::composer('website.template.partials.eheader', function ($view) {

            $north_east_sub_menu_item = DB::table('english_sub_category')
                ->where('top_category_id', 3)
                ->get();

            $explore_sub_menu_item = DB::table('english_sub_category')
                ->where('top_category_id', 5)
                ->get();

            $data = [
                'north_east_sub_menu_item' => $north_east_sub_menu_item,
                'explore_sub_menu_item' => $explore_sub_menu_item,
            ];
            
            $view->with('menu_data', $data);
        });

        View::composer('website.english.news.news_detail', function ($view) {

            $north_east_sub_menu_item = DB::table('english_sub_category')
                ->where('top_category_id', 3)
                ->get();

            $explore_sub_menu_item = DB::table('english_sub_category')
                ->where('top_category_id', 5)
                ->get();

            $data = [
                'north_east_sub_menu_item' => $north_east_sub_menu_item,
                'explore_sub_menu_item' => $explore_sub_menu_item,
            ];
            
            $view->with('menu_data', $data);
        });

        View::composer('website.english.positive_news.positive_news_detail', function ($view) {

            $north_east_sub_menu_item = DB::table('english_sub_category')
                ->where('top_category_id', 3)
                ->get();

            $explore_sub_menu_item = DB::table('english_sub_category')
                ->where('top_category_id', 5)
                ->get();

            $data = [
                'north_east_sub_menu_item' => $north_east_sub_menu_item,
                'explore_sub_menu_item' => $explore_sub_menu_item,
            ];
            
            $view->with('menu_data', $data);
        });

        View::composer('website.english.left_center_right_news.left_center_right_news_detail', function ($view) {

            $north_east_sub_menu_item = DB::table('english_sub_category')
                ->where('top_category_id', 3)
                ->get();

            $explore_sub_menu_item = DB::table('english_sub_category')
                ->where('top_category_id', 5)
                ->get();

            $data = [
                'north_east_sub_menu_item' => $north_east_sub_menu_item,
                'explore_sub_menu_item' => $explore_sub_menu_item,
            ];
            
            $view->with('menu_data', $data);
        });

        View::composer('website.english.transform_news.transform_news_detail', function ($view) {

            $north_east_sub_menu_item = DB::table('english_sub_category')
                ->where('top_category_id', 3)
                ->get();

            $explore_sub_menu_item = DB::table('english_sub_category')
                ->where('top_category_id', 5)
                ->get();

            $data = [
                'north_east_sub_menu_item' => $north_east_sub_menu_item,
                'explore_sub_menu_item' => $explore_sub_menu_item,
            ];
            
            $view->with('menu_data', $data);
        });

        View::composer('website.assamese.news.news_detail', function ($view) {

            $north_east_sub_menu_item = DB::table('assamese_sub_category')
                ->where('top_category_id', 3)
                ->get();

            $explore_sub_menu_item = DB::table('assamese_sub_category')
                ->where('top_category_id', 5)
                ->get();

            $data = [
                'north_east_sub_menu_item' => $north_east_sub_menu_item,
                'explore_sub_menu_item' => $explore_sub_menu_item,
            ];
            
            $view->with('menu_data', $data);
        });

        View::composer('website.assamese.positive_news.positive_news_detail', function ($view) {

            $north_east_sub_menu_item = DB::table('assamese_sub_category')
                ->where('top_category_id', 3)
                ->get();

            $explore_sub_menu_item = DB::table('assamese_sub_category')
                ->where('top_category_id', 5)
                ->get();

            $data = [
                'north_east_sub_menu_item' => $north_east_sub_menu_item,
                'explore_sub_menu_item' => $explore_sub_menu_item,
            ];
            
            $view->with('menu_data', $data);
        });

        View::composer('website.assamese.left_center_right_news.left_center_right_news_detail', function ($view) {

            $north_east_sub_menu_item = DB::table('assamese_sub_category')
                ->where('top_category_id', 3)
                ->get();

            $explore_sub_menu_item = DB::table('assamese_sub_category')
                ->where('top_category_id', 5)
                ->get();

            $data = [
                'north_east_sub_menu_item' => $north_east_sub_menu_item,
                'explore_sub_menu_item' => $explore_sub_menu_item,
            ];
            
            $view->with('menu_data', $data);
        });

        View::composer('website.assamese.transform_news.transform_news_detail', function ($view) {

            $north_east_sub_menu_item = DB::table('assamese_sub_category')
                ->where('top_category_id', 3)
                ->get();

            $explore_sub_menu_item = DB::table('assamese_sub_category')
                ->where('top_category_id', 5)
                ->get();

            $data = [
                'north_east_sub_menu_item' => $north_east_sub_menu_item,
                'explore_sub_menu_item' => $explore_sub_menu_item,
            ];
            
            $view->with('menu_data', $data);
        });
    }
}
