@extends('layout.main')
@section('content')
	<div style = "width:1000px;margin:auto;">
<form class="pure-form pure-form-aligned" enctype="multipart/form-data" style = "margin-top:30px" action = '' method = 'post'>
	{!! csrf_field() !!}
	
    <fieldset>
    	@if($error != "")
        <p style = "color:red;">{{$error}}</p>
        @endif
        @if(isset($_SESSION['affirm']))
        <p style ="color:green;font-size:25px">{{$_SESSION['affirm']}}</p>
            <?php unset($_SESSION['affirm']); ?>
        @endif
        	@if (session('affirm'))
			    <b style = "color:green;font-size:25px">{{session('affirm')}}</b>
			    
			@endif
			@if (session('affirmRegistration'))
			    <b style = "color:green;font-size:25px">{{session('affirmRegistration')}}</b>
			    
			@endif
        <legend>Personal information</legend>
    	
    	
        <div class="pure-control-group">
            <label for="name">Name:</label>
            
            <input required type = 'text' name = 'username' value = '{{$user->name}}'/>
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