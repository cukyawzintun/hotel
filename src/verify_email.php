<?php
	include ('db_connect.php'); 
	if($_SERVER["REQUEST_METHOD"] == "POST"){

    	$mail = $_REQUEST['q'];
    	if ( $mail !== ''){
    	    $email = strtolower($mail);
    	    $check_email = "SELECT * FROM user WHERE email = '$email'";
    	    $verify_email = mysqli_query($con,$check_email);
    	    if (mysqli_num_rows($verify_email) > 0) {
    	        echo "That email address has already been registered.";
    	        return;
    	    }else{
    	        echo "This email is ok";
    	        return;
    	    }
    	}
    }	

 ?>