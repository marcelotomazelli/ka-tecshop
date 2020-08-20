<?php

// classe CRUD
class KAControl {
	private $_connection;

	public function __construct(Connection $_connection) {
		$this->_connection = $_connection->connect();
	}

	public function read($query, $values) {
		$stmt = $this->_connection->prepare($query);
		// incrimenta 1 ao i para ajustar o contexto
		// verifica se o tipo de valor e faz os devidos processos
		foreach($values as $i => $value) {
			$i += 1;
			if(is_string($value)) {
				$stmt->bindValue($i, $value, PDO::PARAM_STR);
			} else if(is_int($value)) {
				$stmt->bindValue($i, $value, PDO::PARAM_INT);
			} else if(is_bool($value)) {
				$stmt->bindValue($i, $value, PDO::PARAM_BOOL);
			}
		}
		// executa e retorna o resultado
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>