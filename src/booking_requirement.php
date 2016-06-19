<?php
	session_start(); 
	include 'db_connect.php';
	include '../header.php';

	$check_in_date = $_POST['check_in_date'];
	$check_out_date = $_POST['check_out_date'];
	$adult = $_POST['adult'];
	$childern = $_POST['child'];
	$hotel_name = $_POST['hotel_name'];
	$no_of_room_single = $_POST['no_of_room_single'];
	$no_of_room_double = $_POST['no_of_room_double'];
	$no_of_room_twin = $_POST['no_of_room_twin'];
	$total_room = $no_of_room_single + $no_of_room_double + $no_of_room_twin;
	$total_cost = ($no_of_room_single * 120) + ($no_of_room_double * 130) + ($no_of_room_twin * 140 );

	if(isset($_SESSION["userid"])){
		$userid = $_SESSION["userid"];
		$db_query = mysqli_query($con,"SELECT * FROM user WHERE id = '$userid'");
?>

<head>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/booking.css">
	<style>
		.payment_control .form_wrap{
			margin-left: 50px;
		}
		.payment_control .form_wrap .label {
			margin-right: -25px;
		}
	</style>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
    		$("#login").click(function(){
        		$("#new_user").hide();
        		$("#registered_user").show();
    		});
    		$("#new").click(function(){
        		$("#registered_user").hide();
        		$("#new_user").show();
    		});

    		$("#card").click(function(){
        		$("#payment_with_card").show();
        		$("#payment_with_cash").hide();
    		});
    		$("#cash").click(function(){
        		$("#payment_with_card").hide();
        		$("#payment_with_cash").show();
    		});

    		$('#new_user').hide();
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
	<div id="available_container" style="margin-bottom:100px;">
		<div class="booking_details_result">
			<!-- start booking details -->
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
			<!-- end of booking details -->
			<!-- start personal info field -->
			<div id="personal_info_field">
				<div class="user_info" style="margin-bottom:10px;">
					 <header class="head_section personal_details">
						<h2>Personal Information &nbsp; <i class="fa fa-caret-down"></i></h2>
					</header>
					<?php while($user_row = mysqli_fetch_array($db_query)){ ?>
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
			<!-- end of personal info field -->
			<!-- start payment field -->	
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
								<div class="form_wrapper" id="payment_with_card">
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
									<input type="submit" name="finish" value="Finish" class="book_finish" style="margin-left:220px;">
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
			<!-- end of payment field -->	
			<div class="clear"></div>
		</div>
	</div>
</body>

<?php		
	}else{
?>		
<head>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/booking.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
    		$("#login").click(function(){
        		$("#new_user").hide();
        		$("#registered_user").show();
    		});
    		$("#new").click(function(){
        		$("#registered_user").hide();
        		$("#new_user").show();
    		});

    		$("#card").click(function(){
        		$("#payment_with_card").show();
        		$("#payment_with_cash").hide();
    		});
    		$("#cash").click(function(){
        		$("#payment_with_card").hide();
        		$("#payment_with_cash").show();
    		});

    		$('#new_user').hide();
    		$("#payment_with_cash").hide();
		});
	</script>
