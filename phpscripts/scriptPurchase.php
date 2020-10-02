<?php

session_start();

date_default_timezone_set('America/Sao_Paulo');

if(isset($_SESSION['authenticated'])) {

	require_once './classConnection.php';
	require_once './classKAControl.php';

	$_kacontrol = new Connection();
	$_kacontrol = new KAControl($_kacontrol);

	$auxcart = $_SESSION['cart'];
	$day = date('Y-m-d');
	$iduser = intval($_SESSION['id_user']);

	$cart = array();

	foreach($auxcart as $item)
		$cart[$item['id']] = $item['qtt'];

	$query = '
		INSERT INTO pedidos(usuario_id, dia)
		VALUES (?, ?)
	';

	$values = [$iduser, $day];

	$_kacontrol->create($query, $values);

	$query = '
		SELECT id
		FROM pedidos
		WHERE dia = ?
		ORDER BY id DESC
		LIMIT 1
	';

	$values = [$day];

	$id = $_kacontrol->read($query, $values, 'one');

	$id = intval($id->id);

	foreach($cart as $idproduct => $qtt) {
		$query = '
			INSERT INTO pedidos_produtos(pedido_id, produto_id, quantidade)
			VALUES (?, ?, ?)
		';

		$values = [$id, $idproduct, $qtt];

		$_kacontrol->create($query, $values);
	}

	unset($_SESSION['cart']);
	header('Location: ../myaccount.php?p=pedidos');
} else
	header('Location: ../access_page.php?t=login');

?>