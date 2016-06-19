<?php
// Initialize variables to null.
session_start();
if(isset($_SESSION["userid"])) {
    header('location:../index.php');
}
include ('db_connect.php');
$fnameError ="";
$lnameError ="";
$nrc_noError ="";
$phonenoError ="";
$emailError ="";    

// On submitting form below function will execute.
if(isset($_POST['btn-register'])){
    $first_name = test_input($_POST["fname"]);
    $last_name = test_input($_POST["lname"]);
    $nrc_num = test_input($_POST["nrc_no"]);
    $phone_num = test_input($_POST["phoneno"]);
    $address = test_input($_POST['address']);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST['pwd']);
    $confirm_pwd = test_input($_POST['confirm_pwd']);
    $check_email = "SELECT * FROM user WHERE email = '$email'";
    $verify_email = mysqli_query($con,$check_email);
    if (mysqli_num_rows($verify_email) == 0) {   
        mysqli_query($con,"INSERT INTO `user` (`first_name`,`last_name`,`nrc_no`,`phone_no`,`address`,`email`,`password`,`confirm_password`,`created`) 
        VALUES ('$first_name','$last_name','$nrc_num','$phone_num','$address','$email','$password','$confirm_pwd',now())") or die("cannot insert ".mysql_error());
        header('location:login.php');
    }else{
        $emailError = "That email address has already been registered.";
        echo $emailError;
    }
}    
        
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
//php code ends here
?>
<?php include '../header.php'; ?>
<head>
<title>User Registration Form</title>   
<link rel="stylesheet" href="../css/style2.css">
</head>
<div class="container_for_user">
        <form action="user_reg.php" method="POST" class='user_info' autocomplete="off">
        <div class="form_wrapper">
            <div class="heading_caption">
                <h2>User Registeration</h2>
            </div>  
            <div class="form_wrap">
                <label for="firstName" class="label">First Name: </label>
                <div class="form_input">
                    <input type="text" name="fname" placeholder="Enter your first name*" id="firstName" required>
                    <span class="error"></span>
                </div> 
            </div>

            <div class="form_wrap">
                <label for="lastName" class="label">Last Name: </label>
                <div class="form_input">
                    <input type="text" name="lname" placeholder="Enter your last name*" id="lastName" required>
                    <span class="error"></span>
                </div> 
            </div>

            <div class="form_wrap">
                <label for="nrc_no" class="label">NRC Number: </label>
                <div class="form_input">
                    <input type="text" name="nrc_no" placeholder="Enter your NRC number*" id="nrc_no" required>
                    <span class="error"></span>
                </div> 
            </div>

            <div class="form_wrap">
                <label for="phone_no" class="label">Phone Number: </label>
                <div class="form_input">
                    <input type="text" name="phoneno" placeholder="Enter your phone number*" id="phone_no" required>
                    <span class="error"></span>
                </div> 
            </div>

            <div class="form_wrap">
                <label for="email" class="label">Email Address: </label>
                <div class="form_input">
                    <input type="email" name="email" onchange="checkEmail(this.value)" placeholder="Enter your email address*" id="email" required>
                    <p class="error" id="email_error" style="margin-left:200px;"><?php echo $emailError; ?></p>
                </div> 
            </div>

            <div class="form_wrap">
                <label for="address" class="label">Address: </label>
                <div class="form_input">
                    <textarea name="address" id="address" cols="40" rows="4"></textarea>
                </div> 
            </div>

            <div class="form_wrap">
                <label for="pwd" class="label">Password: </label>
                <div class="form_input">
                    <input type="password" name="pwd" placeholder="Enter your password*" id="pwd" required>
                    <span class="error"></span>
                </div> 
            </div>

            <div class="form_wrap">
                <label for="confirm_pwd" class="label">Confirm Password: </label>
                <div class="form_input">
                    <input type="password" name="confirm_pwd" placeholder="Enter your confirm_pwd *" id="confirm_pwd" required>
                    <span class="error" id='divCheckPasswordMatch'></span>
                </div> 
            </div>

            <div class="save_btn">
                <button type="submit" name="btn-register" value="Register" class='btn_register'>Register</button>
                <button type="reset" name="btn-clear" value="Clear" onclick="checkPassword()" class='btn_clear'>Clear</button>
            </div>
        </div>
        </form>
        <div style="margin-bottom:50px;"></div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            
            $('#pwd').keyup(function () {
              checkPassword();      
            });

            $('#confirm_pwd').keyup(function() {
                checkPassword();
            });

            function checkPassword() {
                var password = $("#pwd").val();
                var confirmPassword = $("#confirm_pwd").val();
                if(password.length == 0 || confirmPassword.length == 0) { /*when password is blank*/
                    /*$("#divCheckPasswordMatch").html("Passwords are require");*/
                    $(".btn_register").attr('disabled', 'disabled');
                    $(".btn_register").css('background','grey');
                }else if (password != confirmPassword){
                    $("#divCheckPasswordMatch").html("Passwords do not match!");
                    $(".btn_register").attr('disabled', 'disabled');
                    $(".btn_register").css('background','grey');
                }else{
                    $(".btn_register").removeAttr('disabled');
                    $("#divCheckPasswordMatch").html("Passwords match.");
                    $(".btn_register").css('background','#32A2E3');   
                }
            }
            /*document.getElementById('divCheckPasswordMatch').innerHTML = typeof document.getElementById('pwd').value;*/
        });


        function checkEmail(mail){
            var xmlhttp;    
            if (mail=="")
              {
              document.getElementById("email_error").innerHTML="";
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
                document.getElementById("email_error").innerHTML=xmlhttp.responseText;
                }
              }
            xmlhttp.open("POST","verify_email.php?q="+mail,true);
            xmlhttp.send();
        }
 
    </script>

<?php include '../footer.php'; ?>    