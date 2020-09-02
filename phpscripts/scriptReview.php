<?php

if(!empty($_POST)) {
	session_start();

	require './classConnection.php';
	require './classKAControl.php';

	$_kacontrol = new Connection();
	$_kacontrol = new KAControl($_kacontrol);

	$product_id = intval($_POST['product_id']);

	// tratativa do valor

	$final_value = intval($_POST['review'] * 10);

	if($final_value == 0) {
		$final_value = '00';
	}


	// Inclusão da avalição na table avaliacoes 

	$query = '
		INSERT INTO 
			avaliacoes(produto_id, usuario_id, titulo, descricao, avaliacao, dia)
		VALUES
			(?, ?, ?, ?, ?, ?)
	';

	$values = [
		$product_id,
		intval($_SESSION['id_user']),
		$_POST['tittle'],
		$_POST['description'],
		$final_value,
		date('Y-m-d')
	];

	$_kacontrol->create($query, $values);


	// Pesquisa para verificar se ja possui registrado a media desse produto em media_avaliacoes

	$query = '
		SELECT
			* 
		FROM
			media_avaliacoes
		WHERE
			produto_id = ?
	';

	$values = [$product_id];

	$reviewaverage = $_kacontrol->read($query, $values, 'one');


	// Verificar se o resultado da pesquisa feita acima é vazio.
	// Se vazio ele criara uma linha na tabela
	// Se devolver um resultado ele fará um atualização
	if(empty($reviewaverage)) {

		$query = '
			INSERT INTO
				media_avaliacoes(produto_id, quantidade, media)
			VALUES
				(?, 1, ?)
		';

		$values = [
			$product_id,
			$final_value
		];

		$_kacontrol->create($query, $values);

	} else {

		$qtt = 0;
		$totala = 0;

		$query = '
			SELECT avaliacao
			FROM avaliacoes
			WHERE produto_id = ?
		';

		$values = [$product_id];

		$reviews = $_kacontrol->read($query, $values);

		foreach($reviews as $value) {
			$totala += $value->avaliacao;
			$qtt++;
		}

		$average = ceil($totala / $qtt);

		$query = '
			UPDATE
				media_avaliacoes
			SET
				quantidade = ?,
				media = ?
			WHERE produto_id = ?
		';

		$values = [
			intval($qtt),
			intval($average),
			$product_id
		];

		$_kacontrol->update($query, $values);
	}

	header('Location: ../product.php?id='.$product_id);
}

?>