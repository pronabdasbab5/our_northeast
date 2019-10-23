@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>New Sub-Category</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            <center>
                @if(session()->has('msg'))
                    <strong style="font-size: 16px;">{{ session()->get('msg') }}</strong>
                @endif
            </center>
            <!-- Section For New User registration -->
            <form method="POST" autocomplete="off" action="{{ route('add_escategory', ['tcategoryId' => $etcategoryData->id]) }}" class="form-horizontal form-label-left">
                @csrf

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Top-Category Name : <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" name="etcategory_name" value="{{ $etcategoryData->top_category }}" class="form-control col-md-7 col-xs-12 text-bold" placeholder="Top-Category Name" disabled readonly>
                    @error('etcategory_name')
                        {{ $message }}
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Sub-Category Name : <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" name="sub_category" class="form-control col-md-7 col-xs-12 text-bold" placeholder="Sub-Category Name">
                    @error('sub_category')
                        {{ $message }}
                    @enderror
                </div>
              </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-primary text-bold">Add Sub-Category</button>
                    <a href="{{ route('english_tcategory') }}" class="btn btn-warning">Back</a>
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