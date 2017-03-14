<?php require_once("../includes/initialize.php") ?>
<?php if($session->isLoggedIn()){redirectTo('index.php');}?>

<?php 
	if(isset($_POST["submit"])){
		$userName = trim($_POST['username']);
		$password = trim($_POST['password']);
		$password = md5($password);

		$foundUser = user::authenticate($userName,$password);

		if($foundUser){
			$session->login($foundUser);
			redirectTo("userprofile.php");
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
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Noakhali Science And Technology University </h1>
	<h2>Online Registration System</h2>
	<h3  style="text-align:center">Candidate log In</h3>
	<hr>

	<form action="login.php" method="POST">
		<?php echo outputMessage($message); ?>
		<input type="text" name="username" maxlength="30">
		<input type="password" name="password" maxlength="30">
		<input type="submit" name="submit" value="login">
	</form>
</body>
</html>
<?php if(isset($database)){$database->closeConnection();} ?>