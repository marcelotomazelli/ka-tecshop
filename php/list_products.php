<?
	require "./php/connection.php";
	// require "./connection.php";

	$connection = new Connection();
	$connection = $connection->connect();

	$query = "
		SELECT tp.id_produto, nome_curto, valor
		FROM tb_produtos AS tp
		RIGHT JOIN tb_categorias AS tc ON (tp.id_produto=tc.id_produto)
		WHERE tc.categoria_especial = 'destaque'
	";
	$stmt = $connection->query($query);
	$list_dstq = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$query = "
		SELECT tp.id_produto, nome_curto, valor
		FROM tb_produtos AS tp
		RIGHT JOIN tb_categorias AS tc ON (tp.id_produto=tc.id_produto)
		WHERE tc.categoria_especial = 'temp_oft'
	";
	$stmt = $connection->query($query);

	// $list_deal = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>