<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Voyager::setting('.site_title') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Poppins:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL:: asset('css/meanmenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL:: asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL:: asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL:: asset('vendor/tcg/voyager/assets/js/skins/voyager/skin.min.css') }}">
    <?php /* <link href="{{ asset('css/app.css') }}" rel="stylesheet">  */ ?>
</head>
<body>
 
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a class="logo" href="#"><img src="{{ URL:: asset('images/logo.png') }}" alt=""></a>
            </div>
            <div class="col-sm-9">
                <div class="header-nav-part">
                    <div class="nav">

<!-- Right Side Of Navbar -->
               
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                            <li><a href="{{ URL:: asset('/home') }}">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>

                        @if(!Auth::user())
                            
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('register') }}">Signup</a></li>
                            
                        @else
                            <ul class="head-icon">
                                <li class="bell"><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                            
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('profile') }}"><i class="fa fa-btn fa-user"></i> Profile </a></li>
                                        <li>
                                            <a href="{{ url('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                <i class="fa fa-btn fa-sign-out"></i> Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <li><span class="ask-btn"><a href="#"> Ask a question</a></span></li>
                        @endif
                    </ul>
             
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

    @yield('content')
 
<div class="footer">
    <div class="container">
        <div class="footer-social">
            <ul>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="footer-inner">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Sign Up</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Question</a></li>
                            <li><a href="#">Ask A Question</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
        <div class="copyright">
            <h5>&copy; {{ date('Y') }} {{ Voyager::setting('.site_title') }}. All Rights Reserved.</h5>
        </div>
    </div>
</div>


<!-- <script type="text/javascript" src="{{ URL:: asset('js/jquery.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ URL:: asset('js/bootstrap.min.js') }}"></script> -->

<?php /* <script src="{{ asset('js/app.js') }}"></script> */ ?>
<script type="text/javascript" src="{{ URL:: asset('js/owl.carousel.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ URL:: asset('js/jquery.meanmenu.min.js') }}"></script> -->
<script src="https://use.fontawesome.com/26ae5f8be1.js"></script>
<script type="text/javascript" src="{{ URL:: asset('vendor/tcg/voyager/assets/js/app.js') }}"></script>
<script src="{{ asset('js/share.js') }}"></script>
<script src="https://use.fontawesome.com/8d36671da6.js"></script>
<script type="text/javascript" src="{{ URL:: asset('js/jquery.meanmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ URL:: asset('js/plupload.full.min.js') }}"></script>
<script type="text/javascript" src="{{ URL:: asset('js/picupload.js') }}"></script>

<script type="text/javascript">
 $(document).ready(function () {
     $('#sidebarCollapse').on('click', function () {
         $('#sidebar').toggleClass('active');
     });
 });
jQuery(function($){
    jQuery('.nav').meanmenu();
});
</script>

</body>
</html>
