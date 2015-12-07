@extends('layout.main')

@section('content')
<div class="mens">    
  <div class="main">
     <div class="wrap">
		<div class="cont span_2_of_3">
		  	<h2 class="head">{{$title}}</h2>
		  	<div class="mens-toolbar">
              <div class="sort">
               	<div class="sort-by">
		           
               </div>
    		</div>
        <div class="pager">   
        	<div class="limiter visible-desktop">
            	{!! $products->render() !!}	        
             </div>
       		
	   		<div class="clear"></div>
    	</div>
     	<div class="clear"></div>
	</div>
			<div class="top-box">
			 
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
				<div class="clear"></div>
			</div>	
           <!--  
			<div class="top-box">
			 <div class="col_1_of_3 span_1_of_3"> 
			   <a href="single.html">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic.jpg" alt=""/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1"> <span class="actual">Php</span> </div>
					  </div>
						
						<div class="clear"></div>
				  </div>				
               </div>
               </a>
			  </div>
			   <div class="col_1_of_3 span_1_of_3">
			   	 <a href="single.html">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic1.jpg" alt=""/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1"> <span class="actual">Php</span> </div>
					  </div>
						
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>
			  </div>
				<div class="col_1_of_3 span_1_of_3">
				 <a href="single.html">
				  <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic2.jpg" alt=""/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">Php</span>
							</div>
					  </div>
						
						<div class="clear"></div>
				    </div>				
                 </div>
                  </a>
				</div>
				<div class="clear"></div>
			</div>	 -->
            <!--
			<div class="top-box">
			 <div class="col_1_of_3 span_1_of_3"> 
			   <a href="single.html">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic.jpg" alt=""/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1"> <span class="actual">Php</span> </div>
					  </div>
						
						<div class="clear"></div>
				  </div>				
               </div>
               </a>
			  </div>
			   <div class="col_1_of_3 span_1_of_3">
			   	 <a href="single.html">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic1.jpg" alt=""/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1"> <span class="actual">Php</span> </div>
					  </div>
						
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>
			  </div>
				<div class="col_1_of_3 span_1_of_3">
				 <a href="single.html">
				  <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic2.jpg" alt=""/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">Php</span>
							</div>
					  </div>
						
						<div class="clear"></div>
				    </div>				
                 </div>
                  </a>
				</div>
				<div class="clear"></div>
			</div>-->
		</div>
		<div class="clear"></div>
			</div>
		   </div>
		</div>
@stop