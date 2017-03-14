<?php require_once("../includes/initialize.php") ?>
<?php require_once("../includes/createtable.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Registration System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Noakhali Science And Technology University </h1>
	<h2>Online Registration System</h2>
	<hr>
	<?php
		if(!empty($_GET['msg'])){
	 		echo "<span>".$_GET['msg']."</span>";
	 	}
	 ?>
	<nav>
		<ul>
			<?php
				if($session->isLoggedIn()){
					echo "<li><a href='userprofile.php'>Profile</a></li>";
					echo "<li><a href='logout.php'>Log Out</a></li>";
				}
				if(!$session->isLoggedIn()){
					echo "<li><a href='login.php'>Log In</a></li>";
					echo "<li><a href='register.php'>Register</a></li>";
				}
			?>
		</ul>	
	</nav>
</body>
</html>