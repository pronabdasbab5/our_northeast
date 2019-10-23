<?php

namespace App\Http\Controllers\Auth\Assamese\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ATCategory\ATCategory;
use App\Models\ASCategory\ASCategory;
use App\Models\ANews\ANews;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class NewsController extends Controller
{
    public function newPost() {
    	$atcategory    = new ATCategory;
    	$allAtcategory = $atcategory->all();
    	return view('admin.auth.assamese.news.new_post', ['allAtcategory' => $allAtcategory]);
    }

    public function retriveSubCategory($top_category_id) {
    	$ascategory       = new ASCategory;
    	$subcategory_data = $ascategory->where('top_category_id', $top_category_id)
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

        $anews = new ANews;
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

            $anews->top_category_id = ucwords($request->input('top_category'));
            $anews->image           = $file_name;
            $anews->heading         = $request->input('heading');
            $anews->short_desc      = $request->short_desc;
            $anews->long_desc       = $request->long_desc;

            if($anews->save()){
                if($request->has('sub_category')){
                    $anews->where('id', $anews->id)
                            ->update(['sub_category' => $request->input('sub_category')]);
                }
                return redirect()->back()->with('msg', 'News has been publish successfully');
            }
            else
                return redirect()->back()->with('msg', 'Something wrong while adding'); 
        } else
            return redirect()->back()->with('msg', 'Please ! upload image.');  
    }
}
