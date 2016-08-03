
<?php 
session_start();
include '../header.php'; 
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<!-- Include CSS File Here -->
<link rel="stylesheet" href="../css/style2.css"/>

</head>
<body>
<section>
	<div class="login_container">
		<div class="main">
			<form class="form" method="post" action="login_check.php" autocomplete="on" >
				<h2 class="heading">LOGIN</h2>
				<label class="label">Email :</label>
				<input type="email" name="email" id="email" required="required" class="input">
				<label class="label">Password :</label>
				<input type="password" name="password" id="password" required="required" class="input">
				<input type="submit" name="login" id="login" value="Login">
                <span id="span"><a href="user_reg.php">Create New User</a></span>
			</form>
		</div>
	</div>
</section>
</body>
</html>
<?php include '../footer.php'; ?>

