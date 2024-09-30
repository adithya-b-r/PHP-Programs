<!-- 3. Feet & Inches Distance Caclulator -->

<html>
<head>
		<title>Distance Caclulator</title>
</head>
<body>
		<h3>Distance Caclulator</h3>
		<form method="post">
			<h4>Distance 1</h4>
			Feet : <input type="number" name="df1" required> <br><br>
			Inches : <input type="number" name="di1" required>
			
			<br><br>
			
			<h4>Distance 2</h4>
			Feet : <input type="number" name="df2" required> <br><br>
			Inches : <input type="number" name="di2" required>
			<br><br>
			<input type="submit" value="Calculate" required>
		</form>
		
		<?php 
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$feet1 = $_POST["df1"];
				$inches1 = $_POST["di1"];
				$feet2 = $_POST["df2"];
				$inches2 = $_POST["di2"];
				
				class DistanceCalculator{
					public static function add($f1, $in1, $f2, $in2){
							$total_inches = ($f1*12+$in1) + ($f2*12+$in2);
							$feet = floor($total_inches / 12);
							$inches = $total_inches % 12;
							
							return ["feet"=>$feet, "inches"=>$inches];
					}
					
					public static function subtract($f1, $in1, $f2, $in2){
							$ti1 = $f1*12+$in1;
							$ti2 = $f2*12+$in2;
							
							$diff = abs($ti1 - $ti2);
							$feet = floor($diff / 12);
							$inches =	$diff % 12;
							return ["feet"=>$feet, "inches"=>$inches];
					}
				}
				
				$sum = DistanceCalculator::add($feet1, $inches1, $feet2, $inches2);
				$difference = DistanceCalculator::subtract($feet1, $inches1, $feet2, $inches2);
				
				echo "<h3>Results</h3>
							<p>Sum : ".$sum['feet']."'".$sum['inches']."'"."<br>
							Difference : ".$difference['feet']."'".$difference['inches']."</p>";
			}
		?>
</body>
</html>