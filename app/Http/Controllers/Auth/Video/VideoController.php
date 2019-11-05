<?php

namespace App\Http\Controllers\Auth\Video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class VideoController extends Controller
{
    public function showVideoAddForm() {
    	return view('admin.auth.video.new_video');
    }

    public function addVideo(Request $request) {
    	$request->validate([
            'lang_id'  => 'required|numeric',
    		'title'  => 'required',
    		'video_id' => 'required',
    		'author' => 'required',
            'time' => 'required',
    	]);

    	DB::table('video')
    		->insert([
                'langId'      => $request->input('lang_id'),
    			'title'      => $request->input('title'),
    			'videoId'     => $request->input('video_id'),
    			'author'     => $request->input('author'),
                'time'     => $request->input('time'),
    			'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
    		]);

    	return redirect()->route('new_video')->with('msg', 'Video has been uploaded successfully');
    }

    public function allVideo() {
    	$all_video = DB::table('video')->get();

    	return view('admin.auth.video.all_video', ['all_video' => $all_video]);
    }

    public function deleteVideo($videoId) {
    	DB::table('video')->where('id', $videoId)->delete();
    	
    	return redirect()->route('all_video');
    }
}
