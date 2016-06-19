<?php 
	$url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER["SCRIPT_NAME"]);
	$url1 = str_replace("/src","","http://".$_SERVER['HTTP_HOST'].dirname($_SERVER["SCRIPT_NAME"]));
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="<?php echo $url1; ?>/images/favicon.ico" type="image/x-icon" rel="shortcut icon">
	<title>PHP Tutorial</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="<?php echo $url1; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo $url1; ?>/css/font-awesome.css">
	<script src="<?php echo $url1; ?>/js/jquery.min.js"></script>

	<!--start slider -->
	 <link rel="stylesheet" type="text/css" href="css/slider.css">

	<!--end slider -->
	<!---strat-date-piker---->
	<link rel="stylesheet" href="<?php echo $url1; ?>/css/jquery-ui.css" />
	<style>
		.member {
			margin-left: 25px;
		}
		.member>.f-slash {
			display: inline;
		}
		.member>li:nth-child(2){
			margin-left: -5px;
		}
	</style>
	<script src="<?php echo $url1; ?>/js/jquery-ui.js"></script>
			  <script>
					  $(function() {
					  	$("#datepicker,#datepicker1").datepicker({ minDate: 0 });
					    $( "#datepicker,#datepicker1" ).datepicker();
					  });
			  </script>
	<!---/End-date-piker---->
	<link type="text/css" rel="stylesheet" href="<?php echo $url1; ?>/css/JFGrid.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $url1; ?>/css/JFFormStyle-1.css" />
			<!-- Set here the key for your domain in order to hide the watermark on the web server -->
			<script type="text/javascript">
				(function() {
					JC.init({
						domainKey: ''
					});
					})();
			</script>
	<!--nav-->
	<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
	
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
	
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
	</script>
</head>
<body>
	<!-- start header -->
<div class="header_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="<?php echo $url1; ?>/index.php"><img src="<?php echo $url1; ?>/images/logo.png" alt=""></a>
		</div>
		<div class="h_right">
			<!--start menu -->
			<ul class="menu">
				<li class="active"><a href="<?php echo $url1; ?>/index.php">hotel</a></li> |
				<li><a href="<?php echo $url1; ?>/src/rooms.php">rooms & suits</a></li> |
				<li><a href="<?php echo $url1; ?>/src/reservation.php">reservation</a></li> |
				<li><a href="<?php echo $url1; ?>/src/contact.php">contact</a></li> |
				<?php 
					//if(isset($_SESSION["userid"])){
				?>
					<li><a href="<?php echo $url1; ?>/src/user_feedback.php">Feed Back</a></li>
				<?php		
					//}
				?>	
				<span class="member">
					<?php 
    					if(isset($_SESSION["userid"])){
    						if($_SESSION['status'] == 1){
    							echo '<li><a href="'.$url1.'/src/show_hotel.php">Admin Panel</a></li>
    								<li><a href="'.$url1.'/src/logout.php">logout</a></li>';
    						}else {
    							echo '<li><a href="'.$url1.'/src/user_profile.php">'.$_SESSION['userName'].'</a></li>
    							       <li><a href="'.$url1.'/src/logout.php">logout</a></li>';
    						}
    					}else {							
							echo '<li><a href="'.$url1.'/src/login.php">Login</a></li>
									<li><a href="'.$url1.'/src/user_reg.php">Register</a></li>';
    					}
 					?>
				</span>
				<div class="clear"></div>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="top-nav">
		<nav class="clearfix">
				<ul>
				<li class="active"><a href="<?php echo $url; ?>/index.php">hotel</a></li> 
				<li><a href="<?php echo $url1; ?>/src/rooms.php">rooms & suits</a></li> 
				<li><a href="<?php echo $url1; ?>/src/reservation.php">reservation</a></li>  
				<li><a href="<?php echo $url1; ?>/src/contact.php">contact</a></li>
				<?php 
					//if(isset($_SESSION["userid"])){
				?>
					<li><a href="<?php echo $url1; ?>/src/user_feedback.php">Feed Back</a></li>
				<?php		
					//}
				?>
				</ul>
				<a href="#" id="pull">Menu</a>
			</nav>
		</div>
	</div>
</div>
</div>
</body>
</html>