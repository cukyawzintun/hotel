<!DOCTYPE>
<?php 
  include ('db_connect.php');
  session_start();
  if(!isset($_SESSION['user']) and $_SESSION['status'] == 0){
    header("Location: 404.php");
  }
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
      <?php
      $id = $_GET['id'];
      $sql_query =  mysqli_query($con,"SELECT * FROM room_db where id=$id");
      $num=mysqli_num_rows($sql_query);

    if($num>0)
       {
           $row1 = mysqli_fetch_assoc($sql_query);
         $id           =  $row1['id'];
         $room_no        =  $row1['room_no'];
         $room_type      =  $row1['room_type'];
         $hotel_name          =  $row1['hotel_name'];
         $room_inform    =  $row1['room_inform'];
         $room_image     =  $row1['room_image'];
         $price         = $row1['price'];
       }
    else
       {
           echo 'NOT FOUND';
       }
      ?>
      <div class="room_header"> 
        <h3>Editing Room Entry</h3> 
        <a href="room_list.php">Show Room List</a>
    </div>
      <form name="form" method="POST" action="room_update.php" enctype="multipart/form-data" id="register-form">
    <div class="room_wrapper">

    <div class="room_main">

      <div class="room_container">
            <input type='hidden' name='hiddenId' value="<?php  echo $id;?>">
          <div>
            <label class="room_label"> Room No:</label> 
                    <input class="room_input" type ="text" name ="rno" required="required" id="rno" value="<?php  echo $room_no;?>";>
                </div>
                <div>
            <label class="room_label"> Room Type:</label> 
                    <select name = "rtype" class="room_input">
                    <?php
                      $result = mysqli_query($con,"SELECT * FROM room_type");
                      while($row = mysqli_fetch_array($result)) :{
              
               $rtype_id = $row['id'];
               
                    
                      ?>
                      <option value="<?php echo $rtype_id;?>" <?php if($rtype_id===$room_type){ ?> selected="selected" <?php } ?>><?php echo $row['name']; ?></option>
                  <?php    
                        }
          mysqli_close($conn);
        endwhile
                     ?>
                    </select>
                </div>
                <div>
            <label class="room_label"> Hotel Name:</label> 
                    <select name = "ho_name" class="room_input" >
                    <?php
                      $result = mysqli_query($con,"SELECT * FROM hotel");
                      while($row = mysqli_fetch_array($result)) :{
              
               $ho_id = $row['id'];
               
                    
                      ?>
                      <option value="<?php echo $ho_id;?>" <?php if($ho_id===$hotel_name){ ?> selected="selected" <?php } ?>><?php echo $row['name']; ?></option>
                  <?php    
                        }
          mysqli_close($conn);
        endwhile;
                     ?>
                    </select>
                </div>

                <div>
            <label class="room_label"> Room Price:</label> 
                    <input class="room_input" type ="text" name ="price" value="<?php echo $price;  ?>" required>
                </div>

              <div>
            <label class="room_label" style="float: left;margin-top: 20px;"> Room Information:</label>
                    <textarea class="room_textarea" name="roominf" cols="35" rows="4"><?php echo $room_inform;  ?></textarea>
              </div>
              <div>
            <label class="room_label"> Room Image:</label> 
                    <input id="uploadFile" placeholder="Choose File" disabled="disabled" style="padding:5px;margin-left:6px;margin-top:10px;margin-bottom:20px;border:2px solid #d0cdd1;border-radius:3px;width:167px" name="uploadFile" value="<?php echo $room_image; ?>"/>
            <div class="fileUpload btn btn-primary">
              <span class="room_span">Browse</span>
              <input id="uploadBtn" type="file" class="upload" name="image" value="../images/<?php echo $room_image; ?>"/>
            </div>
          </div>
                <div>
            <input type="submit" value="Update"  name="submit" class="room_btn">
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
