<?php

$listcart = '';

// Verifica se a session['cart'] ja existe e restorna uma variavel com as infomações necessarias
// se não existir não acontece nada, pois é usado em um require
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

	$_kacontrol = new Connection();
	$_kacontrol = new KAControl($_kacontrol);

	$cart = $_SESSION['cart'];
	$str_allid = '';
	$values = array();

	foreach($cart as $item) {
		if(!empty($str_allid)) {
			$str_allid .= ', ';
		}

		$str_allid .= '?';
		array_push($values, $item['id']);
	};

	$query = "
		SELECT id, nome_curto, detalhes.valor
		FROM 
			produtos
		    LEFT JOIN detalhes ON (produtos.id = detalhes.produto_id)
		WHERE id IN($str_allid)
	";

	$listcart = $_kacontrol->read($query, $values);

}

?>