<?php
    include_once 'db_connect.php';
	$id=$room_no=$room_type=$hotel_name=$room_inform=$file_name=$no_of_room="";
	if(isset($_POST['submit']))
		{
		$id  =  $_POST['hiddenId'];
		$room_no = $_POST['rno'];
		$room_type = $_POST['rtype'];
		$hotel_name = $_POST['ho_name'];
		$room_inform = $_POST['roominf'];
		$price  =  $_POST['price'];
		if(isset($_FILES['image'])) {
        				$file_name = $_FILES['image']['name'];
      					$file_tmp =$_FILES['image']['tmp_name'];
						move_uploaded_file($file_tmp,"../images/".$file_name);
        			}
		}
		
		if(is_null($file_name)){

			echo $sql = "UPDATE room_db SET room_no = '$room_no',room_type= '$room_type',hotel_name = '$hotel_name',room_inform = '$room_inform', price = '$price' WHERE id=$id";
								}
		else{
			echo $sql = "UPDATE room_db SET room_no = '$room_no',room_type = '$room_type',hotel_name = '$hotel_name',room_inform = '$room_inform',room_image = '$file_name',price = '$price' WHERE id=$id";
								}	
		mysqli_query($con,$sql);
      	header('location:room_list.php');
		
//echo $sql;
		

		
		
		/*$sql = "UPDATE room_db SET `room_no` = '$room_no',
								`room_type` = '$room_type',
								`hotel_name` = '$hotel_name',
								`room_inform` = '$room_inform',
								`room_image` = '$room_image',
								`no_of_room` = '$no_of_room' WHERE id ='$id'";
		echo $sql;
		mysql_query($sql);
      header('location:room_list.php');*/
       
  ?>
