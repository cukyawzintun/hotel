<?php 
	session_start();
	if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
 		header("Location: 404.php");
	}
	include '../header.php'; 
 	include 'sidebar.php'; 
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show Hotel Location</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<div class="container" style="margin-bottom: 150px;">
		<header class="admin-table" style="margin-bottom:-00px;">
			<h2 class="heading">Hotel Location</h2>
			<div class="add_link">
				<a href="add_location.php">Add Hotel Location</a></br>
			</div>
		</header>	
		<table class="table">
			<?php 
				include 'db_connect.php';
				$show_query = "SELECT * FROM location ";
				$result = mysqli_query($con,$show_query);
			 ?>
			<tr class="header_row">
				<th class="table_header">location ID</th>
				<th class="table_header">Location Name</th>
				<th class="table_header">Action</th>
			</tr>
				<?php 
					while($row = mysqli_fetch_array($result)): 
				?>
			<tr class="data_row">	
				<td class="table_data"><?php echo $row['id']; ?></td>

				<td class="table_data"><?php echo $row['location_name']; ?></td>
				<td class="table_data">
					<a href="update_location.php?id=<?php echo $row['id']; ?>">Update</a>
					<a href="javascript:del_confirm(<?php echo $row['id']; ?>)">Delete</a>
				</td>
			</tr>
			<?php endwhile; ?>
		</table>
	</div>
	<script>
		function del_confirm(id){
			var sure = confirm("Are you sure you want to delete hotel location ?");
			if( sure == true){
				window.location = "delete_location.php?id="+id;
			}else{
				window.location = "show_location.php";
			}
		}
	</script>
</body>
</html>
<?php include '../footer.php'; ?>