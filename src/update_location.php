<?php 
	include 'db_connect.php'; 
	session_start();
	if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
 		header("Location: 404.php");
	}

	$id = $_GET['id'];
	$query = "SELECT * FROM location WHERE `id` = '$id'";
	$result = mysqli_query($con,$query);

	include '../header.php';
	include 'sidebar.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Update hotel Location</title>
 	<link rel="stylesheet" href="../css/admin.css">
 </head>
 <body>
 	<div class="container" style="margin-bottom: 200px;">
 		<header class="admin-table">
 			<h2 class="heading">Updating Hotel Location</h2>
			<div class="add_link">
				<a href="show_location.php">Show Hotel Location</a></br>
			</div>
		</header>	
 		<form action="edit_location.php" method="POST">
 			<div class="form_wrap">
				<label for="hotelLocation" class="label">Hotel Location: </label>
				<div class="form_input">
					<?php 
						while( $row = mysqli_fetch_array($result)): 
						$location = $row['location_name'];
						/*switch ($location){
							case 1:
								$location_name = "Yangon";
								break;
							case 2:
								$location_name = "Mandalay";
								break;
							case 3:
								$location_name = "Naypyitaw";
								break;
							case 4:
								$location_name = "Bagan";
								break;
							case 5:
								$location_name = "Ngwe Saung";
								break;
							default:
								echo "Your location name is not defined".mysqli_error($con);
						}*/
					?>
					<input type="hidden" name="hiddenId" value="<?php echo $row['id']; ?>">
					<input type="text" name='hotel_location' value="<?php echo $row['location_name']; ?>">
				</div>
	
				<div class="save_btn">
					<input type="submit" name="update" value="Update">
				</div>
			<?php endwhile; ?>
			</div>
 		</form>
 	</div>	
 </body>
 </html>
 <?php include '../footer.php'; ?>