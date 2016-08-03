	<?php 
		include 'src/db_connect.php';
		session_start();
		$_SESSION['url'] = $_SERVER['REQUEST_URI'];
		$query = "SELECT room_db.room_type ,room_db.room_image , room_type.name, room_db.price
					FROM room_db INNER JOIN room_type ON room_db.room_type = room_type.id
					ORDER BY RAND() LIMIT 3";
		$result = mysqli_query ($con,$query);			
	?>
	<!-- start header -->
	<?php include 'header.php';  ?>

	<head>
		<link rel="stylesheet" href="css/remodal.css">
  		<link rel="stylesheet" href="css/remodal-default-theme.css">
	</head>
	<!----start-images-slider---->
				<div id="wowslider-container1">
					<div class="ws_images">
						<ul>
							<li><img src="images/slider/images/1.jpg" id="image1_0"/></li>
							<li><img src="images/slider/images/2.jpg" id="image1_1"/></li>
							<li><img src="images/slider/images/3.jpg" id="image1_2"/></li>
							<li><img src="images/slider/images/4.jpg" id="image1_3"/></li>
							<li><img src="images/slider/images/5.jpg" id="image1_4"/></li>
						</ul>
					</div>
					<div class="ws_bullets">
						<div>
							<a href="#" title="1"><span><img src="images/slider/tooltips/1.jpg" alt="1"/>1</span></a>
							<a href="#" title="2"><span><img src="images/slider/tooltips/2.jpg" alt="2"/>2</span></a>
							<a href="#" title="3"><span><img src="images/slider/tooltips/3.jpg" alt="3"/>3</span></a>
							<a href="#" title="4"><span><img src="images/slider/tooltips/4.jpg" alt="4"/>4</span></a>
							<a href="#" title="5"><span><img src="images/slider/tooltips/5.jpg" alt="5"/>5</span></a>
						</div>
					</div>
				<div class="ws_shadow"></div>
				</div>	
				<script type="text/javascript" src="js/wowslider.js"></script>
				<script type="text/javascript" src="js/script.js"></script>
				<!-- End slider section -->
			    <!--/slider -->
	<!--start main -->
	<div class="main_bg">
	<div class="wrap">
		<!--start grids_of_3 -->
		<div class="grids_of_3">
			<?php 
				$count = 0;
				while($row = mysqli_fetch_array($result)){
				?>
			<div class="grid1_of_3">
				<div class="grid1_of_3_img">
					<a href="src/reservation.php">
						<span class="next"> </span>
						<img src="images/<?php echo $row['room_image']; ?>" alt="" height="320" />
					</a>
				</div>
				<h4>
					<a href="#"><?php echo $row['name']; ?> Room<span>
					<?php echo '$'.$row['price']; ?></span>
					</a>
				</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
			</div>

			<?php 
				//endwhile; 
					} 
			?>	
			<div class="clear"></div>	
		</div>
	</div>
	</div>

	<div class="remodal" data-remodal-id="thanks" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
	  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	  <div>
	    <h2 id="modal1Title">Thanks you for you booking</h2><br>
	    <p id="modal1Desc">
	      You shall receive an e-mail containing your tickets once we have confirmed payment.		
	      I would like to thank you for your recent visit to PARADISE Hotel. It was truly a pleasure to serve you.
		  I hope that the accommodations and service were to your liking, as complete satisfaction is our goal at PARADISE Hotel.
		  We would love to have the pleasure of seeing you as a regular guest. I have also enclosed a few business cards in the hopes that you will pass them on to friends in need of lodging 
		  in the Othertown area.We are looking forward to your next visit and wish you the best in your business and personal endeavors.
	    </p>
	  </div>
	  <br>
	  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
	</div>

	<!-- <div class="remodal" data-remodal-id="feedback" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
	  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	  <div>
	    <p id="modal1Desc">
			Dear Guest. Thank you for your positive comments. I am so glad to hear that you enjoyed your stay with us! I hope your next stay and just around the corner. Call us if there is anything we can help you with.
	    </p>
	  </div>
	  <br>
	  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
	</div> -->

	<script src="js/jquery.js"></script>
	<script src="js/remodal.js"></script>		
	<!--end main -->
	<!-- start footer -->
	<?php include 'footer.php'; ?>		