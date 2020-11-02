<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Commerce System</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ URL::to('frontend/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->
<style type="text/css">
	.paymentWrap{
		padding:50px;
	}

	.paymentWrap .paymentBtnGroup {
		max-width: 800px;
		margin: auto;
	}

	.paymentWrap .paymentBtnGroup .paymentMethod {
		padding: 40px;
		box-shadow: none;
		position: relative;
	}

	.paymentWrap .paymentBtnGroup .paymentMethod.active {
		outline: none !important;
	}

	.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
		border-color: #4cd264;
		outline: none !important;
		box-shadow: 0px 3px 22px 0px #7b7b7b;
	}
	
	.paymentWrap .paymentBtnGroup .paymentMethod .method{
		position: absolute;
		right: 3px;
		top: 3px;
		bottom: 3px;
		left: 3px;
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		border: 2px solid transparent;
		transition: all 0.5s;
	}

	.paymentWrap .paymentBtnGroup .paymentMethod .method.visa{
		background-image: url("https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Visa.svg/1200px-Visa.svg.png")
	}

	.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card{
		background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRQk-nr3DYu1jWNaG8Cxh6bqUOH75qI1gjhnuAgKv-MG0_f7tQm")
	}

	.paymentWrap .paymentBtnGroup .paymentMethod .method.amex{
		background-image: url("https://www.paymentscardsandmobile.com/wp-content/uploads/2015/08/Amex-icon.jpg") 
	}

	.paymentWrap .paymentBtnGroup .paymentMethod .method.vishwa{
		background-image: url("http://i.imgur.com/VkiM7PL.jpg")
	}

	.paymentWrap .paymentBtnGroup .paymentMethod .method.ez-cash{
		background-image: url("https://www.jeyabookcentre.com/catalog/view/theme/default/image/ezcash.jpg")
	}

	.paymentWrap .paymentBtnGroup .paymentMethod .method:hover{
		border-color: #4cd264;
		outline: none 1important;
	}
</style>

<body>
	<header id="header"><!--header-->
		<!-- <div class="header_top"> --><!-- header_top -->
			<!-- <div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->
		<!-- </div> --> <!--/header_top -->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="{{ URL::to('/') }}"><img src=" " alt="" /><h4>E-Commerce System</h4></a>
						</div>
						<div class="btn-group pull-right clearfix">
							<!-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div> -->
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>

								<?php $customer_id=Session::get('customer_id'); ?>
								<?php if($customer_id != NULL){?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<?php }else{?>
								<li><a href="{{URL::to('/login-check')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<?php } ?>								

								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li> 

								<?php $customer_id=Session::get('customer_id'); ?>
								<?php if($customer_id != NULL){?>
								<li><a href="{{URL::to('/customer-logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
								<?php }else{?>
									<li><a href="{{URL::to('/login-check')}}"><i class="fa fa-lock"></i> Login</a></li>
								<?php } ?> 
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
	
	</header><!--/header-->
	
	<section>
	@yield('slider')
	</section>
	
	<section>
		<div class="container">
			<div class="row"> 

				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						
                    @yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer--> 
    
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{URL::to('/online-help')}}">Online Help</a></li>
								<li><a href="{{URL::to('/contact')}}">Contact Us</a></li> 
								<li><a href="{{URL::to('/faq')}}">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked"> 
								<li><a href="{{URL::to('/mens')}}">Mens</a></li>
								<li><a href="{{URL::to('/womens')}}">Womens</a></li>
								<li><a href="{{URL::to('/electronics')}}">Electronics</a></li>
								<li><a href="{{URL::to('/furniture')}}">Furniture</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked"> 
								<li><a href="{{URL::to('/terms-of-use')}}">Terms of Use</a></li>
								<li><a href="{{URL::to('/privacy-policy')}}">Privacy Policy</a></li>
								<li><a href="{{URL::to('/refund-policy')}}">Refund Policy</a></li>
								<li><a href="{{URL::to('/billing-system')}}">Billing System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Us</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{URL::to('/company-information')}}">Company Information</a></li>
								<li><a href="{{URL::to('/careers')}}">Careers</a></li>
								<li><a href="{{URL::to('/store-location')}}">Store Location</a></li> 
								<li><a href="{{URL::to('/copyright')}}">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Subscribe</h2>
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
					<p class="pull-left">Copyright © 2020 E-Commerce System. Developed by Joseph.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>
</html>