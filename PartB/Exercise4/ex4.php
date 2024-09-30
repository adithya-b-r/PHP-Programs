<!-- 4. Login Form -->

<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<h2>Login Form</h2>
	<br>
	<form method="POST">
		<label>Username : </label>
		<input type="text" name="uname" required>
		<br><br>
		<label>Password : </label>
		<input type="password" name="upass" required>
		<br><br>
		<input type="Submit" value="Login">
	</form>
	
	<br>
	
	<?php
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "adithyadb";
			
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			
			if(!$conn)
				die("Connection Failed : ". mysqli_connect_error);
			
			$username = $_POST['uname'];
			$password = $_POST['upass'];
			
			$sql = "SELECT * FROM login where username='$username' AND password='$password'";
			
			$result = mysqli_query($conn, $sql);
			
			if(mysqli_num_rows($result) > 0)
				echo "<h2>Welcome, $username</h2>";
			else
				echo "<h2>Invalid username or password!</h2>";
		}
	?>