<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$first_name = $_POST["fname"];
		$last_name = $_POST["lname"];
		$address = $_POST["address"];
		$email = $_POST["email"];
		$mobile = $_POST["mobile"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$gender = $_POST["gender"];
		$blood_group = $_POST["blood_group"];
		$hobbies = implode(", ", $_POST["hobbies"]);
		
		echo "<h1>Student Information</h1>";

		echo "First Name : $first_name<br>";
		echo "Last Name : $last_name<br>";
		echo "Address : $address<br>";
		echo "Email : $email<br>";
		echo "Mobile : $mobile<br>";
		echo "City : $city<br>";
		echo "State : $state<br>";
		echo "Gender : $gender<br>";
		echo "Blood Group : $blood_group<br>";
		echo "Hobbies : $hobbies";
	}else{
		echo "Error in parsing data!";
	}
?>