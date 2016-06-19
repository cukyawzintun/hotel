<?php 
	include 'db_connect.php';
	session_start();
	if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
 		header("Location: 404.php");
	}

	if(isset($_POST['save'])){
		echo $hotel_location = check_input($_POST['hotel_location']);
		$add_query = "INSERT INTO location (`location_name`) VALUES ('$hotel_location')";
		$add_query_result = mysqli_query($con,$add_query);
		if($add_query_result){
			header('location:show_location.php');
		}else{
			die("Adding location failed".mysqli_error($con));
		}
	}

	function check_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	include '../header.php';
	include 'sidebar.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Add hotel Location</title>
 	<link rel="stylesheet" href="../css/admin.css">
 </head>
 <body>
 	<div class="container" style="margin-bottom: 200px;">
 		<header class="admin-table">
 			<h2 class="heading">Add Hotel Location</h2>
			<div class="add_link">
				<a href="show_location.php">Show Hotel Location</a></br>
			</div>
		</header>	
 		<form action="add_location.php" method="POST">
 			<div class="form_wrap">
				<label for="hotelLocation" class="label">Hotel Location: </label>
				<div class="form_input">
					<input type="text" name='hotel_location' placeholder="Enter hotel location" required>
				</div>
	
				<div class="save_btn">
					<input type="submit" name="save" value="Save">
				</div> 
			</div>
 		</form>
 	</div>
 </body>
 </html>
 <?php include '../footer.php'; ?>