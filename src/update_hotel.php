<?php 
	include 'db_connect.php';
	session_start();
	if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
 		header("Location: 404.php");
	}
	include '../header.php';
	include 'sidebar.php';
	 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Hotel Details</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<div container="container">
		<header class="admin-table">
			<h2 class="heading">Updating Hotel Details</h2>
			<div class="add_link">
				<a href="show_hotel.php">Show Hotel List</a></br>
			</div>
		</header>	

		<?php 
			$id = $_GET['id'];
			$query = "SELECT hotel.id,hotel.name,hotel.email,hotel.address,hotel.rating,hotel.location_id,location.location_name 
						  FROM hotel 
						  INNER JOIN location 
						  ON hotel.location_id = location.id WHERE hotel.id='$id'";
			$result = mysqli_query($con,$query);
		 ?>
		 <form action="edit_hotel.php" method="POST">
		 	<?php 
				while( $row = mysqli_fetch_array($result)): 
			?>

		 	<input type='hidden' name='hiddenId' value="<?php echo $row['id'];?>">
			
			<div class="form_wrap">
				<label for="hotelName" class="label">Hotel Name: </label>
				<div class="form_input">
					<input type="text" name="hotelName" value="<?php echo $row['name'];  ?>" required>
				</div> 
			</div>
	
			<div class="form_wrap">
				<label for="hotelAddress" class="label">Hotel Address:</label>
				<div class="form_input">
					<input type="text" name="hotelAddress" value="<?php echo $row['address']; ?>" required>
				</div>
			</div>
	
			<div class="form_wrap">
				<label for="hotelEmail" class="label">Hotel Email:</label>
				<div class="form_input">
					<input type="text" name="hotelEmail" value="<?php echo $row['email']; ?>" required>
				</div>
			</div>
	
			<div class="form_wrap">
				<label for="hotelRating" class="label">Hotel Rating:</label>
				<div class="form_input">
					<input type="number" name="hotelRating" value="<?php echo $row['rating']; ?>" required>
				</div>
			</div>
	
			<div class="form_wrap">
				<label for="hotelLocation" class="label">Hotel Location:</label>
				<div class="form_input">
					<select name="hotelLocation" id="hotelLocation">
						<option value="<?php echo $row['location_id']; ?>"><?php echo $row['location_name']; ?></option>
						<option value="1">Yangon</option>
						<option value="2">Mandalay</option>
						<option value="3">Bagan</option>
					</select>
				</div>
			</div>
	
			<div class="save_btn">
				<input type="submit" name="update" value="Update">
			</div>
		<?php endwhile; ?>
		 </form>
	</div>
</body>
</html>

<?php include '../footer.php'; ?>