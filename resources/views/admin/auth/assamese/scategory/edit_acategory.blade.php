@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Sub-Category</h2>
            <a href="{{ route('assamese_scategory') }}" style="float: right; font-weight: bolder; font-size: 18px;">All Sub-Category</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            <center>
                @if(session()->has('msg'))
                    <strong style="font-size: 16px;">{{ session()->get('msg') }}</strong>
                @endif
            </center>
            <!-- Section For New User registration -->
            <form method="POST" autocomplete="off" action="{{ route('admin.update_ascategory', ['scategoryId' => $ascategoryData->id]) }}" class="form-horizontal form-label-left">
                @csrf

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Top-Category Name : <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <select name="atcategory_name" class="form-control col-md-7 col-xs-12 text-bold" required> 
                    <option disabled selected>Choose Top-Category</option>
                    @if(count($allatcategoryData) > 0)
                        @foreach($allatcategoryData as $key => $value)
                            @if($value['id'] == $ascategoryData->top_category_id)
                                <option value="{{ $value['id'] }}" selected>{{ $value['top_category'] }}</option>
                            @else
                                <option value="{{ $value['id'] }}">{{ $value['top_category'] }}</option>
                            @endif
                        @endforeach
                    @endif
                  </select>
                    @error('atcategory_name')
                        {{ $message }}
                    @enderror
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Sub-Category Name : <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" name="ascategory_name" value="{{ $ascategoryData->sub_category }}" class="form-control col-md-7 col-xs-12 text-bold" placeholder="Sub-Category Name">
                    @error('ascategory_name')
                        {{ $message }}
                    @enderror
                </div>
              </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-primary text-bold">Update Sub-Category</button>
                    <a href="{{ route('assamese_scategory') }}" class="btn btn-warning">Back</a>
                  </div>
                </div>
            </form>
            <!-- End New User registration -->
            </div>
          </div>
        </div>
      </div>
</div>
@endsection