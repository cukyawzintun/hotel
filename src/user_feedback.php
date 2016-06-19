<?php 
		session_start();
		/*if(!isset($_SESSION["userid"])){
 			header("Location: 404.php");
		}*/

		include '../header.php'; 
		include 'db_connect.php';
		if(isset($_POST['submit'])){
			$userName = $_POST['userName'];
			$email = $_POST['userEmail'];
			$description = $_POST['userMsg'];
			$success = mysqli_query($con,"INSERT INTO feedback (name,email,description,`date`) VALUES ('$userName','$email','$description',NOW())") or die("feedback can't insert");
			if($success){ 
				header('location:user_feedback.php'); 
			}
		}
	?>
<head>
	<link rel="stylesheet" href="../css/font-awesome.css">
	<style>
		/* start feedback */
		@font-face{
			font-family:"TheAntiquaSun";
			src:url("../font/TheAntiquaSun.otf");
		}
		.feedback{
			display: block;
		}
		.feedback_header{
			width: 100%;
			margin : 0 auto 30px;
		}
		.feedback_header header h2 {
			width: 300px;
			margin: 20px auto 10px;
			font-size: 30px;
			line-height: 26px;
			text-align: center;
			color: #6f1200;
			font-weight: 400;
			font-family:"TheAntiquaSun";
			margin-bottom: 50px;
		}
		.feedback_header header h2:after {
		    content: "";
		    width: 162px;
		    width: 10.125rem;
		    display: block;
		    border-top: 1px solid #896633;
		    padding-bottom: 30px;
		    padding-bottom: 1.875rem;
		    margin-top: 6px;
		    margin-top: .58rem;
		    color: #896633;
		    position: absolute;
		    left: 50%;
		    margin-left: -81px;
		    margin-left: -5.0625rem;
		}
		.feedback_header header p {
			width: 800px;
			margin: 0 auto;
			font-size: 14px;
		}
		.feedback_header header hr {
			border-bottom: 1px solid #d7d7d7;
			margin-top: 20px;
		}
		.feedback_left {
			float:left;
			margin-right:10.3333%;
			width: 32.3333%;
		}
		.feedback_right {
			float:left;
			width: 55.3333%;
		}
		.feedback_left h3{
			margin-bottom: 2%;
			text-transform: capitalize;
			font-size: 1.5em;
			color: #252525;
			font-weight: 100;
		}
		.company_address{
			padding-top:10px;
		}
		.company_address p{
			color: #242424;
			text-shadow: 0 1px 0 #ffffff;
			line-height: 1.8em;
			font-size: 0.8125em;
			font-weight: 600;
		}
		.company_address p a{
			color: #52ABDF;
			cursor: pointer;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
			text-shadow: 0 1px 0 #ffffff;
		}
		.company_address p a:hover{
			color: #242424;
		}
		.map{
			margin: 6% 0 4%;
		}
		.feedback_right h3{
			margin-bottom: 2%;
			text-transform: capitalize;
			font-size: 1.5em;
			color: #252525;
			font-weight: 100;
		}
		.feedback-form{
			position:relative;
			padding-bottom:30px;
		}
		.feedback-form div{
			padding:5px 0;
		}
		.feedback-form span{
			display: block;
			color: #252525;
			text-shadow: 0 1px 0 #ffffff;
			line-height: 1.5em;
			font-size: 0.7825em;
		}
		.feedback-form input[type="text"],.feedback-form textarea{
			font-family: 'Open Sans', sans-serif;
			margin-top: 5px;
			padding: 10px;
			display: block;
			width: 98% !important;
			background: rgba(255, 255, 255, 1);
			outline: none;
			color: #555555;
			font-size: 1em;
			border: 1px solid rgb(224, 224, 224);
			-webkit-appearance: none;
		}
		.feedback-form textarea{
			resize:none;
			height:120px;		
		}
		.feedback-form input[type="submit"]{
			margin-top: 10px;
			display: inline-block;
			text-transform: uppercase;
			background: #32A2E3;
			font-family: 'Open Sans', sans-serif;
			color: #FFF;
			padding: 15px;
			border: none;
			font-size: 1em;
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-moz-transition: 0.5s all;
			-o-transition: 0.5s all;
			outline: none;
			cursor: pointer;
			float: right;
			width: 25% !important;
			-webkit-appearance: none;
		}
		.feedback-form input[type="submit"]:hover{
			background: #228AC6;
		}
		/*end feedback*/
		.user {
			min-width: 300px;
			height: 60px;
			display: inline;
			float: left;
			margin-right: 200px;
		}
		.user>img {
			width:50px;
			height:50px;
			display:inline;		
			float: left;
		}
		.user>h4 {
			margin-left: 10px;
			width: 100px;
			display:inline;
			line-height: 50px; 
			text-align: center;
			font-size: 20px;
			color: #D50000;
		}
		.clear {
			clear: both;
		}
		.comment {
			padding: 35px 10px;
			padding: 7px;
			background-color:#BDBDBD;
			border-radius: 3px;
			width: 500px;
			margin-left: 70px;
		}
		/*.comment {
			position: relative;
			display:inline-block;
			max-width:550px;
			min-height:1.5em;
			padding: 20px;
			background: #FFFFFF;
			border: #7F7F7F solid 2px;
			-webkit-border-radius: 20px;
			-moz-border-radius: 20px;
			padding: 35px 10px;
			padding: 7px;
			background-color:#BDBDBD;
			border-radius: 3px;
			width: 500px;
			margin-left: 70px;
		}
			
		.comment:after {
			content: "";
			position: absolute;
			top: -15px;
			left: 3%;
			border-style: solid;
			border-width: 0px 15px 15px;
			border-color: #FFFFFF transparent;
			display: block;
			width: 0;
			z-index: 1;
		}
		.comment:before {
			content: "";
			position: absolute;
			top: -19.5px;
			left: calc(3% - 3px) ;
			border-style: solid;
			border-width: 0px 18px 18px;
			border-color: #7F7F7F transparent;
			display: block;
			width: 0;
			z-index: 0;
		}*/
	</style>
