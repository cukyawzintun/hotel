<?php
	session_start(); 
	include 'db_connect.php';
	include '../header.php';

	$check_in = $_POST['check_in_date'];
	$check_in_date = date("Y-m-d", strtotime($check_in));
	$check_out = $_POST['check_out_date'];
	$check_out_date = date("Y-m-d", strtotime($check_out));
	$adult = $_POST['adult'];
	$childern = $_POST['childern'];
	$hotel_name = $_POST['hotel_name'];
 ?>
<head>
	<link rel="stylesheet" href="../css/booking.css">
	<script src="../js/jquery.js"></script>
	<script>
		document.ready(function() {
			var selectbox = $("#mySelect"),
			submitButt = $("input[type='submit']");
			
			selectbox.click(function() {
				if($('#mySelect option:selected').value == 0){
					submitButt.attr("disabled");
				}	
			});
		});
	</script>
</head>
 <body>
 	<div id="available_container">
 		<!-- <div class="check_info">
 			<header class="check_details" style="margin-bottom: 30px;">
				<h2>Your Checking Details</h2>
			</header>
 			<div class="info">
 				<h4>Adult:</h4>
 				<div class="info_left">
 					<?php echo $adult; ?> &nbsp; Person
 				</div>
 			</div>
 			<div class="info">
 				<h4>Child:</h4>
 				<div class="info_left">
 					<?php echo $childern; ?> &nbsp; Person
 				</div>
 			</div>
 			<div class="info">
 				<h4>Hotel Name:</h4>
 				<div class="info_left">
 					<?php switch($hotel_name){
 						case 14: echo "Sedona";
 						break;

 						case 16: echo "Hotel Mandalay";
 						break;

 						default: echo "Hotel Bagan";
 					} ?>
 				</div>
 			</div>
 			<div class="info">
 				<h4>Check In:</h4>
 				<div class="info_left">
 					<?php echo $check_in_date; ?>
 				</div>
 			</div>
 			<div class="info">
 				<h4>Check Out:</h4>
 				<div class="info_left">
 					<?php echo $check_out_date; ?>
 				</div>
 			</div>
 		</div> -->
		
 		<div class="available_room">
 			<form action="booking_requirement.php" method="POST">
 				<input type='hidden' name='check_in_date' value='<?php echo $check_in_date; ?>'>
 				<input type='hidden' name='check_out_date' value='<?php echo $check_out_date; ?>'>
 				<input type='hidden' name='hotel_name' value='<?php echo $hotel_name; ?>'>
 				<input type='hidden' name='child' value='<?php echo $childern; ?>'>
 				<input type='hidden' name='adult' value='<?php echo $adult; ?>'> 			
 				<?php 
 					$select = "SELECT br.room_id
									FROM booking AS b
									INNER JOIN hotel AS h ON b.hotel_id = h.id
									INNER JOIN booking_room AS br ON b.id = br.booking_id
									WHERE  h.id =  '$hotel_name'
									AND ((check_in_date <= '$check_in_date' AND check_out_date >= '$check_in_date') 	OR
   										(check_in_date <= '$check_out_date' AND check_out_date >= '$check_out_date'	) OR
   										(check_in_date >= '$check_in_date' AND check_out_date <= '$check_out_date'))	";
					$check_query = mysqli_query($con, $select);
					$inQuery = $in_Query= "";
					$room_no=0;
					while ( $row = mysqli_fetch_array($check_query) ){
						$inQuery = $inQuery . $row['room_id'] .',' ;
					}
					$inQuery = rtrim($inQuery,",");
					if($inQuery!==""){$in_Query="AND r.id NOT IN ({$inQuery})";}
					$count_room  =  "SELECT COUNT(r.id) AS id
										FROM room_db AS r
										INNER JOIN hotel AS h ON r.hotel_name = h.id
										INNER JOIN location AS l ON h.location_id = l.id 
										WHERE r.room_type = '1' AND h.id = '$hotel_name' ".$in_Query;
					$available_room = mysqli_query ($con, $count_room);
					while($row = mysqli_fetch_array($available_room)) { 
						$room_no = $row["id"];
					}
		
					if($room_no>=0){
				?>
				<div class="single_room">
 					<img src="../images/available-room-single.jpg" alt="">
 					<div class="text_container">
 						<h2>Single Room</h2>
 						<p>These extravagantly designed queen-bedded suites have striking views of Boston city.</p>
 						<div class="text">
 							<h4>Price :</h4>
 							<div class="text_left">
 								<p>$120</p>
 							</div>
 						</div>
 						<div class="text">
 							<h4>Available Room :</h4>
 							<div class="text_left">
 								<?php echo $room_no; ?>		
 							</div>
 						</div>
 						<div class="text">
 							<h4>Select No Of Room :</h4>
 							<div class="text_left">
 								<select name='no_of_room_single' id="single" style="width:70px; margin-top: -5px;">
 									<option>0</option>
 									<?php 
 										for($i=1;$i<=$room_no;$i++){
 											echo "<option value='".$i."'>".$i."</option>";
 										}
 									 ?>
 								</select>			
 							</div>
 						</div>
 					</div>
 				</div>
	
				<?php
					}
					if($inQuery!==""){$in_Query="AND r.id NOT IN ({$inQuery})";}
					$count_room  =  "SELECT COUNT(r.id) AS id
										FROM room_db AS r
											INNER JOIN hotel AS h ON r.hotel_name = h.id
											INNER JOIN location AS l ON h.location_id = l.id 
											WHERE r.room_type = '2' AND h.id = '$hotel_name' ".$in_Query;
					$available_room = mysqli_query ($con, $count_room);
					while($row = mysqli_fetch_array($available_room)) { 
						$room_no = $row["id"];
					}
	
					if($room_no>=0){
 				 ?>
 				<div class="double_room">
 					<img src="../images/available-room-double.jpg" alt="">
 					<div class="text_container">
 						<h2>Double Room</h2>
 						<p>These extravagantly designed queen-bedded suites have striking views of Boston city.</p>
 						<div class="text">
 							<h4>Price:</h4>
 							<div class="text_left">
 								<p>$130</p>
 							</div>
 						</div>
 						<div class="text">
 							<h4>Available Room :</h4>
 							<div class="text_left">
 								<p><?php echo $room_no; ?></p>
 							</div>
 						</div>
 						<div class="text">
 							<h4>Select No Of Room :</h4>
 							<div class="text_left">
 								<select name='no_of_room_double' id="double" style="width:70px; margin-top: -5px;">
 									<option>0</option>
 									<?php 
 										for($i=1;$i<=$room_no;$i++){
 											echo "<option value='".$i."'>".$i."</option>";
 										}
 									 ?>
 								</select>			
 							</div>
 						</div>	
 					</div>
 				</div>	
 				<?php
 						}
 						if($inQuery!==""){$in_Query="AND r.id NOT IN ({$inQuery})";}
						$count_room  =  "SELECT COUNT(r.id) AS id
											FROM room_db AS r
												INNER JOIN hotel AS h ON r.hotel_name = h.id
												INNER JOIN location AS l ON h.location_id = l.id 
												WHERE r.room_type = '4' AND h.id = '$hotel_name' ".$in_Query;
						$available_room = mysqli_query ($con, $count_room);
						while($row = mysqli_fetch_array($available_room)) { 
							$room_no = $row["id"];
						}
		
						if($room_no>=0){
 				?>
 				<div class="twin_room">
 					<img src="../images/available-room-twin.jpg" alt="">
 					<div class="text_container">
 						<h2>Twin Room</h2>
 						<p>These extravagantly designed queen-bedded suites have striking views of Boston city.</p>
 						<div class="text">
 							<h4>Price:</h4>
 							<div class="text_left">
 								<p>$140</p>
 							</div>
 						</div>
 						<div class="text">
 							<h4>Available Room :</h4>
 							<div class="text_left">
 								<p><?php echo $room_no; ?></p><span id='test'></span>
 							</div>
 						</div>
 						<div class="text">
 							<h4>Select No Of Room :</h4>
 							<div class="text_left">
 								<select name='no_of_room_twin' id="twin" style="width:70px; margin-top: -5px;">
 									<option>0</option>
 									<?php 
 										for($i=1;$i<=$room_no;$i++){
 											echo "<option value='".$i."'>".$i."</option>";
 										}
 									 ?>
 								</select>			
 							</div>
 						</div>
 					</div>
 				</div>
 				<?php } ?>
 				<div class="clear"></div>
 				<div class="book_btn">
					<input type="submit" id="book" name="book" class="book" value="Book" style="width: 280px;">
				</div>
			</form>
 		</div>
 		<div class="clear"></div>
 	</div>
 </body>
 <?php include '../footer.php'; ?>

 <script>
	    $(document).ready(function() {
			$('select').change(function() {
		        var empty = false;
		        var singleRoom = document.getElementById('single').value;
		        var doubleRoom = document.getElementById('double').value;
		        var twinRoom = document.getElementById('twin').value;
		        /*singleRoom == '' || singleRoom == null || singleRoom == 0 || doubleRoom == '' || doubleRoom == null || doubleRoom == 0 || twinRoom == '' || twinRoom == null || twinRoom == 0;*/
		        if(singleRoom == '0' && doubleRoom == '0' && twinRoom == '0' ){
		        	empty = true;
		        }

		        if (empty) {
		            $('#book').attr('disabled', 'disabled');
		            $('#book').css('background','grey');
		        } else {
		            $('#book').removeAttr('disabled');
		            $('#book').css('background','#32A2E3');
		        }
		    });
		    $('#book').attr('disabled', 'disabled');
		    $('#book').css('background','grey');    
		});  
	</script>