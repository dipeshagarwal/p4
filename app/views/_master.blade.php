<!DOCTYPE html>
<html><head>
	<title>@yield('title','sonasonic')</title>
	<meta charset='utf-8'>

	<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
	<link rel='stylesheet' href='/css/trackers.css' type='text/css'>


    <!--  START BLUEPRINT.CSS-->
        <link rel="stylesheet" href="/css/blueprint/screen.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="/css/blueprint/print.css" type="text/css" media="print" />
    <!--  END BLUEPRINT.CSS-->
    
    
    <!-- START  SmartMenus MENU -->
        <!-- jQuery -->
        <script type="text/javascript" src="/js/jquery-loader.js"></script>
        
        <!-- SmartMenus jQuery plugin -->
        <script type="text/javascript" src="/js/jquery.smartmenus.js"></script>
        
        <!-- SmartMenus jQuery init -->
        <script type="text/javascript">
            $(function() {
                $('#main-menu').smartmenus({
                    subMenusSubOffsetX: 1,
                    subMenusSubOffsetY: -8
                });
            });
        </script>

        <!-- SmartMenus core CSS (required) -->
        <link href="/css/sm-blue/sm-core-css.css" rel="stylesheet" type="text/css" />
        <link href="/css/sm-blue/demo.css" rel="stylesheet" type="text/css" />
        <link href="/css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />
        
        <!-- #main-menu config - instance specific stuff not covered in the theme -->
        <style type="text/css">
            #main-menu {
                position:relative;
                z-index:9999;
                width:auto;
            }
            #main-menu ul {
                width:12em; /* fixed width only please - you can use the "subMenusMinWidth"/"subMenusMaxWidth" script options to override this if you like */
            }
        </style>
    <!-- END  SmartMenus MENU -->
    
  
    <!-- START  fotorama SLIDER -->
             <!-- FOR fotorama  1. Link to jQuery (1.8 or later), -->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> <!-- 33 KB -->
            
            <!-- Start fotorama.css & fotorama.js. -->
            <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.5.1/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.5.1/fotorama.js"></script> <!-- 16 KB -->
            <!-- End fotorama.css & fotorama.js. -->
 	<!-- END  fotorama SLIDER -->

	@yield('head')
</head>


<body>
    <div class="container">
    
            @if(Session::get('flash_message'))
                <div class='flash-message'>{{ Session::get('flash_message') }}</div>
            @endif
        
            <a href='/'><img class='logo' src='/images/sonalogo.PNG' alt='Trackers logo'></a>
        
            <nav>
                <ul>
                @if(Auth::check())             
                  <!-- START DROP MENU -->
                    <ul id="main-menu" class="sm sm-blue">
                        <li><a href="index.php"><img style=" margin-top:-6px; margin-bottom:-5px; " src="/images/home.png"  alt="home"  /></a></li>
                        <li><a href="index.php">Hello {{ Auth::user()->name; }}!</a></li>
                        <li><a href='/tracker'>All Trackers</a></li>
                        <li><a href='/tracker/create'>Add New Tracker</a></li>
                        <li><a href='/tracker/mytracker'>My Trackers</a></li>
                        <li><a href='/account'>My Account</a></li>
                        <li><a href='/logout'>Log out</a></li>                           
                    </ul>
             
                 @else
                   <ul id="nav-one" class="dropmenu css-only">
                        <li><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></li>
                   </ul>
                <!-- END DROP MENU -->
                @endif
                </ul>
            </nav>
                                      
            <!-- START Add images to <div class="fotorama"></div>. -->
            <div style="clear: both;" class="fotorama" data-width="980" data-ratio="900/280" data-max-width="100%"
                 data-autoplay="true" data-stopautoplayontouch="false" data-transition="crossfade">
              <img src="/images/slider/1.jpg" alt="image" />
              <img src="/images/slider/2.jpg" alt="image" />
              <img src="/images/slider/3.jpg" alt="image" />
              <img src="/images/slider/4.jpg" alt="image" />
              <img src="/images/slider/5.jpg" alt="image" />
              <img src="/images/slider/6.jpg" alt="image" />
              <img src="/images/slider/7.jpg" alt="image" />
              <img src="/images/slider/8.jpg" alt="image" />
              <img src="/images/slider/9.jpg" alt="image" />
              <img src="/images/slider/10.jpg" alt="image" />
            </div>       
       		<!-- END Add images to <div class="fotorama"></div>. -->
    
            @yield('content')
        
            @yield('/body')   
    </div>
</body>
</html>





