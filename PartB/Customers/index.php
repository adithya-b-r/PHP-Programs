<!-- 6. Manage and store customer Information -->

<?php
	$conn = mysqli_connect("localhost","root","","adithyadb");
	
	if(!$conn){
		die ("Connection Failed : ".mysqli_connect_error());
	}
	
	function addCustomers($conn, $id, $name, $item, $mobile){
		$sql = "INSERT INTO customer(customer_id, customer_name, product, mobile)
						VALUES($id, '$name', '$item', '$mobile')";
						
		if(mysqli_query($conn, $sql))
			echo "Customer Information Added Successfully";
		else
			echo "Error". mysqli_error($conn);
	}
	
	function deleteCustomer($conn, $id){
		
		$sql = "DELETE FROM CUSTOMER WHERE customer_id = '$id'";
		
		if(mysqli_query($conn, $sql)){
			echo "Customer Record Deleted Successfully";
		}
		else{
			echo "Error Deleting the record!";
		}
	}
	
	function searchCustomer($conn, $id){
		$sql = "SELECT * FROM CUSTOMER WHERE customer_id = '$id'";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo "Customer ID : " . $row["customer_id"].", ";
				echo "Customer Name : " . $row["customer_name"].", ";
				echo "Item Purchased : " . $row["product"].", ";
				echo "Mobile Number : " . $row["mobile"]."<br>";
			}
		}else
			echo "No Matching Record Found!";	
	}
	
	function sortById($conn){
		$sql = "SELECT * FROM CUSTOMER order by customer_id";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo "Customer ID : " . $row["customer_id"].", ";
				echo "Customer Name : " . $row["customer_name"].", ";
				echo "Item Purchased : " . $row["product"].", ";
				echo "Mobile Number : " . $row["mobile"]."<br>";
			}
		}else
			echo "No Records Found!";	
	}
	
	function displayAll($conn){
		$sql = "SELECT * FROM CUSTOMER WHERE 1";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo "Customer ID : " . $row["customer_id"].", ";
				echo "Customer Name : " . $row["customer_name"].", ";
				echo "Item Purchased : " . $row["product"]."<br>";
				echo "Mobile Number : " . $row["mobile"]."<br>";
			}
		}else
			echo "No Records Found!";	
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['addRecord']))
			addCustomers($conn, $_POST['cust_id'], $_POST['cust_name'], $_POST['product'], $_POST['mobile']);
		else if(isset($_POST['deleteRecord']))
			deleteCustomer($conn, $_POST['cust_id']);
		else if(isset($_POST['searchRecord']))
			searchCustomer($conn, $_POST['cust_id']);
	}
?>

<html>
<head><title>Customer Information</title></head>
<body>
	<h2>Customer Information</h2>
	
	<button onclick="document.getElementById('addCust').style.display='block'">Add Record</button>
	<form method="post" id="addCust" style="display:none">
		<h2>Add Customer Information</h2>
		<br>
		Customer ID : <input type="text" name="cust_id" required>
		Customer Name : <input type="text" name="cust_name" required>
		Product : <input type="text" name="product" required>
		Mobile : <input type="text" pattern="[0-9]{10}" name="mobile" title="Enter 10 digit phone number" required>
		
		<input type="submit" name="addRecord" value="Add Record">
	</form>
	
	<button onclick="document.getElementById('delCust').style.display='block'">Delete Record</button>
	<form method="post" id="delCust" style="display:none">
		<h2>Delete Customer Information</h2>
		<br>
		Customer ID : <input type="text" name="cust_id" required>
		<input type="submit" name="deleteRecord" value="Delete Record">
	</form>
	
	<button onclick="document.getElementById('searchCust').style.display='block'">Search Record</button>
	<form method="post" id="searchCust" style="display:none">
		<h2>Search Customer Information</h2>
		<br>
		Customer ID : <input type="text" name="cust_id" required>
		<input type="submit" name="searchRecord" value="Search Record">
	</form>
	
	<button onclick="document.getElementById('sortRec').style.display='block'">Sort Records</button>
	<div id="sortRec" style="display:none">
		<h2>Sorted Customer Records</h2>
		<?php sortById($conn);?>
	</div>
	
	
	<button onclick="document.getElementById('disRec').style.display='block'">Display Records</button>
	<div id="disRec" style="display:none">
		<h2>Sorted Customer Records</h2>
		<?php displayAll($conn);?>
	</div>
</body>
</html>