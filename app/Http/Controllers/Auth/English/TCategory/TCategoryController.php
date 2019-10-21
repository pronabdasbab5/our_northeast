<?php

namespace App\Http\Controllers\Auth\English\TCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ETCategory\ETCategory;

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
}
