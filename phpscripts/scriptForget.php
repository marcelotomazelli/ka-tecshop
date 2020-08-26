<?php

session_start();

require_once './classConnection.php';
require_once './classKAControl.php';

$_kacontrol = new Connection();
$_kacontrol = new KAControl($_kacontrol);

if($_GET['t'] == 'email') {
	
	$query = '
		SELECT email
		FROM usuarios
		WHERE email = ?
	';

	$values = [$_POST['email']];
	

	$result = $_kacontrol->read($query, $values, 'one');

	if(!empty($result)) {
		$_SESSION = [
			'verified_email' => true,
			'email' => $_POST['email'],
			'code' => '111111',
			'attempts' => false
		];
		header('Location: ../forget_page.php');
	} else {
		header('Location: ../forget_page.php?e=email&email=' . $_POST['email']);
	}

} else if($_GET['t'] == 'code' && $_SESSION['verified_email']) {
	
	if(!$_SESSION['attempts']) {
		if($_POST['code'] == $_SESSION['code']) {
			$_SESSION['verified_code'] = true;
			header('Location: ../forget_page.php');
		} else {
			$_SESSION['attempts'] = true;
			header('Location: ../forget_page.php?e=code');
		}
	} else {
		if($_POST['code'] == $_SESSION['code']) {
			$_SESSION['verified_code'] = true;
			header('Location: ../forget_page.php');
		} else {
			session_destroy();
			header('Location: ../forget_page.php?e=code');
		}
	}

} else if($_GET['t'] == 'newpass' && $_SESSION['verified_email'] && $_SESSION['verified_code']) {
	
	$query = '
		UPDATE usuarios
		SET senha = ?
		WHERE email = ?
	';

	$values = [
		$_POST['password'],
		$_SESSION['email']
	];

	$_kacontrol->update($query, $values);

	session_destroy();
	header('Location: ../access_page.php?t=login&newpass=success');
}

?>