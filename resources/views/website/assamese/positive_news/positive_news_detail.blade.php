<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Our NorthEast | Brings You The Truth</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web/images/fav.png') }}">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}">
    <!-- hover-min css -->
    <link rel="stylesheet" href="{{ asset('web/css/hover-min.css') }}">
    <!-- magnific-popup css -->
    <link rel="stylesheet" href="{{ asset('web/css/magnific-popup.css') }}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset('web/css/meanmenu.min.css') }}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.css') }}">
    <!-- lightbox css -->
    <link href="{{ asset('web/css/lightbox.min.css') }}" rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('web/css/custom.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}">
    <!-- modernizr js -->
    <script src="{{ asset('web/js/modernizr-2.8.3.min.js') }}"></script>

    <meta property="og:url" content="{{ route('positive_news_detail', ['positive_news_id' => encrypt($positive_assamese_news_single_record[0]->id) ]) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $positive_assamese_news_single_record[0]->heading }}" />
    <meta property="og:description" content="{{ $positive_assamese_news_single_record[0]->short_desc }}" />
    <meta property="og:image" content="{{ asset('assets/big_img/'.$positive_assamese_news_single_record[0]->image.'') }}" />
</head>

<body class="home">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
    <!--Header area start here-->
    <header>
        <div class="header-bottom-area" id="sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 flex">
                        <div class="navbar-header">
                            <div class="col-sm-8 col-xs-8 padding-null">
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                                 <span class="sr-only">Toggle navigation</span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                             </button>
                         </div>
                         <div class="col-sm-4 col-xs-4 hidden-desktop text-right search">
                            <a href="#search-mobile" data-toggle="collapse" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                            <div id="search-mobile" class="collapse search-box">
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </div>    
                    </div>
                    <div class="logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('web/images/logo-header.png') }}" style="padding-bottom: 5px; margin-left: -25px;"></a>
                    </div>
                    <div class="main-menu navbar-collapse collapse">
                        <nav>
                            <div class="lang hidden-lg">
                                <a href="{{ route('english.index') }}">English</a>
                                <a>|</a>
                                <a href="{{ route('index') }}">অসমীয়া</a>
                            </div>
                            <ul>
                                <li class="active hidden-lg"><a href="{{ route('index') }}" >হৌম</a></li>
                                <li class="active"><a href="{{ route('positive_news_list', ['top_category_id' => encrypt(1)]) }}" >ইতিবাচক খবৰ</a></li>
                                <li><a href="{{ route('left_center_right_news_list', ['top_category_id' => encrypt(2)]) }}">বাওঁ-কেন্দ্ৰ-সোঁ</a></li>
                                <li><a href="#" class="has">উত্তৰ পূৰ্বাঞ্চলৰ কেন্দ্ৰবিন্দু <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                    <ul class="sub-menu">
                                        @foreach($menu_data['north_east_sub_menu_item'] as $key => $value)
                                            <li><a href="{{ route('news_list', ['sub_category_id' => encrypt($value->id)]) }}">{{ $value->sub_category }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </li>
                            <li><a href="{{ route('transform_news_list', ['top_category_id' => encrypt(4)]) }}">পরিবর্তন</a></li>
                            <li><a href="#" class="has">অন্বেষণ <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                <ul class="sub-menu">
                                    @foreach($menu_data['explore_sub_menu_item'] as $key => $value)
                                        <li><a href="{{ route('news_list', ['sub_category_id' => encrypt($value->id)]) }}">{{ $value->sub_category }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="right-search-social-icons col-lg-4 col-md-2 col-sm-hidden col-xs-hidden text-right search hidden-mobile">
                <div class="lang">
                    <a href="{{ route('english.index') }}">English</a>
                    <a>|</a>
                    <a href="{{ route('index') }}">অসমীয়া</a>
                </div>
                <div class="social-media-area" style="float: left;float: left;margin-top: 11px;margin-left: 16px;">
                    <nav>
                        <ul>
                            <li><a href="#" class="active"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- <a href="#search" data-toggle="collapse" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a> -->
                        <!-- <div id="search" class=" search-box">
                            <input type="text" class="form-control" placeholder="Search...">
                        </div> -->
                    </div>                    
                </div>
            </div>
        </div>
    </header>  
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
    <div class="single-blog-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="single-image">
                        <img src="{{ asset('assets/big_img/'.$positive_assamese_news_single_record[0]->image.'') }}" alt="Blog single photo">
                    </div>
                    <h3><a href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($positive_assamese_news_single_record[0]->id) ]) }}">{{ $positive_assamese_news_single_record[0]->heading }}</a></h3>
                     <span class="author"><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $positive_assamese_news_single_record[0]->author }}</a></span>
                    <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($positive_assamese_news_single_record[0]->created_at)->format('M d Y') }}</span>
                    <span class="like"><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>  {{ $positive_assamese_news_single_record[0]->time }} </a></span>
                    <div style="display: inline-flex;" class="pull-right">
                        <div class="share-btn" style="padding-right: 8px;"><a rel="noopener noreferrer" onclick="ga('send', 'event', { eventCategory: 'whatsappStory', eventAction: 'click', eventLabel: 'sharebutton'});" target="_blank" title="share on whatsapp" class="whatsapp-desktop" href="https://web.whatsapp.com/send?text={{ route('positive_news_detail', ['positive_news_id' => encrypt($positive_assamese_news_single_record[0]->id) ]) }}" data-text="{{ route('positive_news_detail', ['positive_news_id' => encrypt($positive_assamese_news_single_record[0]->heading) ]) }}" data-href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($positive_assamese_news_single_record[0]->id) ]) }}"><button class="share-button whatsapp"><i class="fa fa-whatsapp">  Share</i></button></a></div>
                        <div class="share-btn" style="padding-right: 8px;"><iframe id="twitter-widget-1" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" style="position: static; visibility: visible; width: 60px; height: 20px;" title="Twitter Tweet Button" src="https://platform.twitter.com/widgets/tweet_button.0639d67d95b7680840758b6833f06d87.en.html#dnt=false&amp;id=twitter-widget-1&amp;lang=en&amp;original_referer=https%3A%2F%2Fdeveloper.twitter.com%2Fen%2Fdocs%2Ftwitter-for-websites%2Ftweet-button%2Foverview.html&amp;size=m&amp;text=Guides%20%E2%80%94%20Twitter%20Developers&amp;time=1566304093898&amp;type=share&amp;url={{ route('positive_news_detail', ['positive_news_id' => encrypt($positive_assamese_news_single_record[0]->id) ]) }}"></iframe></div>
                        <div class="share-btn"><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('positive_news_detail', ['positive_news_id' => encrypt($positive_assamese_news_single_record[0]->id) ]) }}&amp;src=sdkpreparse"><img src="{{ asset('web/content/fb.jpg') }}" width="65"></div>
                    </div>
                    <p>
                    	{!! $positive_assamese_news_single_record[0]->long_desc !!}
                    </p>
                    <div class="admin">
                        <div class="col-md-3">
                            <img style="border-radius: 150px;" src="{{ asset('web/images/admin.jpg') }}" width="150" height="150" class="authimg">
                        </div>
                        <div class="col-md-9">
                            <h5><a style="color: black;" class="black" href="#">Admin </a></h5>
                            <p>ডিজিটেল জগতত বহুতো সংবাদ মাধ্যম আছে কিন্তু আৱাৰ নৰ্থ ইষ্টৰ OurNorthEast (ONE) দুটা বিশেষত্ব থাকিব:- 
                                ১) প্ৰথমতে, আমি সদায় ইতিবাচক বাতৰিক প্ৰাধান্য দিম। এয়া দেশৰ প্ৰাক্তন ৰাষ্ট্ৰপতি এ পি জে আব্দুল কালামদেৱৰ সপোন আছিল। ২০০৬ত ইজৰাইল ভ্ৰমণৰ পাছত প্ৰথমবাৰৰ বাবে তেওঁ এই মত আগবঢ়াইছিল। ২০১৯ৰ পৰা আৱাৰ নৰ্থ ইষ্টে সেয়া বাস্তয়াম্বিত কৰিবলৈ আৰম্ভ কৰিছে। (২) বিশ্বৰ সকলোতে কেৱল একপক্ষীয় বাতৰি, আমি আমাৰ পাঠকসকলৰ বাবে একেটা প্ৰবন্ধতে সোঁ-মধ্যম-বাওঁ ধাৰণা  আগবঢ়াম যাতে আপোনালোকে নিজৰ মতামত নিজেই নিৰ্ধাৰণ কৰিব পাৰে।
                            </p>
                        </div>
                    </div>
                    <div class="admin">
                        <div class="col-md-12">
                            <p>আপোনাৰ সহায়ে সংবাদৰ গুণগত মানদন্ড অব্যাহত ৰখাত সহায় কৰিব আৰু উত্তৰ-পূৱ ভাৰতৰ যুৱ প্ৰজন্মৰ ওচৰলৈ যোৱাত সহায় কৰিব। ভাৰতবৰ্ষ এনে এখন দেশ য'ত পৃথিৱীৰ সৰ্বাধিক যুৱ প্ৰজন্ম আছে। তেওঁলোকে প্ৰতিটো দিনত নেতিবাচক খবৰেৰে আগবঢ়াটো বিচাৰে নে ইতিবাচক খবৰেৰে ? নিজে সিদ্ধান্ত লওক।</p>
                            <a href="#"><button class="btn" style="margin-bottom: 20px; background-color: #eaea4c; color: black; margin-right: 10px;">JOIN</button></a>
                            <a href="Donate"><button class="btn" style="margin-bottom: 20px; background-color: #eaea4c; color: black;">DONATE</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <!-- Blog Single Sidebar Start Here -->
                    <div class="sidebar-area">
                        <div class="recent-post-area hot-news">
                            <h3 style="margin:0; margin-bottom: 10px;padding: 6px 14px;width: 50%;background: #eaea4c;text-align: center;">ইতিবাচক খবৰ</h3>
                            <ul class="news-post">
                            	@if(count($positive_assamese_latest_three_records) > 0)
                            		@foreach($positive_assamese_latest_three_records as $key => $item)
		                                <li>
		                                    <div class="row">
		                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
		                                            <div class="item-post">
		                                                <div class="row">
		                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-right-none">
		                                                        <a href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}"><img src="{{ asset('assets/small_img/'.$item->image.'') }}" alt="" title="News image"></a>
		                                                    </div>
		                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		                                                        <h4><a href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}"> {{ $item->heading }}</a></h4>
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
        <h3 style="margin:0;padding: 6px 14px;width: 20%; margin-bottom: 10px; background: #eaea4c; text-align: center;">শহতীয়া খবৰ</h3>
        <div class="row" style="color: #101010;">
        	@if(count($latest_four_assamese_news))
        		@foreach($latest_four_assamese_news as $key => $item)
	            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                <div class="popular-post-img">
	                    <a href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}"><img src="{{ asset('assets/medium_img/'.$item->image.'') }}" alt="Blog single photo"></a>                                   
	                </div>                                
	                <h3>
	                    <a href="{{ route('positive_news_detail', ['positive_news_id' => encrypt($item->id) ]) }}">{{ $item->heading }}</a>
	                </h3>
	                <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</span>
	                <span class="duration" style="padding-left: 10px;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->time }} </span>
	            </div>
	            @endforeach
	        @endif
        </div>
    </div>
    <footer>
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <!-- Footer About Section Start Here -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-footer footer-one">
                            <div class="footer-logo"><img src="{{ asset('web/images/logo.png') }}" alt="footer-logo"></div>
                            <div class="footer-social-media-area">
                                <nav>
                                    <ul>
                                        <!-- Facebook Icon Here -->
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <!-- Google Icon Here -->
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <!-- Twitter Icon Here -->
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <!-- Vimeo Icon Here -->
                                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Footer About Section End Here -->

                    <!-- Footer Popular Post Section Start Here -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-footer footer-two">
                            <h3>Addtional Links</h3>
                            <nav>
                                <ul>
                                    <li>
                                        <p><a href="#">Privacy Policy</a></p>
                                    </li>
                                    <li>
                                        <p><a href="#">Terms & Condition</a></p>
                                    </li>
                                    <li>
                                        <p><a href="#">About Us</a></p>
                                    </li>
                                    <li>
                                        <p><a href="{{ route('contact_form') }}">Contact Us</a></p>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Footer Popular Post Section End Here -->

                    <!-- Footer From Flickr Section Start Here -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-footer footer-three">
                            <h3>Contact Us</h3>
                            <ul>
                                <li>
                                    <a>Guwahati, ASSAM</a>
                                </li>
                                <li>
                                    <a>94*****120</a>
                                </li>
                                <li>
                                    <a>demo@example.com</a>
                                </li>
                            </ul>
                            <a href="{{ route('joining_people') }}" class="btn footer-join-donate">সংযুক্ত হওঁক</a>
                            <a href="#" class="btn footer-join-donate">বৰঙনি</a>
                        </div>
                    </div>
                    <!-- Footer From Flickr Section End Here -->
                </div>
            </div>
        </div>
        <!-- Footer Copyright Area Start Here -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-bottom">
                            <span class="pull-right"><p>Developed By <a href="https://webinfotech.net.in/">Webinfotech</a></p></span>
                            <p> &copy; Copyrights Our NorthEast 2019. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Copyright Area End Here -->
    </footer>

    <!-- Start scrollUp  -->
    <div id="return-to-top">
        <span>Top</span>
    </div>
    <!-- End scrollUp  -->
    
    <!-- Footer Area Section End Here -->
    
    <!-- all js here -->
    <script src="{{ asset('web/js/jquery.min.js') }}"></script>
    <!-- jquery latest version -->
    <script src="{{ asset('web/js/jquery.min.js') }}"></script>
    <!-- jquery-ui js -->
    <script src="{{ asset('web/js/jquery-ui.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <!-- meanmenu js -->
    <script src="{{ asset('web/js/jquery.meanmenu.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('web/js/wow.min.js') }}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
    <!-- magnific-popup js -->
    <script src="{{ asset('web/js/jquery.magnific-popup.js') }}"></script>
    
    <!-- jquery.counterup js -->
    <script src="{{ asset('web/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('web/js/waypoints.min.js') }}"></script>
    <!-- jquery light box -->
    <script src="{{ asset('web/js/lightbox.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('web/js/main.js') }}"></script>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
