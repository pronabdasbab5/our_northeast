@extends('website.template.emaster')
<!-- Head & Header Section -->
@section('content') 
 <!-- Slider Section Start Here -->
    <section class="mobile-slider">
        <div class="container">
            <div class="row">   
                <!-- Slider Area End Here-->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 paddimg-left-none paddimg-right-none trending-news">
                    <div class="view-area">
                        <h3 class="">LATEST NEWS</h3>
                    </div>
                    @if(count($english_second_latest_tow_records) > 0)
                        @foreach($english_second_latest_tow_records as $key => $item)
                            <div class="list-col">
                                <a href="news-details.php"> <img src="{{ asset('assets/medium_img/'.$item->image.'') }}" alt="" title="Trending image" width="370" height="230"></a>
                                <div class="dsc">
                                    <p><a class="line-clamp-2" href="news-details.php">{{ $item->heading }} </a></p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>         
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-0">
                    <div id="news-Carousel" class="carousel carousel-news slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <!-- Left and right controls -->
                        <div class="">
                            <div class="row overflowing-row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="view-area">
                                        <h3 class="">POSITIVE NEWS</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-inner">
                            @if(count($latest_english_positive_news) > 0)
                                @php
                                    $slide_active_cnt = 1;
                                @endphp
                                <!-- Item -->
                                @foreach($latest_english_positive_news as $key => $item)
                                    <div class="item {{ ($slide_active_cnt == 1)? 'active': 'next' }} left">
                                        <a href="news-details.php"><img src="{{ asset('assets/positive_news_index_page/'.$item->image.'') }}" alt="" title="#slider-direction-1"></a>
                                        <div class="dsc">
                                            <span class="date">
                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}
                                            </span>
                                            <!-- <span class="comment">
                                                <a href="news-details.php"> <i class="fa fa-comment-o" aria-hidden="true"></i> 50
                                                </a>
                                            </span> -->
                                            <span class="duration"><a href="news-details.php"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }}</a></span>
                                            <h4><a class="line-clamp-2" href="news-details.php"> {{ $item->heading }}</a></h4>
                                            <p class="line-clamp-2">{{ $item->short_desc }}</p>
                                        </div>
                                    </div>  
                                    @php
                                        $slide_active_cnt++;
                                    @endphp
                                @endforeach
                            @endif
                                <!-- Item -->   
                            <!-- nav -->
                            <div class="fixed next-prev-top">   
                                <div class="next-prev">
                                    <a class="left news-control" href="#news-Carousel" data-slide="prev">
                                        <span class="news-arrow-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                    </a>
                                    <a class="right news-control" href="#news-Carousel" data-slide="next">
                                        <span class="news-arrow-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                    </a>
                                </div> 
                            </div>     
                        </div>
                    </div>
                </div>
                <!-- Slider Area End Here-->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 paddimg-left-none paddimg-right-none trending-news">
                    <div class="view-area">
                        <h3 class="">LATEST NEWS</h3>
                    </div>
                    @if(count($english_second_latest_tow_records) > 0)
                        @foreach($english_second_latest_tow_records as $key => $item)                    
                            <div class="list-col">
                                <a href="news-details.php"> <img src="{{ asset('assets/medium_img/'.$item->image.'') }}" alt="" title="Trending image" width="370" height="230"></a>
                                <div class="dsc">
                                    <p><a class="line-clamp-3" href="news-details.php">{{ $item->heading }} </a></p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Slider Section end Here -->
    <div class="divider-bar"></div>
    <!-- Fetuered videos Start Here -->
    <div class="fetuered-videos hot-news">
        <div class="container">
            <div class="row" style="padding: 10px; border: 1px solid lightgrey;">
                <div class="featured-videos-section-new news-post">
                    <div class="col-sm-5"> 
                        <div class="single-videos">
                            <div class="images">
                                <a href="#"><iframe width="100%" height="270px" src="https://www.youtube.com/embed/{{ $latest_video->videoId }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></a>
                                <div class="overley">
                                    <div class="videos-icon">
                                        <a class="popup-videos" href="http://www.youtube.com/watch?v={{ $latest_video->videoId }}"><img src="{{asset('web/images/fetuered/video-icon.png') }}" alt=""></a>                           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 content">
                        <div class="view-area">
                            <h3 style="margin:0;padding: 6px 14px;width: 37%;background: #eaea4c;text-align: center;">Video</h3>
                        </div>
                        <h4>
                            <a href="news-details.php">{{ $latest_video->title }}</a>
                        </h4>
                        <span class="author">
                            <a href=""><i class="fa fa-user-o" aria-hidden="true"></i> {{ $latest_video->author }}</a>
                        </span>
                        <span class="date">
                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($latest_video->created_at)->format('M d Y') }}
                        </span>
                        <!-- <span class="comment">
                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a>
                        </span> -->
                        <span class="duration">
                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 
                                {{ $latest_video->time }}
                            </a>
                        </span>
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
                                            <a class="popup-videos" href="http://www.youtube.com/watch?v={{ $item->videoId }}"><img src="{{asset('web/images/fetuered/video-icon.png') }}" alt=""></a>                           
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
    <!-- Count Section -->
    <section class="count">
        <div class="container">
            <div class="flex">
                <h3 style="margin: 0;">10,00,000<br>video view and counting</h3>
                <a href="#" class="btn">Join</a>
                <a href="Donate" class="btn">Donate</a>
            </div>
        </div>
    </section>
    <!-- Count Section -->
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
                                <div class="view-area">
                                    <div class="row">
                                        <div class="col-sm-8"> 
                                            <h3 style="margin:0;padding: 6px 14px;width: 37%;background: #eaea4c;text-align: center;">Latest News</h3>
                                        </div>
                                    </div>
                                </div>
                                <ul class="news-post news-feature-mb">
                                    @if(count($english_latest_four_records) > 0)
                                        @foreach($english_latest_four_records as $key => $item)
                                            <li>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4">
                                                        <a href="#"><img src="{{ asset('assets/medium_img/'.$item->image.'') }}" alt="News image" /></a>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-8 content">
                                                        <p class="catogory">{{ $item->sub_category }}</p>
                                                        <h4><a class="line-clamp-3" href="#">{{ $item->heading }}</a></h4>
                                                        <span class="author"><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $item->author }}</a></span> 
                                                        <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($latest_video->created_at)->format('M d Y') }}</span>
                                                        <span class="duration"><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }}</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <a href="{{ route('english.all_news_list') }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i>  View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End what’s hot now -->
                </div>
                <!--Sidebar Start Here -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none sidebar-latest">
                    <!--Facebook Page Start Here -->
                    <div class="sidebar popular">
                        <div class="view-area">
                            <div class="row">
                                <div class="col-sm-8">                                     
                                    <h3 style="margin:0;padding: 6px 14px;width: 90%;background: #eaea4c;text-align: center;">Facebook Page</h3>
                                </div>
                                <div class="col-sm-4 text-right">

                                </div>
                            </div>
                        </div>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F1ournortheast%2F&tabs=timeline&width=375&height=800&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=318843728990066" width="375" height="800" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                    <!--Facebook Page End Here -->         
                </div>
            </div>
        </div>
    </div>
    <!-- All News Section End Here -->
@endsection