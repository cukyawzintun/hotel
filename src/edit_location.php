<?php 
	include 'db_connect.php';

 	if(isset($_POST['update'])){
 		$hiddenId = $_POST['hiddenId'];
 		$location_name = $_POST['hotel_location'];
 		$update_query = "UPDATE location SET `location_name` = '$location_name' WHERE `id` = '$hiddenId'";
 		$update_query_result = mysqli_query($con,$update_query);
 		if($update_query_result){
 			header('location:show_location.php');
 		}else{
 			die("Updating location failed".mysqli_error($con));
 		}
 	}
  ?>