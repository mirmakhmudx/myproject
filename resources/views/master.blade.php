
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png')}}">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link href="https://fonts.googleapis.com/css2?family=Display+Playfair:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    <title>Learner Free Bootstrap Template by Untree.co</title>
</head>

<body>

<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>



<div class="corner-auth-bar">
    <a href="{{ route('login.page') }}" class="btn-login">Log In</a>
    <a href="{{ route('register.page') }}" class="btn-register">Register</a>
</div>

<style>
    .corner-auth-bar {
        position: fixed;
        top: 18px;
        right: 18px;
        z-index: 1200;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .corner-auth-bar a.btn-login {
        color: rgba(255, 255, 255, 0.92);
        text-decoration: none;
        font-size: .8rem;
        font-weight: 500;
        letter-spacing: .2px;
        padding: 7px 16px;
        border-radius: 20px;
        transition: background .2s ease;
    }
    .corner-auth-bar a.btn-login:hover {
        background: rgba(255, 255, 255, 0.12);
        color: #fff;
    }
    .corner-auth-bar a.btn-register {
        background: rgba(255, 255, 255, 0.14);
        color: #fff;
        text-decoration: none;
        font-size: .8rem;
        font-weight: 600;
        letter-spacing: .2px;
        padding: 7px 18px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.4);
        transition: background .2s ease, border-color .2s ease;
    }
    .corner-auth-bar a.btn-register:hover {
        background: rgba(255, 255, 255, 0.26);
        border-color: rgba(255, 255, 255, 0.7);
    }
    @media (max-width: 991px) {
        .corner-auth-bar { top: 10px; right: 10px; gap: 6px; }
        .corner-auth-bar a.btn-login, .corner-auth-bar a.btn-register { font-size: .72rem; padding: 6px 12px; }
    }
</style>

<style>
    .site-nav { padding-top: 34px; padding-bottom: 34px; }
    .logo { font-size: 34px !important; }
    .site-nav .site-navigation .site-menu > li > a { font-size: 17px !important; padding: 10px 22px !important; }
    @media (max-width: 991.98px) {
        .site-nav { padding-top: 20px; padding-bottom: 20px; }
        .logo { font-size: 26px !important; }
    }
</style>

<nav class="site-nav mb-5">
    <div class="sticky-nav js-sticky-header">
        <div class="container position-relative">
            <div class="site-navigation text-center">
                <a href="index.html" class="logo menu-absolute m-0">Learner<span class="text-primary">.</span></a>

                <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
                    <li class="active"><a href="{{route('home.page')}}">Home</a></li>
                    <li class="has-children">
                        <a href="#">Dropdown</a>
                        <ul class="dropdown">
                            <li><a href="elements.html">Elements</a></li>
                            <li class="has-children">
                                <a href="#">Menu Two</a>
                                <ul class="dropdown">
                                    <li><a href="#">Sub Menu One</a></li>
                                    <li><a href="#">Sub Menu Two</a></li>
                                    <li><a href="#">Sub Menu Three</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Menu Three</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('staff.page')}}">Our Staff</a></li>
                    <li><a href="{{route('news.page')}}">News</a></li>
                    <li><a href="{{route('gallery.page')}}">Gallery</a></li>
                    <li><a href="{{route('about.page')}}">About</a></li>
                    <li><a href="{{route('contact.page')}}">Contact</a></li>
                </ul>

                <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>
        </div>
    </div>
</nav>

@yield('content')

<div class="site-footer">


    <div class="container">

        <div class="row">
            <div class="col-lg-3 mr-auto">
                <div class="widget">
                    <h3>About Us<span class="text-primary">.</span> </h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div> <!-- /.widget -->
                <div class="widget">
                    <h3>Connect</h3>
                    <ul class="list-unstyled social">
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-linkedin"></span></a></li>
                        <li><a href="#"><span class="icon-pinterest"></span></a></li>
                        <li><a href="#"><span class="icon-dribbble"></span></a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

            <div class="col-lg-2 ml-auto">
                <div class="widget">
                    <h3>Projects</h3>
                    <ul class="list-unstyled float-left links">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">CSS3</a></li>
                        <li><a href="#">jQuery</a></li>
                        <li><a href="#">Bootstrap</a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

            <div class="col-lg-3">
                <div class="widget">
                    <h3>Gallery</h3>
                    <ul class="instafeed instagram-gallery list-unstyled">
                        <li><a class="instagram-item" href="{{asset('assets/images/gal_1.jpg')}}" data-fancybox="gal"><img src="{{asset('assets/images/gal_1.jpg')}}" alt="" width="72" height="72"></a>
                        </li>
                        <li><a class="instagram-item" href="{{asset('assets/images/gal_2.jpg')}}" data-fancybox="gal"><img src="{{asset('assets/images/gal_2.jpg')}}" alt="" width="72" height="72"></a>
                        </li>
                        <li><a class="instagram-item" href="{{asset('assets/images/gal_3.jpg')}}" data-fancybox="gal"><img src="{{asset('assets/images/gal_3.jpg')}}" alt="" width="72" height="72"></a>
                        </li>
                        <li><a class="instagram-item" href="{{asset('assets/images/gal_4.jpg')}}" data-fancybox="gal"><img src="{{asset('assets/images/gal_4.jpg')}}" alt="" width="72" height="72"></a>
                        </li>
                        <li><a class="instagram-item" href="{{asset('assets/images/gal_5.jpg')}}" data-fancybox="gal"><img src="{{asset('assets/images/gal_5.jpg')}}" alt="" width="72" height="72"></a>
                        </li>
                        <li><a class="instagram-item" href="{{asset('assets/images/gal_6.jpg')}}" data-fancybox="gal"><img src="{{asset('assets/images/gal_6.jpg')}}" alt="" width="72" height="72"></a>
                        </li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->


            <div class="col-lg-3">
                <div class="widget">
                    <h3>Contact</h3>
                    <address>43 Raymouth Rd. Baltemoer, London 3910</address>
                    <ul class="list-unstyled links mb-4">
                        <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                        <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                        <li><a href="mailto:info@mydomain.com">info@mydomain.com</a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

        </div> <!-- /.row -->

        <div class="row mt-5">
            <div class="col-12 text-center">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ -->
            </div>
        </div>
    </div> <!-- /.container -->
</div> <!-- /.site-footer -->

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>


</body>

</html>
