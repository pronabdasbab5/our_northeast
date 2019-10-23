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

    public function showSCategoryEditForm($scategoryId) {
    	$etcategory        = new ETCategory;
    	$alletcategoryData = $etcategory->all();
    	$escategory        = new ESCategory;
    	$escategoryData    = $escategory->findOrFail($scategoryId);
    	return view('admin.auth.english.scategory.edit_ecategory', ['escategoryData' => $escategoryData, 'alletcategoryData' => $alletcategoryData]);
    }

    public function updateSCategory(Request $request, $scategoryId) {
    	$request->validate([
    		'etcategory_name' => 'required|numeric',
    		'escategory_name' => 'required'
    	]);

        $escategory = new ESCategory;
        $escategory->where('id', $scategoryId)
                    ->update(['top_category_id' => $request->input('etcategory_name'), 'sub_category' => strtoupper(strtolower($request->input('escategory_name')))]);
        return redirect()->back();
    }
}
