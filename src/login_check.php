<?php
include 'db_connect.php';
if(isset($_POST["login"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$userpassword = mysqli_real_escape_string($con,$_POST["password"]);
		
	$db_query = "SELECT * FROM user WHERE email ='$email'"; 
	$db_result = mysqli_query($con,$db_query);
	if(!$db_result){
		mysqli_free_result($db_result);
		echo "<script>alert('Invalid email!')
			window.location.href = 'login.php'</script>";
	}
	else{
		if(mysqli_num_rows($db_result) > 0){
			$row = mysqli_fetch_assoc($db_result);
			$password = $row["password"];
			$status   = $row['status'];
			$firstName = $row['first_name'];
			$lastName = $row['last_name'];
			$userName = $firstName.'&nbsp;'.$lastName;	
			$userid = $row["id"];
			if($userpassword == $password and $status == 1){	
				session_start();
				$_SESSION["userid"] = $userid;
				$_SESSION['status']	= $status;
				header('location: show_hotel.php');
			}
			else if($userpassword == $password and $status == 0) {
				session_start();
				$_SESSION["userid"] = $userid;
				$_SESSION['status']	= $status;
				$_SESSION["userName"] = $userName;	
				header('location: ../index.php');
			}
			else{
				mysqli_free_result($db_result);
				echo "<script>alert('Invalid password!')
			window.location.href = 'http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/"."login.php'</script>";
			}
			
		}else{
			mysqli_free_result($db_result);
			echo "<script>alert('Invalid email!')
			window.location.href = 'http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/"."login.php'</script>";
		}
	}
}else{
	header("Location: login.php"); // Redirecting To Login
}
?>