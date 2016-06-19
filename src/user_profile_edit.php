<?php 
	include ("db_connect.php");
	session_start();
	if(!isset($_SESSION["userid"])){
 		header("Location: 404.php");
	}
	include '../header.php';
	$userid = $_SESSION["userid"];
	$select_user = "SELECT * FROM user WHERE id = '$userid'";
	$result = mysqli_query($con,$select_user);
 ?>
  <?php 
 	if(isset($_POST['profile_update'])){
		$id = $_SESSION["userid"];
		$firstName = check_input($_POST['first_name']);
		$lastName = check_input($_POST['last_name']);
		$nrc_no = check_input($_POST['nrc_no']);
		$phone_no = check_input($_POST['phone_no']);
		$email = check_input($_POST['email']);
		$address = check_input($_POST['address']);

		$sql = "UPDATE user 
					SET first_name = '$firstName',
						last_name = '$lastName',
						nrc_no = '$nrc_no',
						phone_no = '$phone_no',
						email = '$email',
						address = '$address'
					WHERE id = '$id' ";
		$add_query = mysqli_query($con,$sql);
		if($add_query){
			header('location:user_profile.php');
		}else{
			die('Cannot update personal information into database');
		}
	}

	function check_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
  ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>User Profile</title>
 	<link rel="stylesheet" href="../css/admin.css">
 </head>
 <body>
 	<div id="profile_main">
 		<form action="user_profile_edit.php" method="POST">
 		<div id="profile_wrapper">
 			<header>
 				<h2>Edit Profile</h2>
 			</header>
 			<?php while($row = mysqli_fetch_array($result)): ?>
 				<div class="profile_form_wrap">
 					<label for="" class="profile_label">First Name:</label>
 					<div class="profile_h3">
 						<input required type="text" name="first_name" value="<?php echo $row['first_name']; ?>">
 					</div>
 				</div>
 				<div class="profile_form_wrap">
 					<label for="" class="profile_label">Last Name:</label>
 					<div class="profile_h3">
 						<input required type="text" name="last_name" value="<?php echo $row['last_name']; ?>">
 					</div>
 				</div>
 				<div class="profile_form_wrap">
 					<label for="" class="profile_label">NRC Number:</label>
 					<div class="profile_h3">
 						<input required type="text" name="nrc_no" value="<?php echo $row['nrc_no']; ?>">
 					</div>
 				</div>
 				<div class="profile_form_wrap">
 					<label for="" class="profile_label">Phone Number:</label>
 					<div class="profile_h3">
 						<input required type="text" name="phone_no" value="<?php echo $row['phone_no']; ?>">
 					</div>
 				</div>
 				<div class="profile_form_wrap">
 					<label for="" class="profile_label">Email:</label>
 					<div class="profile_h3">
 						<input required type="email" name="email" value="<?php echo $row['email']; ?>">
 					</div>
 				</div>
 				<div class="profile_form_wrap">
 					<label for="" class="profile_label">Address:</label>
 					<div class="profile_h3">
 						<textarea name="address" id="" cols="30" rows="5">
 							<?php echo $row['address']; ?>
 						</textarea>
 					</div>
 				</div>
 				<!-- <div class="profile_form_wrap">
 					<div class="profile_update_btn">
 						<input type="submit" name="profile_update" value="update" class="profile_update">
 					</div>
 				</div> -->
 			<?php endwhile; ?>
 		</div>
 		<div class="profile_edit_btn">
 			<input type="submit" name="profile_update" value="Save" class="profile_update" style="margin-bottom:20px;">
 			<a href="user_profile.php">
 				<i class="fa fa-backward"></i>Back
 			</a>
 		</div>
 		</form>
 		<div class="clear"></div>
 	</div>
 </body>
 </html>
 <?php include '../footer.php'; ?>