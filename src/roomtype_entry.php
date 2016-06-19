<!DOCTYPE>
<?php 
	include ('db_connect.php');
	session_start();
  	if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
   	 header("Location: 404.php");
  	}

			if(isset($_POST['submit'])){
				$room_name = $_POST['rmname'];
			$insert = "INSERT INTO `room_type` (`name`) VALUES ('$room_name')";
			echo $insert_query = mysqli_query($con,$insert);
			if($insert_query){
			header('location:roomtype_list.php');
			}
		}

  	include '../header.php';
  	include 'sidebar.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Room Entry</title>
<link  href="../css/room.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="room_body">
		<div class="room_header">  
				<h3>Create Room Type</h3> 
				<a href="roomtype_list.php">Show Room Type</a>
		</div>
			<form name="form" method="POST" action="roomtype_entry.php" enctype="multipart/form-data" id="register-form">
		<div class="room_wrapper">
		
		<div class="room_main">
		
			<div class="room_container">
					<div>
						<label class="room_label"> Name:</label> 
		                <input class="room_input" type ="text" name ="rmname" required="required" id="rmname">
		            </div>
		            <div>
						<input type="submit" value="Save"  name="submit" class="room_btn" >
		            </div>
		    
			</div>
		</div>
		</div>
		</form>
	</div>	
</body>
</html>
<?php include '../footer.php'; ?>