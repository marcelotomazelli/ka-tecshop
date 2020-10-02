<?php

/*require "./phpscripts/classConnection.php";
require "./phpscripts/classKAControl.php";

$_kacontrol = new Connection();
$_kacontrol = new KAControl($_kacontrol);*/

$p = '';

if(isset($_GET['p'])) {
	$p = $_GET['p'];
}

if(empty($p) || $p == 'pedidos' || ($p != 'favoritos' && $p != 'avaliacoes')) {

	$query = '
		SELECT id
		FROM pedidos
		WHERE usuario_id = ?
	';

	$values = [
		intval($_SESSION['id_user'])
	];

	$auxrequests = $_kacontrol->read($query, $values);

	$requests = array();

	if(!empty($auxrequests)) {
		foreach($auxrequests as $item) {
			$id = intval($item->id);
			// $id = intval($item->estado);
			$status = 1;

			$item = array();

			$item['info'] = [
				'id_request' => $id,
				'status' => $status
			];

			$query = '
				SELECT produto_id
				FROM pedidos_produtos
				WHERE pedido_id = ?
			';

			$values = [$id];

			$item['products'] = $_kacontrol->read($query, $values);

			array_push($requests, $item);
		}
	}

} else if($p == 'favoritos') {
	$query = '
		SELECT
			produtos.id, nome_curto, nome, quantidade, media
		FROM
			favoritos
		    LEFT JOIN produtos ON (favoritos.produto_id = produtos.id)
		    LEFT JOIN media_avaliacoes ON (favoritos.produto_id = media_avaliacoes.produto_id)
		WHERE 
			usuario_id = ?
	';

	$values = [intval($_SESSION['id_user'])];

	$favorites = $_kacontrol->read($query, $values);
} else if($p == 'avaliacoes') {

	$query = '
		SELECT
			produto_id, nome, titulo, descricao, avaliacao, dia
		FROM 
			avaliacoes
		    LEFT JOIN produtos ON (avaliacoes.produto_id = produtos.id)
		WHERE
			usuario_id  = 1
	';

	$values = [intval($_SESSION['id_user'])];

	$reviews = $_kacontrol->read($query, $values);
}

?>