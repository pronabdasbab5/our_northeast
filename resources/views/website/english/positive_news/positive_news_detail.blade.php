@extends('website.template.emaster')
<!-- Head & Header Section -->
@section('content')
<div class="positive-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <center>
                        <h3>Positive News</h3>
                        <p class="positive-news-text" style="margin-top: -25px; width: 500px;">Indian news is full of Negativity. Does it always have to be this way?<br>We don't think so. Let's spread positive news to the<br>youngest population on earth.</p>
                    </center>
                </div>
            </div>
        </div>
        <div class="h-line"></div>
    </div>
    <div class="single-blog-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="single-image">
                        <img src="{{ asset('assets/big_img/'.$positive_english_news_single_record[0]->image.'') }}" alt="Blog single photo">
                    </div>
                    <h3><a href="{{ route('english_positive_news_detail', ['positive_news_id' => encrypt($positive_english_news_single_record[0]->id) ]) }}">{{ $positive_english_news_single_record[0]->heading }}</a></h3>
                     <span class="author"><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $positive_english_news_single_record[0]->author }}</a></span>
                    <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($positive_english_news_single_record[0]->created_at)->format('M d Y') }}</span>
                    <span class="like"><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>  {{ $positive_english_news_single_record[0]->time }} </a></span>
                    <div style="display: inline-flex;" class="pull-right">
                        <div class="share-btn" style="padding-right: 8px;"><a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><img src="{{ asset('web/content/whatsapp.jpg')}}" width="65"></a></div>
                        <div class="share-btn" style="padding-right: 8px;"><a href="https://twitter.com/intent/tweet?text=Hello%20world"><img src="{{ asset('web/content/tweeter.jpg') }}" width="65"></a></div>
                        <div class="share-btn"><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"><img src="{{ asset('web/content/fb.jpg') }}" width="65"></a></div>
                    </div>
                    <p>
                    	{!! $positive_english_news_single_record[0]->long_desc !!}
                    </p>
                    <div class="admin">
                        <div class="col-md-3">
                            <img style="border-radius: 150px;" src="{{ asset('web/images/admin.jpg') }}" width="150" height="150" class="authimg">
                        </div>
                        <div class="col-md-9">
                            <h5><a style="color: black;" class="black" href="#">Admin </a></h5>
                            <p>There are innumerous news channels in the digital world today but OurNorthEast news channel will be
                                known for two ideas. (1) Firstly we will always give priority to Positive News First. This is the dream of the
                                former president of India Dr. Abdul Kalam. He first put forward this idea in 2006 after his visit to Israel. From
                                2019, OurNorthEast (ONE) news channel has started to fulfill his dream. (2) In the world full of bias news, we
                                have a Left-center-right section in our news channel where reader can have access to different points of
                            views in the same article and make an informed opinion.</p>
                        </div>
                    </div>
                    <div class="admin">
                        <div class="col-md-12">
                            <p>Your contribution will help us maintain the standards of journalism and to reach millions of young minds in North-East India. India is country with youngest population on earth. Do you want them to grow with Negative news everyday or with Positive News? You decide.</p>
                            <a href="#"><button class="btn" style="margin-bottom: 20px; background-color: #eaea4c; color: black; margin-right: 10px;">JOIN</button></a>
                            <a href="Donate"><button class="btn" style="margin-bottom: 20px; background-color: #eaea4c; color: black;">DONATE</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <!-- Blog Single Sidebar Start Here -->
                    <div class="sidebar-area">
                        <div class="recent-post-area hot-news">
                            <h3 style="margin:0; margin-bottom: 10px;padding: 6px 14px;width: 50%;background: #eaea4c;text-align: center;">Latest News</h3>
                            <ul class="news-post">
                            	@if(count($positive_english_latest_three_records) > 0)
                            		@foreach($positive_english_latest_three_records as $key => $item)
		                                <li>
		                                    <div class="row">
		                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
		                                            <div class="item-post">
		                                                <div class="row">
		                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-right-none">
		                                                        <a href="{{ route('english_positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}"><img src="{{ asset('assets/small_img/'.$item->image.'') }}" alt="" title="News image"></a>
		                                                    </div>
		                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		                                                        <h4><a href="{{ route('english_positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}"> {{ $item->heading }}</a></h4>
		                                                        <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</span>
		                                                        <span class="duration" style="padding-left: 5px;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }} </span>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </li> 
		                            @endforeach
		                        @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>
    <!-- Fetuered videos Start Here -->
    <div class="fetuered-videos hot-news">
        <div class="container">
            <div class="row">
                <div class="featured-videos-section-new news-post">

                    <div class="col-sm-6 content">
                        <div class="view-area">
                            <h3 style="margin:0;padding: 6px 14px;width: 37%;background: #eaea4c;text-align: center;">Video</h3>
                        </div>
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
        <h3 style="margin:0;padding: 6px 14px;width: 20%; margin-bottom: 10px; background: #eaea4c; text-align: center;">Positive News</h3>
        <div class="row" style="color: #101010;">
        	@if(count($latest_four_english_positive_news))
        		@foreach($latest_four_english_positive_news as $key => $item)
	            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                <div class="popular-post-img">
	                    <a href="{{ route('english_positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}"><img src="{{ asset('assets/medium_img/'.$item->image.'') }}" alt="Blog single photo"></a>                                   
	                </div>                                
	                <h3>
	                    <a href="{{ route('english_positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}">{{ $item->heading }}</a>
	                </h3>
	                <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</span>
	                <span class="duration" style="padding-left: 10px;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }} </span>
	            </div>
	            @endforeach
	        @endif
        </div>
    </div>
@endsection