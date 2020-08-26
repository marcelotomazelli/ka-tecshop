<?php
session_start();

require './classConnection.php';
require './classKAControl.php';

$_kacontrol = new Connection();
$_kacontrol = new KAControl($_kacontrol);

$query = '
	SELECT 
		id, nome_curto, detalhes.valor
	FROM 
		produtos
		LEFT JOIN detalhes ON (produtos.id = detalhes.produto_id)
	WHERE 
		id = ?
';

$id = $_GET['id'] * 1;

$values = [$id];

$result = $_kacontrol->read($query, $values, 'one');


$cartitem = [
	'id' => $result->id,
	'name' => $result->nome_curto,
	'value' => $result->valor,
	'quantity' => ($_GET['qtt'] * 1)
];

$cartsession = [
	'id' => $result->id,
	'qtt' => ($_GET['qtt'] * 1)
];


if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

$_kacontrol = '';

array_push($_SESSION['cart'], $cartsession);

echo json_encode($cartitem);
?>