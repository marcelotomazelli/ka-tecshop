<?php
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

// se não retornar nada da pesquisa abaixo significa que não há registrado o email, então pode prossegir
if(empty($result)) {
	$query = '
		INSERT INTO
			usuarios(nome, email, senha)
		VALUES
			(?, ?, ?)
	';

	$values = [
		$_POST['name'],
		$_POST['email'],
		$_POST['password']
	];

	$_kacontrol->create($query, $values);
	header('Location: ../access_page.php?t=login&register=success');
} else {
	header('Location: ../access_page.php?t=register&e=register&email=' . $_POST['email'] . '&name=' . $_POST['name']);
}
?>

	