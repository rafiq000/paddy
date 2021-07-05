<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Costomer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<div class="center">
			<a href="index.php" class="button">Home</a>
			<form action="insert.php" method="post">
				Name:						<input type="text" name="fname"  placeholder="Enter A Name!">
				Paddy Name:					<input type="text" name="pname"  placeholder="Enetre Paddy name here!">
				Paddy Price per KG:			<input type="number" name="price" placeholder="Enter Price">
				Paddy Total Wight In KG:	<input type="number" name="wight" placeholder="Enter Total Wight">
											<br>
											<br>
				<input type="submit" name="submit" value="Submit" class="button">
				<input type="reset" class="button">
			</form>
			
		</div>
		
</body>
</html>