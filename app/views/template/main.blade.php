<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>City 'Wise'</title>
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/main.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</head><!--/head-->
<body>
<style type="text/css">
    .a-logo,.a-logo:hover{
        color: #B4B1AB;
        font-family: abel;
        font-size: 1.6em;
    }
    .a-logo span {
        color: #FE980F;
    }
</style>
    <header id="header"><!--header-->
        
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}" class="a-logo"><span>CITY </span> 'WISE'</a>
                        </div>
                        <div class="btn-group pull-right">
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    {{Session::get('city')}}
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php 
                                        $city=new City;
                                        $city=$city->get();
                                    ?>
                                    @foreach($city as $c)
                                        <li><a href="{{URL::Route('city')}}/{{$c->name}}">{{$c->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            
                           
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                @if(Auth::check())
                                <li><a href="{{URL::Route('demo')}}">Welcome {{Auth::user()->name}}</a></li>
                                @endif
                                <li><a href="{{URL::Route('shop.add')}}"><i class="fa fa-plus"></i>Add your shop</a></li>
                                @if(Auth::check())
                                <li><a href="{{URL::Route('demo')}}"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="{{URL::Route('user.logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                                @else
                                <li><a href="{{URL::Route('user.login')}}"><i class="fa fa-lock"></i> Login</a></li>
                                @endif
                              </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/')}}" class="active">Home</a></li>
                                <li class="dropdown"><a href="{{URL::Route('demo')}}">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{URL::Route('shops')}}">View Shops in your City</a></li>
                                        <li><a href="{{URL::Route('vincity')}}">View Shops Closest to you</a></li>
                                        <li><a href="{{URL::Route('demo')}}">Products</a></li>
                                        <li><a href="{{URL::Route('demo')}}">Product Details</a></li> 
                                    </ul>
                                </li> 
                                 <li class="dropdown"><a href="{{URL::route('departments')}}">Departments<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                       @foreach(Department::get() as $dept)
                                        <li><a href="{{URL::Route('departments')}}/{{$dept->department}}">{{$dept->department}}</a></li>
                                       @endforeach
                                    </ul>
                                </li> 
                                <li><a href="{{URL::Route('demo')}}">New Arrivals<span style="color:red"><sup>new</sup></span></a></li>
                                <li><a href="{{URL::Route('demo')}}">Stock Lastings<span style="color:red"><sup>new</sup></span></a></li>
                                <li><a href="{{URL::Route('contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search"/>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    

@yield('content')

    
    <footer id="footer"><!--Footer-->
       
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{URL::Route('demo')}}">Online Help</a></li>
                                <li><a href="{{URL::Route('demo')}}">Contact Us</a></li>
                                <li><a href="{{URL::Route('demo')}}">Order Status</a></li>
                                <li><a href="{{URL::Route('demo')}}">Change Location</a></li>
                                <li><a href="{{URL::Route('demo')}}">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{URL::Route('demo')}}">T-Shirt</a></li>
                                <li><a href="{{URL::Route('demo')}}">Mens</a></li>
                                <li><a href="{{URL::Route('demo')}}">Womens</a></li>
                                <li><a href="{{URL::Route('demo')}}">Gift Cards</a></li>
                                <li><a href="{{URL::Route('demo')}}">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{URL::Route('demo')}}">Terms of Use</a></li>
                                <li><a href="{{URL::Route('demo')}}">Privecy Policy</a></li>
                                <li><a href="{{URL::Route('demo')}}">Refund Policy</a></li>
                                <li><a href="{{URL::Route('demo')}}">Billing System</a></li>
                                <li><a href="{{URL::Route('demo')}}">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About  City 'Wise'</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{URL::Route('demo')}}">Company Information</a></li>
                                <li><a href="{{URL::Route('demo')}}">Careers</a></li>
                                <li><a href="{{URL::Route('demo')}}">Store Location</a></li>
                                <li><a href="{{URL::Route('demo')}}">Affillate Program</a></li>
                                <li><a href="{{URL::Route('demo')}}">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About City 'Wise'</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 City 'Wise' Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.srineha.me">Srineha</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    
    <script src="{{URL::asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{URL::asset('js/price-range.js')}}"></script>
    <script src="{{URL::asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
</body>
</html>