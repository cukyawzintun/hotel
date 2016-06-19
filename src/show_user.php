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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show Hotel Details</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<div class="container" style="margin-bottom: 100px;">
		<header class="admin-table">
			<h2 class="heading">User List</h2>
			<div class="add_link">
				<a href="user_information.php">Add New Personal Information</a>
			</div>
		</header>	
		<table class="table">
			<?php 
				$query = "SELECT * FROM user ORDER BY id DESC";
				$result = mysqli_query($con,$query);
			 ?>
			<tr class="header_row">
				<th class="table_header">Name</th>
				<th class="table_header">NRC No</th>
				<th class="table_header">Phone No</th>
				<th class="table_header">Email</th>
				<th class="table_header">Action</th>
			</tr>
			<?php 
				while($row = mysqli_fetch_array($result)): 	
			?>
			<tr class="data_row">
				<td class="table_data"><?php echo $row['first_name'];  ?> <?php echo $row['last_name']; ?></td>
				<td class="table_data"><?php echo $row['nrc_no']; ?></td>
				<td class="table_data"><?php echo $row['phone_no']; ?></td>
				<td class="table_data"><?php echo $row['email']; ?></td>
				<td class="table_data">
					<a href="update_user_info.php?id=<?php echo $row['id']; ?>">Update &nbsp;</a>
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
	              window.location = "delete_user_info.php?id="+id;
	            }
	            else
	            {
	               window.location = "show_user.php";
	            }

	        }
	</script>
</body>
</html>
<?php include '../footer.php'; ?>