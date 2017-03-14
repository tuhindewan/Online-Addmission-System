<?php require_once("../includes/initialize.php") ?>
<?php
$user = new user();
if(!empty($_FILES['proimg']['name'])){$name = $_FILES['proimg']['name'];}
if(isset($_POST["registersubmit"])){
	if(isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['sscgroup']) && isset($_POST['sscresult']) && isset($_POST['hscgroup']) && isset($_POST['hscresult']) && isset($_POST['email']) && isset($_POST['phone'])){
		if(!empty($_POST['fullname']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['sscgroup']) && !empty($_POST['sscresult']) && !empty($_POST['hscgroup']) && !empty($_POST['hscresult']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($name)){
			if(!$user->isUserNameExist($_POST['username'])){

				$name = $_FILES['proimg']['name'];
				$extension = strtolower(substr($name, strpos($name, '.')+1));
				$tempname = $_FILES['proimg']['tmp_name']; 
				$size = $_FILES['proimg']['size'];
				$maxsize =   300000;
				$type = $_FILES['proimg']['type'];
				$imgpath = "uploads/".$name;

				$md5pass = md5($_POST['password']);
				$newuser = user::register($_POST['fullname'],$_POST['username'],$md5pass,$_POST['sscgroup'],$_POST['sscresult'],$_POST['hscgroup'],$_POST['hscresult'],$_POST['email'],$_POST['phone'],$imgpath);
				if($newuser && $newuser->save()){
					if(($extension=='jpg' || $extension=='jpeg') && $type=='image/jpeg' && $size<$maxsize){
						if(move_uploaded_file($tempname, 'uploads/'.$name)){
							redirectTo("index.php?msg=Registration Successfull");
						}
						else{
							$error = 'There was an Error';
						}
					}else{
						$error = 'ERROR : File must be an imaje (jpg) and must be 2mb or less';
					}
				}else{$error = "There was an error that prevented the User from being saved";}
			}else{$error = "User Name already Exists";}
		}else{$error =  "All Field Required.";}
	}else{$error = "All Field Required..";}
}
?>


<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Noakhali Science And Technology University </h1>
	<h2>Online Registration System</h2>
	<h3  style="text-align:center; margin-top:20px">Candidate Registration</h3>
	<hr>
	<?php if(!empty($error)){echo $error;} ?>
	<form action="register.php" method="POST" enctype="multipart/form-data">
		<fieldset>
			<legend>General Information</legend>
			<input type="text" name="fullname" placeholder="Full name">
			<input type="text" name="username" placeholder="User Name">
			<input type="password" name="password" placeholder="Password">
		</fieldset>
		<fieldset>
			<legend>Result</legend>
			<input type="text" name="sscgroup" placeholder="SSC Group">
			<input type="text" name="sscresult" placeholder="SSC Result">
			<input type="text" name="hscgroup" placeholder="HSC Group">
			<input type="text" name="hscresult" placeholder="HSC Result">
		</fieldset>
		<fieldset>
			<legend>Contact Information</legend>
			<input type="text" name="email" placeholder="Email">
			<input type="text" name="phone" placeholder="Phone">
		</fieldset>
		<input type="file" name="proimg">
		<input type="submit" value="submit" name="registersubmit">
	</form>
</body>
</html>