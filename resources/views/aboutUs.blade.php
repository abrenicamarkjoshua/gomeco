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
				<div class="col-xs-12">
			        <h1 id="top" class="font-color_black head-box font-style_p">Our Commitment for Fabrication</h1>		
			        <p class="text-justify font-size_medium font-style_p">
			            Gomeco Metal Corporation has earned the niche of being the Philippine's largest designer and fabricator of kitchen stainless steel equipment and architectural fixture systems. Serving the demands of Foodservice, Hospitality, Healthcare and Construction Industries, we have lived up to its corporate values and reputation for almost four decades.
			            <br><br></p>
					<p class="text-justify font-size_medium font-style_p">
			            Proud to be at the forefront of planning, designing, developing, manufacturing, and supplying state-of-the-art cooking equipment, food service counters, refrigeration, and bakery equipment.
			        </p><br>
					<center><img src="http://www.gomecogroup.com/images/index_images/home-img.jpg" height="300" class="img-responsive"></center>
			   </div>


			    <div class="col-xs-12">
			        <h1 class="font-color_black head-box font-style_p">Customizing Our Clients</h1>
			        <p class="text-justify font-size_medium font-style_p">
			            With over 38 years of craftsmanship experience, Gomeco Metal Corporation also offers customization of stainless materials using advanced CNC System equipment to manufacture products in every kitchen and other architectural equipment. We guarantee that every customized product is technically and exclusively designed and fabricated to meet and ensure optimum satisfaction. With our complete package, from Planning and Design, Production, and Installation to after Sales, Preventive Maintenance Services, and Project Management, it is assured that clients get what they expect, need and deserve.
			        </p>
					
			    </div>
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