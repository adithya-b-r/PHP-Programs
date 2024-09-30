<!-- 7. Book shopping form -->

<html>
<head>
<title>Book Shopping Form</title>
</head>
<body>
	<h2>Book Shopping Form</h2>
	<form method="post" action="order.php">
		<label>Book Number : </label>
		<input type="number" name="book_number" required>
		<br>
		<label>Book Title : </label>
		<input type="text" name="book_title" required>
		<br>
		<label>Price : </label>
		<input type="number" name="price" required>
		<br>
		<label>Quantity : </label>
		<input type="number" name="quantity" required>
		<br>
		<label>Book Code : </label>
		<select name="book_code">
			<option value="101">101</option>
			<option value="102">102</option>
			<option value="103">103</option>
			<option value="104">104</option>
		</select>
		<br>
		<br>
		<input type="submit">
	</form>
</body>
</html>