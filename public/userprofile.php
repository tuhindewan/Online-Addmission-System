<?php require_once("../includes/initialize.php") ?>
<?php if(!$session->isLoggedIn()){redirectTo('index.php');}?>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php 
$user = new user();
$loggedinuser = $user::findById($session->userId);
$name = $loggedinuser->fullname;
$regNumber = $loggedinuser->registrnum;
?>
<body>
	<h2>Welcome : <span><?php echo $name; ?></span></h2>
	<h2>Your Registration Number is: <span><?php echo $regNumber; ?></span></h2>
	<hr>
	<p><a href="index.php">< Back <</a></p>
	<nav>
		<ul>
			<li><a href="admit.php">Admit</a></li>
			<li><a href="result.php">Result</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>
</body>
</html>