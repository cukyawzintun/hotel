<?php 
	session_start();
	if(!isset($_SESSION["userid"])){
 		header("Location: 404.php");
	}
  include ("db_connect.php");
	include '../header.php';
	$userid = $_SESSION["userid"];
	$select_user = "SELECT * FROM user WHERE id = '$userid'";
	$result = mysqli_query($con,$select_user);

  if(isset($_POST['change_password'])){
      $userid = $_SESSION["userid"];
      $old_password = $_POST['current_password'];
      $new_password = $_POST['new_password'];
      $confirm_password = $_POST['confirm_password'];
      $result = mysqli_query($con,"SELECT * FROM user WHERE id = '$userid'");
      $row = mysqli_fetch_array($result);
      if($old_password == $row['password']){
        mysqli_query($con,"UPDATE user SET password = '$new_password', confirm_password = '$confirm_password' WHERE id = '$userid' AND password='$old_password'");
        header('location:user_profile.php');
      }else{
        $error_message = "Current Password is not correct";
      }
  }    
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Change Password</title>
 	<link rel="stylesheet" href="../css/admin.css">
 </head>
 <body>
 	<div id="profile_main">
 		<form action="user_password_change.php" method="POST">
 		<div id="profile_wrapper">
 			<header>
 				<h2>Change Password</h2>
 			</header>
 				<div class="profile_form_wrap">
 					<label for="" class="profile_label">Current Password:</label>
 					<div class="profile_h3">
 						<input required type="password" name="current_password" onkeyup="currentPassword(this.value)">
 						<p class="error" id="current_password_error" >
 							<?php if(isset($error_message)) { echo $error_message; } ?>
 						</p>
 					</div>
 				</div>
 				<div class="profile_form_wrap">
 					<label for="" class="profile_label">New Password:</label>
 					<div class="profile_h3">
 						<input required type="password" name="new_password" id="pwd">
 					</div>
 				</div>
 				<div class="profile_form_wrap">
 					<label for="" class="profile_label">New Password (Confirm):</label>
 					<div class="profile_h3">
 						<input required type="password" name="confirm_password" id="confirm_pwd">
 						<span class="error" id='divCheckPasswordMatch'></span>
 					</div>
 				</div>
 		</div>
 		<div class="profile_edit_btn">
 			<input type="submit" name="change_password" value="change" class="profile_update" style="margin-bottom:20px;">
      <a href="user_profile.php">
        <i class="fa fa-backward"></i>Back
      </a>
 		</div>
 		</form>
 		<div class="clear"></div>
 	</div>
 </body>
 </html>

 <script>
 	function currentPassword(current_password){
      var xmlhttp;    
      if (current_password=="")
        {
        document.getElementById("current_password_error").innerHTML="";
        return;
        }
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          document.getElementById("current_password_error").innerHTML=xmlhttp.responseText;
          }
        }
      xmlhttp.open("POST","current_password.php?q="+current_password,true);
      xmlhttp.send();
  }

    $(document).ready(function() {
            
            $('#pwd').keyup(function () {
              checkPassword();
              /*document.getElementById('divCheckPasswordMatch').innerHTML = typeof document.getElementById('c_psw_err').value;*/      
            });

            $('#confirm_pwd').keyup(function() {
                checkPassword();
            });

            function checkPassword() {
                var password = $("#pwd").val();
                var confirmPassword = $("#confirm_pwd").val();
                var currentPassword = $("#c_psw_err").val();
                if(password.length == 0 || confirmPassword.length == 0) { /*when password is blank*/
                    /*$("#divCheckPasswordMatch").html("Passwords are require");*/
                    $(".profile_update").attr('disabled', 'disabled');
                    $(".profile_update").css('background','grey');
                }else if (password != confirmPassword){
                    $("#divCheckPasswordMatch").html("Passwords do not match!");
                    $(".profile_update").attr('disabled', 'disabled');
                    $(".profile_update").css('background','grey');
                }else{
                    $(".profile_update").removeAttr('disabled');
                    $("#divCheckPasswordMatch").html("Passwords match.");
                    $(".profile_update").css('background','#32A2E3');   
                }
            }
        });    
 </script>
 <?php include '../footer.php'; ?>