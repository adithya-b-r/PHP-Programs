<html>
<head>
    <title>Armstrong Number Checker</title>
</head>
<body>
    <h2>Armstrong Number Checker</h2>
	<form method="POST">
		<label>Enter a Number : </label>
		<input type="text" name="num" required>
		
		<input type="Submit" value="Check">
	</form>
	
	<?php
		function isArmstrong($num)
		{
			$originalNum = $num;
			$digits = strlen($num);
			$sum = 0;
			
			while($num !=0){
				$lastDigit = $num%10;
				$sum += pow($lastDigit, $digits);
				$num = $num/10;
			}
			
			if($originalNum == 0){
				
			}
			
			return $originalNum == $sum;
		}
		
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$inputNumber = $_POST["num"];
			
			if(is_numeric($inputNumber) && $inputNumber >= 0){
				echo "Results : ";
				echo "<br><br>";
				
				
				if(isArmstrong($inputNumber)){
					echo "$inputNumber is an Armstrong number";
					echo "<br>";
					
					echo "Armstrong number in the range from 1 to $inputNumber : ";
					
					for($i=1; $i<=$inputNumber; $i++)
						if(isArmstrong($i))
							echo "$i ";
				}
				else{
					echo "$inputNumber is not an Armstrong number";
				}
			}
			else{
				echo "Enter a positive integer!";
			}
		}
		?>
</body>
</html>