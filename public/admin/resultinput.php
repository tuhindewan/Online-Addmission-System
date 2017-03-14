<?php require_once("../../includes/initialize.php") ?>
<?php if(!$session->isAdminLoggedIn()){redirectTo('adminlogin.php');}?>
<html>
<head>
	<title>Online Registration System</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/script.js"></script>
</head>
<?php
$result = new result();
if(isset($_POST['resultsubmit'])){
	if(isset($_POST['rollnumber']) && isset($_POST['passfail'])){
		if(!empty($_POST['rollnumber']) && !empty($_POST['passfail'])){
			if(strlen($_POST['rollnumber']) == 6){
				if(!$result->isResultExist($_POST['rollnumber'])){
					$resultInput = result::resultinput($_POST['rollnumber'],$_POST['passfail'],$_POST['result'],$_POST['position']);
					if($resultInput && $resultInput->save()){
						$message = "Success";
						redirectTo("resultinput.php");
					}else{$message =  "There was an error that prevented the Result from being saved";}
				}else{$message =  "This roll already got result";}
			}else{$message =  "Invalid Roll Number";}
		}else{$message =  "Roll Number And passed or failed is required";}
	}else{$message =  "Roll Number And passed or failed is required";}
}
?>
<body>
	<h1>Noakhali Science And Technology University </h1>
	<h2>Online Registration System</h2>
	<hr>
<nav>
	<ul>
		<li><a href="index.php">< Back <</a></li>
	</ul>
</nav>

<form action="resultinput.php" method="POST">
	<?php echo "<span class='error'>".outputMessage($message)."</span>"; ?>
	<input type="text" name="rollnumber" placeholder="Roll Number">
	<fieldset class="radio">
		Pass: <input class="pass" type="radio" name="passfail" value="pass">
	</fieldset>
	<fieldset class="radio">
		Fail: <input class="fail" type="radio" name="passfail" value="fail">
	</fieldset>
	<input class="ifpassed" type="text" name="result" placeholder="Result">
	<input class="ifpassed" type="text" name="position" placeholder="Position">
	<input type="submit" name="resultsubmit" value="submit">
</form>
</body>
</html>