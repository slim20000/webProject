<?php
Session_start();
$_SESSION['sess_name']="";
Session_destroy();
header('Location: login.php');
?>