<?php 
	include 'db_connect.php';
	session_start();
	if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
 		header("Location: 404.php");
	}

	$firstName = $lastName = $nrc_no = $phone_no = $email = $address = '';
	if(isset($_POST['submit'])){
		$firstName = check_input($_POST['first_name']);
		$lastName = check_input($_POST['last_name']);
		$nrc_no = check_input($_POST['nrc_no']);
		$phone_no = check_input($_POST['phone_no']);
		$email = check_input($_POST['email']);
		$address = check_input($_POST['address']);

		$sql = "INSERT INTO `user`(first_name,last_name,nrc_no,phone_no,email,address)
				VALUES ('$firstName','$lastName','$nrc_no','$phone_no','$email','$address')";
		$add_query = mysqli_query($con,$sql);
		if($add_query){
			header('location:show_user.php');
		}else{
			die('Cannot insert personal information into database');
		}
	}

	function check_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	include '../header.php';
	include 'sidebar.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personal Information</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<div class="container">
		<header class="admin-table">
			<h2 class="heading">Adding Personal Information</h2>
			<div class="add_link">
				<a href="show_user.php">User List</a></br>
			</div>
		</header>
		<form action="user_information.php" method="POST" class='user_info'>
		<div class="form_wrapper">
			<div class="heading_caption">
				<h2 style="font-size:25px; margin-top:-35px; font-weight:bold;">Personal Information</h2>
			</div>	
			<div class="form_wrap">
				<label for="firstName" class="label">First Name: </label>
				<div class="form_input">
					<input type="text" name="first_name" placeholder="Enter your first name*" id="firstName" required>
				</div> 
			</div>

			<div class="form_wrap">
				<label for="lastName" class="label">Last Name: </label>
				<div class="form_input">
					<input type="text" name="last_name" placeholder="Enter your last name*" id="lastName" required>
				</div> 
			</div>

			<div class="form_wrap">
				<label for="nrc_no" class="label">NRC Number: </label>
				<div class="form_input">
					<input type="text" name="nrc_no" placeholder="Enter your NRC number*" id="nrc_no" required>
				</div> 
			</div>

			<div class="form_wrap">
				<label for="phone_no" class="label">Phone Number: </label>
				<div class="form_input">
					<input type="text" name="phone_no" placeholder="Enter your phone number*" id="phone_no" required>
				</div> 
			</div>

			<div class="form_wrap">
				<label for="email" class="label">Email Address: </label>
				<div class="form_input">
					<input type="text" name="email" placeholder="Enter your email address*" id="email" required>
				</div> 
			</div>

			<div class="form_wrap">
				<label for="address" class="label">Address: </label>
				<div class="form_input">
					<textarea name="address" id="address" cols="40" rows="4"></textarea>
				</div> 
			</div>
			<div class="save_btn">
				<input type="submit" name="submit" value="Submit">
			</div>
		</div>
		</form>
		<div style="margin-bottom:50px;"></div>
	</div>
</body>
</html>
<?php include '../footer.php'; ?>