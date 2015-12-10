<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Robo Villians</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<div class="container">

	<?php
	// include(), include_once(), require(), require_once()
	require_once 'header.inc.php';
	?>

	<section>

		<h2>Add Robot</h2>
		
		<form method="post" action="add_process.php">
			<p>
				Robot Name: 
				<input type="text" name="name" placeholder="Name of Robot">
			</p>    

			<p>
				Robot Cost: 
				<input type="text" name="cost" placeholder="500000">
			</p>    

			<p>
				Robot Description: <br>
				<textarea name="description" rows="5" cols="60" placeholder="Description goes here"></textarea>
			</p>    

			<p>
				<input type="submit" value="Add Robot">
			</p>	
		</form>

    </section>
    

	<?php
	require_once 'footer.inc.php';
	?>

</div>

</body>
</html>
