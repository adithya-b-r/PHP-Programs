<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$message = $_POST["message"];
		
		echo "<h2> Form Submission Result</h2>";
		
		echo "<p>Name : $name </p>";
		echo "<p>Email : $email </p>";
		echo "<p>Message : $message </p>";
	}
	else{
		echo "Access Denied!";
	}
?>