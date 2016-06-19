<?php 
	include 'db_connect.php';
			if(isset($_POST['submit'])){
				$room_no = $_POST['rno'];
				$room_type = $_POST['rtype'];
				$hotel_name = $_POST['ho_name'];
				$room_inform = $_POST['roominf'];
				$price = $_POST['price'];
				
				if(isset($_FILES['image'])) {
        				$file_name = $_FILES['image']['name'];
      					$file_tmp =$_FILES['image']['tmp_name'];
						move_uploaded_file($file_tmp,"../images/".$file_name);
        			}
			
			mysqli_query($con,"INSERT INTO `room_db` (`room_no`,`room_type`,`hotel_name`,`room_inform`,`room_image`,`price`) 
			VALUES ('$room_no','$room_type','$hotel_name','$room_inform','$file_name','$price')") or die("cannot insert ".mysql_error());
				header('location:room_list.php');
			}
?>