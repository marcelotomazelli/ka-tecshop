<?php

require './phpscripts/classConnection.php';
require './phpscripts/classKAControl.php';

$_connection = new Connection();
$_kacontrol = new KAControl($_connection);

if(isset($_GET['e'])) {
	$cesp = $_GET['e'];
	$cmed = '';

	if(isset($_GET['m'])) {
		$cmed = $_GET['m'];
	}


	if(empty($cmed)) {
		$condition = 'cespecifico = ?';
		$values = [$cesp];
	} else {
		$condition = 'cmedio = ? AND cespecifico = ?';
		$values = [$cmed, $cesp];
	}

	$query = "
		SELECT 
			id, nome, nome_curto, detalhes.valor, detalhes.descricao
		FROM
			produtos
		    LEFT JOIN detalhes ON (produtos.id = detalhes.produto_id)
		WHERE
			$condition
	";

	$listproducts = $_kacontrol->read($query, $values);
} else if(isset($_GET['m'])) {
	$query = "
		SELECT 
			id, nome, nome_curto, detalhes.valor, detalhes.descricao
		FROM
			produtos
		    LEFT JOIN detalhes ON (produtos.id = detalhes.produto_id)
		WHERE
			cmedio = ?
	";

	$values = [$_GET['m']];

	$listproducts = $_kacontrol->read($query, $values);
} else {
	header('Location: index.php');
}

?>