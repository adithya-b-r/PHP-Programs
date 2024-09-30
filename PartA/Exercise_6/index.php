<!-- 6. Associative Array Dictionary -->

<html>
<head>
	<title>Dictionary</title>
</head>
<body>
	<h2>Dictionary</h2>
	
	<form method="POST">
		<label>Enter a word : </label>
		<input type="text" name="word">
		<input type="submit" name="Search">
	</form>
	<br>
	
	<?php
		$dictionary = array(
		"lion"=>"Majestic carnivorus feline found in jungle.",
		"mango"=>"Sweet, juicy trophical fruit with a distinct flavour",
		"carrot"=>"Orange, crunchy root vegetable used in cooking.",
		"sparrow"=>"Small common songbird with brown and grey feathers.",
		"apple"=>"Round fruit with crisp flesh and various color.",
		"eagle"=>"Large, powerful bird of pray with sharp eyesight.",
		"tiger"=>"Large carnivorus cat with distinct striped coat",
		"cat"=>"Independent domestic feline with soft fur.",
		"kiwi"=>"Small fruit with green flesh and black seeds.",
		"hummingbird"=>"Tiny, colorful bird capable of hovering mid air."
		);
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$word = strtolower($_POST["word"]);
			
			if(array_key_exists($word, $dictionary)){
				$meaning = $dictionary[$word];
			}else{
				$meaning = "Word not found!";
			}
		}
		
		if(isset($meaning)){
			echo "Meaning : $meaning";
		}
	?>
</body>
</html>