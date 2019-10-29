@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Assamese News</h2>
            <div class="clearfix"></div>
            <center>
                @if(session()->has('msg'))
                    <b>{{ session()->get('msg') }}</b>
                @endif
            </center>
          </div>
          <div class="x_content"><br />
                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Top-Category : </label>
                                <b>{{ $data['top_category'] }}</b>
                            </div>  
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Heading : </label>
                                <b>{{ $data['heading'] }}</b>
                            </div>                                 
                        </div>
                    </div>
                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-8 col-sm-8 col-xs-12 mb-3">
                                <label for="category">Short Description : </label>
                                <b>{!! $data['short_desc'] !!}</b>
                            </div> 
                            <div class="col-md-4 col-sm-4 col-xs-12 mb-3">
                                <img src="{{ route('assamese_lcr_news_cover_image', ['file_name' => $data['image']]) }}">
                            </div>                                
                        </div>
                    </div>
                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Long Description</label>
                                <b>{!! $data['long_desc'] !!}</b>
                            </div>                                 
                        </div>
                    </div>
                    </div>
                    <button class="btn btn-primary" style="font-weight: bold;" onclick="window.close();">Close</button>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
@section("script")

@endsection