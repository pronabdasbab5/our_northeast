<?php

namespace App\Http\Controllers\Auth\Positive;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Response;
use DB;
use Carbon\Carbon;

class ANewsController extends Controller
{
    public function newPost() {
    	return view('admin.auth.positive_news.assamese.new_post', ['top_category_id' => 1]);
    }

    public function addPost(Request $request, $top_category_id) {

    	$request->validate([
    		'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    		'heading'      => 'required',
    		'short_desc'   => 'required',
    		'long_desc'    => 'required',
    	]);

        if($request->hasFile('file')) {
            $image        = $request->file('file');
            $file_name    = time().".jpg";

            $image_resize = Image::make($image->getRealPath());     

            if(!File::exists(public_path()."/assets"))
                File::makeDirectory(public_path()."/assets");

            if(!File::exists(public_path()."/assets/big_img"))
                File::makeDirectory(public_path()."/assets/big_img");

            if(!File::exists(public_path()."/assets/medium_img"))
                File::makeDirectory(public_path()."/assets/medium_img");

            if(!File::exists(public_path()."/assets/small_img"))
                File::makeDirectory(public_path()."/assets/small_img");

            $image_resize->resize(770, 400);
            $image_resize->save(public_path("assets/big_img/".$file_name));

            $image_resize->resize(270, 230);
            $image_resize->save(public_path("assets/medium_img/".$file_name));

            $image_resize->resize(130, 130);
            $image_resize->save(public_path("assets/small_img/".$file_name));

            DB::table('positive_assamese_news')
            		->insert([
            			'top_category_id' => $top_category_id,
            			'image' => $file_name,
            			'heading' => $request->input('heading'),
            			'short_desc' => $request->input('short_desc'),
            			'long_desc' => $request->input('long_desc'),
            			'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            			'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            		]);

            return redirect()->back()->with('msg', 'News has been publish successfully');

        } else
            return redirect()->back()->with('msg', 'Please ! upload image.');  
    }

    public function allPost() {
        return view('admin.auth.positive_news.assamese.all_news');
    }

