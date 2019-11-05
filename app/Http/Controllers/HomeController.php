<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_english_news           = DB::table('english_news')->count();
        $total_assamese_news          = DB::table('assamese_news')->count();
        $total_positive_english_news  = DB::table('positive_english_news')->count();
        $total_positive_assamese_news = DB::table('positive_assamese_news')->count();
        $total_positive_news          = $total_positive_english_news + $total_positive_assamese_news;
        $total_video                  = DB::table('video')->count();

        return view('admin.dashboard', ['total_english_news' => $total_english_news, 'total_assamese_news' => $total_assamese_news, 'total_positive_news' => $total_positive_news, 'total_video' => $total_video]);
    }
}
