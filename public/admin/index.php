<?php require_once("../../includes/initialize.php") ?>
<?php if(!$session->isAdminLoggedIn()){redirectTo('adminlogin.php');}?>
<html>
<head>
	<title>Online Registration System</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
	<h1>Noakhali Science And Technology University </h1>
	<h2>Online Registration System</h2>
	<hr>
<nav>
	<ul>
		<li><a href="viewcandidate.php">View Candidates</a></li>
		<li><a href="resultinput.php">Input Result </a></li>
		<li><a href="logout.php">Log Out</a></li>
	</ul>
</nav>
<?php 
?>
<body>

</body>
</html>