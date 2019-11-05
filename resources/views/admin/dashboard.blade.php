
@extends('admin.layouts.dbapp')

@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                  <div class="count">
                    @php
                        if(!empty($total_english_news))
                           print $total_english_news;
                        else
                           print "0";
                    @endphp
                  </div>
                  <h3>Total</h3>
                  <p>English News</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                  <div class="count">
                     @php
                        if(!empty($total_assamese_news))
                           print $total_assamese_news;
                        else
                           print "0";
                     @endphp
                  </div>
                  <h3>Total</h3>
                  <p>Assamese News</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                  <div class="count">
                     @php
                        if(!empty($total_positive_news))
                           print $total_positive_news;
                        else
                           print "0";
                     @endphp
                  </div>
                  <h3>Total</h3>
                  <p>Positive News</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-youtube-play"></i></div>
                  <div class="count">
                     @php
                        if(!empty($total_video))
                           print $total_video;
                        else
                           print "0";
                     @endphp
                  </div>
                  <h3>Total</h3>
                  <p>Videos</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection
