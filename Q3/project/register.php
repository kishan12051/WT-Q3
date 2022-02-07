<?php
	error_reporting(0);
	include("connect.php");

	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$address = $_POST['address'];
	$photo = $_FILES['photo']['name'];
	$photoTmp_name = $_FILES['photo']['tmp_name'];
	$role = $_POST['role'];

	if (isset($_POST['submit'])) {
	if($password == $cpassword){
		$fileDes = 'uploads/'.$photo;
		move_uploaded_file($photoTmp_name, $fileDes);

		$insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password, address, photo, role, status, votes) VALUES ('$name', '$mobile', '$password', '$address', '$photo', '$role', 0, 0)");

		if ($insert) {
			echo "<script>
				  	alert('Registration Successful!');
			  	  </script>";
		}
		else{
			echo "<script>
					alert('Registration Unsuccessful!');
			      </script>";
		}
	}
	else{
		echo "<script>
				alert('Passwords not matching!');
			  </script>";
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Online Voting System | Register</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  </head>
  <body>
    <div class="header"><h1>Online Voting System</h1></div>
    <div class="main-block">
      <h1>Registration</h1>
      <form method="POST" action="register.php" enctype="multipart/form-data">
        <hr>
        <label id="icon" for="name"><i class="fas fa-user"></i></label>
        <input type="text" name="name" id="name" placeholder="Name" required/>
        <label id="icon" for="mobile"><i class="fas fa-phone"></i></label>
        <input type="number" name="mobile" id="mobile" placeholder="Mobile Number" required/>
        <label id="icon" for="password"><i class="fas fa-unlock-alt"></i></label>
        <input type="password" name="password" id="password" placeholder="Password" required/>
        <label id="icon" for="cpassword"><i class="fas fa-unlock-alt"></i></label>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required/>
        <label id="icon" for="address"><i class="fas fa-globe"></i></label>
        <input type="text" name="address" id="address" placeholder="Address" required/><br>
        <h4>Upload Photo:</h4><input type="file" name="photo">
        <hr>
        <div class="account-type">
          <input type="radio" value= 1 id="radioOne" name="role" checked/>
          <label for="radioOne" class="radio">Voter</label>
          <input type="radio" value= 2 id="radioTwo" name="role" />
          <label for="radioTwo" class="radio">Candidate</label>
        </div>
        <hr>
        <div class="btn-block">
          <p>Already registered?<a href="index.php">Login Here</a>.</p>
          <button type="submit" name="submit" href="register.php">Submit</button>
        </div>
      </form>
    </div>
  </body>
</html>