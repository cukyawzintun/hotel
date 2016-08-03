<?php
	session_start();
	/*if(isset($_SESSION['url'])) 
   		echo $url = $_SESSION['url'];
	else 
   		echo $url = "index.php";*/
	// destroy the session 
	if(session_destroy()){

	header('location:../index.php');
	}
?>