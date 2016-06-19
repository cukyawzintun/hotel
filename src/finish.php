<?php 
	session_start();
	include 'db_connect.php';

	if(isset($_POST['finish'])){
		$check_in_date = $_POST['check_in_date'];
		$check_out_date = $_POST['check_out_date'];
		$adult = $_POST['adult'];
		$childern = $_POST['child'];
		$hotel_name = $_POST['hotel_name'];

		$no_of_room_single = $_POST['no_of_room_single'];
		$no_of_room_double = $_POST['no_of_room_double'];
		$no_of_room_twin = $_POST['no_of_room_twin'];
		$total_room = $no_of_room_single + $no_of_room_double + $no_of_room_twin;
		$total_cost = $_POST['total_cost'];
 
		if($_POST['payment'] == 'card'){
			$card_number = $_POST['card_no'];
			$card_type = $_POST['card_type'];
			$payment_user_firstName = $_POST['payment_user_first_name'];
			$payment_user_lastName = $_POST['payment_user_last_name'];
			$expire_month = $_POST['expire_month'];
			$expire_year = $_POST['expire_year'];
			$expire_date = $_POST['expire_month']."/".$_POST['expire_year'];
		}else{
			$card_number = '00';
			$card_type = 'Cash';
			$payment_user_firstName = '00';
			$payment_user_lastName = '00';
			$expire_month = '00';
			$expire_year = '00';
			$expire_date = $expire_month.'/'.$expire_year;	
		}

		if(isset($_SESSION["userid"])){
			$userid = $_SESSION["userid"];
			$db_query = mysqli_query($con,"SELECT * FROM user WHERE id = '$userid'");
			while( $row = mysqli_fetch_array($db_query)){
				$user_id = $row['id'];
			}
		}else{
			$firstName = check_input($_POST['first_name']);
			$lastName = check_input($_POST['last_name']);
			$nrc_no = check_input($_POST['nrc_no']);
			$phone_no = check_input($_POST['phone_no']);
			$email = check_input($_POST['email']);
			$address = check_input($_POST['address']);
	
			$sql = "INSERT INTO `user`(first_name,last_name,nrc_no,phone_no,email,address)
					VALUES ('$firstName','$lastName','$nrc_no','$phone_no','$email','$address')";
			$user_info_add_query = mysqli_query($con,$sql);
			if($user_info_add_query){
				$user = mysqli_query ($con,"SELECT id FROM user WHERE email = '$email'");
				while( $row = mysqli_fetch_array($user)){
					$user_id = $row['id'];
				}
			}	
		}

			if($user_id){
				$sql = "INSERT INTO booking (booking_date,hotel_id,user_id,check_in_date,check_out_date,adult,child,total_room,total_cost)
						VALUES (NOW(),'$hotel_name','$user_id','$check_in_date','$check_out_date','$adult','$childern','$total_room','$total_cost')";
				$booking_add_query = mysqli_query ($con, $sql);
				if($booking_add_query){
					$booking = mysqli_query($con,"SELECT id FROM booking WHERE user_id = '$user_id'") or die('fuck');
					while($row = mysqli_fetch_array($booking)){
						$booking_id = $row['id'];
					}
					if($booking_id){
						$insert_payment_query = "INSERT INTO payment (booking_id,user_id,payment_type,card_number,first_name,last_name,expire_date)
									VALUES('$booking_id','$user_id','$card_type','$card_number','$payment_user_firstName','$payment_user_lastName','$expire_date'" or die();
						mysqli_query($con,"INSERT INTO payment (booking_id,user_id,payment_type,card_number,first_name,last_name,expire_date)
									VALUES('$booking_id','$user_id','$card_type','$card_number','$payment_user_firstName','$payment_user_lastName','$expire_date')");	
						
						$select = "SELECT br.room_id
									FROM booking AS b
									INNER JOIN hotel AS h ON b.hotel_id = h.id
									INNER JOIN booking_room AS br ON b.id = br.booking_id
									WHERE  h.id =  '$hotel_name'
									AND ((check_in_date <= '$check_in_date' AND check_out_date >= '$check_in_date') 	OR
   										(check_in_date <= '$check_out_date' AND check_out_date >= '$check_out_date'	) OR
   										(check_in_date >= '$check_in_date' AND check_out_date <= '$check_out_date'))	";
						$check_query = mysqli_query($con, $select);
						$inQuery = $in_Query= "";
						$room_no=0;
						while ( $row = mysqli_fetch_array($check_query) ){
							$inQuery = $inQuery . $row['room_id'] .',' ;
						}
						$inQuery = rtrim($inQuery,",");
						if($inQuery!==""){$in_Query="AND id NOT IN ({$inQuery})";}
				
						$single_room = mysqli_query($con,"SELECT id FROM room_db WHERE room_type = '1' AND hotel_name='$hotel_name' $in_Query");	
						
						for($i=1;$i<=$no_of_room_single;$i++){
						 	$row = mysqli_fetch_array($single_room);
							$single_room_id = $row['id'];
							mysqli_query($con,"INSERT INTO booking_room (booking_id,room_id) VALUES ('$booking_id','$single_room_id')");
						}

						$double_room = mysqli_query($con,"SELECT id FROM room_db WHERE room_type = '2' AND hotel_name='$hotel_name' $in_Query");	
						
						for($i=1;$i<=$no_of_room_double;$i++){
						 	$row = mysqli_fetch_array($double_room);
							$double_room_id = $row['id'];
							mysqli_query($con,"INSERT INTO booking_room (booking_id,room_id) VALUES ('$booking_id','$double_room_id')");
						}

						$twin_room = mysqli_query($con,"SELECT id FROM room_db WHERE room_type = '4' AND hotel_name='$hotel_name' $in_Query");	
						
						for($i=1;$i<=$no_of_room_twin;$i++){
						 	$row = mysqli_fetch_array($twin_room);
							$twin_room_id = $row['id'];
							mysqli_query($con,"INSERT INTO booking_room (booking_id,room_id) VALUES ('$booking_id','$twin_room_id')");
						}

						header('location:../index.php#thanks');		
					}	 
				}
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

 ?>