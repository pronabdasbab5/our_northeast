@extends('website.template.amaster')
<!-- Head & Header Section -->
@section('content')
<div class="positive-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h3>ইতিবাচক খবৰ</h3>
                        <p class="positive-news-text" style="margin-top: -20px; width: 500px;">ভাৰতীয় সংবাদ নিতবাচকতাৰ ভৰা। সদায়ই এনকয় চিল থািকবন ? আিম<br>তনক নাভাবা। আহক এই ধৰাৰ যৱু জৰ মাজত<br>ইিতবাচক খবৰবাৰ চাৰ কৰা।
                        </p>
                    </center>
                </div>
            </div>
        </div>
        <div class="h-line"></div>
    </div>
    <div class="blog-page-area gallery-page category-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                    <div class="row">
                    	@if(count($latest_tow_positive_assamese_news) > 0)
                        	@foreach($latest_tow_positive_assamese_news as $key => $item)
	                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                            <ul class="blog-image-gap">
	                                <li>
	                                    <h3><a class="line-clamp-2" href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}">{{ $item->heading }}</a></h3>
	                                    <span class="author"><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $item->author }}</a></span>
	                                    <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</span>
	                                    <span class="like"><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>  12 </a></span>
	                                    <span class="duration" style="padding-left: 10px;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }} </span>
	                                    <div class="blog-image">
	                                        <a href="blog-detail.php">
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
                                @if(count($all_positive_assamese_news) > 0)
                                    @foreach($all_positive_assamese_news as $key => $item)
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4">
                                                <a href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}"><img src="{{ asset('assets/medium_img_index_page/'.$item->image.'') }}" alt="News image" /></a>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-8 content">
                                                <h4><a class="line-clamp-4" href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}">{{ $item->heading }}</a></h4>
                                                <span class="author"><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $item->author }}</a></span> 
                                                <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</span>
                                                <span class="duration" style="padding-left: 10px;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }} </span>
                                                <br><br><a style="padding-top: 20px<br><a style="padding-top: 20px; color: red<br><a style="padding-top: 20px; color: blue;" href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}">READ MORE...</a>
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
                    @if(count($all_positive_assamese_news) > 0)
				        {{ $all_positive_assamese_news->links() }}
				    @endif
                </div>
                <!--Sidebar Start Here -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none sidebar-latest">
                </div>
            </div>
        </div>
    </div>
    <!-- All News Section End Here -->
    <!-- Fetuered videos Start Here -->
    <div class="fetuered-videos hot-news">
        <div class="container">
            <div class="view-area">
                <div class="row">
                    <div class="col-sm-8"> 
                        <h3 style="margin:0;padding: 6px 14px;width: 30%;background: #eaea4c;text-align: center;">Video</h3>
                    </div>
                </div>
            </div>
            <div id="featured-videos-section" class="mt-50 owl-carousel">
            	@if(count($all_video) > 0)
            		@foreach($all_video as $key => $item)
	                <div class="item" style="padding-right: 10px;">
	                    <div class="single-videos">
	                        <div class="images">
	                            <a href="#"><iframe width="100%" height="270px" src="https://www.youtube.com/embed/{{ $item->videoId }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></a>
	                            <div class="overley">
	                                <div class="videos-icon">
	                                    <a class="popup-videos" href="http://www.youtube.com/watch?v={{ $item->videoId }}"><img src="" alt=""></a>                           
	                                </div>
	                            </div>
	                        </div>                            
	                        <div class="videos-text">
	                            <h3><a href="#">{{ $item->title }}</a></h3>
	                            <span class="date"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }} </span>
	                            <span class="comment"><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }} </a></span>
	                        </div>
	                    </div>
	                </div>
	                @endforeach
	            @endif
            </div>
        </div>    
    </div>    
    <!-- Fetuered videos End Here -->
    <div class="like-section container">
        <h3 style="margin:0;padding: 6px 14px; margin-bottom: 10px; width: 20%;background: #eaea4c;text-align: center;">ইতিবাচক খবৰ</h3>
        <div class="row" style="color: #101010;">
        	@if(count($latest_four_assamese_positive_news))
        		@foreach($latest_four_assamese_positive_news as $key => $item)
	            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                <div class="popular-post-img">
	                    <a href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}"><img src="{{ asset('assets/medium_img/'.$item->image.'') }}" alt="Blog single photo"></a>                                   
	                </div>                                
	                <h3>
	                    <a class="line-clamp-2" href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}">{{ $item->heading }}</a>
	                </h3>
	                <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</span>
	                <span class="duration" style="padding-left: 10px;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }} </span>
	            </div>
	            @endforeach
	        @endif
        </div>
@endsection