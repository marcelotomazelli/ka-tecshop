<?php

$procutsfavorites = array();

if($authenticated) {
	$query = '
		SELECT produto_id
		FROM favoritos
		WHERE usuario_id = ?
	';

	$values = [
		intval($_SESSION['id_user'])
	];

	$result = $_kacontrol->read($query, $values);

	foreach($result as $item) {
		$procutsfavorites[intval($item->produto_id)] = true;
	}

	$result = '';
}



?>