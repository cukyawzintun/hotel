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
			<h2 class="heading">Hotel Details</h2>
			<div class="add_link">
				<a href="add_hotel.php">Add New Hotel</a>
			</div>
		</header>	
		<table class="table">
			<?php 
				$query = "SELECT hotel.id,hotel.name,hotel.email,hotel.address,hotel.rating,location.location_name 
						  FROM hotel 
						  INNER JOIN location 
						  ON hotel.location_id = location.id ORDER BY id DESC";
				$result = mysqli_query($con,$query);
			 ?>
			<tr class="header_row">
				<th class="table_header">Name</th>
				<th class="table_header">Email</th>
				<th class="table_header">Rating</th>
				<th class="table_header">Location</th>
				<th class="table_header">Action</th>
			</tr>
			<?php 
				while($row = mysqli_fetch_array($result)): 	
			?>
			<tr class="data_row">
				<td class="table_data"><?php echo $row['name'];  ?></td>
				<td class="table_data"><?php echo $row['email']; ?></td>
				<td class="table_data"><?php echo $row['rating']; ?></td>
				<td class="table_data"><?php echo $row['location_name']; ?></td>
				<td class="table_data">
					<a href="update_hotel.php?id=<?php echo $row['id']; ?>">Update &nbsp;</a>
					<a href="javascript:del_confirm(<?php echo $row['id']; ?>)">Delete</a>
				</td>
			</tr>
		<?php endwhile; ?>
		</table>
	</div>
	<script>
		function del_confirm(id)
	        {
	        	var sure = confirm("Are you sure you want to delete hotel information?");
	            if(sure == true)
	            {
	              window.location = "delete_hotel.php?id="+id;
	            }
	            else
	            {
	               window.location = "show_hotel.php";
	            }

	        }
	</script>
</body>
</html>
<?php include '../footer.php'; ?>