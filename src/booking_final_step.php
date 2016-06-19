<?php
	session_start(); 
	include 'db_connect.php';
	include '../header.php';

	$firstName = $lastName = $nrc_no = $phone_no = $email = $address = '';
	if(isset($_POST['submit'])){
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

		$firstName = check_input($_POST['first_name']);
		$lastName = check_input($_POST['last_name']);
		$nrc_no = check_input($_POST['nrc_no']);
		$phone_no = check_input($_POST['phone_no']);
		$email = check_input($_POST['email']);
		$address = check_input($_POST['address']);

		if($_POST['payment'] == 'card'){
			$payment = 'card';
			$card_number = $_POST['card_no'];
			$card_type = $_POST['card_type'];
			$payment_user_firstName = $_POST['payment_user_first_name'];
			$payment_user_lastName = $_POST['payment_user_last_name'];
			$expire_month = $_POST['expire_month'];
			$expire_year = $_POST['expire_year'];
			$expire_date = $_POST['expire_month']."/".$_POST['expire_year'];
		}else{
			$payment = 'cash';
			$card_number = '00';
			$card_type = 'Cash';
			$payment_user_firstName = '00';
			$payment_user_lastName = '00';
			$expire_month = '00';
			$expire_year = '00';
			$expire_date = $expire_month.'/'.$expire_year;	
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
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/booking.css">
</head>
<body>
	<div id="available_container">
		<header class="head_section">
			<h2 style="margin-left:65px;">Your Booking Details</h2>
		</header>

		<div class="booking_details_result">
			<div class="result_wrapper">
				<label class='label'>Check In Date:</label>
				<div class="details_result">
					<?php echo $check_in_date; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Check Out Date:</label>
				<div class="details_result">
					<?php echo $check_out_date; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Hotel Name:</label>
				<div class="details_result">
					<?php switch($hotel_name){
 						case 14: echo "Sedona";
 						break;

 						case 16: echo "Hotel Mandalay";
 						break;

 						default: echo "Hotel Bagan";
 					} ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Adult:</label>
				<div class="details_result">
					<?php echo $adult; ?> &nbsp; Person
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Childern:</label>
				<div class="details_result">
					<?php echo $childern; ?> &nbsp; Person
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Total Room:</label>
				<div class="details_result">
					<?php echo $total_room; ?>
				</div>
			</div>

			<div class="result_wrapper">
					<label class='label'>Cost Per Day:</label>
					<div class="details_result">
						<?php echo '$'.$total_cost; ?>
					</div>
				</div>

			<div class="result_wrapper">
				<label class='label'>Your Name:</label>
				<div class="details_result">
					<?php echo $firstName."&nbsp;".$lastName; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>NRC No:</label>
				<div class="details_result">
					<?php echo $nrc_no; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Email:</label>
				<div class="details_result">
					<?php echo $email; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Phone:</label>
				<div class="details_result">
					<?php echo $phone_no; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Address:</label>
				<div class="details_result">
					<?php echo $address; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Card Number:</label>
				<div class="details_result">
					<?php echo $card_number; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Card Type:</label>
				<div class="details_result">
					<?php echo $card_type; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Card User Name:</label>
				<div class="details_result">
					<?php echo $payment_user_firstName."&nbsp;".$payment_user_lastName; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Expire Date:</label>
				<div class="details_result">
					<?php echo $expire_date; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<div class="btn_wrapper">					
					<form action="finish.php" method="POST">
						<input type='hidden' name='check_in_date' value='<?php echo $check_in_date; ?>'>
 						<input type='hidden' name='check_out_date' value='<?php echo $check_out_date; ?>'>
 						<input type='hidden' name='hotel_name' value='<?php echo $hotel_name; ?>'>
 						<input type='hidden' name='child' value='<?php echo $childern; ?>'>
 						<input type='hidden' name='adult' value='<?php echo $adult; ?>'>
 						<input type='hidden' name='no_of_room_single' value='<?php echo $no_of_room_single; ?>'>
 						<input type='hidden' name='no_of_room_double' value='<?php echo $no_of_room_double; ?>'>
 						<input type='hidden' name='no_of_room_twin' value='<?php echo $no_of_room_twin; ?>'>
 						<input type="hidden" name="total_cost" value="<?php echo $total_cost; ?>">
 						<input type='hidden' name='first_name' value='<?php echo $firstName; ?>'>
 						<input type='hidden' name='last_name' value='<?php echo $lastName; ?>'>
 						<input type='hidden' name='nrc_no' value='<?php echo $nrc_no; ?>'>
 						<input type='hidden' name='email' value='<?php echo $email; ?>'>
 						<input type='hidden' name='phone_no' value='<?php echo $phone_no; ?>'>
 						<input type='hidden' name='address' value='<?php echo $address; ?>'>

 						<input type='hidden' name='payment' value='<?php echo $payment; ?>'>
 						<input type='hidden' name='card_no' value='<?php echo $card_number; ?>'>
 						<input type='hidden' name='card_type' value='<?php echo $card_type; ?>'>
 						<input type='hidden' name='payment_user_first_name' value='<?php echo $payment_user_firstName; ?>'>
 						<input type='hidden' name='payment_user_last_name' value='<?php echo $payment_user_lastName; ?>'>
 						<input type='hidden' name='expire_month' value='<?php echo $expire_month; ?>'>
 						<input type='hidden' name='expire_year' value='<?php echo $expire_year; ?>'>

						<input type="submit" name="finish" value="Finish" class="book_finish" >
					</form>
					
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>

<?php include '../footer.php'; ?>