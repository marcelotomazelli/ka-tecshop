<?php

$id = '';

require_once './phpscripts/classConnection.php';
require_once './phpscripts/classKAControl.php';
// require_once './classConnection.php';
// require_once './classKAControl.php';

if(isset($_GET['id']))
	$id = intval($_GET['id']);

if(!empty($id)) {
	$_kacontrol = new Connection();
	$_kacontrol = new KAControl($_kacontrol);


	// Selecionará todas as infrmações necessarias do produto

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


	// Pesquisá pela perguntas feitas

	$query = '
		SELECT
			perguntas.id, descricao, dia, usuarios.nome
		FROM
			perguntas
		    LEFT JOIN usuarios ON (perguntas.usuario_id = usuarios.id)
		WHERE produto_id = ?
	';

	$values = [$id];

	$questions = $_kacontrol->read($query, $values);

	
	// Tratativa para as respostas
	// Percorrera a variavel $questions e pesquisará por suas respectivas resposta
	// Independentemente se encontrar ou ele dará um push, mas isso será tratado na pagina

	$anwers = array();

	foreach($questions as $i => $question) {
		$query = '
			SELECT
				usuarios.nome, resposta, dia
			FROM
				perguntas_respostas AS pr
			    LEFT JOIN usuarios ON (pr.usuario_id = usuarios.id)
			WHERE
				pergunta_id = ?
		';

		$values = [($question->id * 1)];

		$answer = $_kacontrol->read($query, $values);

		$answers[$i] = $answer;
	};


	// Selecionará o media de avalição do produto

	$query = '
		SELECT quantidade, media
		FROM media_avaliacoes
		WHERE produto_id = ?
	';

	$values = [$id];

	$average = $_kacontrol->read($query, $values, 'one');

	// Selecionará a lista de avaliações registradas

	$query = '
		SELECT 
			titulo, avaliacao, descricao, usuarios.nome, dia
		FROM 
			avaliacoes
		    LEFT JOIN usuarios ON (avaliacoes.usuario_id = usuarios.id)
		WHERE
			produto_id = ?
	';

	$values = [$id];

	$reviews = $_kacontrol->read($query, $values);

	// Permissão para avaliar
	$reviewpermition = true;

	if($authenticated) {
		$query = '
			SELECT produto_id
			FROM avaliacoes
			WHERE 
				usuario_id = ? 
				AND 
				produto_id = ?
		';

		$values = [intval($_SESSION['id_user']), $id];

		$result = $_kacontrol->read($query, $values);

		if(!empty($result))
			$reviewpermition = false;
	}

} else {
	header('Location: ./index.php');
}

?>