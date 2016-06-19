<!DOCTYPE>
<?php 
	include ('db_connect.php');
  session_start();
  if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
    header("Location: 404.php");
  }
  $url1 = str_replace("/src","","http://".$_SERVER['HTTP_HOST'].dirname($_SERVER["SCRIPT_NAME"]));
  include '../header.php';
  include 'sidebar.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Room Entry</title>
<link  href="../css/room.css" rel="stylesheet" type="text/css">


</head>

<body>
  <div class="room_body">
      <div class="room_header"> 
        <h3>Room Entry</h3> 
        <a href="room_list.php">Show Room List</a>
     </div>
    	<form name="form" method="POST" action="add_room.php" enctype="multipart/form-data" id="register-form">
    <div class="room_wrapper">
    
    <div class="room_main">
    
    	<div class="room_container">
    			<div>
    				<label class="room_label"> Room No:</label> 
                    <input class="room_input" type ="text" name ="rno" required="required" id="rno">
                </div>
                <div>
    				<label class="room_label"> Room Type:</label> 
                    <select name = "rtype" class="room_input">
               			<option value="---">---choose---</option>
                      <?php
    				  
                      $result_set = mysqli_query($con,"SELECT * FROM room_type");
    				  //$result_set=mysql_query($sql_query);
                      while( $fetched_row=mysqli_fetch_array($result_set)): {
                        echo '<option value = "'.$fetched_row['id'].'">'.$fetched_row['name'].'</option>';
                      }
                      endwhile
                      ?>
                    </select>
                </div>
                <div>
    				<label class="room_label"> Hotel Name:</label> 
                    <select name = "ho_name" class="room_input">
               			<option value="---">---choose---</option>
                      <?php
    				  
                      $result_set = mysqli_query($con,"SELECT * FROM hotel");
    				  //$result_set=mysql_query($sql_query);
                      while( $fetched_row=mysqli_fetch_array($result_set)): {
                        echo '<option value = "'.$fetched_row['id'].'">'.$fetched_row['name'].'</option>';
                      }
                      endwhile
                      ?>
                    </select>
                </div>
    
                <div>
            <label class="room_label"> Room Price:</label> 
                    <input class="room_input" type ="text" name ="price" required="required" id="price">
                </div>
    
          		<div>
    				<label class="room_label" style="float: left;margin-top: 20px;"> Room Information:</label>
                    <textarea class="room_textarea" name="roominf" cols="35" rows="4"></textarea>
          		</div>
          		<div>
    				<label class="room_label"> Room Image:</label> 
                    <input id="uploadFile" placeholder="Choose File" disabled="disabled" style="padding:5px;margin-   left:6px;margin-top:10px;margin-bottom:20px;border:2px solid #d0cdd1;border-radius:3px;width:   167px"/>
    				<div class="fileUpload btn btn-primary">
        			<span class='room_span'>Browse</span>
        			<input id="uploadBtn" type="file" class="upload" name="image"/>
    				</div>
    			</div>
                <div>
    				<input type="submit" value="Save"  name="submit" class="room_btn">
                </div>
                
    	</div>
    
    </div>
    </form>
  </div>  
<script type="text/javascript">
	
	document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
	};
	
</script>
</body>
</html>

<?php include '../footer.php'; ?>
