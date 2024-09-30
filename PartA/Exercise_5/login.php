<!-- 3. Session Usage -->

<?php
	session_start();
	
	if(isset($_SESSION["username"])){
		header("Location:welcome.php");
		exit();
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		if($username === "canara" && $password === "canara123"){
			$_SESSION["username"] = $username;
			
			header("Location:welcome.php");
			exit();
		}
		else{
			$error_msg = "Invalid username or password. Please try again.";
		}
	}
?>

<html>
<head>
	<title>Login</title>
</head>
<body>
	<h2>Login</h2>
	
	<form method="post">
		<label>Username : </label><br>
		<input type="text" name="username" required>
		<br><br>
		<label>Password : </label><br>
		<input type="password" name="password" required>
		<br><br>
		<input type="submit" value="Login">
		<br>
		
		<?php
			if(isset($error_msg))
				echo "<br> $error_msg";
		?>
	</form>
</body>
</html>

















