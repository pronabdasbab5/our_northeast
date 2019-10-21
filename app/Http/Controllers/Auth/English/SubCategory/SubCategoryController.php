<?php

namespace App\Http\Controllers\Auth\English\SubCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ESCategory\ESCategory;
use App\Models\ETCategory\ETCategory;

class SubCategoryController extends Controller
{
    public function allSCategory() {
    	$escategory        = new ESCategory;
    	$allescategoryData = $escategory
    							->join('english_top_category', 'english_sub_category.top_category_id', '=', 'english_top_category.id')
    							->select('english_sub_category.*', 'english_top_category.top_category')
    							->get();
 
    	return view('admin.auth.english.scategory.all_sub_category', ['allescategoryData' => $allescategoryData]);
    }
}
