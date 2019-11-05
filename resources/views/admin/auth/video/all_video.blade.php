@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>All Videos</h2>
            <div class="clearfix"></div>
          </div>
            <div class="x_content"><br />
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Language</th>
                            <th>Title</th>
                            <th>Video</th>
                            <th>Author</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($all_video) > 0)
                            @php
                                $cnt = 1;
                            @endphp
                            @foreach($all_video as $key => $item)
                                <tr class="text-bold">
                                    <td>{{ $cnt++ }}</td>
                                    <td>
                                        @php
                                            if($item->langId == 1)
                                                print "Assamese";
                                            else
                                                print "English";
                                        @endphp
                                    </td>
                                    <td><a href="https://www.youtube.com/watch?v={{ $item->videoId }}" target="_blank">{{ $item->title }}</a></td>
                                    <td>{{ $item->videoId }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>{{ $item->time }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</td>
                                    <td><a href="{{ route('delete_video', ['videoId' => $item->id]) }}" class="btn btn-primary text-bold">Remove</a></td>
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
