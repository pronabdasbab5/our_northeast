<?php

namespace App\Http\Controllers\Website\Assamese;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function index() {
    	$assamese_latest_tow_records = DB::table('assamese_news')
    										->orderBy('id', 'desc')
    										->take(2)
											->get();

		$assamese_second_latest_tow_records = DB::table('assamese_news')
    										->orderBy('id', 'desc')
    										->skip(2)
    										->take(2)
											->get();

        $latest_assamese_positive_news = DB::table('positive_assamese_news')
                                            ->orderBy('id', 'desc')
                                            ->take(3)
                                            ->get();

        $latest_video = DB::table('video')
                            ->where('langId', 1)
                            ->orderBy('id', 'desc')
                            ->first();

        $all_video = DB::table('video')
                            ->where('langId', 1)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $assamese_latest_four_records = DB::table('assamese_news')
                                            ->join('assamese_sub_category', 'assamese_news.sub_category_id', '=', 'assamese_sub_category.id')
                                            ->orderBy('assamese_news.id', 'desc')
                                            ->select('assamese_news.*', 'assamese_sub_category.sub_category')
                                            ->take(4)
                                            ->get();
                                            
    	return view('website.assamese.index', ['assamese_latest_tow_records' => $assamese_latest_tow_records, 'assamese_second_latest_tow_records' => $assamese_second_latest_tow_records, 'latest_assamese_positive_news' => $latest_assamese_positive_news, 'latest_video' => $latest_video, 'all_video' => $all_video, 'assamese_latest_four_records' => $assamese_latest_four_records]);
    }

    public function newsList($sub_category_id) {
        try {
            $sub_category_id = decrypt($sub_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $all_assamese_news = DB::table('assamese_news')
            ->where('sub_category_id', $sub_category_id)
            ->paginate(1);

        $assamese_latest_tow_records = DB::table('assamese_news')
            ->where('sub_category_id', $sub_category_id)
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        return view('website.assamese.news.news_list', ['all_assamese_news' => $all_assamese_news, 'assamese_latest_tow_records' => $assamese_latest_tow_records]);
    }

    public function newsDetail($news_id) {
        try {
            $news_id = decrypt($news_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $assamese_news_single_record = DB::table('assamese_news')
            ->where('id', $news_id)
            ->get();

        $assamese_latest_four_records = DB::table('assamese_news')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 1)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_three_assamese_positive_news = DB::table('positive_assamese_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.assamese.news.news_detail', ['assamese_latest_four_records' => $assamese_latest_four_records, 'assamese_news_single_record' => $assamese_news_single_record, 'all_video' => $all_video, 'latest_three_assamese_positive_news' => $latest_three_assamese_positive_news]);
    }

    public function positiveNewsList($top_category_id) {
        try {
            $top_category_id = decrypt($top_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $all_positive_assamese_news = DB::table('positive_assamese_news')
            ->where('top_category_id', $top_category_id)
            ->paginate(1);

        $latest_tow_positive_assamese_news = DB::table('positive_assamese_news')
            ->where('top_category_id', $top_category_id)
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 1)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_assamese_news = DB::table('assamese_news')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        return view('website.assamese.positive_news.positive_news_list', ['all_positive_assamese_news' => $all_positive_assamese_news, 'latest_tow_positive_assamese_news' => $latest_tow_positive_assamese_news, 'all_video' => $all_video, 'latest_four_assamese_news' => $latest_four_assamese_news]);
    }

    public function positiveNewsDetail($positive_news_id) {
        try {
            $positive_news_id = decrypt($positive_news_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $positive_assamese_news_single_record = DB::table('positive_assamese_news')
            ->where('id', $positive_news_id)
            ->get();

        $positive_assamese_latest_three_records = DB::table('positive_assamese_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 1)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_assamese_news = DB::table('assamese_news')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        return view('website.assamese.positive_news.positive_news_detail', ['positive_assamese_latest_three_records' => $positive_assamese_latest_three_records, 'positive_assamese_news_single_record' => $positive_assamese_news_single_record, 'all_video' => $all_video, 'latest_four_assamese_news' => $latest_four_assamese_news]);
    }

    public function leftcenterrightNewsList($top_category_id) {
        try {
            $top_category_id = decrypt($top_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $all_assamese_lcr_news = DB::table('assamese_lcr_news')
            ->where('top_category_id', $top_category_id)
            ->paginate(1);

        $latest_tow_assamese_lcr_news = DB::table('assamese_lcr_news')
            ->where('top_category_id', $top_category_id)
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 1)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_assamese_positive_news = DB::table('positive_assamese_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.assamese.left_center_right_news.left_center_right_news_list', ['all_assamese_lcr_news' => $all_assamese_lcr_news, 'latest_tow_assamese_lcr_news' => $latest_tow_assamese_lcr_news, 'all_video' => $all_video, 'latest_four_assamese_positive_news' => $latest_four_assamese_positive_news]);
    }

    public function leftcenterrightNewsDetail($left_center_right_news_id) {
        try {
            $left_center_right_news_id = decrypt($left_center_right_news_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $assamese_lcr_news_single_record = DB::table('assamese_lcr_news')
            ->where('id', $left_center_right_news_id)
            ->get();

        $assamese_lcr_latest_three_records = DB::table('assamese_lcr_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 1)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_assamese_positive_news = DB::table('positive_assamese_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.assamese.left_center_right_news.left_center_right_news_detail', ['assamese_lcr_latest_three_records' => $assamese_lcr_latest_three_records, 'assamese_lcr_news_single_record' => $assamese_lcr_news_single_record, 'all_video' => $all_video, 'latest_four_assamese_positive_news' => $latest_four_assamese_positive_news]);
    }

    public function transformNewsList($top_category_id) {
        try {
            $top_category_id = decrypt($top_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $all_assamese_transform_news = DB::table('assamese_transform_news')
            ->where('top_category_id', $top_category_id)
            ->paginate(1);

        $latest_tow_assamese_transform_news = DB::table('assamese_transform_news')
            ->where('top_category_id', $top_category_id)
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 1)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_assamese_positive_news = DB::table('positive_assamese_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.assamese.transform_news.transform_news_list', ['all_assamese_transform_news' => $all_assamese_transform_news, 'latest_tow_assamese_transform_news' => $latest_tow_assamese_transform_news, 'all_video' => $all_video, 'latest_four_assamese_positive_news' => $latest_four_assamese_positive_news]);
    }

    public function transformNewsDetail($transform_news_id) {
        try {
            $transform_news_id = decrypt($transform_news_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $assamese_transform_news_single_record = DB::table('assamese_transform_news')
            ->where('id', $transform_news_id)
            ->get();

        $assamese_transform_latest_three_records = DB::table('assamese_transform_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 1)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_assamese_positive_news = DB::table('positive_assamese_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.assamese.transform_news.transform_news_detail', ['assamese_transform_latest_three_records' => $assamese_transform_latest_three_records, 'assamese_transform_news_single_record' => $assamese_transform_news_single_record, 'all_video' => $all_video, 'latest_four_assamese_positive_news' => $latest_four_assamese_positive_news]);
    }

    public function allNewsList() {

        $all_assamese_news = DB::table('assamese_news')
            ->join('assamese_sub_category', 'assamese_news.sub_category_id', '=', 'assamese_sub_category.id')
            ->select('assamese_news.*', 'assamese_sub_category.sub_category')
            ->paginate(1);

        $assamese_latest_tow_records = DB::table('assamese_news')
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        return view('website.assamese.news.all_news_list', ['all_assamese_news' => $all_assamese_news, 'assamese_latest_tow_records' => $assamese_latest_tow_records]);
    }
}
