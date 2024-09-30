<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bookstore";

	$conn = mysqli_connect($server, $username, $password, $dbname);
	
	if(!$conn)
		die("Connection Failed!");

	$book_number = $_POST["book_number"];
	$book_title = $_POST["book_title"];
	$price = $_POST["price"];
	$quantity = $_POST["quantity"];
	$book_code = $_POST["book_code"];
	
	if($book_code == '101') 
		$discount_rate = 0.15;
	else if($book_code == '102') 
		$discount_rate = 0.2;
	else if($book_code == '103') 
		$discount_rate = 0.25;
	else
		$discount_rate = 0.05;
	
	$discount_amt = $price * $quantity * $discount_rate;
	$net_bill_amt = ($price * $quantity) - $discount_amt;
	
	$sql = "INSERT INTO orders(book_number, book_title, price,
	quantity, book_code, discount_rate, discount_amt, net_bill_amt)
	VALUES ($book_number,'$book_title','$price',$quantity,$book_code,
	$discount_rate,'$discount_amt',$net_bill_amt)";
	
	if(mysqli_query($conn, $sql)){
		echo "<h2>Order Placed Successfully</h2>";
		echo "<br>Discount Amount : ".$discount_amt;
		echo "<br>Net Bill Amount : ".$net_bill_amt;
	}else{
		echo "Error";
	}
	
	$sql = "SELECT * FROM orders ORDER BY order_date desc";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result)>0){
		echo "<h2>Order History</h2>";
		
		echo "<table border='1'>";
		echo "<tr>";
		echo "<th>Book Number</th>";
		echo "<th>Book Title</th>";
		echo "<th>Price</th>";
		echo "<th>Quantity</th>";
		echo "<th>Discount Amount</th>";
		echo "<th>Net Bill Amount</th>";
		echo "<th>Order Date</th>";
		echo "</tr>";
		
		while($row=mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row['book_number']."</td>";
			echo "<td>".$row['book_title']."</td>";
			echo "<td>".$row['price']."</td>";
			echo "<td>".$row['quantity']."</td>";
			echo "<td>".$row['discount_amt']."</td>";
			echo "<td>".$row['net_bill_amt']."</td>";
			echo "<td>".$row['order_date']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}else{
		echo "No orders found";
	}
	mysqli_close($conn);
?>