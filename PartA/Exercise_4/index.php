<!-- 4. Simple Calculator -->

<html>
<head>
	<title>Simple Calculator</title>
</head>
<body>
	<h2>PHP Calculator</h2>
	
	<form method="post">
		<input type="text" name="num1"  title="Please enter a valid number!"
		placeholder="Enter the first number" required>
		
		<select name="operation" required>
			<option value="add">+</option>
			<option value="sub">-</option>
			<option value="mul">*</option>
			<option value="div">/</option>
		</select>
		
		<input type="text" name="num2"  title="Please enter a valid number!"
		placeholder="Enter the first number" required>
		
		<input type="Submit" value="Calculate">
	</form>
	
	<?php
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$num1 = $_POST["num1"];
			$num2 = $_POST["num2"];
			$op = $_POST["operation"];
			
			if(!is_numeric($num1) || !is_numeric($num2))
				echo "Please enter a valid number!";
			else{
				switch($op){
					case "add":
						$result = $num1 + $num2;
						break;
					case "sub":
						$result = $num1 - $num2;
						break;
					case "mul":
						$result = $num1 * $num2;
						break;
					case "div":
						if($num2 == 0)
							echo "Error, division by zero is not allowed.";
						else
							$result = $num1 / $num2;
						break;
					default:
						echo "Invalid operation selected";
						break;
				}
				
				if(isset($result))
					echo "Result : $result";
			}
		}
	?>
</body>
</html>