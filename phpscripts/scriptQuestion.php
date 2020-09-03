<?php

session_start();

require_once './classConnection.php';
require_once './classKAControl.php';

$_kacontrol = new Connection();
$_kacontrol = new KAControl($_kacontrol);

date_default_timezone_set('America/Sao_Paulo');

if(isset($_GET['type']) && $_GET['type'] == 'question') {
	$query = '
		INSERT INTO 
			perguntas(usuario_id, produto_id, descricao, dia)
		VALUES
			(?, ?, ?, ?);
	';

	$values = [
		intval($_SESSION['id_user']),
		intval($_POST['product_id']),
		$_POST['question'],
		date('Y-m-d')
	];
} else if(isset($_GET['type']) && $_GET['type'] == 'answer') {

	$query = '
		INSERT INTO 
			perguntas_respostas(usuario_id, pergunta_id, resposta, dia)
		VALUES
			(?, ?, ?, ?);
	';

	$values = [
		intval($_SESSION['id_user']),
		intval($_POST['question_id']),
		$_POST['answer'],
		date('Y-m-d')
	];
}

$_kacontrol->create($query, $values);

header('Location: ../product.php?id='.$_POST['product_id']);
?>