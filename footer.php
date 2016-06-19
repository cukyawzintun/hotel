<?php 
	$url1 = str_replace("/src","","http://".$_SERVER['HTTP_HOST'].dirname($_SERVER["SCRIPT_NAME"]));
 ?>
<div class="footer_bg">
<div class="wrap">
<div class="footer">
			<div class="copy">
				<p class="link"><span><?php echo date("Y"); ?> Copyright © All rights reserved</span></p>
			</div>
			<div class="f_nav">
				<ul>
					<li><a href="<?php echo $url1; ?>/index.php">home</a></li>
					<li><a href="<?php echo $url1; ?>/src/rooms.php">rooms & suits</a></li>
					<li><a href="<?php echo $url1; ?>/src/reservation.php">reservation</a></li>
					<li><a href="<?php echo $url1; ?>/src/contact.php">Contact</a></li>
					<?php 
						if(isset($_SESSION["userid"])){
					?>
						<li><a href="<?php echo $url1; ?>/src/user_feedback.php">Feed Back</a></li>
					<?php		
						}
					?>
				</ul>
			</div>
			<div class="soc_icons">
				<ul>
					<li><a class="icon1" href="#"></a></li>
					<li><a class="icon2" href="#"></a></li>
					<li><a class="icon3" href="#"></a></li>
					<li><a class="icon4" href="#"></a></li>
					<li><a class="icon5" href="#"></a></li>
					<div class="clear"></div>
				</ul>	
			</div>
			<div class="clear"></div>
</div>
</div>
</div>