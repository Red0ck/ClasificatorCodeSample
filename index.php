<!DOCTYPE html>
<html>

<head>
	<title>Performance Media - Zadanie rekrutacyjne</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<?php
	if (!isset($_POST['set_size'])) { ?>
		<div class="col-12 row">
			<div class="col-4"></div>
			<div class="col-4">
				<p class="text-center">
					Please enter the <b>size</b> of the set.<br>
					The set should not be smaller than <b>5</b> and larger than <b>1000</b>.<br>
					After specifying the size of the set, two sets A and B will be generated.<br>
					<br>
					<b>INFO</b><br>
					Set A will consist of random numbers in the range from <b>0</b> to <b>80</b> taken from the external API
					<a href="http://www.randomnumberapi.com/">Random Number API</a>,
					and Set B will consist of text strings of uppercase and lowercase letters and numbers, <b>2</b> to <b>100</b> in length..
				</p>
				<br>
				<br>
				<form method="post" class="form-group row">
					<label for="set_size" class="col-sm-2 col-form-label">Set Size:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="set_size" name="set_size" min="5" max="1000" value="5">
					</div>
					<br><br>
					<div class="d-flex flex-row-reverse">
						<input type="submit" class="btn btn-primary" value="Send">
					</div>
				</form>
			</div>
		</div>
	<?php
	} else {
		require_once('./NumberGenerator.php');
		require_once('./StringGenerator.php');

		$number_generator = new NumberGenerator(5, 80);
		$string_generator = new StringGenerator(2, 100);

		$generated_numbers = $number_generator->generate($_POST['set_size']);
		$generated_strings = $string_generator->generate($_POST['set_size']);
		var_dump($generated_numbers);
		echo '<br>';
		var_dump($generated_strings);
	}
	?>

</body>

</html>