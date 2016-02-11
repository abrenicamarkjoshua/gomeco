<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Gomeco|Detail</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script src="../js/jquery1.min.js"></script>
<!-- start menu -->
<link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script type="text/javascript" src="../js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- start details -->
<script src="../js/slides.min.jquery.js"></script>
   <script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: '../img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
	<!-- start zoom -->
	<link rel="stylesheet" href="../css/zoome-min.css" />
	<script type="text/javascript" src="../js/zoome-e.js"></script>
	<script type="text/javascript">
		$(function(){
		$('#img1,#img2,#img3,#img4').zoome({showZoomState:true,magnifierSize:[250,250]});
	});
	</script>		
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
  
<div class="mens">    
  <div class="main">
     <div class="wrap">
     	
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						<div id="container">
							<div id="products_example">
								<?php
											foreach($productPictures as $productPicture){
											?>
								<div id="products">
									
									<div class="slides_container">
											
									        <a href="#"><img class="a" id="img1" src="{{App\configStrategy::getGomecoInventoryWebsite()}}{{$productPicture->picture}}" alt="" rel="{{App\configStrategy::getGomecoInventoryWebsite()}}{{$productPicture->picture}}" /></a>
											
											
									</div>
									
									<ul class="pagination"><div class="clear"></div>
									</ul>
								</div>
								<?php
											}
											?>
							</div>
						</div>
	            </div>
		         <div class="desc1 span_3_of_2">
		         	 <p class="m_text2">Product ID: {{$product->id}}</p>
                     <p class="m_text2">Product Name: {{$product->productName}}</p>
                   <p class="m_text2">Price: Php  {{$product->sellingprice}}</p>
                     <p class="m_text2">Details: {{$product->productDesc}}</p>
                     &nbsp;
                   <p class="m_text2"></p>
                     <div class="btn_form">
                       <form action = '' method = 'post'>
                       	{!! csrf_field() !!}
                         <input type="submit" name = 'addtocart' value="Add to Cart" title="">
                       </form>
                   </div>
                   <p class="m_text2">&nbsp;</p>
			     </div>
			   <div class="clear"></div>
               <!--	
	    <div class="clients">
	    <h3 class="m_3">Other Products in the same category</h3>
		 <ul id="flexiselDemo3">
			<li><img src="images/s5.jpg" /><a href="single.html">Category<p>Rs 600</p></a></li>
			<li><img src="images/s5.jpg" /><a href="single.html">Category<p>Rs 600</p></a></li>
			<li><img src="images/s5.jpg" /><a href="single.html">Category<p>Rs 600</p></a></li>
			<li><img src="images/s5.jpg" /><a href="single.html">Category<p>Rs 600</p></a></li>
			<li><img src="images/s5.jpg" /><a href="single.html">Category<p>Rs 600</p></a></li>
		 </ul>
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
     </div>
	   </div>
			-->
              <div class="clear"></div>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>
	<div class="footer">
		<div class="footer-top">
			<div class="wrap">
			  <div class="section group example">
			    <div class="col_1_of_2 span_1_of_2">
					<ul class="f-list">
					  <li><img src="../images/3.png"><span class="f-text">Call us at! (631)292-44-21 </span><div class="clear"></div></li>
					</ul>
				</div>
				<div class="clear"></div>
		      </div>
			</div>
		</div>
		<div class="footer-middle">
			<div class="wrap">
			  <div class="section group example">
			    <div class="col_1_of_f_2 span_1_of_f_2">
				   <h3>Contact us</h3>
						<div class="company_address">
					                <p># 2 Rincon St., Malinta,</p>
							   		<p>Valenzuela City,</p>
							   		<p>Philippines</p>
					   		<p>Phone: 292-4421/292-4882</p>
					   		<p>Fax: 292-4858</p>
					 	 	<p>Email: info@gomecogroup.com</p>
					   		
					   </div>
					   <div class="social-media">
						     <ul>
						        <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="Google+"><a href="https://plus.google.com/102083304827699134008" target="_blank"> </a></span></li>
						        <li></li>
						        <li></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Facebook"><a href="http://www.facebook.com/GomecoGroupofCompanies" target="_blank"> </a></span></li>
						    </ul>
					   </div>
				</div>
		  <div class="clear"></div>
		    </div>
		  </div>
		</div>
		<div class="footer-bottom">
			<div class="wrap">
	                <div class="copy">
			        <p>Copyrights© All Rights Reserved 2014 <a href="#" target="_blank"><u>Gomeco Group of Companies</u></a></p>
		         </div>
		       <div class="f-list2">
				 <ul>
					<li class="active"><a href="about.php">About Us</a></li> |
					<!--<li><a href="delivery.html">Delivery & Returns</a></li> |-->
					<li><a href="delivery.html">Terms & Conditions</a></li> |
					<li><a href="main.php">Contact Us</a></li> 
				 </ul>
			    </div>
				<div class="clear"></div>
		      </div>
			</div>
		</div>
</body>
</html>