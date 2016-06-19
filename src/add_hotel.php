<?php 
	include ("db_connect.php");
	session_start();
	if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
 		header("Location: 404.php");
	}

	$hotelName = $hotelAddress = $hotelEmail = $hotelRating = $hotelLocation = "";
	if (isset($_POST['save'])) {
		$hotelName = check_input($_POST["hotelName"]);
		$hotelAddress = check_input($_POST["hotelAddress"]);
		$hotelEmail = check_input($_POST["hotelEmail"]);
		$hotelRating = check_input($_POST["rating"]);
		$hotelLocation = check_input($_POST["hotelLocation"]);

		$sql = "INSERT INTO hotel (`name`,`address`,`email`,`rating`,`location_id`) VALUES ('$hotelName','$hotelAddress','$hotelEmail','$hotelRating','$hotelLocation')";
		$add_query = mysqli_query($con,$sql);
		if($add_query){
			header('location:show_hotel.php');
		}else{
			die("Cannot insert new hotel information".mysqli_error($con));
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
	<title>Add Hotel Name</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/admin.css">
	<script src='../js/angular.min.js'></script>
</head>
<body>
	<div class="container">
		<header class="admin-table">
			<h2 class="heading">Adding Hotel Details</h2>
			<div class="add_link">
				<a href="show_hotel.php">Show Hotel List</a></br>
			</div>
		</header>	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<div class="form_wrap">
				<label for="hotelName" class="label">Hotel Name: </label>
				<div class="form_input">
					<input type="text" name="hotelName" placeholder="Enter hotel name" required>
				</div> 
			</div>
	
			<div class="form_wrap">
				<label for="hotelAddress" class="label">Hotel Address:</label>
				<div class="form_input">
					<input type="text" name="hotelAddress" placeholder="Enter hotel address" required>
				</div>
			</div>
	
			<div class="form_wrap">
				<label for="hotelEmail" class="label">Hotel Email:</label>
				<div class="form_input">
					<input type="text" name="hotelEmail" placeholder="Enter hotel Email" required>
				</div>
			</div>

			<div class="form_wrap">
				<label for="hotelEmail" class="label">Hotel Rating:</label>
				<div class="form_input">
					<input type="number" name="rating" required>
				</div>
			</div>
							
			<div class="form_wrap">				
				<label for="hotelLocation" class="label">Hotel Location:</label>
				<div class="form_input">
					<select name="hotelLocation" id="hotelLocation">
						<?php 
							$result = mysqli_query($con,"SELECT * FROM location");
							while ( $row = mysqli_fetch_array($result)):
				 		?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['location_name']; ?></option>
						<?php endwhile; ?>
					</select>
				</div>
			</div>

			<div class="save_btn">
				<input type="submit" name="save" value="Save">
			</div>
		</form>
	</div>	
</body>
</html>

<?php include '../footer.php' ?>