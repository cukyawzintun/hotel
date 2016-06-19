<!DOCTYPE>
<?php 
	include ('db_connect.php');
	session_start();
  	if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
   	 header("Location: 404.php");
  	}

  	if(isset($_POST['submit'])){
		$id  =  $_POST['hiddenId'];
		$rmname  =  $_POST['rmname'];
		
	$update_query = "UPDATE room_type
							SET
								`name` = '$rmname'
							WHERE
								`id`  =  '$id';";
		mysqli_query($con,$update_query) or die(mysql_error());
		header('location:roomtype_list.php');
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
			<?php
		 	$id = $_GET['id'];
			$row = mysqli_query($con,"SELECT * FROM room_type WHERE id='$id';");
			$result=mysqli_fetch_array($row)
			?>
			<div class="room_header"> 
			<h3>Editing Room Type</h3> 
			<a href="roomtype_list.php">Show Room Type</a>
		</div>
			<form name="form" method="POST" action="roomtype_edit.php" enctype="multipart/form-data" id="register-form">
		<div class="room_wrapper">
		
		<div class="room_main">
		
			<div class="room_container">
		    		<input type='hidden' name='hiddenId' value="<?php echo $result['id'];?>">
					<div>
						<label class="room_label"> Name:</label> 
		                <input type ="text" class="room_input" name ="rmname" required="required" value="<?php echo $result['name']; ?>">
		            </div>
		            <div>
						<input type="submit" value="Edit"  name="submit" class="room_btn" >
		            </div>
		    
			</div>
		
		</div>
		</form>
	</div>	
</body>
</html>
<?php include '../footer.php'; ?>
