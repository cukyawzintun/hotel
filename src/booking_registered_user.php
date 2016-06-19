<?php 
include 'db_connect.php';

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

	if(isset($_POST["login"])){
		$email = mysqli_real_escape_string($con,$_POST["email"]);
		$userpassword = mysqli_real_escape_string($con,$_POST["password"]);
			
		$db_query = "SELECT * FROM user WHERE email ='$email'"; 
		$db_result = mysqli_query($con,$db_query);
		if(!$db_result){
			mysqli_free_result($db_result);
			echo "<script>alert('Invalid email!')
				window.location.href = 'login.php'</script>";
		}
		else{
			if(mysqli_num_rows($db_result) > 0){
				$row = mysqli_fetch_assoc($db_result);
				$password = $row["password"];
				$status   = $row['status'];
				$firstName = $row['first_name'];
				$lastName = $row['last_name'];
				$userName = $firstName.'&nbsp;'.$lastName;	
				$userid = $row["id"];
				if($userpassword == $password and $status == 1){
					session_start();	
					$_SESSION["userid"] = $userid;
					$_SESSION['status']	= $status;
				}
				else if($userpassword == $password and $status == 0) {
					session_start();
					$_SESSION["userid"] = $userid;
					$_SESSION['status']	= $status;
					$_SESSION["userName"] = $userName;	
				}
				else{
					mysqli_free_result($db_result);
					echo "<script>alert('Invalid password!')
				window.location.href = 'login.php'</script>";
				}
				
			}else{
				mysqli_free_result($db_result);
				echo "<script>alert('Invalid email!')
				window.location.href = 'login.php'</script>";
			}
		}
	}
	
include '../header.php';	
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/booking.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
    		$("#card").click(function(){
        		$("#payment_with_card").show();
        		$("#payment_with_cash").hide();
    		});
    		$("#cash").click(function(){
        		$("#payment_with_card").hide();
        		$("#payment_with_cash").show();
    		});
    		$("#payment_with_cash").hide();

    		$(".book_details").click(function(){
			  $("#booking_wrapper").slideToggle("fast");
			});

			$(".personal_details").click(function(){
			  $("#personal_wrapper").slideToggle("slow");			
			});
		});
	</script>
</head>
<body>
	<div id="available_container">
		<div class="booking_details_result">
			<div class="booking_details" style="margin-bottom:30px;">

				<header class="head_section book_details">
					<h2>Your Booking Details &nbsp; <i class="fa fa-caret-down"></i></h2>
				</header>
				<div id="booking_wrapper">
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
				</div>	
			</div>
			<div id="personal_info_field">
				<div class="user_info" style="margin-bottom:10px;">
					<header class="head_section personal_details">
						<h2>Personal Information &nbsp; <i class="fa fa-caret-down"></i></h2>
					</header>
					<?php
						$email = mysqli_real_escape_string($con,$_POST["email"]);
						$userpassword = mysqli_real_escape_string($con,$_POST["password"]);
				
						$db_query = mysqli_query($con,"SELECT * FROM user WHERE email ='$email'");  
						while($user_row = mysqli_fetch_array($db_query)){ 
					?>
					<div id="personal_wrapper">
						<div class="result_wrapper">
							<label class='label'>Your Name:</label>
							<div class="details_result">
								<?php echo $user_row['first_name']."&nbsp;".$user_row['last_name']; ?>
							</div>
						</div>
			
						<div class="result_wrapper">
							<label class='label'>NRC No:</label>
							<div class="details_result">
								<?php echo $user_row['nrc_no']; ?>
							</div>
						</div>
			
						<div class="result_wrapper">
							<label class='label'>Email:</label>
							<div class="details_result">
								<?php echo $user_row['email']; ?>
							</div>
						</div>
			
						<div class="result_wrapper">
							<label class='label'>Phone:</label>
							<div class="details_result">
								<?php echo $user_row['phone_no']; ?>
							</div>
						</div>
			
						<div class="result_wrapper">
							<label class='label'>Address:</label>
							<div class="details_result">
								<?php echo $user_row['address']; ?>
							</div>
						</div>
					</div>	
					<?php } ?>
				</div>
			</div>

			<div id="payment_field">	
				<div class="user_info">
					<div class="payment_heading">
						<h2>Payment Information</h2>
					</div>
					<div class="card_radio_group" style="margin-left:20px;">
						<label class="caption">Please select the preferred payment method to use on this booking.</label>
						<label class='card_radio_btn'>Credit Card</label>	
						<input type="radio" id='card' name='payment' value='card' checked>
						<label class='card_radio_btn'>Cash On Delivery</label>
  						<input type="radio" id='cash' name='payment' value='cash'>
					</div>
				</div>
			
				<div style="width: 1000px;margin-left: -350px;">
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
 							<input type="hidden" name="payment" value="card">
	
 							<div class="payment_control">
								<div id="payment_with_card" style="margin-left:70px;">
  									<div class="form_wrap">
										<label for="card_no" class="label">Card Number: </label>
										<div class="form_input">
											<input type="number" name="card_no" id="card_no" required>
										</div> 
									</div>
		
									<div class="form_wrap">
										<label for="card_type" class="label">Card Type: </label>
										<div class="form_input">
											<select name="card_type" id="card_type" required>
												<option value="">--Card Type--</option>
												<option value="Master Card">Master</option>
												<option value="Visa Card">Visa</option>
												<option value="Paypal">Paypal</option>
											</select>
										</div> 
									</div>
		
									<div class="form_wrap">
										<label for="firstName" class="label">First Name: </label>
										<div class="form_input">
											<input type="text" name="payment_user_first_name" placeholder="Enter your first name*" id="firstName" required>
										</div> 
									</div>
				
									<div class="form_wrap">
										<label for="lastName" class="label">Last Name: </label>
										<div class="form_input">
											<input type="text" name="payment_user_last_name" placeholder="Enter your last name*" id="lastName" required>
										</div> 
									</div>
				
									<div class="form_wrap">
										<label for="expire_date" class="label">Expire Date: </label>
										<div class="form_input">
											<select name="expire_month" id="expire_month" style="text-align:center;" required>
												<option value="">--Month--</option>
												<option value="1">January</option>
												<option value="2">February</option>
												<option value="3">March</option>
												<option value="4">April</option>
												<option value="5">May</option>
												<option value="6">June</option>
												<option value="7">July</option>
												<option value="8">August</option>
												<option value="9">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>
		
											<select name="expire_year" id="expire_year" required>
												<option value="">--Year--</option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
											</select>
										</div>		 
									</div>
									<input type="submit" name="finish" value="Finish" class="book_finish" style="margin-left:200px;">
								</div>
							</div>
						</form>
						<div id="payment_with_cash">
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
 								<input type="hidden" name="payment" value="cash">
								
								<input type="submit" name="finish" value="Finish" class="book_finish" style="margin-left:140px;">
							</form>
						</div>
					</div>
				</div>
			</div>	
			<div class="clear"></div>
		</div>
	</div>
</body>

<?php include '../footer.php'; ?>