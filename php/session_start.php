<?php
session_start();

if(!isset($connection)) {
	require './connection_class.php';

	$connection = new Connection();
	$connection = $connection->connect();
}

$query = '
	SELECT 
		email
	FROM 
		tb_usuarios
	WHERE
		email = :email
';

$stmt = $connection->prepare($query);

$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_OBJ);

if(!empty($result)) {
	$query = '
		SELECT 
			id_usuario, nome, email
		FROM 
			tb_usuarios
		WHERE
			email = :email AND senha = :password
	';

	$stmt = $connection->prepare($query);

	$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
	$stmt->bindValue(':password', $_POST['password'], PDO::PARAM_STR);

	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_OBJ);

	if(!empty($result)) {
		$_SESSION = [
			'authenticated' => true,
			'id_user' => $result->id_usuario,
			'name' => $result->nome,
			'email' => $result->email
		];
		print_r($_SESSION);
		header('Location: ../index.php');
	} else {
		header('Location: ../access_page.php?t=login&e=pass&email=' . $result->email);
	}
} else {
	header('Location: ../access_page.php?t=login&e=login&email=' . $_POST['email']);
}

?>

