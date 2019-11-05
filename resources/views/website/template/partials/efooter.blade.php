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
                                        <p><a href="ContactUs">Contact Us</a></p>
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
                            <a href="#" class="btn footer-join-donate">Join</a>
                            <a href="Donate" class="btn footer-join-donate">Donate</a>
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
