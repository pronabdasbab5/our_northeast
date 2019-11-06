<?php

namespace App\Http\Controllers\Auth\JPeople;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class JPeopleController extends Controller
{
    public function allJPeopleForm() {
    	return view('admin.auth.join_people.all_join_people');
    }

    public function allJPeopleData(Request $request) {
        $columns = array( 
                            0 => 'id', 
                            1 => 'name',
                            2 => 'dob',
                            3 => 'gender',
                            4 => 'email',
                            5 => 'phone',
                            6 => 'address',
                            7 => 'district',
                            8 => 'state',
                            9 => 'zip_code',
                            10=> 'country',
                            11=> 'hear',
                            12=> 'join_date',
                            13=> 'action',
                        );

        $totalData = DB::table('joining_people')->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))) {            
            
            $people_data = DB::table('joining_people')
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        }
        else {

            $search = $request->input('search.value'); 

            $people_data = DB::table('joining_people')
                            ->where('f_name','LIKE',"%{$search}%")
                            ->orWhere('l_name','LIKE',"%{$search}%")
                            ->orWhere('email','LIKE',"%{$search}%")
                            ->orWhere('phone', 'LIKE',"%{$search}%")
                            ->orWhere('address_1', 'LIKE',"%{$search}%")
                            ->orWhere('dist', 'LIKE',"%{$search}%")
                            ->orWhere('state', 'LIKE',"%{$search}%")
                            ->orWhere('country', 'LIKE',"%{$search}%")
                            ->orWhere('zip', 'LIKE',"%{$search}%")
                            ->orWhere('dob', 'LIKE',"%{$search}%")
                            ->orWhere('gender', 'LIKE',"%{$search}%")
                            ->orWhere('hear', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();    

            $totalFiltered = DB::table('joining_people')
                            ->where('f_name','LIKE',"%{$search}%")
                            ->orWhere('l_name','LIKE',"%{$search}%")
                            ->orWhere('email','LIKE',"%{$search}%")
                            ->orWhere('phone', 'LIKE',"%{$search}%")
                            ->orWhere('address_1', 'LIKE',"%{$search}%")
                            ->orWhere('dist', 'LIKE',"%{$search}%")
                            ->orWhere('state', 'LIKE',"%{$search}%")
                            ->orWhere('country', 'LIKE',"%{$search}%")
                            ->orWhere('zip', 'LIKE',"%{$search}%")
                            ->orWhere('dob', 'LIKE',"%{$search}%")
                            ->orWhere('gender', 'LIKE',"%{$search}%")
                            ->orWhere('hear', 'LIKE',"%{$search}%")
                            ->count();
        }

        $data = array();

        if(!empty($people_data)) {
            $cnt = 1;

            foreach ($people_data as $single_data) {
                $action = "<a class=\"btn btn-danger\" href=\"".route('delete_jpeople', ['jpeople_id' => $single_data->id])."\">Delete</a>";

                $nestedData['id']       = $cnt;
                $nestedData['name']     = $single_data->f_name." ".$single_data->l_name;
                $nestedData['dob']      = $single_data->dob;
                $nestedData['gender']   = $single_data->gender;
                $nestedData['email']    = $single_data->email;
                $nestedData['phone']    = $single_data->phone;
                $nestedData['address']  = $single_data->address_1.", ".$single_data->address_2;
                $nestedData['district'] = $single_data->dist;
                $nestedData['state']    = $single_data->state;
                $nestedData['zip_code'] = $single_data->zip;
                $nestedData['country']  = $single_data->country;
                $nestedData['hear']     = $single_data->hear;
                $nestedData['join_date']= current(explode(" ", current(explode('T', $single_data->created_at))));
                $nestedData['action']   = $action;

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

    public function deleteJPeople ($jpeople_id) {
    	DB::table('joining_people')
    		->where('id', $jpeople_id)
    		->delete();

    	return redirect()->route('all_jpeople_form');
    }
}
