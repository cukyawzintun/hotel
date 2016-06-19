<?php include ('db_connect.php'); ?>
<?php
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM room_type WHERE id='$id';");
	header('location:roomtype_list.php');
?>