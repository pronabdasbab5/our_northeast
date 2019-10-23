<?php

namespace App\Http\Controllers\Auth\Assamese\TCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ATCategory\ATCategory;
use App\Models\ASCategory\ASCategory;

class TCategoryController extends Controller
{
    public function allTCategory() {
    	$atcategory    = new ATCategory;
    	$allAtcategory = $atcategory->all();
    	return view('admin.auth.assamese.tcategory.all_tcategory', ['allAtcategory' => $allAtcategory]);
    }

    public function showTCategoryEditForm($tcategoryId) {
    	$atcategory     = new ATCategory;
    	$atcategoryData = $atcategory->findOrFail($tcategoryId);
    	return view('admin.auth.assamese.tcategory.edit_tcategory', ['atcategoryData' => $atcategoryData]);
    }

    public function updateTCategory(Request $request, $tcategoryId) {
        $atcategory = new ATCategory;
        $atcategory->where('id', $tcategoryId)
                    ->update(['top_category' => $request->input('atcategory_name')]);
        return redirect()->back();
    }

    public function showSCategoryForm($tcategoryId) {
        $atcategory     = new ATCategory;
        $atcategoryData = $atcategory->findOrFail($tcategoryId);

        return view('admin.auth.assamese.tcategory.new_subcategory', ['atcategoryData' => $atcategoryData]);
    }

    public function addSubCategory(Request $request, $tcategoryId) {
        $request->validate([
            'sub_category' => 'required'
        ],
        [   'sub_category.required' => 'Sub-Category name is required'
        ]);

        $ascategory = new ASCategory;
        $ascategory->top_category_id = $tcategoryId;
        $ascategory->sub_category    = $request->input('sub_category');

        if($ascategory->save())
            return redirect()->back()->with('msg', 'Sub-Category has been added successfully');
        else
            return redirect()->back()->with('msg', 'Something wrong while adding');
    }
}
