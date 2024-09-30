<!-- 8. Hotel Reservation -->

<?php
	$conn = mysqli_connect("localhost","root","","adithyadb");
	
	if(!$conn){
		die ("Connection Failed : ".mysqli_connect_error());
	}
	
	//Function to add records
	function addRecord($room_number, $room_type, $capacity, $status){
		global $conn;
		
		$sql = "INSERT INTO ROOM(room_number, room_type, capacity, status)
						VALUES('$room_number', '$room_type', '$capacity', '$status')";
						
		if(mysqli_query($conn, $sql))
			echo "Record Added Successfully";
		else
			echo "Error";
	}
	
	//Function to listAvailable
	function listAvailable(){
		global $conn;
		
		$sql = "SELECT * FROM room WHERE status='available'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			echo "<h3>Available Room : </h3>";
			while($row = mysqli_fetch_assoc($result)){
				echo "Room Number ".$row["room_number"].", ";
				echo "Room Type ".$row["room_type"].", ";
				echo "Capacity ".$row["capacity"]."<br>";
			}
		}
		else{
			echo "No Rooms Available";
		}
	}
	
	//Function to listBooked
	function listBooked(){
		global $conn;
		
		$sql = "SELECT * FROM room WHERE status='booked'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			echo "<h3>Booked Room : </h3>";
			while($row = mysqli_fetch_assoc($result)){
				echo "Room Number ".$row["room_number"].", ";
				echo "Room Type ".$row["room_type"].", ";
				echo "Capacity ".$row["capacity"]."<br>";
			}
		}
		else{
			echo "No Rooms Available";
		}
	}
	
	//Function for Check In
	function checkIn($room_number){
		global $conn;
		
		$sql = "UPDATE room set status='booked' WHERE room_number='$room_number'";
		
		if(mysqli_query($conn, $sql)){
			echo "Check-in Successfull for Room Number : $room_number <br>";
		}
		else{
			echo "No Rooms Available";
		}
	}
	
	//Function for Check Out
	function checkOut($room_number){
		global $conn;
		
		$sql = "UPDATE room set status='available' WHERE room_number='$room_number'";

		if(mysqli_query($conn, $sql)){
			echo "Check-out Successfull for Room Number : $room_number <br>";
		}
		else{
			echo "No Rooms Available";
		}
	}
	
	//Main Logic
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST["add_record"])){
			addRecord($_POST["room_number"], $_POST["room_type"], $_POST["capacity"], $_POST["status"]);
		}
		if(isset($_POST["check_in"])){
			checkIn($_POST["room_number"]);
		}
		if(isset($_POST["check_out"])){
			checkOut($_POST["room_number"]);
		}
	}
?>

<html>
<head>
	<title>Hotel Reservation</title>
</head>
<body>
	<h2>Add Record</h2>
	<form method="post">
		Room Number : <input type="number" name="room_number" required>
		<br>
		Room Type : 
		<select name="room_type" required>
			<option value="single semi">Single Semi</option>
			<option value="single deluxe">Single Deluxe</option>
			<option value="Double semi">Double Semi</option>
			<option value="Double deluxe">Double Deluxe</option>
			<option value="dormitory">Dormitory</option>
		</select>
		<br><br>
		
		Capacity : <input type="number" name="capacity" required>
		<br>
		Status [Available/Booked] : <input type="text" name="status" required>
		<br>
		
		<input type="submit" name="add_record" value="Add Record">
		</form>
		
		<h2>Check In</h2>
		<form method="post">
			Room Number : <input type="number" name="room_number" required>
			<input type="submit" name="check_in" value="Check In">
		</form>
		
		<h2>Check Out</h2>
		<form method="post">
			Room Number : <input type="number" name="room_number" required>
			<input type="submit" name="check_out" value="Check Out">
		</form>
		
		<?php listAvailable(); ?>
		<?php listBooked(); ?>
		
		<?php mysqli_close($conn); ?>
</body>
</html>