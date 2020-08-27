<?php

require './phpscripts/classConnection.php';
require './phpscripts/classKAControl.php';

$_connection = new Connection();
$_kacontrol = new KAControl($_connection);

if(isset($_GET['e']))
	$listproducts = request($_GET['e'], 'e');
else if(isset($_GET['m']))
	$listproducts = request($_GET['m'], 'm');

function request($value, $type) {
	$_connection = new Connection();
	$_kacontrol = new KAControl($_connection);

	$conditionquery = '';

	if($type == 'e') {
		$conditionquery = 'cespecifico';
	} else if($type == 'm') {
		$conditionquery = 'cmedio';
	}

	$query = "
		SELECT 
			id, nome, nome_curto, detalhes.valor, detalhes.descricao
		FROM
			produtos
		    LEFT JOIN detalhes ON (produtos.id = detalhes.produto_id)
		WHERE
			$conditionquery = ?
	";

	$values = [$value];

	return $_kacontrol->read($query, $values);
}

?>