<?php
// classe CRUD
class KAControl {
	private $_connection;

	public function __construct(Connection $_connection) {
		$this->_connection = $_connection->connect();
	}

	private function forBindValue($_stmt, $array) {
		foreach($array as $i => $value) {
			$i += 1;
			if(is_string($value)) {
				$_stmt->bindValue($i, $value, PDO::PARAM_STR);
			} else if(is_int($value)) {
				$_stmt->bindValue($i, $value, PDO::PARAM_INT);
			} else if(is_bool($value)) {
				$_stmt->bindValue($i, $value, PDO::PARAM_BOOL);
			}
		}
	}

	public function create($query, $values) {
		$_stmt = $this->_connection->prepare($query);
		if(!empty($values)) {
			$this->forBindValue($_stmt, $values);
		}
		$_stmt->execute();
	}

	public function read($query, $values, $type = 'several') {
		$_stmt = $this->_connection->prepare($query);
		// incrimenta 1 ao i para ajustar o contexto
		// verifica se o tipo de valor e faz os devidos processos
		if(!empty($values)) {
			$this->forBindValue($_stmt, $values);
		}
		// executa e retorna o resultado
		$_stmt->execute();
		if($type === 'several')
			return $_stmt->fetchAll(PDO::FETCH_OBJ);
		else if($type === 'one')
			return $_stmt->fetch(PDO::FETCH_OBJ);
	}

	public function update($query, $values) {
		$_stmt = $this->_connection->prepare($query);
		if(!empty($values)) {
			$this->forBindValue($_stmt, $values);
		}
		$_stmt->execute();
	}
}

?>