</head>
<body>

	<!--start main -->
	<div class="main_bg">
	<div class="wrap">
		<div class="main">
			<div class="feedback">
					<div class="feedback_header">
						<header>
							<h2>HOTEL FEEDBACK</h2>
							<p>If you have a comment, compliment or concern regarding your stay and experience at PARADISE, please do share it with us</p>
							<hr>
						</header>
					</div>				
					<div class="feedback_left">
						<div class="feedback-form">
					  		<h3>Feedback</h3>
						    <form method="post" action="user_feedback.php">
						    	<div>
							    	<span><label>NAME</label></span>
							    	<span><input name="userName" type="text" class="textbox" required></span>
							    </div>
							    <div>
							    	<span><label>E-MAIL</label></span>
							    	<span><input name="userEmail" type="text" class="textbox" required></span>
							    </div>
							    <div>
							    	<span><label>SUBJECT</label></span>
							    	<span><textarea name="userMsg"> </textarea></span>
							    </div>
							   <div>
							   		<span><input type="submit" name='submit' value="submit us" required></span>
							  </div>
						    </form>
					    </div>
					</div>				
					<div class="feedback_right">
					  	<?php 
							$query = "SELECT * FROM feedback ORDER BY id DESC";
							$result = mysqli_query($con,$query);
							while($row = mysqli_fetch_array($result)):
					 	?>
						<div style="" style="width: 500px;">
							<div class="user">
								<img src="../images/user-icon.png"/>
								<!-- <i class="fa fa-user" style="font-size:60px;" aria-hidden="true"></i> -->
                    			<h4><?php echo $row['name']; ?> </h4>                      
							</div>
							<span style="width:100px;">
								<i class="fa fa-clock-o" aria-hidden="true" style="display:inline;line-height:50px;text-align:center;"></i>
								<h5 style="display:inline;line-height:50px;text-align:center;font-size:12px;">
									<?php echo $row['date']; ?>
								</h3>
							</span>
						</div> 
						<div class="clear"></div>    
					
               			<div class="comment">
               				<?php echo $row['description']; ?>
               			</div><br/>
					 	<?php endwhile; ?>
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