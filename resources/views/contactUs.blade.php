@extends('layout.main')

@section('content')

<div class="main">
	<div class="wrap">
		<div class="section group">
		  <div class="cont span_2_of_3">
		  	@if (session('affirm'))
			    <b style = "color:green;font-size:25px">{{session('affirm')}}</b>
			    
			@endif
			 <div class = "container-fluid">
				<section id="section-flip-1" class="content-current">
				     <center> 
				     <img src="http://www.gomecogroup.com/images/about-us_images/about-us.jpg" onerror="this.src='http://www.gomecogroup.com/images/default_images/default_GMC.jpg';" class="img-responsive"> 
				     </center>
		             <div class="font-color_gray font-size_small  font-style_p">
					 <strong>You can contact us</strong><br><br>
					<p><strong>Telephone No:</strong>  (+63 2) 292-4421</p>
					<p> <strong>Email us:</strong>  info@gomecogroup.com</p>	
					</div>
				</section>
			 </div>
		  </div>
		  <div class="clear"></div>
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
			 
		   
		   <div class="section group example">
			  
			 <div class="col_1_of_f_1 span_1_of_f_1">
			   <div class="section group example">
               
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