<?php 
	include 'db_connect.php';
	include '../header.php';

	 $check_in_date = $_POST['check_in_date'];
	 $check_out_date = $_POST['check_out_date'];
	 $hotel_location = $_POST['hotel_location'];
	 $room_type = $_POST['room_type'];
	 $number_of_room = $_POST['number_of_room'];
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Available Room</title>
 </head>
 <body>
 	<form action="user_information.php" method="POST">
 		<input type="hidden" name="check_in_date" value="<?php echo $check_in_date ?>">
 		<input type="hidden" name="check_out_date" value="<?php echo $check_out_date ?>">
 		<input type="hidden" name="hotel_location" value="<?php echo $hotel_location ?>">
 		<input type="hidden" name="room_type" value="<?php echo $room_type ?>">
 		<input type="hidden" name="number_of_room" value="<?php echo $number_of_room ?>">
		
		<?php 
			$select = "SELECT r.room_image, r.no_of_room, h.name, h.rating, l.location_name
						FROM room_db r
						INNER JOIN hotel h ON r.hotel_name = h.id
						INNER JOIN location l ON h.location_id = l.id
						WHERE r.room_type = '$room_type' AND h.location_id = '$hotel_location'");
			$result = mysqli_query($con , $select);
			while ($row = mysqli_fetch_array($result)){
				$room_id = $row['id'];
				$query = mysqli_query($con,"SELECT * FROM booking WHERE ")
			}
		 ?>
 	</form>
 </body>
 </html>