</head>
<body>
	<div class="container">
		<form style="margin-top:50px;">
			<label class='radio_btn'>Registered User</label>	
			<input type="radio" id='login' name='member' value='login' checked>
			<label class='radio_btn'>New User</label>
  			<input type="radio" id='new' name='member' value='new'> 
		</form>
		<div id="registered_user">
			<div class="registered_user" id="registered_user">
				<form action="booking_registered_user.php" method="POST">

					<input type='hidden' name='check_in_date' value='<?php echo $check_in_date; ?>'>
 					<input type='hidden' name='check_out_date' value='<?php echo $check_out_date; ?>'>
 					<input type='hidden' name='hotel_name' value='<?php echo $hotel_name; ?>'>
 					<input type='hidden' name='child' value='<?php echo $childern; ?>'>
 					<input type='hidden' name='adult' value='<?php echo $adult; ?>'>
 					<input type='hidden' name='no_of_room_single' value='<?php echo $no_of_room_single; ?>'>
 					<input type='hidden' name='no_of_room_double' value='<?php echo $no_of_room_double; ?>'>
 					<input type='hidden' name='no_of_room_twin' value='<?php echo $no_of_room_twin; ?>'>
 					<input type="hidden" name="total_cost" value="<?php echo $total_cost; ?>">
					
					<header class='login_header'>
						<h2>Login</h2>	
					</header>
					<div class="login_wrap">
						<label for="email" class="login_label">Email: </label>
						<div class="login_input">
							<input type="email" name="email" id="email" placeholder="your email*" required>
						</div> 
					</div>
	
					<div class="login_wrap">
						<label for="password" class="login_label">Password: </label>
						<div class="login_input">
							<input type="password" name="password" id="password" placeholder="your password*" required>
						</div> 
					</div>
					<div class="login_btn">
						<input type="submit" name="login" value="Login">
					</div>
					<div style="clear:both;"></div>
				</form>		
			</div>
		</div>

		<div class="clear"></div>
		<div class="new_user" id='new_user'>
			<form action="new_user_payment.php" method="POST" class='user_info'>

				<input type='hidden' name='check_in_date' value='<?php echo $check_in_date; ?>'>
 				<input type='hidden' name='check_out_date' value='<?php echo $check_out_date; ?>'>
 				<input type='hidden' name='hotel_name' value='<?php echo $hotel_name; ?>'>
 				<input type='hidden' name='child' value='<?php echo $childern; ?>'>
 				<input type='hidden' name='adult' value='<?php echo $adult; ?>'>
 				<input type='hidden' name='no_of_room_single' value='<?php echo $no_of_room_single; ?>'>
 				<input type='hidden' name='no_of_room_double' value='<?php echo $no_of_room_double; ?>'>
 				<input type='hidden' name='no_of_room_twin' value='<?php echo $no_of_room_twin; ?>'>
 				<input type="hidden" name="total_cost" value="<?php echo $total_cost; ?>">

				<div class="form_wrapper">
					<div class="heading_caption">
						<h2 style="font-size:25px;font-weight:bold;margin-bottom:25px;">Personal Information</h2>
					</div>	
					<div class="form_wrap">
						<label for="firstName" class="label">First Name: </label>
						<div class="form_input">
							<input type="text" name="first_name" placeholder="Enter your first name*" id="firstName" required>
						</div> 
					</div>
		
					<div class="form_wrap">
						<label for="lastName" class="label">Last Name: </label>
						<div class="form_input">
							<input type="text" name="last_name" placeholder="Enter your last name*" id="lastName" required>
						</div> 
					</div>
		
					<div class="form_wrap">
						<label for="nrc_no" class="label">NRC Number: </label>
						<div class="form_input">
							<input type="text" name="nrc_no" placeholder="Enter your NRC number*" id="nrc_no" required>
						</div> 
					</div>
		
					<div class="form_wrap">
						<label for="phone_no" class="label">Phone Number: </label>
						<div class="form_input">
							<input type="text" name="phone_no" placeholder="Enter your phone number*" id="phone_no" required>
						</div> 
					</div>
		
					<div class="form_wrap">
						<label for="email" class="label">Email Address: </label>
						<div class="form_input">
							<input type="text" name="email" placeholder="Enter your email address*" id="email" required>
						</div> 
					</div>
		
					<div class="form_wrap">
						<label for="address" class="label">Address: </label>
						<div class="form_input">
							<textarea name="address" id="address" cols="40" rows="4"></textarea>
						</div> 
					</div>
				</div>
				
				
				<div class="save_btn" style="margin-left: 22px;">
					<input type="submit" name="next" value="Next">
				</div>	
			</form>
		</div>	
		<div style="margin-bottom:50px;"></div>
	</div>
</body>
<?php
	}
?>
<?php include '../footer.php'; ?>