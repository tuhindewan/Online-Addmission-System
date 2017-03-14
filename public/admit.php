<?php require_once("../includes/initialize.php") ?>
<?php //if(!$session->isLoggedIn()){redirectTo('index.php');}?>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php 
$user = new user();
$loggedinuser = $user::findById($session->userId);

$regNumber = $loggedinuser->registrnum;
$fullname = $loggedinuser->fullname;
$sscgroup = $loggedinuser->sscgroup;
$sscresult = $loggedinuser->sscresult;
$hscgroup = $loggedinuser->hscgroup;
$hscresult = $loggedinuser->hscresult;
$userimg = $loggedinuser->imgpath;
?>
<body>
	<h1>Noakhali Science And Technology University </h1>
	<h2>Online Registration System</h2>
	<h3  style="text-align:center">Welcome <?php echo $fullname; ?></h3>
	<hr>
	<nav>
		<ul>
			<li><a href="userprofile.php"><p> < Back < </p></a></li>
		</ul>
	</nav>
	<table class="admittable">
		<th colspan="2">Your Admit Card</th>
		<tr class="imgcontainer">
			<td><img src="<?php echo $userimg; ?>"></td>
			<td><p>Roll Number : <?php echo $regNumber; ?></p></td>
		</tr>
		<tr>
			<td>Full Name : </td>
			<td><?php echo $fullname; ?></td>
		</tr>
		<tr>
			<td>SSC Group : </td>
			<td><?php echo $sscgroup; ?></p></td>
		</tr>
		<tr>
			<td>SSC Result : </td>
			<td><?php echo $sscresult; ?></p></td>
		</tr>
		<tr>
			<td>HSC Group : </td>
			<td><?php echo $hscgroup; ?></td>
		</tr><tr>
			<td>HSC Result : </td>
			<td><?php echo $hscresult; ?></td>
		</tr>
	</table>
</body>
</html>