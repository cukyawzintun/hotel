<?php 
session_start();
include 'db_connect.php' 
?>
<?php
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM feedback WHERE id='$id';");
	header('location:feedback.php');
?>