<?php require_once("../includes/initialize.php") ?>
<?php if(!$session->isLoggedIn()){redirectTo('index.php');}?>
<html>
<head>
	<title>O. R. S.</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<h1>Noakhali Science And Technology University </h1>
	<h2>Online Registration System</h2>
	<hr>
	<p><a href="userprofile.php"> < Back < </a></p>

	<?php
		$currentuser = user::findById($session->userId);
		$currentUserRegNum = $currentuser->registrnum;
		$userresult = result::findByRegNum($currentUserRegNum);
		$passorfail = @$userresult->passorfail;
		
		if(empty($passorfail)){
			echo "<span class='error'>Wait Untill Result Has been published</span>";
		}elseif($passorfail == "pass"){
			echo "<table>";
			echo "<tr><td>You are Passed. </tr></td>";
			echo "<tr><td>Your Result is ".$userresult->result.".</tr></td>";
			echo "<tr><td>Your Position is ".$userresult->position.".</tr></td>";
			echo "<tr><td>Subject Alotted For You  is: ".$userresult->subject.".</tr></td>";
			echo "<table>";
		}elseif($passorfail == "fail"){
			echo "<span class='error'>You are failed. Try Next tyme</span>";
		}else{
			echo "<span class='error'>Error Occured When Getting result</span>";
		}
	?>
</body>
</html>