<?php include 'db_connect.php' ?>
<?php
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM hotel WHERE id='$id';");
	header('location:show_hotel.php');
?>