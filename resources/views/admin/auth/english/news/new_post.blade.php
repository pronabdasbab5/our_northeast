@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>English News Post</h2>
            <div class="clearfix"></div>
            <center>
                @if(session()->has('msg'))
                    <b>{{ session()->get('msg') }}</b>
                @endif
            </center>
          </div>
          <div class="x_content"><br />
                <form method="POST" action="{{ route('english_add_news_post') }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Top-Category</label>
                                <select class="form-control" name="top_category" id="top_category">
                                    <option selected disabled>Select Top-Category</option>
                                    @if(isset($allEtcategory))
                                        @foreach($allEtcategory as $allc)
                                            <option value="{{$allc->id}}" {{ old('top_category') == $allc->id ? 'selected' : '' }}>{{ $allc->top_category }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($errors->has('top_category'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('top_category') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Sub-Category</label>
                                <select class="form-control" name="sub_category" id="sub_category">
                                    <option selected disabled>Select Sub-Category</option>
                                </select>
                                @if($errors->has('sub_category'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('sub_category') }}</strong>
                                    </span>
                                @enderror
                            </div>  
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Image Upload</label>
                                <input type="file" class="form-control" name="file" accept="/*">
                                @if($errors->has('file'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Heading</label>
                                <input type="text" class="form-control" value="{{ old('heading') }}" name="heading" placeholder="Heading">
                                @if($errors->has('heading'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('heading') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                <label for="category">Author</label>
                                <input type="text" class="form-control" value="{{ old('author') }}" name="author" placeholder="Author">
                                @if($errors->has('author'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @enderror
                            </div>   
                            <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                <label for="category">Timing</label>
                                <input type="text" class="form-control" value="{{ old('time') }}" name="time" placeholder="Timing">
                                @if($errors->has('time'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @enderror
                            </div>                                
                        </div>
                    </div>
                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Short Description</label>
                                <textarea class="form-control" id="post_desc" name="short_desc" placeholder="Short Description">{{ old('short_desc') }}</textarea>
                                @if($errors->has('short_desc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('short_desc') }}</strong>
                                    </span>
                                @enderror
                            </div>                                 
                        </div>
                    </div>
                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Long Description</label>
                                <textarea class="form-control" id="post_desc1" name="long_desc" placeholder="Long Description">{{ old('long_desc') }}</textarea>
                                @if($errors->has('long_desc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('long_desc') }}</strong>
                                    </span>
                                @enderror
                            </div>                                 
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-primary text-bold">Create & Publish Post</button>
                      </div>
                    </div>
                </form> 
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
@section("script")
<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('post_desc');
    CKEDITOR.replace('post_desc1');
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#top_category').change(function(){
        var category_id = $('#top_category').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $.ajax({
            url: "{{ url('retrive_sub_category_english/') }}/"+category_id,
            method: "POST",
            data: {'category_id': category_id},
            success: function(response) {
                $('#sub_category').html(response);
            }
        });
    });
});
</script>
@endsection