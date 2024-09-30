<!-- 5. Feedback Form -->

<html>
<head>
<title>Feedback Form</title>
</head>
<body>
	<h2>Feedback Form</h2>
	<form method="post">
		<label>Name : </label>
		<input type="text" name="uname" required>
		<br>
		<label>Email : </label>
		<input type="email" name="email" required>
		<br>
		<label>Subject : </label>
		<input type="text" name="sub" required>
		<br>
		<label>Message : </label>
		<input type="text" name="msg" required>
		<br>
		<input type="submit" value="Submit">
	</form>

	<?php
		$server = "localhost";
		$username = "root";
		$password = "";
		$dbname = "formdata";

		$conn = mysqli_connect($server, $username, $password, $dbname);
		
		if(!$conn)
			die("Connection Failed!");

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$name = $_POST["uname"];
			$email = $_POST["email"];
			$subject = $_POST["sub"];
			$msg = $_POST["msg"];

			$sql = "INSERT INTO form('name','email,'subject','msg') VALUES($name, $email, $subject, $msg)";
			$result = mysqli_query($conn, $sql);
			
			echo $result;
			
			echo "<br><br>";
			echo "Thank you for your feedback!";
		}
	?>
</body>
</html>