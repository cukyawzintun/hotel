<?php 
    session_start();
    if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
        header("Location: 404.php");
    }
 ?>
<!DOCTYPE>
<?php 
	include ('db_connect.php');
    include '../header.php';
    include 'sidebar.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="font-awesome.min.css">
<title>Room Type List</title>
	<style>
		.roomtype_container>h3{
			margin-left:300px;
	  		color:green;
	   		font-family:'Droid Serif',serif;
	   	}
	
		.roomtype_container>table, 
        .roomtype_container>th, 
        .roomtype_container>td {
    		border: 1px solid ;
    		border-collapse: collapse;
			border-color: green ;
			text-align: center;
			margin-left:290px;
			
		}
	</style>
</head>

<body>
		
        	<?php
				$result = mysqli_query($con,"SELECT * FROM room_type ORDER BY id ")
			?>
		
    <div class="roomtype_container" style="margin-bottom: 150px;">     
        <header class="admin-table">
            <h2 class="heading">Room Name List</h2>
            <div class="add_link">
                <a href="roomtype_entry.php">Add new room type</a>
            </div>
        </header>
		<table class="table">
        	
  			<tr class="header_row">
    			<th class="table_header">Id</th>
    			<th class="table_header">Name</th>
    			<th class="table_header">Action</th>		
    		</tr>
            <?php while($row=mysqli_fetch_array($result)):?>
            
  			<tr class="data_row">
    			<td class="table_data"><?php echo $row['id']; ?></td>
    			<td class="table_data"><?php echo $row['name']; ?></td>		
    			<td><a href="roomtype_edit.php?id=<?php echo $row['id']; ?>"> Edit</a>
					<a href="javascript:del_confirm(<?php echo $row['id']; ?>)"> Delete</a>
                </td>
  			</tr>
            <?php endwhile; ?>
  		</table>
    </div>    
        <script>
	function del_confirm(id)
        {
        	var sure = confirm("Are you sure you want to delete?");
            if(sure == true)
            {
              window.location = "roomtype_delete.php?id="+id;
            }
            else
            {
               window.location = "roomtype_list.php";
            }

        }
</script>

</body>
</html>
<?php include '../footer.php'; ?>
