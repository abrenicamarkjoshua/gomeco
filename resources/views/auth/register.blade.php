@extends('layout.mainlogin')

@section('content')
 <div class="login" style = "margin-bottom:300px; width:900px;margin:auto;">

          	<form class="pure-form pure-form-aligned" enctype="multipart/form-data" style = "margin-top:30px" action = '' method = 'post'>
	{!! csrf_field() !!}
	
    <fieldset>
    	@if (session('error'))
		   <b style = "color:red">{{ session('error') }}</b>
		@endif
        <legend>Registration</legend>
    	
    	
        <div class="pure-control-group">
            <label for="name">User name:</label>
            
            <input required type = 'text' name = 'name' />
        </div>

        <div class="pure-control-group">
            <label for="name">Password:</label>
            <input required class = "pure-input-1-3"  name = "password" type="password"  />
        </div>
        <div class="pure-control-group">
            <label for="name">Retype Password:</label>
            <input required class = "pure-input-1-3"  name = "retypePassword" type="password"  />
        </div>
         <div class="pure-control-group">
            <label for="name">Last name:</label>
            
            <input required type = 'text' name = 'lastname' />
        </div>
         <div class="pure-control-group">
            <label for="name">First name:</label>
            
            <input required type = 'text' name = 'firstname' />
        </div>
         <div class="pure-control-group">
            <label for="name">Middle name:</label>
            
            <input required type = 'text' name = 'middlename' />
        </div>
 		<div class="pure-control-group">
            <label for="name">Mobile number:</label>
            <input required class = "pure-input-1-3"  name = "mobilenumber" type="number" placeholder="mobile number" />
        </div>
 		<div class="pure-control-group">
            <label for="name">Email address:</label>
            <input required class = "pure-input-1-3"  name = "email" type="email" placeholder="middle name" />
        </div>
        <div class="pure-control-group">
            <label for="name">Complete address:</label>
            <textarea required class = "pure-input-1-3"  name = "address"></textarea>
        </div>
        <div class="pure-controls">
            
            <button name = 'register' type="submit" class="pure-button pure-button-primary">Register</button>
        </div>
    	
    </fieldset>
</form>
	</div>
@stop