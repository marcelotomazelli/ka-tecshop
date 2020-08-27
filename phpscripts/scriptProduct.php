<?php

$id = '';

require_once './phpscripts/classConnection.php';
require_once './phpscripts/classKAControl.php';

if(isset($_GET['id']))
	$id = $_GET['id'];

if(!empty($id)) {
	$_kacontrol = new Connection();
	$_kacontrol = new KAControl($_kacontrol);

	$id *= 1;

	$query = '
		SELECT 
			id, nome_curto, nome, marca, cespecifico, cmedio, cglobal, detalhes.valor, detalhes.imagens, detalhes.descricao
		FROM 
			produtos
		    LEFT JOIN detalhes ON (produtos.id = detalhes.produto_id)
		WHERE id = ?
	';



	$values = [$id];

	$productpage = $_kacontrol->read($query, $values, 'one');
} else {
	header('Location: ./index.php');
}

?>