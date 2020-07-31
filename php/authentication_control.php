<?php
	session_start();
	$authenticated = false;

	if(isset($_SESSION['authenticated'])) {
		$authenticated = $_SESSION['authenticated'];
	}
?>