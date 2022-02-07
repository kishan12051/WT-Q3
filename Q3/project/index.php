<?php
	session_start();
	error_reporting(0);
	include("connect.php");

	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	$check = mysqli_query($connect, "SELECT * FROM user WHERE mobile = '$mobile' AND password ='$password' AND role ='$role'");

	if (isset($_POST['submit'])) {
		if(mysqli_num_rows($check) > 0){
			$userdata = mysqli_fetch_array($check);
			$candidate = mysqli_query($connect, "SELECT * FROM user WHERE role = 2");
			$candidatedata = mysqli_fetch_all($candidate, MYSQLI_ASSOC);

			$_SESSION['userdata'] = $userdata;
			$_SESSION['candidatedata'] = $candidatedata;

			echo "<script>
					window.location = 'dashboard.php';
			      </script>";
		}
		else{
			echo "<script>
					alert('Invalid Credentials!');
			      </script>";
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Online Voting System | Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  </head>
  <body>
    <div class="header"><h1>Online Voting System</h1></div>
    <div class="main-block">
      <h1>Login</h1>
      <form action="index.php" method="POST">
        <hr>
        <label id="icon" for="mobile"><i class="fas fa-phone"></i></label>
        <input type="number" name="mobile" id="mobile" placeholder="Mobile Number" required/>
        <label id="icon" for="password"><i class="fas fa-unlock-alt"></i></label>
        <input type="password" name="password" id="password" placeholder="Password" required/>
        <hr>
        <div class="account-type">
          <input type="radio" value= 1 id="radioOne" name="role" checked/>
          <label for="radioOne" class="radio">Voter</label>
          <input type="radio" value= 2 id="radioTwo" name="role" />
          <label for="radioTwo" class="radio">Candidate</label>
        </div>
        <hr>
        <div class="btn-block">
          <p>New User?<a href="register.php">Register Here</a>.</p>
          <button type="submit" name="submit" href="/">Submit</button>
        </div>
      </form>
    </div>
  </body>
</html>