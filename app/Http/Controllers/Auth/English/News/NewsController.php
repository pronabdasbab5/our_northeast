<?php

namespace App\Http\Controllers\Auth\English\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ETCategory\ETCategory;
use App\Models\ESCategory\ESCategory;
use App\Models\ENews\ENews;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Response;
use DB;

class NewsController extends Controller
{
    public function newPost() {
    	$etcategory    = new ETCategory;
    	$allEtcategory = $etcategory->all();
    	return view('admin.auth.english.news.new_post', ['allEtcategory' => $allEtcategory]);
    }

    public function retriveSubCategory($top_category_id) {
    	$escategory       = new ESCategory;
    	$subcategory_data = $escategory->where('top_category_id', $top_category_id)
    									->get(); 	
    	if(count($subcategory_data) > 0) {
    		$data = "<option selected disabled>Choose Sub-Category</option>";  
    		foreach ($subcategory_data as $key => $value) {
	    		$data = $data."<option value=".$value['id'].">".$value['sub_category']."</option>";
	    	}
    	} else
    		$data = "<option>No need to select category</option>";

    	print $data;
    }

    public function addPost(Request $request) {
    	$request->validate([
    		'top_category' => 'required|numeric',
    		'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    		'heading'      => 'required',
    		'short_desc'   => 'required',
    		'long_desc'    => 'required',
    	]);

        $enews = new ENews;
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

            $enews->top_category_id = ucwords($request->input('top_category'));
            $enews->image           = $file_name;
            $enews->heading         = $request->input('heading');
            $enews->short_desc      = $request->short_desc;
            $enews->long_desc       = $request->long_desc;

            if($enews->save()){
                if(is_numeric($request->has('sub_category'))){
                    $enews->where('id', $enews->id)
                            ->update(['sub_category' => $request->input('sub_category')]);
                }
                return redirect()->back()->with('msg', 'News has been publish successfully');
            }
            else
                return redirect()->back()->with('msg', 'Something wrong while adding'); 
        } else
            return redirect()->back()->with('msg', 'Please ! upload image.');  
    }

    public function allPost() {
        return view('admin.auth.english.news.all_news');
    }

    public function allPostData(Request $request) {

        $enews = new ENews;

        $columns = array( 
                            0 => 'id', 
                            1 => 'topCategory',
                            2 => 'subCategory',
                            3 => 'heading',
                            4 => 'date',
                            5 => 'status',
                            6 => 'action',
                        );

        $totalData = $enews->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))) {            
            
            $news_data = $enews
                            ->join('english_top_category', 'english_news.top_category_id', '=', 'english_top_category.id')
                            ->leftJoin('english_sub_category', 'english_news.sub_category_id', '=', 'english_sub_category.id')
                            ->select('english_news.*', 'english_top_category.top_category', 'english_sub_category.sub_category')
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        }
        else {

            $search = $request->input('search.value'); 

            $news_data = $enews
                            ->join('english_top_category', 'english_news.top_category_id', '=', 'english_top_category.id')
                            ->leftJoin('assamese_sub_category', 'english_news.sub_category_id', '=', 'english_sub_category.id')
                            ->select('english_news.*', 'english_top_category.top_category', 'english_sub_category.sub_category')
                            ->where('english_news.heading','LIKE',"%{$search}%")
                            ->orWhere('english_top_category.top_category', 'LIKE',"%{$search}%")
                            ->orWhere('english_sub_category.sub_category', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();    

            $totalFiltered = $enews
                            ->join('english_top_category', 'english_news.top_category_id', '=', 'english_top_category.id')
                            ->leftJoin('assamese_sub_category', 'english_news.sub_category_id', '=', 'english_sub_category.id')
                            ->select('english_news.*', 'english_top_category.top_category', 'english_sub_category.sub_category')
                            ->where('english_news.heading','LIKE',"%{$search}%")
                            ->orWhere('english_top_category.top_category', 'LIKE',"%{$search}%")
                            ->orWhere('english_sub_category.sub_category', 'LIKE',"%{$search}%")
                            ->count();
        }

        $data = array();

        if(!empty($news_data)) {

            $cnt = 1;

            foreach ($news_data as $single_data) {

                $action = "";

                if($single_data->status == 1){
                    $val = "<a class=\"btn btn-success\">Published</a>";
                    $action = "<a class=\"btn btn-primary\" href=\"".route('view_english_news', ['newsId' => $single_data->id])."\" target=\"_blank\">view</a><a class=\"btn btn-warning\" href=\"".route('edit_english_news', ['newsId' => $single_data->id])."\" target=\"_blank\">Edit</a><a class=\"btn btn-success\" href=\"".route('change_english_news_status', ['newsId' => $single_data->id, 'status' => 0])."\">Un-Publish</a><a class=\"btn btn-danger\" href=\"".route('delete_english_news', ['newsId' => $single_data->id])."\">Delete</a>";
                }
                else {
                    $val = "<a class=\"btn btn-success\">Un-Publish</a>";
                    $action = "<a class=\"btn btn-primary\" href=\"".route('view_english_news', ['newsId' => $single_data->id])."\" target=\"_blank\">view</a><a class=\"btn btn-warning\" href=\"".route('edit_english_news', ['newsId' => $single_data->id])."\" target=\"_blank\">Edit</a><a class=\"btn btn-success\" href=\"".route('change_english_news_status', ['newsId' => $single_data->id, 'status' => 1])."\">Publish</a><a class=\"btn btn-danger\" href=\"".route('delete_english_news', ['newsId' => $single_data->id])."\">Delete</a>";
                }

                $nestedData['id']          = $cnt;
                $nestedData['topCategory'] = $single_data->top_category;
                $nestedData['subCategory'] = $single_data->sub_category;
                $nestedData['heading']     = $single_data->heading;
                $nestedData['date']        = current(explode(" ", current(explode('T', $single_data->created_at))));
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
        $enews = new ENews;
        $data  = $enews->where('english_news.id', $newsId)
                    ->join('english_top_category', 'english_news.top_category_id', '=', 'english_top_category.id')
                    ->leftJoin('english_sub_category', 'english_news.sub_category_id', '=', 'english_sub_category.id')
                    ->select('english_news.*', 'english_top_category.top_category', 'english_sub_category.sub_category')
                    ->get();

       foreach ($data as $key => $value) {

            if($value['status'] == 1)
                $status = "Published";
            else 
                $status = "Un-Publish";

            $data = [
                'top_category' => $value['top_category'],
                'sub_category' => $value['sub_category'],
                'heading'      => $value['heading'],
                'image'        => $value['image'],
                'short_desc'   => $value['short_desc'],
                'long_desc'    => $value['long_desc'],
                'status'       => $status,
                'date'         => current(explode(" ", $value['created_at']))
            ];
       }

        return view('admin.auth.english.news.view_news', ['data' => $data]);
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
        $news = DB::table('english_news')
                    ->where('id', $newsId)
                    ->get();
        $etcategory = DB::table('english_top_category')
                            ->get();
        $escategory = DB::table('english_sub_category')
                            ->where('top_category_id', $news[0]->top_category_id)
                            ->get();
        return view('admin.auth.english.news.edit_post', ['news' => $news, 'etcategory' => $etcategory, 'escategory' => $escategory]);
    }

    public function updateNews(Request $request, $newsId) {
        $request->validate([
            'top_category' => 'required|numeric',
            'file'         => 'image|mimes:jpeg,png,jpg,gif,svg',
            'heading'      => 'required',
            'short_desc'   => 'required',
            'long_desc'    => 'required',
        ]);

        $news = DB::table('english_news')
                    ->where('id', $newsId)
                    ->get();

        DB::table('english_news')
                    ->where('id', $newsId)
                    ->update([
                        'top_category_id' => $request->input('top_category'),
                        'heading' => $request->input('heading'),
                        'short_desc' => $request->input('short_desc'),
                        'long_desc' => $request->input('long_desc'),
                    ]);

        if ($request->has('sub_category')) {
            DB::table('english_news')
                    ->where('id', $newsId)
                    ->update([
                        'sub_category_id' => $request->input('sub_category')
                    ]);
        }

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

            DB::table('english_news')
                    ->where('id', $newsId)
                    ->update([
                        'image' => $file_name
                    ]);
        }
            
        return redirect()->back()->with('msg', 'News has been updated.');  
    }

    public function changeStatus($newsId, $status) {
        DB::table('english_news')
                ->where('id', $newsId)
                ->update([
                    'status' => $status
                ]);
        return redirect()->back();
    }

    public function deleteNews($newsId) {

        $news = DB::table('english_news')
                    ->where('id', $newsId)
                    ->get();

        File::delete(public_path("assets/big_img/".$news[0]->image));
        File::delete(public_path("assets/medium_img/".$news[0]->image));
        File::delete(public_path("assets/small_img/".$news[0]->image));

        DB::table('english_news')
                    ->where('id', $newsId)
                    ->delete();
            
        return redirect()->back();  
    }
}
