<!-- 7. String Manipulation Using Submit Button -->

<html>
<head>
	<title>String Manipulation Using Submit Button</title>
</head>
<body>
	<h2>String Manipulation Using Submit Button</h2>
	
	<form method="POST">
		<label>Enter a String : </label>
		
		<input type="text" name="str" required>
		
		<br><br>
		
		<input type="Submit" name="getlen" value="Get Length">
		<input type="Submit" name="rev" value="Reverse">
		<input type="Submit" name="upcase" value="Uppercase">
		<input type="Submit" name="lowcase" value="Lowercase">
		<input type="Submit" name="rep" value="Replace">
		<input type="Submit" name="palind" value="Check Palindrome">
		<input type="Submit" name="shuffle" value="Shuffle">
		<input type="Submit" name="wcount" value="Word Count">
	</form>
	
	<?php
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$str =  $_POST["str"];
			
			if(isset($_POST["getlen"])){
				echo "Length of string : ".strlen($str);
			}
			else if(isset($_POST["rev"])){
				echo "Reversed string : ".strrev($str);
			}
			else if(isset($_POST["upcase"])){
				echo "String in Uppercase : ".strtoupper($str);
			}
			else if(isset($_POST["lowcase"])){
				echo "String in Lowercase : ".strtolower($str);
			}
			else if(isset($_POST["rep"])){
				echo "String replace : ".str_replace("a","x",$str);
			}
			else if(isset($_POST["palind"])){
				if(strrev($str) == $str)
					echo "String is Palindrome";
				else
					echo "String is not Palindrome";
			}
			else if(isset($_POST["shuffle"])){
				echo "Shuffled String : ". str_shuffle($str);
			}
			else if(isset($_POST["wcount"])){
				echo "String word count : ".str_word_count($str);
			}
				
		}
	?>
</body>