<!-- 5. Age Caclulator -->

<html>
<head>
		<title>Age Caclulator</title>
</head>
<body>
	<h3>Age Caclulator</h3>
	<form method="post">
		Enter Your Birth Date : <input type="date" name="dob" required> 
		<input type="submit" value="Calculate Age" required>
	</form>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$birthdate = $_POST["dob"];
		$today = new DateTime();
		$birthday = new DateTime($birthdate);
		$age = $today->diff($birthday);
		
		echo "<h3>Your age : </h3>";
		echo "<p>Years : ".$age->y."</p>";
		echo "<p>Months : ".$age->m."</p>";
		echo "<p>Days : ".$age->d."</p>";
	}
	?>
</body>
</html>