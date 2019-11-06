<?php

namespace App\Http\Controllers\Website\English;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function index() {
    	$english_latest_tow_records = DB::table('english_news')
    										->orderBy('id', 'desc')
    										->take(2)
											->get();

		$english_second_latest_tow_records = DB::table('english_news')
    										->orderBy('id', 'desc')
    										->skip(2)
    										->take(2)
											->get();

        $latest_english_positive_news = DB::table('positive_english_news')
                                            ->orderBy('id', 'desc')
                                            ->take(3)
                                            ->get();

        $latest_video = DB::table('video')
        					->where('langId', 2)
                            ->orderBy('id', 'desc')
                            ->first();

        $all_video = DB::table('video')
                            ->where('langId', 2)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $english_latest_four_records = DB::table('english_news')
                                            ->join('english_sub_category', 'english_news.sub_category_id', '=', 'english_sub_category.id')
                                            ->orderBy('english_news.id', 'desc')
                                            ->select('english_news.*', 'english_sub_category.sub_category')
                                            ->take(4)
                                            ->get();
                                            
    	return view('website.english.index', ['english_latest_tow_records' => $english_latest_tow_records, 'english_second_latest_tow_records' => $english_second_latest_tow_records, 'latest_english_positive_news' => $latest_english_positive_news, 'latest_video' => $latest_video, 'all_video' => $all_video, 'english_latest_four_records' => $english_latest_four_records]);
    }

    public function allNewsList() {

        $all_english_news = DB::table('english_news')
            ->join('english_sub_category', 'english_news.sub_category_id', '=', 'english_sub_category.id')
            ->select('english_news.*', 'english_sub_category.sub_category')
            ->paginate(1);

        $english_latest_tow_records = DB::table('english_news')
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        return view('website.english.news.all_news_list', ['all_english_news' => $all_english_news, 'english_latest_tow_records' => $english_latest_tow_records]);
    }

    public function newsList($sub_category_id) {
        try {
            $sub_category_id = decrypt($sub_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $all_english_news = DB::table('english_news')
            ->where('sub_category_id', $sub_category_id)
            ->paginate(1);

        $english_latest_tow_records = DB::table('english_news')
            ->where('sub_category_id', $sub_category_id)
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        return view('website.english.news.news_list', ['all_english_news' => $all_english_news, 'english_latest_tow_records' => $english_latest_tow_records]);
    }

    public function newsDetail($news_id) {
        try {
            $news_id = decrypt($news_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $english_news_single_record = DB::table('english_news')
            ->where('id', $news_id)
            ->get();

        $english_latest_four_records = DB::table('english_news')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 2)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_three_english_positive_news = DB::table('positive_english_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.english.news.news_detail', ['english_latest_four_records' => $english_latest_four_records, 'english_news_single_record' => $english_news_single_record, 'all_video' => $all_video, 'latest_three_english_positive_news' => $latest_three_english_positive_news]);
    }

    public function positiveNewsList($top_category_id) {
        try {
            $top_category_id = decrypt($top_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $all_positive_english_news = DB::table('positive_english_news')
            ->where('top_category_id', $top_category_id)
            ->paginate(1);

        $latest_tow_positive_english_news = DB::table('positive_english_news')
            ->where('top_category_id', $top_category_id)
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 2)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_english_news = DB::table('english_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.english.positive_news.positive_news_list', ['all_positive_english_news' => $all_positive_english_news, 'latest_tow_positive_english_news' => $latest_tow_positive_english_news, 'all_video' => $all_video, 'latest_four_english_news' => $latest_four_english_news]);
    }

    public function positiveNewsDetail($positive_news_id) {
        try {
            $positive_news_id = decrypt($positive_news_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $positive_english_news_single_record = DB::table('positive_english_news')
            ->where('id', $positive_news_id)
            ->get();

        $positive_english_latest_three_records = DB::table('positive_english_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 2)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_english_news = DB::table('english_news')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        return view('website.english.positive_news.positive_news_detail', ['positive_english_latest_three_records' => $positive_english_latest_three_records, 'positive_english_news_single_record' => $positive_english_news_single_record, 'all_video' => $all_video, 'latest_four_english_news' => $latest_four_english_news]);
    }

    public function leftcenterrightNewsList($top_category_id) {
        try {
            $top_category_id = decrypt($top_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $all_english_lcr_news = DB::table('english_lcr_news')
            ->where('top_category_id', $top_category_id)
            ->paginate(1);

        $latest_tow_english_lcr_news = DB::table('english_lcr_news')
            ->where('top_category_id', $top_category_id)
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 2)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_english_positive_news = DB::table('positive_english_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.english.left_center_right_news.left_center_right_news_list', ['all_english_lcr_news' => $all_english_lcr_news, 'latest_tow_english_lcr_news' => $latest_tow_english_lcr_news, 'all_video' => $all_video, 'latest_four_english_positive_news' => $latest_four_english_positive_news]);
    }

    public function leftcenterrightNewsDetail($left_center_right_news_id) {
        try {
            $left_center_right_news_id = decrypt($left_center_right_news_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $english_lcr_news_single_record = DB::table('english_lcr_news')
            ->where('id', $left_center_right_news_id)
            ->get();

        $english_lcr_latest_three_records = DB::table('english_lcr_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 2)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_english_positive_news = DB::table('positive_english_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.english.left_center_right_news.left_center_right_news_detail', ['english_lcr_latest_three_records' => $english_lcr_latest_three_records, 'english_lcr_news_single_record' => $english_lcr_news_single_record, 'all_video' => $all_video, 'latest_four_english_positive_news' => $latest_four_english_positive_news]);
    }

    public function transformNewsList($top_category_id) {
        try {
            $top_category_id = decrypt($top_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $all_english_transform_news = DB::table('english_transform_news')
            ->where('top_category_id', $top_category_id)
            ->paginate(1);

        $latest_tow_english_transform_news = DB::table('english_transform_news')
            ->where('top_category_id', $top_category_id)
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 2)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_english_positive_news = DB::table('positive_english_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.english.transform_news.transform_news_list', ['all_english_transform_news' => $all_english_transform_news, 'latest_tow_english_transform_news' => $latest_tow_english_transform_news, 'all_video' => $all_video, 'latest_four_english_positive_news' => $latest_four_english_positive_news]);
    }

    public function transformNewsDetail($transform_news_id) {
        try {
            $transform_news_id = decrypt($transform_news_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $english_transform_news_single_record = DB::table('english_transform_news')
            ->where('id', $transform_news_id)
            ->get();

        $english_transform_latest_three_records = DB::table('english_transform_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $all_video = DB::table('video')
                            ->where('langId', 2)
                            ->orderBy('id', 'desc')
                            ->take(9)
                            ->get();

        $latest_four_english_positive_news = DB::table('positive_english_news')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('website.english.transform_news.transform_news_detail', ['english_transform_latest_three_records' => $english_transform_latest_three_records, 'english_transform_news_single_record' => $english_transform_news_single_record, 'all_video' => $all_video, 'latest_four_english_positive_news' => $latest_four_english_positive_news]);
    }
}
