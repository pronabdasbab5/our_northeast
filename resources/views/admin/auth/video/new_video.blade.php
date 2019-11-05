@extends('admin.layouts.dbapp')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>New Video</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            <center>
                @if(session()->has('msg'))
                    <strong style="font-size: 16px;">{{ session()->get('msg') }}</strong>
                @endif
            </center>
            <!-- Section For New User registration -->
            <div class="well">
                 <form method="POST" autocomplete="off" action="{{ route('add_video') }}" class="form-horizontal form-label-left">
                @csrf

                <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Language : <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <select name="lang_id" class="form-control col-md-7 col-xs-12 text-bold" required>
                      <option>Choose Language</option>
                      <option value="1">Assamese</option>
                      <option value="2">English</option>
                  </select>
                    @error('lang_id')
                        {{ $message }}
                    @enderror
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Title : <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" name="title" class="form-control col-md-7 col-xs-12 text-bold" placeholder="Enter Title">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Video ID : <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" name="video_id" class="form-control col-md-7 col-xs-12 text-bold" placeholder="Video ID">
                    @error('video_id')
                        {{ $message }}
                    @enderror
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Author : <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" name="author" class="form-control col-md-7 col-xs-12 text-bold" placeholder="Author">
                    @error('author')
                        {{ $message }}
                    @enderror
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Timing : <span class="required">*</span></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" name="time" value="{{ old('time') }}" class="form-control col-md-7 col-xs-12 text-bold" placeholder="Timing">
                    @error('time')
                        {{ $message }}
                    @enderror
                </div>
              </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-primary text-bold">Upload Video</button>
                  </div>
                </div>
            </form>
            </div>
            <!-- End New User registration -->
            </div>
          </div>
        </div>
      </div>
</div>
@endsection