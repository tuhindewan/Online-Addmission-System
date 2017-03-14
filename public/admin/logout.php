<?php ob_start() ?>
<?php require_once("../../includes/initialize.php") ?>
<?php if(!$session->isAdminLoggedIn()){redirectTo('login.php');}?>

<?php
$logout = $session->adminLogout();
header('location: index.php');
?>

<?php if(isset($database)){$database->closeConnection();} ?>