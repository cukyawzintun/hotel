<?php
	session_start(); 
	include 'db_connect.php';
	include '../header.php';

	function check_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	if(isset($_POST['booking_edit'])){
		$check_in_date = $_POST['check_in_date'];
		$check_out_date = $_POST['check_out_date'];
		$adult = $_POST['adult'];
		$childern = $_POST['child'];
		$hotel_name = $_POST['hotel_name'];

		$no_of_room_single = $_POST['no_of_room_single'];
		$no_of_room_double = $_POST['no_of_room_double'];
		$no_of_room_twin = $_POST['no_of_room_twin'];
		$total_room = $no_of_room_single + $no_of_room_double + $no_of_room_twin;

		$firstName = check_input($_POST['first_name']);
		$lastName = check_input($_POST['last_name']);
		$nrc_no = check_input($_POST['nrc_no']);
		$phone_no = check_input($_POST['phone_no']);
		$email = check_input($_POST['email']);
		$address = check_input($_POST['address']);
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
			<h2>Updating Booking Details</h2>
		</header>

		<div class="booking_details_result">
			<div class="result_wrapper">
				<label class='label'>Check In Date:</label>
				<div class="book_date btm details_result">
					<input class="date" id="datepicker" type="text" name="check_in_date" value="<?php echo $check_in_date; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Check Out Date:</label>
				<div class="book_date btm details_result">
					<input class="date" id="datepicker" type="text" name="check_in_date" value="<?php echo $check_out_date; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Hotel Name:</label>
				<div class="details_result">
					<select required id="country" name="hotel_name" onchange="change_country(this.value)" class=" required">
						<option value="<?php echo $hotel_name; ?>"><?php echo $hotel_name; ?></option>
						<?php 
							$result = mysqli_query($con,"SELECT * FROM hotel");
							while ( $row = mysqli_fetch_array($result)):
						?>	
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
						<?php endwhile; ?>
			        </select>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Adult:</label>
				<div class="details_result">
					<select name="adult" id="country" onchange="change_country(this.value)" class="frm-field">
						<option value="<?php echo $adult;?>"><?php echo $adult;?></option>
						<option value="1">1</option>
					    <option value="2">2</option>         
					    <option value="3">3</option>
						<option value="4">4</option>
			        </select>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Childern:</label>
				<div class="details_result">
					<select name="child" id="country" onchange="change_country(this.value)" class="frm-field">
						<option value="<?php echo $childern;?>"><?php echo $childern;?></option>
						<option value="1">1</option>
					    <option value="2">2</option>         
					    <option value="3">3</option>
						<option value="4">4</option>
			        </select>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Total Room:</label>
				<div class="details_result">
					<?php echo $total_room; ?>
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>First Name:</label>
				<div class="details_result">
					<input id="country" type="text" name="first_name" value="<?php echo $firstName; ?>">
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Last Name:</label>
				<div class="details_result">
					<input id="country" type="text" name="last_name" value="<?php echo $lastName; ?>">
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>NRC No:</label>
				<div class="details_result">
					<input id="country" type="text" name="nrc_no" value="<?php echo $nrc_no; ?>">
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Email:</label>
				<div class="details_result">
					<input id="country" type="email" name="email" value="<?php echo $email; ?>">
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Phone:</label>
				<div class="details_result">
					<input id="country" type="text" name="phone_no" value="<?php echo $phone_no; ?>">
				</div>
			</div>

			<div class="result_wrapper">
				<label class='label'>Address:</label>
				<div class="details_result">
					<textarea id="country" name="address" cols="40" rows="4">
						<?php echo $address; ?>
					</textarea>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>			