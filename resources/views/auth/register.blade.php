@extends('layout.mainlogin')

@section('content')
 <div class="login" style = "margin-bottom:300px; width:900px;margin:auto;">

          	<form class="pure-form pure-form-aligned" enctype="multipart/form-data" style = "margin-top:30px" action = '' method = 'post'>
	{!! csrf_field() !!}
	
    <fieldset>
    	@if (session('error'))
		   <b style = "color:red">{{ session('error') }}</b>
		@endif
        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li style ="color:red">{!! $error !!}</li>
            @endforeach
        </ul>
        @endif
        <legend>Registration</legend>
    	
    	
        <div class="pure-control-group">
            <label for="name">User name:</label>
            
            <input required type = 'text' name = 'name' placeholder = "user name" value= "{{old('name')}}" />
        </div>

        <div class="pure-control-group">
            <label for="name">Password:</label>
            <input required class = "pure-input-1-3"  name = "password" type="password" placeholder = "password"/>
        </div>
        <div class="pure-control-group">
            <label for="name">Retype Password:</label>
            <input required class = "pure-input-1-3"  name = "password_confirmation" type="password"  placeholder = "retype password"/>
        </div>
         <div class="pure-control-group">
            <label for="name">Last name:</label>
            
            <input required type = 'text' name = 'lastname' placeholder = "last name" value= "{{old('lastname')}}" />
        </div>
         <div class="pure-control-group">
            <label for="name">First name:</label>
            
            <input required type = 'text' name = 'firstname' placeholder = "first name" value= "{{old('firstname')}}"/>
        </div>
         <div class="pure-control-group">
            <label for="name">Middle name:</label>
            
            <input required type = 'text' name = 'middlename' placeholder = "middle name" value= "{{old('middlename')}}"/>
        </div>
 		<div class="pure-control-group">
            <label for="name">Mobile number:</label>
            <input required class = "pure-input-1-3"  name = "mobilenumber" type="number" placeholder="mobile number" value= "{{old('mobilenumber')}}"/>
        </div>
 		<div class="pure-control-group">
            <label for="name">Email address:</label>
            <input required class = "pure-input-1-3"  name = "email" type="email" placeholder="email address" value= "{{old('email')}}"/>
        </div>
        <div class="pure-control-group">
            <label for="name">Complete address:</label>
            <textarea required class = "pure-input-1-3"  name = "address">{{old('address')}}</textarea>
        </div>
        <div class="pure-controls">
            
            <button name = 'register' type="submit" class="pure-button pure-button-primary">Register</button>
        </div>
    	
    </fieldset>
</form>
	</div>
@stop