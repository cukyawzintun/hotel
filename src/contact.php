<?php 
		session_start();
		include '../header.php'; 
	?>
<head>
	<!-- <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"> -->
	<style>
		@font-face{
			font-family:"TheAntiquaSun";
			src:url("../font/TheAntiquaSun.otf");
		}
		.contact_info h3 , .contact-form h3{
			font-size: 30px;
			font-family:"TheAntiquaSun";
		}
		.company_address h3 {
			font-size: 16px;
			font-family:"TheAntiquaSun";
			font-weight: 200;
		}
		
		.contact-margin {
			margin-bottom: 10px;
		}
		.p {
			display: inline;
		}
		i {
			display:inline;
			line-height:50px;
			text-align:center;
		}
	</style>
</head>
<body>	
	<!--start main -->
	<div class="main_bg">
	<div class="wrap">
		<div class="main">
			<div class="contact">				
					<div class="contact_left">
						<div class="contact_info">
				    	 	<h3>Find Us Here</h3>
				    	 		<div class="map">
						   			<!-- <img src="../images/map.png" alt="">	 -->
						   		</div>	
	      				</div>
	      			<div class="company_address">
					     	<h3>Company Information :</h3>
							<div class='contact-margin'>
								<i class="fa fa-home"></i>
								<p class='p'>500 Lorem Ipsum Dolor Sit,</p>
								<p style="margin-left: 15px;">22-56-2-9 Sit Amet, Lorem,</p>
								<p style="margin-left: 15px;">USA</p>
							</div>
					   		<div class='contact-margin'>
					   			<i class="fa fa-phone" ></i>
					   			<p class='p'>Phone:(00) 222 666 444</p>
					   		</div>
					   		<div class='contact-margin'>
					   			<i class="fa fa-fax" ></i>
					   			<p class='p'>Fax: (000) 000 00 00 0</p>
					   		</div>
					 	 	<div class='contact-margin'>
					 	 		<i class="fa fa-envelope"></i>
					 	 		<p class='p'>Email:<a href="mailto:info@mycompany.com">info(at)mycompany.com</a>
					 	 		</p>
					 	 	</div>
					   		<div class='contact-margin'>
					   			<i class="fa fa-share-alt"></i>
					   			<p class='p'>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
					   		</div>
					   </div>
					</div>				
					<div class="contact_right">
					  <div class="contact-form">
					  	<i class="fa fa-map-marker fa-2x" ></i><h3 style="display:inline;"> &nbsp;Map</h3>
						   <div class="map">
						   		<img src="../images/map.jpg" alt="">
						   </div>
					    </div>
	  				</div>		
	  				<div class="clear"></div>		
			  </div>
		</div>
	</div>
	</div>		
	<!--start main -->
	<!-- start footer -->
	<?php include '../footer.php'; ?>
</body>
</html>