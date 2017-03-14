<?php
	$addTable = "CREATE TABLE IF NOT EXISTS `users` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`fullname` varchar(100) NOT NULL,
		`username` varchar(50) NOT NULL,
		`password` varchar(100) NOT NULL,
		`sscgroup` varchar(30) NOT NULL,
		`sscresult` varchar(30) NOT NULL,
		`hscgroup` varchar(30) NOT NULL,
		`hscresult` varchar(30) NOT NULL,
		`email` varchar(30) NOT NULL,
		`phone` varchar(30) NOT NULL,
		`registerdate` varchar(30) NOT NULL,
		`registrnum` varchar(30) NOT NULL,
		`imgpath` varchar(200) NOT NULL,
		PRIMARY KEY(id)
		)";
	if(mysql_query($addTable)or die(mysql_error())){
		echo "";}else{die('Sorry');}
?>
<?php
	$addTable = "CREATE TABLE IF NOT EXISTS `admin` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`name` varchar(100) NOT NULL,
		`password` varchar(100) NOT NULL,
		PRIMARY KEY(id)
		)";
	if(mysql_query($addTable)or die(mysql_error())){
		echo "";}else{die('Sorry');}
?>
<?php
	$addTable = "CREATE TABLE IF NOT EXISTS `result` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`rullnumber` varchar(100) NOT NULL,
		`passorfail` varchar(100) NOT NULL,
		`result` varchar(100) NOT NULL,
		`position` varchar(100) NOT NULL,
		`subject` varchar(100) NOT NULL,
		PRIMARY KEY(id)
		)";
	if(mysql_query($addTable)or die(mysql_error())){
		echo "";}else{die('Sorry');}
?>