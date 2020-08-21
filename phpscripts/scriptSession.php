<?php

session_start();

$authenticated = false;
if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
	$authenticated = $_SESSION['authenticated'];
}

if(isset($_GET['action']) && $_GET['action'] == 'end') {
	session_destroy();
	header('Location: ../index.php');
}

?>