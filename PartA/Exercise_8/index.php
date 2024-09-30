<!-- 8. Word Frequency Analyzer -->

<html>
<head>
	<title>Word Frequency Analyzer</title>
</head>
<body>
	<h2>Word Frequency Analyzer</h2>
	<form method="POST">
		<label>Enter a String : </label>
		<input type="text" name="str" value="<?php echo $_POST['str'] ?? '';?>" required>
		<input type="Submit" value="Analyze">
			<br><br>
	
	
	<?php
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$str = strtolower($_POST['str']);
			$words = str_word_count($str, 1);
			$word_count = array_count_values($words);
			
			$mc = max($word_count);
			$lc = min($word_count);
			
			$mostUsedWords = array_keys($word_count, $mc);
			$leastUsedWords = array_keys($word_count, $lc);
			
			if(isset($_POST['asc']))
				asort($word_count);
			elseif(isset($_POST['dsc']))
				arsort($word_count);
			
			echo "<h3>Word Frequencies : </h3>";
			foreach($word_count as $word => $count)
				echo "$word : $count times <br>";
				
			echo "<br>";
			
			echo "<b>The most used word is : </b>";
			foreach($mostUsedWords as $word)
				echo "$word  (used $mc times) ";
				
			echo "<br>";
			
			echo "<b>The least used word is : </b>";
			foreach($leastUsedWords as $word)
				echo "$word  (used $lc times) ";
				
			echo "<br> <br>";
		}
	?>
		<input type="Submit" name="asc" value="Sort Ascending">
		<input type="Submit" name="dsc" value="Sort Descending">
	</form>
</body>
</html>