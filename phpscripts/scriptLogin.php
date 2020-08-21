<?php

session_start();

require './classConnection.php';
require './classKAControl.php';

$_connection = new Connection();
$_kacontrol = new KAControl($_connection);

$query = '
	SELECT email
	FROM usuarios
	WHERE email = ?
';

$values = [$_POST['email']];

$result = $_kacontrol->read($query, $values, 'one');

if(!empty($result)) {
	$query = '
		SELECT
			id, nome, email
		FROM 
			usuarios
		WHERE 
			email = ?
			AND
			senha = ?
	';

	$values = [
		$_POST['email'],
		$_POST['password']
	];

	$_user = $_kacontrol->read($query, $values, 'one');

	if(!empty($_user)) {
		$_SESSION = [
			'authenticated' => true,
			'id_user' => $_user->id,
			'name' => $_user->nome,
			'email' => $_user->email
		];
		header('Location: ../index.php');
	} else {
		header('Location: ../access_page.php?t=login&e=pass&email=' . $_POST['email']);
	}
} else {
	header('Location: ../access_page.php?t=login&e=login&email=' . $_POST['email']);
}

?>