<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Gomeco|Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<link href='{{asset("css/bootstrap.min.css")}}' rel='stylesheet' type='text/css'>
<link href='{{asset("css/pure-min.css")}}' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="{{asset('js/jquery1.min.js')}}"></script>
<!-- start menu -->
<link href="{{asset('css/megamenu.css')}}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{asset('js/megamenu.js')}}"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--start slider -->
    <link rel="stylesheet" href="{{asset('css/fwslider.css')}}" media="all">
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/css3-mediaqueries.js')}}"></script>
    <script src="{{asset('js/fwslider.js')}}"></script>
<!--end slider -->
<script src="{{asset('js/jquery.easydropdown.js')}}"></script>
</head>
<body>
     <div class="header-top">
	   <div class="wrap">
	     <div class="cssmenu">
				<ul>
					
				    <li><a href="/mycart">Checkout</a></li> 
				    |
				    @if(Auth::check())
				     <li><a href="/auth/logout">Log out</a></li> 

				    @else
					 <li><a href="/auth/login">Log In</a></li> 

				    @endif
				    |
				    @if(Auth::check())
			    	<li><a href="/myaccount">My Account</a></li>
			    	|
			    	<li><a href="/myorders">My Orders</a></li>
				    @else
					 <li><a href="/auth/register">Sign Up</a></li>
					@endif
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="/"><img src="{{asset('images/logo.png')}}" alt=""/></a>
				</div>
				<div class="menu">
	            <ul class="megamenu skyblue">
			<li class="active grid"><a href="/home">Home</a></li>
			<li><a class="color4" href="#">Products</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<ul>
									<li><a href="/foodService"><h4>Food Service Equipments</h4></a></li>
									<li><a href="/cooking-equipment"><h4>Cooking Equipment</h4></a></li>
									<li><a href="/storage-and-preparation-equipment"><h4>Storage/Preparation Equipment</h4></a></li>
								</ul>	
							</div>							
						</div>
					  </div>
					</div>
				</li>				
				<li><a class="color6" href="/aboutUs">About Us</a></li>
                <li><a class="color6" href="#">Contact Us</a>
                 <div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<ul>
									<li><a href="/main"><h4>Main Office</h4></a></li>
									<li><a href="/makati"><h4>Makati Office</h4></a></li>
									<li><a href="/cebu"><h4>Cebu Office</h4></a></li>
								</ul>	
							</div>							
						</div>
					  </div>
					</div>
                  </li>
				<!--<li><a class="color7" href="other.html">Purchase</a></li>-->
			</ul>
			</div>
		</div>
	   <div class="header-bottom-right">
         <div class="search">	  
				<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
		 </div>
	  <div class="tag-list">
		<ul class="icon1 sub-icon1 profile_img">
			<li><a class="active-icon c2" href="checkout.php"> </a></li>
		</ul>
	    <ul class="last"><li><a href="/mycart">Cart({{Cart::getTotalQuantity()}})</a></li></ul>
	  </div>
    </div>
     <div class="clear"></div>
     </div>
	</div>
  
@yield('content')
		<div class="footer-bottom">
			<div class="wrap">
	             <div class="copy">
			        <p>Copyrights© All Rights Reserved 2014 <a href="#" target="_blank"><u>Gomeco Group of Companies</u></a></p>
		         </div>
				<div class="f-list2">
				<ul>
					<li class="active"><a href="about.php">About Us</a></li> |
					<!--<li><a href="delivery.php">Delivery & Returns</a></li> |-->
					<li><a href="delivery.php">Terms & Conditions</a></li> |
					<li><a href="main.php">Contact Us</a></li> 
				</ul>
			  </div>
			    <div class="clear"></div>
		      </div>
	     </div>
	</div>
</body>
</html>