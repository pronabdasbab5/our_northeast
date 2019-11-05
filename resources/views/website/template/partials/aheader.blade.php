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