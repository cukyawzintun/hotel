<?php 
	include ("db_connect.php");

	$hotelName = $hotelAddress = $hotelEmail = $hotelRating = $hotelLocation = "";
	if (isset($_POST['update'])) {
		$hiddenId = $_POST['hiddenId'];
		$hotelName = check_input($_POST["hotelName"]);
		$hotelAddress = check_input($_POST["hotelAddress"]);
		$hotelEmail = check_input($_POST["hotelEmail"]);
		$hotelRating = check_input($_POST["hotelRating"]);
		$hotelLocation = check_input($_POST["hotelLocation"]);

		$update_query = "UPDATE hotel
							SET 
								`name` = '$hotelName',
								`address` = '$hotelAddress',
								`email` = '$hotelEmail',
								`rating` = '$hotelRating',
								`location_id` = '$hotelLocation'
							WHERE
								`id` = '$hiddenId'";			
		$update_query_result = mysqli_query($con,$update_query);
		
		if($update_query_result){
			header("location:show_hotel.php");
		}else{
			echo "Cannot update hotel information".mysqli_error($con);
		}
	}else{
		echo mysqli_error($con);
	}

	function check_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>