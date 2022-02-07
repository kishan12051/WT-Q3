<?php
error_reporting(0);
include('connect.php');

if (isset($_POST['destroy'])) {

	$boom = mysqli_query($connect, "TRUNCATE TABLE user");

	if ($boom) {
		echo "<script>
				alert('Data destroyed!');
		  	  </script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>RED ALERT</title>
</head>
<body style="text-align: center;">
	<h1 style="color: red;">!!!Red Alert!!!</h1><br><br>
	<h3>This button will delete everything from the database!!!</h3><br><br>
	<form method="POST">
	<button type="submit" style="background-color: red; padding: 30px; font-size: 14px; font-weight: 600; color: white;" name="destroy">Destroy!</button><br><br>
	</form>
</body>
</html>