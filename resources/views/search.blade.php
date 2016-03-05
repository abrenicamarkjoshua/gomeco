@extends('layout.main')

@section('content')
<!-- start slider -->
    <div id="fwslider">
        <div class="slider_container">
        	<div class="slide">
                <img src="images/banner1.jpg" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h4 class="title">The Leader in Providing clients with end-to-end </h4>
                        <h4 class="title">high quality Stainless Steel Kitchen Solutions </h4>
                    </div>
                </div>
            </div>
            <div class="slide"> 
                <!-- Slide image -->
                    <img src="images/banner.jpg" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <h4 class="title">You Can Count on Our Stainless Reputation</h4>
                        <!-- /Text title -->
                        
                        <!-- Text description 
                        <p class="description">Experiance ray ban</p>-->
                        <!-- /Text description -->
                    </div>
                </div>
                 <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
                <img src="images/banner1.jpg" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h4 class="title">You Can Count on Our Stainless Reputation </h4>
                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>
    <!--/slider -->
<div class="main">
	<div class="wrap">
		<div class="section group">
		  <div class="cont span_2_of_3">
		  	@if (session('affirm'))
			    <b style = "color:green;font-size:25px">{{session('affirm')}}</b>
			    
			@endif
				<div class = "container-fluid">
				@foreach($products as $product)
				
					<div class = "col-md-4" style = "max-height:172px;margin-bottom:100px;">
					<a href="product/{{$product->id}}">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img style = "max-height:152px" src="{{App\configStrategy::getGomecoInventoryWebsite()}}{{$product->picture}}" alt=""/>
					</div>
					<?php
						$date1 = new DateTime($product->created_at);
						$date2 = new DateTime(date("Y-m-d"));
						$interval = $date1->diff($date2);
					?>
					@if($interval->d <= 30)
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    @endif
					 <div class="price">
					   <div class="cart-left">
							<p class="title">{{$product->productName}}</p>
							<div class="price1"> <span class="actual">₱ {{$product->sellingprice}}</span> </div>
					  </div>
						
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
					</div>

			 	@endforeach	
			 </div>
		  </div>
		  <div class="clear"></div>
		  			 	{!! $products->appends(['search' => (isset($_GET['search'])) ? $_GET['search'] : '' ])->render() !!}				 			    

	</div>
	</div>
</div>
   <div class="footer">
		<div class="footer-top">
			<div class="wrap">
			  <div class="section group example">
			    <div class="col_1_of_2 span_1_of_2">
					<ul class="f-list">
					  <li><img src="images/3.png"><span class="f-text">Call us at! (631)292-44-21 </span>
					    <div class="clear"></div></li>
					</ul>
				</div>
			    <div class="clear"></div>
		      </div>
			</div>
		</div>
		<div class="footer-middle">
			<div class="wrap">
			 <!-- <div class="section group">
			  	<div class="f_10">
					<div class="col_1_of_4 span_1_of_4">
						<h3>Facebook</h3>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="like_box">	
							<div class="fb-like-box" data-href="http://www.facebook.com/w3layouts" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
						</div>
					</div>
					<div class="col_1_of_4 span_1_of_4">
						<h3>From Twitter</h3>
						<div class="recent-tweet">
							<div class="recent-tweet-icon">
								<span> </span>
							</div>
							<div class="recent-tweet-info">
								<p>Ds which don't look even slightly believable. If you are <a href="#">going to use nibh euismod</a> tincidunt ut laoreet adipisicing</p>
							</div>
							<div class="clear"> </div>
						</div>
						<div class="recent-tweet">
							<div class="recent-tweet-icon">
								<span> </span>
							</div>
							<div class="recent-tweet-info">
								<p>Ds which don't look even slightly believable. If you are <a href="#">going to use nibh euismod</a> tincidunt ut laoreet adipisicing</p>
							</div>
							<div class="clear"> </div>
						</div>
					</div>
				</div>
				<div class="f_10">
					<div class="col_1_of_4 span_1_of_4">
					    <h3>Information</h3>
						<ul class="f-list1">
						    <li><a href="#">Duis autem vel eum iriure </a></li>
				            <li><a href="#">anteposuerit litterarum formas </a></li>
				            <li><a href="#">Tduis dolore te feugait nulla</a></li>
				             <li><a href="#">Duis autem vel eum iriure </a></li>
				            <li><a href="#">anteposuerit litterarum formas </a></li>
				            <li><a href="#">Tduis dolore te feugait nulla</a></li>
			         	</ul>
					</div>
					<div class="col_1_of_4 span_1_of_4">
						<h3>Contact us</h3>
						<div class="company_address">
					                <p>500 Lorem Ipsum Dolor Sit,</p>
							   		<p>22-56-2-9 Sit Amet, Lorem,</p>
							   		<p>USA</p>
					   		<p>Phone:(00) 222 666 444</p>
					   		<p>Fax: (000) 000 00 00 0</p>
					 	 	<p>Email: <span>mail[at]leoshop.com</span></p>
					   		
					   </div>
					   <div class="social-media">
						     <ul>
						        <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="Google"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Linked in"><a href="#" target="_blank"> </a> </span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Rss"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Facebook"><a href="#" target="_blank"> </a></span></li>
						    </ul>
					   </div>
					</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		  </div>-->
		   
		   
		   
		   
		   
		   <div class="section group example">
			  
			 <div class="col_1_of_f_1 span_1_of_f_1">
			   <div class="section group example">
               <!--
				 <div class="col_1_of_f_2 span_1_of_f_2">
				    <h3>Information</h3>
						<ul class="f-list1">
						    <li><a href="#">Duis autem vel eum iriure </a></li>
				            <li><a href="#">anteposuerit litterarum formas </a></li>
				            <li><a href="#">Tduis dolore te feugait nulla</a></li>
				             <li><a href="#">Duis autem vel eum iriure </a></li>
				            <li><a href="#">anteposuerit litterarum formas </a></li>
				            <li><a href="#">Tduis dolore te feugait nulla</a></li>
			         	</ul>
 				 </div>-->
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
		  <div class="clear"></div>
		    </div>
		  </div>
		</div>
@stop