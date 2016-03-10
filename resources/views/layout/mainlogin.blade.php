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
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
     <div class="header-top">
	   <div class="wrap">
	     <div class="cssmenu">
				<ul>
					<li class="active"><a href="/home">Home</a></li>
					
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
	            	
			</div>
		</div>
	   <div class="header-bottom-right">
         
	  
    </div>
     <div class="clear"></div>
     </div>
	</div>
  @if(session('message'))
	  <div class="alert alert-info">
	  {!! session('message') !!}
	  </div>
    @endif
@yield('content')
		<div class="footer-bottom" style = "margin-top:80px;">
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