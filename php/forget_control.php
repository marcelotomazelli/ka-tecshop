<?php
session_start();

require './connection_class.php';
$connection = new Connection();
$connection = $connection->connect();


if($_GET['t'] == 'email') {
	$query = '
		SELECT
			email
		FROM
			tb_usuarios
		WHERE
			email = ?
	';

	$stmt = $connection->prepare($query);
	$stmt->bindValue(1, $_POST['email'], PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

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
	echo 'Bele';

	$query = '
		UPDATE tb_usuarios
		SET senha = :password
		WHERE email = :email
	';

	$stmt = $connection->prepare($query);
	$stmt->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
	$stmt->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
	$stmt->execute();

	session_destroy();
	header('Location: ../access_page.php?t=login&newpass=success');
}
?>