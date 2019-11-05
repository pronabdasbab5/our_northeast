@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Transform Assamese News</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="all_assamese_positive_news" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Top-Category</th>
                            <th>Heading</th>
                            <th>Author</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Status</th>
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

    $('#all_assamese_positive_news').DataTable({

        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('all_assamese_transform_news_post_data') }}",
            "dataType": "json",
            "type": "POST",
            "data":{ 
                _token: "{{csrf_token()}}"
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "topCategory" },
            { "data": "heading" },
            { "data": "author" },
            { "data": "time" },
            { "data": "date" },
            { "data": "status" },
            { "data": "action" },
        ],    
    });
});
</script>
@endsection