<?php 
		session_start();
		include '../header.php';
		$url1 = str_replace("/src","","http://".$_SERVER['HTTP_HOST'].dirname($_SERVER["SCRIPT_NAME"])); 
	?>


<!DOCTYPE html>
<html xml:lang="tr-tr" lang="tr-tr" dir="ltr">
<head>
	<title>Page Not Found</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo $url1; ?>/css/errors.css" type="text/css" />
	<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'> -->
</head>
<body class="fof-error">
	<div class="fof-errors">
		<div id="outline">
			<div id="errorboxoutline">
				<div class="fof-error-code"><span class="first">4</span><span class="">0</span><span class="last">4</span></div>
				
				<div class="fof-error-message"><h2>The content could not be found.</h2></div>
				
				<div id="errorboxbody">
					<p>The page or file you requested may have been moved or is invalid.
						Please make sure the address is correct and try again. </p>
          			<a class="button-home" href="<?php echo $url1; ?>/index.php" title="Home">Home</a>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>

<?php include '../footer.php'; ?>