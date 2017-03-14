<?php require_once("../../includes/initialize.php") ?>
<?php if($session->isAdminLoggedIn()){redirectTo('index.php');}?>

<?php 
	if(isset($_POST["submit"])){
		$userName = trim($_POST['username']);
		$password = trim($_POST['password']);

		$foundUser = admin::authenticate($userName,$password);

		if($foundUser){
			$session->adminlogin($foundUser);
			redirectTo("index.php");

		}else{
			$message = "Username/Password combination incorrect.";
		}
	}else{
		$userName = "";
		$password = "";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Registration System</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<h1>Noakhali Science And Technology University </h1>
	<h2>Online Registration System</h2>
	<h2 style="text-align:center">Administrator</h2>
	<hr>
	

	<form action="adminlogin.php" method="POST">
		<?php echo outputMessage($message); ?>
		<input type="text" name="username" maxlength="30" placeholder="User Name">
		<input type="password" name="password" maxlength="30" placeholder="Password">
		<input type="submit" name="submit" value="login">
	</form>
</body>
</html>
<?php if(isset($database)){$database->closeConnection();} ?>