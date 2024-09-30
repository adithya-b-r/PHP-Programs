<?php
	session_start();
	
	if(!isset($_SESSION["username"])){
		header("location:login.php");
		exit();
	}
	
	$username = $_SESSION["username"];
	
	if(isset($_POST["logout"])){
		session_destroy();
		header("location:login.php");
		exit();
	}
?>

<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<h2>Welcome, <?php echo $username?></h2>

	<form method="post">
		<input type="submit" name="logout" value="Logout">
	</form>
</body>
</html>