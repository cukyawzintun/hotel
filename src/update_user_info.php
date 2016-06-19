<?php 
	include 'db_connect.php';
	session_start();
	if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
 		header("Location: 404.php");
	}

	$firstName = $lastName = $nrc_no = $phone_no = $email = $address = '';
	if(isset($_POST['submit'])){
		$id = $_POST['hiddenId'];
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
			header('location:show_user.php');
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
			<h2 class="heading">Editing Personal Information</h2>
			<div class="add_link">
				<a href="show_user.php">User List</a></br>
			</div>
		</header>
		<form action="update_user_info.php" method="POST" class='user_info'>
			<?php 
				$id = $_GET['id'];
				$result = mysqli_query($con,"SELECT * FROM user WHERE id='$id'");
				while($row = mysqli_fetch_array($result)):
			 ?>
		<div class="form_wrapper">
			<div class="heading_caption">
				<h2 style="font-size:25px; margin-top:-35px; font-weight:bold;">Personal Information</h2>
			</div>

			<input type='hidden' name='hiddenId' value="<?php echo $row['id'];?>">

			<div class="form_wrap">
				<label for="firstName" class="label">First Name: </label>
				<div class="form_input">
					<input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" id="firstName" required>
				</div> 
			</div>

			<div class="form_wrap">
				<label for="lastName" class="label">Last Name: </label>
				<div class="form_input">
					<input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" id="lastName" required>
				</div> 
			</div>

			<div class="form_wrap">
				<label for="nrc_no" class="label">NRC Number: </label>
				<div class="form_input">
					<input type="text" name="nrc_no" value="<?php echo $row['nrc_no']; ?>" id="nrc_no" required>
				</div> 
			</div>

			<div class="form_wrap">
				<label for="phone_no" class="label">Phone Number: </label>
				<div class="form_input">
					<input type="text" name="phone_no" value="<?php echo $row['phone_no']; ?>" id="phone_no" required>
				</div> 
			</div>

			<div class="form_wrap">
				<label for="email" class="label">Email Address: </label>
				<div class="form_input">
					<input type="text" name="email" value="<?php echo $row['email']; ?>" id="email" required>
				</div> 
			</div>

			<div class="form_wrap">
				<label for="address" class="label">Address: </label>
				<div class="form_input">
					<textarea name="address" id="address" cols="40" rows="4">
						<?php echo $row['address']; ?>
					</textarea>
				</div> 
			</div>
			<div class="save_btn">
				<input type="submit" name="submit" value="Submit">
			</div>
		</div>
		<?php endwhile; ?>
		</form>
		<div style="margin-bottom:50px;"></div>
	</div>
	<script>
		function del_confirm(id)
	        {
	        	var sure = confirm("Are you sure you want to delete hotel information?");
	            if(sure == true)
	            {
	              window.location = "delete_user_info.php?id="+id;
	            }
	            else
	            {
	               window.location = "show_user.php";
	            }

	        }
	</script>
</body>
</html>
<?php include '../footer.php'; ?>