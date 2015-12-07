@extends('layout.mainlogin')

@section('content')

 <div class="login" style = "width:900px;margin:auto;">
          	<div class="wrap">
				
				<div class="col_1_of_login span_1_of_login">
				<div class="login-title">
	           		<h4 class="title">Registered Customers</h4>	
					<div id="loginbox" class="loginbox">
						<form action="" method="post" name="login" id="login-form">
							{!! csrf_field() !!}
							@if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li style ="color:red">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">User Name</label>
						      <input name = "name" id="modlgn_username" required type="text" name="email" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Password</label>
						      <input id="modlgn_passwd" required type="password" name="password" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
							   </p>
							    <input type="submit" name="Submit" class="button" value="Login"><div class="clear"></div>
							 </div>
						  </fieldset>
						 </form>
					</div>
			    </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
@stop