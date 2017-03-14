<?php require_once("../../includes/initialize.php") ?>
<?php if(!$session->isAdminLoggedIn()){redirectTo('adminlogin.php');}?>
<html>
<head>
	<title>Online Registration System</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<?php
$users = user::findAll();
?>
<body>
	<nav>
	<ul>
		<li><a href="index.php">< Back <</a></li>
	</ul>
</nav>
<table class="bordered" border="1">
	<tr>
		<th>Image</th>
		<th>User Roll</th>
		<th>Full Name</th>
		<th>SSC Group</th>
		<th>SSC Result</th>
		<th>HSC group</th>
		<th>HSC Result</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Register Date</th>
	</tr>
	<?php foreach($users as $user): ?>
	<tr>
		<td><img src="<?php echo "../".$user->imgpath; ?>" alt="Profile Img" width="70"></td>
		<td><?php echo $user->registrnum; ?></td>
		<td><?php echo $user->fullname; ?></td>
		<td><?php echo $user->sscgroup; ?></td>
		<td><?php echo $user->sscresult; ?></td>
		<td><?php echo $user->hscgroup; ?></td>
		<td><?php echo $user->hscresult; ?></td>
		<td><?php echo $user->email; ?></td>
		<td><?php echo $user->phone; ?></td>
		<td><?php echo $user->registerdate; ?></td>
	</tr>
<?php endforeach; ?>
</table>
</body>
</html>