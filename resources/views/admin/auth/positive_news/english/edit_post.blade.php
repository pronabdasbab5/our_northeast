@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit English Positive News Post</h2>
            <div class="clearfix"></div>
            <center>
                @if(session()->has('msg'))
                    <b>{{ session()->get('msg') }}</b>
                @endif
            </center>
          </div>
          <div class="x_content"><br />
                <form method="POST" action="{{ route('update_english_positive_news', ['newsId' => $news[0]->id]) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10"> 
                            <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Image Upload</label>
                                <input type="file" class="form-control" name="file" accept="/*">
                                @if($errors->has('file'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Heading</label>
                                <input type="text" class="form-control" value="{{ $news[0]->heading }}" name="heading" placeholder="Heading">
                                @if($errors->has('heading'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('heading') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Author</label>
                                <input type="text" class="form-control" value="{{ $news[0]->author }}" name="author" placeholder="Author">
                                @if($errors->has('author'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @enderror
                            </div>   
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Time</label>
                                <input type="text" class="form-control" value="{{ $news[0]->time }}" name="time" placeholder="Time">
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
                                <textarea class="form-control" name="short_desc" placeholder="Short Description">{{ $news[0]->short_desc }}</textarea>
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
                                <textarea class="form-control description" name="long_desc" placeholder="Long Description">{{ $news[0]->long_desc }}</textarea>
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
                        <button type="submit" name="submit" class="btn btn-primary text-bold">Update Post</button>
                        <button type="submit" name="submit" class="btn btn-warning text-bold" onclick="window.close();">Close</button>
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
@endsection