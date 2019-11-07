<?php

namespace App\Http\Controllers\Website\JPeople;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class JPeopleController extends Controller
{
    public function showJPeopleForm() {
    	return view('website.join_people.join_people');
    }

    public function addPeople(Request $request) {
    	$request->validate([
    		'f_name'    => 'required',
    		'address_1' => 'required',
    		'dist'      => 'required',
    		'zip'       => 'required',
    		'd_o_b'     => 'required',
            'l_name'    => 'required',
            'phone'     => 'required',
            'state'     => 'required',
            'country'   => 'required',
            'gender'    => 'required',
            'hear'      => 'required',
    	]);

    	DB::table('joining_people')
    		->insert([
    			'f_name'     => $request->input('f_name'),
    			'l_name'     => $request->input('l_name'),
    			'email'      => $request->input('email'),
    			'phone'      => $request->input('phone'),
    			'address_1'  => $request->input('address_1'),
    			'address_2'  => $request->input('address_2'),
    			'dist'       => $request->input('dist'),
    			'state'      => $request->input('state'),
    			'zip'        => $request->input('zip'),
    			'country'    => $request->input('country'),
    			'dob'        => $request->input('d_o_b'),
    			'gender'     => $request->input('gender'),
    			'hear'       => $request->input('hear'),
    			'created_at' => now(),
    		]);

    	return redirect()->route('joining_people')->with('msg', 'Your request has been sent successfully');
    }
}
