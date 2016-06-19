<?php include ('db_connect.php'); ?>
<?php
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM room_db WHERE id='$id';");
	header('location:room_list.php');
?>