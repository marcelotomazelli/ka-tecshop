<?php
	require "connection.php";

	$connection = new Connection();
	$connection = $connection->connect();

	$i = $_GET['i'];
	$query = '';

	if($i != 'ultimos') {
		$query = "
			SELECT tp.id_produto, nome_curto, valor
			FROM tb_produtos AS tp
			RIGHT JOIN tb_categorias AS tc ON (tp.id_produto = tc.id_produto)
			WHERE tc.categoria_especial = ?
		";
	} else {
		$query = '
			SELECT id_produto, nome_curto, valor
			FROM tb_produtos
			ORDER BY id_produto DESC
			LIMIT 9
		';
	}
	
	$stmt = $connection->prepare($query);
	$bind = $stmt->bindValue(1, $i, PDO::PARAM_STR);
	$stmt->execute();
	$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($list);
?>
