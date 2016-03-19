@extends('layout.main')
@section('content')

	<center>
<h1>Check out - Review</h1>
	</center>
	<div style = "width:1000px;margin:auto;">
	<fieldset>
		<legend>Shipping and Billing address </legend>
		<div class="pure-control-group">
            <label for="name">name:</label> 
			{{ ( Auth::check() ) ? Auth::user()->firstname . " " . Auth::user()->lastname : $name}}
			@if(Auth::check())
			{{Auth::User()->firstname}}
			@else
			not logged in
			@endif
    	</div>
		<div class="pure-control-group">
            <label for="name">address:</label>
			{{$address}}
    	</div>
	</fieldset>
	<fieldset>
		<legend>Order Summary ({{Cart::getTotalQuantity()}} item{{(Cart::getTotalQuantity() > 1) ? 's':''}})</legend>
		<table  class="pure-table">
		<thead>
			<th>Product</th>
			<th>Quantity</th>
			<th>Price</th>
			
		</thead>
		@foreach($orders as $order)
			<tr>
				<td>{{$order->name}}</td>
				<td>{{$order->quantity}}</td>
				<td>₱{{$order->price}}</td>
			</tr>
		@endforeach

	</table>
	<div class="pure-control-group">
            <label for="name">Total:</label>
           
			<font style = "font-size:12px;"> ₱{{formatMoney(Cart::getSubTotal(), true)}} </font>
    	</div>
	</fieldset>
	<form action = '' method = 'post' style = "margin-top:50px;margin-bottom:50px;">
		{!! csrf_field() !!}
		<input type = 'hidden' name = 'name' value = "{{$name}}"/>
		<input type = 'hidden' name = 'address' value = "{{$address}}"/>
		<input type = 'hidden' name = 'mobile' value = "{{$mobile}}"/>
		<input type = 'hidden' name = 'email' value = "{{$email}}"/>
		<input type = 'submit' name = 'placeorder' value = 'Place your order' style = "font-size:28px;" />
	</form>
</div>
@stop