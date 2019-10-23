<?php

namespace App\Http\Controllers\Auth\English\TCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ETCategory\ETCategory;
use App\Models\ESCategory\ESCategory;

class TCategoryController extends Controller
{
    public function allTCategory() {
    	$etcategory    = new ETCategory;
    	$allEtcategory = $etcategory->all();
    	return view('admin.auth.english.tcategory.all_tcategory', ['allEtcategory' => $allEtcategory]);
    }

    public function showTCategoryEditForm($tcategoryId) {
    	$etcategory     = new ETCategory;
    	$etcategoryData = $etcategory->findOrFail($tcategoryId);
    	return view('admin.auth.english.tcategory.edit_tcategory', ['etcategoryData' => $etcategoryData]);
    }

    public function updateTCategory(Request $request, $tcategoryId) {
        $etcategory = new ETCategory;
        $etcategory->where('id', $tcategoryId)
                    ->update(['top_category' => strtoupper(strtolower($request->input('etcategory_name')))]);
        return redirect()->back();
    }

    public function showSCategoryForm($tcategoryId) {
        $etcategory     = new ETCategory;
        $etcategoryData = $etcategory->findOrFail($tcategoryId);

        return view('admin.auth.english.tcategory.new_subcategory', ['etcategoryData' => $etcategoryData]);
    }

    public function addSubCategory(Request $request, $tcategoryId) {
        $request->validate([
            'sub_category' => 'required'
        ],
        [   'sub_category.required' => 'Sub-Category name is required'
        ]);

        $escategory = new ESCategory;
        $escategory->top_category_id = $tcategoryId;
        $escategory->sub_category    = strtoupper(strtolower($request->input('sub_category')));

        if($escategory->save())
            return redirect()->back()->with('msg', 'Sub-Category has been added successfully');
        else
            return redirect()->back()->with('msg', 'Something wrong while adding');
    }
}
