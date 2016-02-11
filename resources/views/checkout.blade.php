@extends('layout.main')
@section('content')
<center>
	<h1>Enter contact details and billing address</h1>
</center>
	<div style = "width:1000px;margin:auto;">
	<fieldset>
		<legend>Continue without account</legend>
		<form action = '../review' method = 'post' class="pure-form pure-form-aligned">
			{!! csrf_field() !!}
			<div class="pure-control-group">
            <label for="name">email:</label>
            <input class = "pure-input-1-3" id="name" type="email" name = 'email' required placeholder="email" />
        	</div>

	        <div class="pure-control-group">
	            <label>First & Last name:</label>
	            <input class = "pure-input-1-3" type = 'text' name = 'name' required placeholder ='complete name' />
	        </div>
	         <div class="pure-control-group">
	            <label>Complete address:</label>
	            <textarea required class = "pure-input-1-3" name = 'address' ></textarea>
	        </div>
	         <div class="pure-control-group">
	            <label>Mobile number:</label>
	            <input class = "pure-input-1-3" type = 'number' name = 'mobile' required placeholder ='mobile number' />
	        </div>
	        <div class="pure-controls">
	            

	            <button type="submit" name = 'checkoutWithoutAccount' class="pure-button pure-button-primary">continue checkout</button>
	        </div>
		</form>
	</fieldset>
	<fieldset>
		<legend>Continue with existing account</legend>
		<form action = '../review' method = 'post' class="pure-form pure-form-aligned">
			{!! csrf_field() !!}
			

			<div class="pure-control-group">
	            <label for="name">Email:</label>
	            <input class = "pure-input-1-3" id="name" type="email" name = 'email' required placeholder="email" />
        	</div>
        	<div class="pure-control-group">
	            <label for="name">password:</label>
	            <input class = "pure-input-1-3" name ="password" type="password" required/>
        	</div>
        	 <div class="pure-controls">
	            

	            <button type="submit" name = 'LoginAndCheckout' class="pure-button pure-button-primary">log-in and continue checkout</button>
	        </div>
		</form>
	</fieldset>

	<fieldset>
		<legend>Create account and continue checkout</legend>
		<form action = '../review' method = 'post' class="pure-form pure-form-aligned">
			{!! csrf_field() !!}			

			<div class="pure-control-group">
	            <label for="name">User name:</label>
	            <input class = "pure-input-1-3" id="usernamename" type="text" required placeholder="username" name = "username"/>
        	</div>
			<div class="pure-control-group">
	            <label for="name">Email:</label>
	            <input class = "pure-input-1-3" id="name" type="email" required placeholder="email" name = 'email'/>
        	</div>
        	<div class="pure-control-group">
	            <label for="name">password:</label>
	            <input class = "pure-input-1-3" name ="password" type="password" required/>
        	</div>
        	<div class="pure-control-group">
	            <label for="name">retype password:</label>
	            <input class = "pure-input-1-3" name = "repassword" type="password" required/>
        	</div>

	        <div class="pure-control-group">
	            <label>Last name:</label>
	            <input class = "pure-input-1-3" type = 'text' name = 'lastname' required placeholder ='last name' />
	        </div>
	         <div class="pure-control-group">
	            <label>First name:</label>
	            <input class = "pure-input-1-3" type = 'text' name = 'firstname' required placeholder ='First name' />
	        </div>
	         <div class="pure-control-group">
	            <label>Complete address:</label>
	            <textarea class = "pure-input-1-3" name = 'address' required></textarea>
	        </div>
	         <div class="pure-control-group">
	            <label>Mobile number:</label>
	            <input class = "pure-input-1-3" type = 'number' name = 'mobile' required placeholder ='mobile number' />
	        </div>
	        <div class="pure-controls">
	            

	            <button type="submit" name = 'RegisterAccountcheckout' class="pure-button pure-button-primary">register and continue checkout</button>
	        </div>
		</form>
	</fieldset>
</div>
@stop