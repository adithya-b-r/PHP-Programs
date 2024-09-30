<!-- Student Registration Form -->

<html>
<head>
	<title>Student Registration Form</title>
</head>
<body>
	<h2>Student Registration Form</h2>
	<br>
	
	<form method="post" action="display.php">
		<label>First Name : </label>
		<br>
		<input type="text" name="fname" required>
		<br><br>
		
		<label>Last Name : </label>
		<br>
		<input type="text" name="lname" required>
		<br><br>
		
		<label>Address : </label>
		<br>
		<textarea type="text" name="address" required></textarea>
		<br><br>
		
		<label>Email : </label>
		<br>
		<input type="email" name="email" required>
		<br><br>
		
		<label>Mobile : </label>
		<br>
		<input type="text" name="mobile" required>
		<br><br>
		
		<label>City : </label>
		<br>
		<input type="text" name="city" required>
		<br><br>
		
		<label>State : </label>
		<br>
		<input type="text" name="state" required>
		<br><br>
		
		<label>Gender : </label>
		<br>
		<input type="radio" value="Male" name="gender">
		<label>Male</label>
		<br>
		<input type="radio" value="Female" name="gender">
		<label>Female</label>
		<br>
		<input type="radio" value="Other" name="gender">
		<label>Other</label>
		<br><br>
		
		<label>Blood Group : </label>
		<select name="blood_group">
			<option value=""></option>
			<option value="A+">A+</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B-">B-</option>
			<option value="O+">O+</option>
			<option value="O-">O-</option>
			<option value="AB+">AB+</option>
			<option value="AB-">AB-</option>
		</select>
		<br><br>
		
		<label>Hobbies : </label>
			<br>
			<input type="checkbox" value="Reading" name="hobbies[]"><label>Reading</label>
			<br>
			<input type="checkbox" value="Singing" name="hobbies[]"><label>Singing</label>
			<br>
			<input type="checkbox" value="Dancing" name="hobbies[]"><label>Dancing</label>
			<br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
	