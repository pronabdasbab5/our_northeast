<?php

namespace App\Http\Controllers\Auth\Assamese\SubCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ASCategory\ASCategory;
use App\Models\ATCategory\ATCategory;

class SubCategoryController extends Controller
{
    public function allSCategory() {
    	$ascategory        = new ASCategory;
    	$allascategoryData = $ascategory
    							->join('assamese_top_category', 'assamese_sub_category.top_category_id', '=', 'assamese_top_category.id')
    							->select('assamese_sub_category.*', 'assamese_top_category.top_category')
    							->get();
 
    	return view('admin.auth.assamese.scategory.all_sub_category', ['allascategoryData' => $allascategoryData]);
    }

    public function showSCategoryEditForm($scategoryId) {
    	$atcategory        = new ATCategory;
    	$allatcategoryData = $atcategory->all();
    	$ascategory        = new ASCategory;
    	$ascategoryData    = $ascategory->findOrFail($scategoryId);
    	return view('admin.auth.assamese.scategory.edit_acategory', ['ascategoryData' => $ascategoryData, 'allatcategoryData' => $allatcategoryData]);
    }

    public function updateSCategory(Request $request, $scategoryId) {
    	$request->validate([
    		'atcategory_name' => 'required|numeric',
    		'ascategory_name' => 'required'
    	]);

        $ascategory = new ASCategory;
        $ascategory->where('id', $scategoryId)
                    ->update(['top_category_id' => $request->input('atcategory_name'), 'sub_category' => $request->input('ascategory_name')]);
        return redirect()->back();
    }
}
