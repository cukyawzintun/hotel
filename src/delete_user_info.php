<?php 
	include 'db_connect.php';
	$id = $_GET['id'];
	$delete_query = "DELETE FROM user WHERE id = '$id' ";
	$delete_query_result = mysqli_query($con,$delete_query);
	if($delete_query_result){
		header('location:show_user.php');
	}else{
		echo "Delete location failed ".mysqli_error($con);
	}
 ?>