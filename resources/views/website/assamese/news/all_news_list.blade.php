@extends('website.template.amaster')
<!-- Head & Header Section -->
@section('content')
 <div class="positive-news">
        <div class="container">
            <div class="row">
              <!--   <div class="col-md-12">
                    <center>
                        <h3>News List</h3>
                        
                    </center>
                </div> -->
            </div>
        </div>
<!--         <div class="h-line"></div>
-->    </div>
<div class="blog-page-area gallery-page category-page" style="padding-top: 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                <div class="row">
                    @if(count($assamese_latest_tow_records) > 0)
                        @foreach($assamese_latest_tow_records as $key => $item)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="blog-image-gap">
                                    <li>
                                        <h3><a class="line-clamp-1" href="{{ route('news_detail', ['news_id' => encrypt($item->id) ]) }}">{{ $item->heading }}</a></h3>
                                        <span class="author"><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $item->author }}</a></span>
                                        <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</span>
                                        
                                        <span class="duration" style="padding-left: 10px;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }} </span>
                                        <div class="blog-image">
                                            <a href="{{ route('news_detail', ['news_id' => encrypt($item->id) ]) }}">
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                                <img src="{{ asset('assets/big_img/'.$item->image.'') }}" alt="category photo">
                                            </a>
                                        </div>
                                    </li>
                                </ul>        
                            </div> 
                        @endforeach
                    @endif  
                </div>                       
            </div>
        </div>
    </div>
</div>
<!-- All News Section Start Here -->
<div class="all-news-area">
    <div class="container">
        <!-- latest news Start Here -->
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 tab-home">
                <!--Start what’s hot now -->
                <div class="hot-news">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="news-post news-feature-mb">
                                @if(count($all_assamese_news) > 0)
                                        @foreach($all_assamese_news as $key => $item)
                                            <li>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4">
                                                        <a href="{{ route('news_detail', ['news_id' => encrypt($item->id) ]) }}"><img src="{{ asset('assets/medium_img_index_page/'.$item->image.'') }}" alt="News image" /></a>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-8 content">
                                                    	<p class="catogory">{{ $item->sub_category }}</p>
                                                        <h4><a href="{{ route('news_detail', ['news_id' => encrypt($item->id) ]) }}">{{ $item->heading }}</a></h4>
                                                        <span class="author"><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $item->author }}</a></span> 
                                                        <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }} </span>
                                                        <span class="duration" style="padding-left: 10px;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }} </span>
                                                        
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End what’s hot now -->
            </div>
            <!--Sidebar Start Here -->
        </div>
    </div>
</div>
<!-- All News Section End Here -->
<!-- pagination starts -->
<div class="container text-right">
    <!-- <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    	</ul>
	</nav> -->
	@if(count($all_assamese_news) > 0)
        {{ $all_assamese_news->links() }}
    @endif
</div>
@endsection