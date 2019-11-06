@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Join People</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="all_assamese_news" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>District</th>
                            <th>State</th>
                            <th>Zip-Code</th>
                            <th>Country</th>
                            <th>Hear</th>
                            <th>Joining Date</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section("script")
<script type="text/javascript">
    
$(document).ready(function(){

    $('#all_assamese_news').DataTable({

        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('all_jpeople_data') }}",
            "dataType": "json",
            "type": "POST",
            "data":{ 
                _token: "{{csrf_token()}}"
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "dob" },
            { "data": "gender" },
            { "data": "email" },
            { "data": "phone" },
            { "data": "address" },
            { "data": "district" },
            { "data": "state" },
            { "data": "zip_code" },
            { "data": "country" },
            { "data": "hear" },
            { "data": "join_date" },
            { "data": "action" },
        ],    
    });
});
</script>
@endsection