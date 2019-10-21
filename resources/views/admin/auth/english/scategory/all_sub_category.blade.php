@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>All Sub-Category</h2>
            <div class="clearfix"></div>
          </div>
            <div class="x_content"><br />
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Top-Category</th>
                            <th>Sub-Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($allescategoryData) > 0)
                            @php
                                $cnt = 1;
                            @endphp
                            @foreach($allescategoryData as $key => $value)
                                <tr class="text-bold">
                                    <td>{{ $cnt++ }}</td>
                                    <td>{{ $value->top_category }}</td>
                                    <td>{{ $value->sub_category }}</td>
                                    <td>
                                        <a href="{{ route('edit_etcategory', ['tcategoryId' => $value['id']]) }}" class="btn btn-primary text-bold">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
