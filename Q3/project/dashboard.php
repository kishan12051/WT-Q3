<?php
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['userdata'])){
		header("location: ../");	
	}

	$userdata = $_SESSION['userdata'];
	$candidatedata = $_SESSION['candidatedata'];

	if ($_SESSION['userdata']['status']==0) {
		$status = '<b style="color:red;">Not Voted</b>';
	}
	else{
		$status = '<b style="color:green;">Voted</b>';
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Online Voting System | Dashboard</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
  <div class="header">
  	<a href="index.php"><button id="back">Back</button></a>
  	<a href="logout.php"><button id="logout">Logout</button></a>
  	<h1>Online Voting System</h1>
  </div>
  <hr>
  <div class="profile">
  	<img src="uploads/<?php echo $userdata['photo'] ?>" height ="150" width="150"><br><br> 
  	<b>Name: </b><?php echo $userdata['name'] ?><br><br>
  	<b>Mobile: </b><?php echo $userdata['mobile'] ?><br><br>
  	<b>Address: </b><?php echo $userdata['address'] ?><br><br>
  	<b>Status: </b><?php echo $status ?><br><br>
  </div>
  <div class="candidate">
  	<?php
  		if ($_SESSION['candidatedata']) {
  			for ($i=0; $i < count($candidatedata); $i++) { 
  				?>
  				<div>
  					<img style="float: right;" src="uploads/<?php echo $candidatedata[$i]['photo'] ?>" height ="150" width="150"><br><br>
  					<b>Name: </b><?php echo $candidatedata[$i]['name'] ?><br><br>
  					<b>Votes: </b><?php echo $candidatedata[$i]['votes'] ?><br><br>
  					<form method="POST" action="vote.php">
  						<input type="hidden" name="cvotes" value="<?php echo $candidatedata[$i]['votes'] ?>">
  						<input type="hidden" name="cid" value="<?php echo $candidatedata[$i]['id'] ?>">
  						<?php
  							if ($_SESSION['userdata']['status']==0) {
  								?>
  								<button style="margin-left: 0px;" type="submit" name="votebtn" value="Vote">Vote</button>
  								<?php
  							}
  							else{
  								?>
  								<button disabled style="margin-left: 0px;" name="votebtn" value="Vote">Voted</button>
  								<?php
  							}
  						?>
  					</form>
  					<hr>
  				</div>
  				<?php
  			}
  		}
  	?>
  </div>
</body>
</html>