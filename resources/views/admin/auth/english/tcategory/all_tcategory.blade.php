@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>All Top-Category</h2>
            <div class="clearfix"></div>
          </div>
            <div class="x_content"><br />
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Top-Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($allEtcategory) > 0)
                            @php
                                $cnt = 1;
                            @endphp
                            @foreach($allEtcategory as $key => $value)
                                <tr class="text-bold">
                                    <td>{{ $cnt++ }}</td>
                                    <td>{{ $value->top_category }}</td>
                                    <td>
                                        <a href="{{ route('edit_etcategory', ['tcategoryId' => $value['id']]) }}" class="btn btn-primary text-bold">Edit</a>
                                        @if($value['status'] == 1)
                                            <a href="{{ route('new_escategory', ['tcategoryId' => $value['id']]) }}" class="btn btn-primary text-bold">New Sub-Category</a>
                                        @endif
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
