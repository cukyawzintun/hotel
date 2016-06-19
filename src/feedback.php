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
	<title>User Feedback</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<div class="container" style="margin-bottom: 200px;">
		<header class="admin-table">
			<h2 class="heading">User Feedback</h2>
		</header>	
		<table class="table">
			<?php 
				$query = "SELECT * FROM feedback ORDER BY id DESC";
				$result = mysqli_query($con,$query);
			 ?>
			<tr class="header_row">
				<th class="table_header">Name</th>
				<th class="table_header">Email</th>
				<th class="table_header">Description</th>
				<th class="table_header">Date</th>
				<th class="table_header">Action</th>
			</tr>
			<?php 
				while($row = mysqli_fetch_array($result)): 	
			?>
			<tr class="data_row">
				<td class="table_data"><?php echo $row['name'];  ?></td>
				<td class="table_data"><?php echo $row['email']; ?></td>
				<td class="table_data"><?php echo $row['description']; ?></td>
				<td class="table_data"><?php echo $row['date']; ?></td>
				<td class="table_data">
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
	              window.location = "delete_feedback.php?id="+id;
	            }
	            else
	            {
	               window.location = "feedback.php";
	            }

	        }
	</script>
</body>
</html>
<?php include '../footer.php'; ?>