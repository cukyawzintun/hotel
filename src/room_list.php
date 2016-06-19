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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="font-awesome.min.css">
<title>Room Type List</title>
<link rel="stylesheet" href="../css/admin.css">
</head>

<body>
		
        	<?php
				$result = mysqli_query($con,"SELECT room_db.id,room_db.room_no,room_type.name,hotel.name,room_db.room_inform,room_db.room_image,room_db.price FROM room_db INNER JOIN room_type ON (room_db.room_type = room_type.id)
                            INNER JOIN hotel ON (room_db.hotel_name = hotel.id) ORDER BY id ")
			?>
	<div class="container">	
        <header class="admin-table">
            <h2 class="heading">Room List</h2>
            <div class="add_link">
                <a href="room_entry.php">Add New room</a>
            </div>
        </header>
		<table class="table">
        	
  			<tr class="header_row">
    			<th class="table_header">Room No.</th>
                <th class="table_header">Room Type</th>
                <th class="table_header">Hotel Name</th>
                <th class="table_header">Room Information</th>
                <th class="table_header">Room Image</th>
                <th class="table_header">Room Price</th>
    			<th class="table_header">Action</th>		
    		</tr>
            <?php while($row=mysqli_fetch_array($result)):?>
            
  			<tr class="data_row">
    			<td class="table_data"><?php echo $row[1]; ?></td>
                <td class="table_data"><?php echo $row[2]; ?></td>
                <td class="table_data"><?php echo $row[3]; ?></td>
                <td class="table_data"><?php echo $row[4]; ?></td>
                <td class="table_data"><img src="../images/<?php echo $row['5']; ?>" alt="" width="50px" height="25px"></td>		
    			<td class="table_data"><?php echo $row[6]; ?></td>
                <td class="table_data"><a href="room_edit.php?id=<?php echo $row['0']; ?>"> Edit</a>
					<a href="javascript:del_confirm(<?php echo $row['0']; ?>)"> Delete</a>
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
              window.location = "room_delete.php?id="+id;
            }
            else
            {
               window.location = "room_list.php";
            }

        }
</script>

</body>
</html>

<?php include '../footer.php'; ?>
