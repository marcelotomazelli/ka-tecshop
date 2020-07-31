<?
require './connection_class.php';

$connection = new Connection();
$connection = $connection->connect();
$permission = true;

$query = '
	SELECT email
	FROM tb_usuarios
	WHERE email = :email
';

$stmt = $connection->prepare($query);
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->execute();
$email = $stmt->fetch();

if(!empty($email)) {
	$permission = false;
}

if($permission) {
	$query = '
		INSERT INTO
			tb_usuarios(nome, email, senha)
		VALUES
			(:name, :email, :password)
	';

	$stmt = $connection->prepare($query);
	$stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
	$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
	$stmt->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
	$stmt->execute();
	header('Location: ../access_page.php?t=login&register=success');
} else {
	header('Location: ../access_page.php?t=register&e=register&email=' . $_POST['email'] . '&name=' . $_POST['name']);
}

?>