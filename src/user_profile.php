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
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>User Profile</title>
 	<link rel="stylesheet" href="../css/admin.css">
 </head>
 <body>
 	<div id="profile_main">
 		<div id="profile_wrapper">
 			<header>
 				<h2>My Profile</h2>
 			</header>
 			<?php while($row = mysqli_fetch_array($result)): ?>
 			<div class="profile_form_wrap">
 				<label for="" class="profile_label">First Name:</label>
 				<div class="profile_h3">
 					<h3><?php echo $row['first_name']; ?></h3>
 				</div>
 			</div>
 			<div class="profile_form_wrap">
 				<label for="" class="profile_label">Last Name:</label>
 				<div class="profile_h3">
 					<h3><?php echo $row['last_name']; ?></h3>
 				</div>
 			</div>
 			<div class="profile_form_wrap">
 				<label for="" class="profile_label">NRC Number:</label>
 				<div class="profile_h3">
 					<h3><?php echo $row['nrc_no']; ?></h3>
 				</div>
 			</div>
 			<div class="profile_form_wrap">
 				<label for="" class="profile_label">Phone Number:</label>
 				<div class="profile_h3">
 					<h3><?php echo $row['phone_no']; ?></h3>
 				</div>
 			</div>
 			<div class="profile_form_wrap">
 				<label for="" class="profile_label">Email:</label>
 				<div class="profile_h3">
 					<h3><?php echo $row['email']; ?></h3>
 				</div>
 			</div>
 			<div class="profile_form_wrap">
 				<label for="" class="profile_label">Address:</label>
 				<div class="profile_h3">
 					<h3><?php echo $row['address']; ?></h3>
 				</div>
 			</div>
 			<div class="profile_form_wrap">
 				<label for="" class="profile_label">Account Created:</label>
 				<div class="profile_h3">
 					<h3><?php echo $row['created']; ?></h3>
 				</div>
 			</div>
 		<?php endwhile; ?>
 			<div class="clear"></div>
 		</div>
 		<div class="profile_edit_btn">
 			<a href="user_profile_edit.php">
 				<i class="fa fa-edit"></i>Edit Profile
 			</a>
 			<a href="user_password_change.php">
 				<i class="fa fa-edit"></i>Change Password
 			</a>
 		</div>
 		<div class="clear"></div>
 	</div>
 </body>
 </html>
 <?php include '../footer.php'; ?>