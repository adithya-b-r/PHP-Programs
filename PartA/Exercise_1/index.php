<!-- 1. Contact Form -->

<html>
<head>
	<title>Contact Form</title>
</head>
<body>
	<h2>Contact Form</h2>
	
	
	<form action="contact.php" method="post">
		<label for="name">Name :</label>
		<br>
		<input type="text" id="name" name="name" required>
		<br><br>
		
		<label for="email">Email :</label>
		<br>
		<input type="email" id="email" name="email" required>
		<br><br>
		
		<label for="message">Message :</label>
		<br>
		<textarea id="message" name="message" rows="4" required></textarea>
		<br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>