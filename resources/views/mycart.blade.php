@extends('layout.main')
@section('content')
	@if(Cart::getTotalQuantity() == 0)
		<div class="register_account">
           <div class="wrap">
    	     <h4 class="title">Shopping cart is empty</h4>
    	     <p class="cart">You have no items in your shopping cart.<br>Click<a href="/home"> here</a> to continue shopping</p>
    	   </div>
    	</div>

	@else
		<?php $items = Cart::getContent(); ?>
		<div class = "container-fluid">
		@foreach($items as $item)
		<?php
		$item = App\products::find($item->id);
		?>
			<div class = "col-md-4" style = "max-height:172px;margin-bottom:100px;">
					
					<div class="inner_content clearfix">
					<div class="product_image">
						<img style = "max-height:152px" src="{{App\configStrategy::getGomecoInventoryWebsite()}}{{$item->picture}}" alt=""/>
					</div>
					
					 <div class="price">
					   <div class="cart-left">
							<p class="title">{{$item->productName}}</p>
							<div class="price1"> <span class="actual">₱ {{$item->sellingprice}}</span> </div>
					  		<a href="product/{{$item->id}}">view details</a>

							<form action = '' method = 'post'>
								{!! csrf_field() !!}
								<input type = 'hidden' name = 'product_id' value = '{{$item->id}}'/>
								<input type = 'submit' name = 'btnRemoveFromCart' value = 'remove' />
							</form>
					  </div>
						
						<div class="clear"></div>
					 </div>				
                   </div>
			</div>
		@endforeach	
	</div>
	<center>
	<div style = "margin-top:100px;margin-bottom:100px;	">
		<form action = '../checkout' method = 'post'>
			{!! csrf_field() !!}
			<input type = 'submit' name = 'checkout' value = 'checkout' style = "font-size:25px"/>
			<a href="/" style = "font-size:25px">Continue shopping</a>
		</form>
	</div>
	</center>
	@endif
@stop