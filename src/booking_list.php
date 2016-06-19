<?php 
	session_start();
	if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
 		header("Location: 404.php");
	}
 ?>
<?php 
	include 'db_connect.php';
	include '../header.php';
	include 'sidebar.php'; 
?>

<head>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<div class="container" style="margin-bottom: 150px;">
		<header class="admin-table">
			<h2 class="heading">Booking List</h2>
		</header>	
		<table class="table">
			<?php 
				$query = "SELECT h.name, b.booking_date, b.check_in_date, b.check_out_date, b.total_room,b.total_cost, u.first_name, u.last_name,p.payment_type,p.card_number,p.expire_date
							FROM booking AS b
							INNER JOIN user AS u ON b.user_id = u.id
							INNER JOIN Payment AS p ON b.id = p.booking_id
							INNER JOIN hotel AS h ON b.hotel_id = h.id";
				$result = mysqli_query($con,$query);
			 ?>
			<tr class="header_row">
				<th class="table_header">User Name</th>
				<th class="table_header">Hotel Name</th>
				<th class="table_header">Booking Date</th>
				<th class="table_header">Check In Date</th>
				<th class="table_header">Check Out Date</th>
				<th class="table_header">Total Room</th>
				<th class="table_header">Payment Type</th>
				<th class="table_header">Card Number</th>
				<th class="table_header">Card Expire Date</th>
				<th class="table_header">Cost Per Day</th>
			</tr>
			<?php 
				while($row = mysqli_fetch_array($result)): 	
			?>
			<tr class="data_row">
				<td class="table_data"><?php echo $row['first_name']."&nbsp;".$row['last_name']; ?></td>
				<td class="table_data"><?php echo $row['name']; ?></td>
				<td class="table_data"><?php echo $row['booking_date']; ?></td>
				<td class="table_data"><?php echo $row['check_in_date']; ?></td>
				<td class="table_data"><?php echo $row['check_out_date']; ?></td>
				<td class="table_data"><?php echo $row['total_room']; ?></td>
				<td class="table_data"><?php echo $row['payment_type']; ?></td>
				<td class="table_data"><?php echo $row['card_number']; ?></td>
				<td class="table_data"><?php echo $row['expire_date']; ?></td>
				<td class="table_data"><?php echo '$'.$row['total_cost']; ?></td>
			</tr>
			<?php endwhile; ?>	
		</table>
	</div>
</body>
</html>
<?php include '../footer.php'; ?>