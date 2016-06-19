<?php 
	include ("db_connect.php");
	session_start();
	if(!isset($_SESSION["userid"])){
 		header("Location: 404.php");
	}
	$userid = $_SESSION["userid"];
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$current_password = $_REQUEST['q'];
		if ( $current_password !== '') {
			$check_password = "SELECT * FROM user WHERE id = '$userid' AND password = '$current_password'";
			$verify_password = mysqli_query($con,$check_password);
			if (mysqli_num_rows($verify_password) > 0) {
				echo "current password match.";
    	        return;
			}else{
				echo "<label id='c_psw_err' value='off'>current password didn't match</label>";
    	        return;
			}
		}
	}
 ?>