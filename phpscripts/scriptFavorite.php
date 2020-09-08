<?php

session_start();

require_once './classConnection.php';
require_once './classKAControl.php';

$_kacontrol = new Connection();
$_kacontrol = new KAControl($_kacontrol);

if(isset($_SESSION['authenticated'])) {
	if(isset($_GET['idproduct'])) {

		if(isset($_GET['type'])) {

			if($_GET['type'] == 'include') {
				$query = '
					INSERT INTO
						favoritos(usuario_id, produto_id)
					VALUES
						(?, ?)
				';

				$values = [
					intval($_SESSION['id_user']),
					intval($_GET['idproduct'])
				];

				$_kacontrol->create($query, $values);

			} else if($_GET['type'] == 'remove') {
				$query = '
					DELETE FROM
						favoritos
					WHERE
						usuario_id = ?
						AND
						produto_id = ?
				';

				$values = [
					intval($_SESSION['id_user']),
					intval($_GET['idproduct'])
				];

				$_kacontrol->delete($query, $values);
			}

		}

		$info = (object) [
			'info' => 'authenticated',
			'id' => strval($_GET['idproduct'])
		];

		echo json_encode($info);
	}
} else {
	$info = (object) [
		'info' => 'not-authenticated'
	];

	echo json_encode($info);
}

?>