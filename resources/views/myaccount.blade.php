@extends('layout.main')
@section('content')
	<div style = "width:1000px;margin:auto;">
<form class="pure-form pure-form-aligned" enctype="multipart/form-data" style = "margin-top:30px" action = '' method = 'post'>
	{!! csrf_field() !!}
	
    <fieldset>
    	@if($error != "")
        <p style = "color:red;">{!! $error !!}</p>
        @endif
        @if(session('affirm'))
        <p style ="color:green">{!! session('affirm') !!}</p>
            
        @endif
        @if(Auth::user()->active == 0)
            <p style = "color:red;">Please check your email and  validate your account within 24 hours. Order made by invalid users are marked as false orders</p>
        
        @endif
        <legend>Personal information</legend>
    	
    	
        <div class="pure-control-group">
            <label for="name">User name:</label>
            
            <input required type = 'text' name = 'username' value = '{{$user->name}}'/>
        </div>
         <div class="pure-control-group">
            <label for="name">Last name:</label>
            
            <input required type = 'text' name = 'lastname' value = '{{$user->lastname}}'/>
        </div> 
        <div class="pure-control-group">
            <label for="name">First name:</label>
            
            <input required type = 'text' name = 'firstname' value = '{{$user->firstname}}'/>
        </div>
        <div class="pure-control-group">
            <label for="name">Middle name:</label>
            
            <input required type = 'text' name = 'middlename' value = '{{$user->middleName}}'/>
        </div>
 		<div class="pure-control-group">
            <label for="name">Mobile number:</label>
            <input required class = "pure-input-1-3"  name = "mobilenumber" type="number" placeholder="mobile number" value = '{{$user->mobileNumber}}'>
        </div>
 		<div class="pure-control-group">
            <label for="name">Email address:</label>
            <input required class = "pure-input-1-3"  name = "email" type="email" placeholder="middle name" value = '{{$user->email}}'>
        </div>
        <div class="pure-control-group">
            <label for="name">Complete address:</label>
            <textarea required class = "pure-input-1-3"  name = "address">{{$user->customer_address}}</textarea>
        </div>
        <div class="pure-controls">
            
            <button name = 'save' type="submit" class="pure-button pure-button-primary">Save</button>
        </div>
    	
    </fieldset>
</form>
<form class="pure-form pure-form-aligned" enctype="multipart/form-data" style = "margin-top:30px" action = '' method = 'post'>
	{!! csrf_field() !!}
    <fieldset>
    	<legend>Change password</legend>
    	<div class="pure-control-group">
            <label for="name">Old password:</label>
            <input required class = "pure-input-1-3"  name = "oldpassword" type="password" />
        </div>
        <div class="pure-control-group">
            <label for="name">New password:</label>
            <input required class = "pure-input-1-3"  name = "newpassword" type="password" />
        </div>
        <div class="pure-control-group">
            <label for="name">Confirm new password:</label>
            <input required class = "pure-input-1-3"  name = "confirmnewpassword" type="password" />
        </div>
        <div class="pure-controls">
            
            <button name = 'changepassword' type="submit" class="pure-button pure-button-primary">Change password</button>
        </div>
    </fieldset>

</div>
</div>
@stop