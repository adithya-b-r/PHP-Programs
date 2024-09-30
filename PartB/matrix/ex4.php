<html>

<head>
	<title>Matrix Operations</title>
</head>

<body>
	<h2>Matrix Operations</h2>
	<form method="post">
		<label>Matrix 1 Rows :</label>
		<input type="number" name="rows1" value="<?php echo $_POST['rows1'] ?? ''; ?>" required>

		<label>Columns :</label>
		<input type="number" name="cols1" value="<?php echo $_POST['cols1'] ?? ''; ?>" required>

		<br><br>

		<label>Matrix 2 Rows :</label>
		<input type="number" name="rows2" value="<?php echo $_POST['rows2'] ?? ''; ?>" required>

		<label>Columns :</label>
		<input type="number" name="cols2" value="<?php echo $_POST['cols2'] ?? ''; ?>" required>
		<br><br>

		<input type="submit">
	</form>


	<form method="post">
		<?php
		if (isset($_POST["rows1"]) && isset($_POST["cols1"])) {
			echo "<br>";
			echo "<p>Enter Matrix 1 : </p>";

			$rows1 = $_POST["rows1"];
			$cols1 = $_POST["cols1"];

			for ($i = 0; $i < $rows1; $i++) {
				for ($j = 0; $j < $cols1; $j++) {
					echo "<input type='number' name='matrix1[" . $i . "][" . $j . "]' required> ";
				}
				echo '<br>';
			}
		}


		if (isset($_POST["rows2"]) && isset($_POST["cols2"])) {
			echo "<br>";
			echo "<p>Enter Matrix 2 : </p>";

			$rows2 = $_POST["rows2"];
			$cols2 = $_POST["cols2"];

			for ($i = 0; $i < $rows2; $i++) {
				for ($j = 0; $j < $cols2; $j++) {
					echo "<input type='number' name='matrix2[" . $i . "][" . $j . "]' required> ";
				}
				echo '<br>';
			}

			echo '<br>';

			echo '
				<button type="submit" name="add">Add</button>
				<button type="submit" name="multiply">Multiply</button>';
		}
		?>
	</form>
	<br>



	<?php
	if (isset($_POST['add']) || isset($_POST['multiply'])) {
		$matrix1 = $_POST['matrix1'];
		$matrix2 = $_POST['matrix2'];
		$result = [];


		if (isset($_POST['add'])) {
			if (count($matrix1) != count($matrix2) || count($matrix1[0]) != count($matrix2[0])) {
				echo "Matrix Should have the same Dimension!";
			} else {
				echo "Result of Addition : <br>";

				for ($i = 0; $i < count($matrix1); $i++) {
					for ($j = 0; $j < count($matrix2); $j++) {
						$result[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
						echo $result[$i][$j] . " ";
					}
					echo "<br>";
				}
			}
		} else if (isset($_POST['multiply'])) {
			if (count($matrix1[0]) != count($matrix2)) {
				echo "Matrix Dimension does not match!";
			} else {
				echo "Result of Multiplication : <br>";

				for ($i = 0; $i < count($matrix1); $i++) {
					for ($j = 0; $j < count($matrix2[0]); $j++) {
						$result[$i][$j] = 0;

						for ($k = 0; $k < count($matrix1[0]); $k++) {
							$result[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
							echo $result[$i][$j] . " ";
						}

						echo "<br>";
					}

				}

			}
		}
	}
	?>
</body>

</html>