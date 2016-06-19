 <?php    

 	include ("db_connect.php");
	session_start();
	if(!isset($_SESSION["userid"])){
 		header("Location: 404.php");
	}

    if(isset($_POST['change_password'])){
      $userid = $_SESSION["userid"];
      $old_password = $_POST['current_password'];
      $new_password = $_POST['new_password'];
      $confirm_password = $_POST['confirm_password'];
      $result = mysqli_query($con,"SELECT * FROM user WHERE id = '$userid'");
      $row = mysqli_fetch_array($result);
      if($old_password == $row['password']){
        mysqli_query($con,"UPDATE user SET password = '$new_password', confirm_password = '$confirm_password' WHERE id = '$userid' AND password='$old_password'");
        
      }else{
        return $error_message = "Current Password is not correct";
      }

  ?>