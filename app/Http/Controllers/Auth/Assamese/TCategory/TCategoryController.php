<?php

namespace App\Http\Controllers\Auth\Assamese\TCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ATCategory\ATCategory;

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
}