    public function allPostData(Request $request) {

        $columns = array( 
                            0 => 'id', 
                            1 => 'topCategory',
                            2 => 'heading',
                            3 => 'date',
                            4 => 'status',
                            5 => 'action',
                        );

        $totalData = DB::table('positive_assamese_news')
        					->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))) {            
            
            $news_data = DB::table('positive_assamese_news')
                            ->join('assamese_top_category', 'positive_assamese_news.top_category_id', '=', 'assamese_top_category.id')
                            ->select('positive_assamese_news.*', 'assamese_top_category.top_category')
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        }
        else {

            $search = $request->input('search.value'); 

            $news_data = DB::table('positive_assamese_news')
                            ->join('assamese_top_category', 'positive_assamese_news.top_category_id', '=', 'assamese_top_category.id')
                            ->select('positive_assamese_news.*', 'assamese_top_category.top_category')
                            ->where('positive_assamese_news.heading','LIKE',"%{$search}%")
                            ->orWhere('positive_assamese_news.short_desc', 'LIKE',"%{$search}%")
                            ->orWhere('positive_assamese_news.long_desc', 'LIKE',"%{$search}%")
                            ->orWhere('assamese_top_category.top_category', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();    

            $totalFiltered = DB::table('positive_assamese_news')
                            ->join('assamese_top_category', 'positive_assamese_news.top_category_id', '=', 'assamese_top_category.id')
                            ->select('positive_assamese_news.*', 'assamese_top_category.top_category')
                            ->where('positive_assamese_news.heading','LIKE',"%{$search}%")
                            ->orWhere('positive_assamese_news.short_desc', 'LIKE',"%{$search}%")
                            ->orWhere('positive_assamese_news.long_desc', 'LIKE',"%{$search}%")
                            ->orWhere('assamese_top_category.top_category', 'LIKE',"%{$search}%")
                            ->count();
        }

        $data = array();

        if(!empty($news_data)) {

            $cnt = 1;

            foreach ($news_data as $single_data) {

                $action = "";

                if($single_data->status == 1){
                    $val = "<a class=\"btn btn-success\">Published</a>";
                    $action = "<a class=\"btn btn-primary\" href=\"".route('view_assamese_positive_news', ['newsId' => $single_data->id])."\" target=\"_blank\">view</a><a class=\"btn btn-warning\" href=\"".route('edit_assamese_positive_news', ['newsId' => $single_data->id])."\" target=\"_blank\">Edit</a><a class=\"btn btn-success\" href=\"".route('change_assamese_positive_news_status', ['newsId' => $single_data->id, 'status' => 0])."\">Un-Publish</a><a class=\"btn btn-danger\" href=\"".route('delete_assamese_positive_news', ['newsId' => $single_data->id])."\">Delete</a>";
                }
                else {
                    $val = "<a class=\"btn btn-success\">Un-Publish</a>";
                    $action = "<a class=\"btn btn-primary\" href=\"".route('view_assamese_positive_news', ['newsId' => $single_data->id])."\" target=\"_blank\">view</a><a class=\"btn btn-warning\" href=\"".route('edit_assamese_positive_news', ['newsId' => $single_data->id])."\" target=\"_blank\">Edit</a><a class=\"btn btn-success\" href=\"".route('change_assamese_positive_news_status', ['newsId' => $single_data->id, 'status' => 1])."\">Publish</a><a class=\"btn btn-danger\" href=\"".route('delete_assamese_positive_news', ['newsId' => $single_data->id])."\">Delete</a>";
                }

                $nestedData['id']          = $cnt;
                $nestedData['topCategory'] = $single_data->top_category;
                $nestedData['heading']     = $single_data->heading;
                $nestedData['date']        = $single_data->created_at;
                $nestedData['status']      = $val;
                $nestedData['action']      = $action;

                $data[] = $nestedData;

                $cnt++;
            }
        }

        $json_data = array(
                        "draw"            => intval($request->input('draw')),  
                        "recordsTotal"    => intval($totalData),  
                        "recordsFiltered" => intval($totalFiltered), 
                        "data"            => $data   
                    );
            
        print json_encode($json_data); 
    }

    public function viewNews($newsId) {
        $data  = DB::table('positive_assamese_news')->where('positive_assamese_news.id', $newsId)
                    ->join('assamese_top_category', 'positive_assamese_news.top_category_id', '=', 'assamese_top_category.id')
                    ->select('positive_assamese_news.*', 'assamese_top_category.top_category')
                    ->get();

        foreach ($data as $key => $value) {

            if($value->status == 1)
                $status = "Published";
            else 
                $status = "Un-Publish";

            $data = [
                'top_category' => $value->top_category,
                'heading'      => $value->heading,
                'image'        => $value->image,
                'short_desc'   => $value->short_desc,
                'long_desc'    => $value->long_desc,
                'status'       => $status,
                'date'         => current(explode(" ", $value->created_at))
            ];
        }

        return view('admin.auth.positive_news.assamese.view_news', ['data' => $data]);
    }

    public function imageView ($file_name) {

        $path = public_path('\assets\medium_img\\'.$file_name);
        if (!File::exists($path)) 
            $response = 404;
        $file = File::get($path);
        $type = File::extension($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function showNewsEditForm($newsId) {
        $news = DB::table('positive_assamese_news')
                    ->where('positive_assamese_news.id', $newsId)
                    ->join('assamese_top_category', 'positive_assamese_news.top_category_id', '=', 'assamese_top_category.id')
                    ->select('positive_assamese_news.*', 'assamese_top_category.top_category')
                    ->get();

        return view('admin.auth.positive_news.assamese.edit_post', ['news' => $news]);
    }

    public function updateNews(Request $request, $newsId) {
        $request->validate([
            'file'         => 'image|mimes:jpeg,png,jpg,gif,svg',
            'heading'      => 'required',
            'short_desc'   => 'required',
            'long_desc'    => 'required',
        ]);

        $news = DB::table('positive_assamese_news')
                    ->where('id', $newsId)
                    ->get();

        DB::table('positive_assamese_news')
                    ->where('id', $newsId)
                    ->update([
                        'heading' => $request->input('heading'),
                        'short_desc' => $request->input('short_desc'),
                        'long_desc' => $request->input('long_desc'),
                    ]);

        if($request->hasFile('file')) {
            $image        = $request->file('file');
            $file_name    = time().".jpg";

            $image_resize = Image::make($image->getRealPath());     

            if(!File::exists(public_path()."/assets"))
                File::makeDirectory(public_path()."/assets");

            if(!File::exists(public_path()."/assets/big_img"))
                File::makeDirectory(public_path()."/assets/big_img");

            if(!File::exists(public_path()."/assets/medium_img"))
                File::makeDirectory(public_path()."/assets/medium_img");

            if(!File::exists(public_path()."/assets/small_img"))
                File::makeDirectory(public_path()."/assets/small_img");

            File::delete(public_path("assets/big_img/".$news[0]->image));
            File::delete(public_path("assets/medium_img/".$news[0]->image));
            File::delete(public_path("assets/small_img/".$news[0]->image));

            $image_resize->resize(770, 400);
            $image_resize->save(public_path("assets/big_img/".$file_name));

            $image_resize->resize(270, 230);
            $image_resize->save(public_path("assets/medium_img/".$file_name));

            $image_resize->resize(130, 130);
            $image_resize->save(public_path("assets/small_img/".$file_name));

            DB::table('positive_assamese_news')
                    ->where('id', $newsId)
                    ->update([
                        'image' => $file_name
                    ]);
        }
            
        return redirect()->back()->with('msg', 'News has been updated.');  
    }

    public function changeStatus($newsId, $status) {
        DB::table('positive_assamese_news')
                ->where('id', $newsId)
                ->update([
                    'status' => $status
                ]);
        return redirect()->back();
    }

    public function deleteNews($newsId) {

        $news = DB::table('positive_assamese_news')
                    ->where('id', $newsId)
                    ->get();

        File::delete(public_path("assets/big_img/".$news[0]->image));
        File::delete(public_path("assets/medium_img/".$news[0]->image));
        File::delete(public_path("assets/small_img/".$news[0]->image));

        DB::table('positive_assamese_news')
                    ->where('id', $newsId)
                    ->delete();
            
        return redirect()->back();  
    }
}
