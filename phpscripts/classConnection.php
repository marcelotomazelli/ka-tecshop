<?php
	// classe Connection responsavel pela conexão
	class Connection {
		private $host = 'localhost';
		private $database = 'dbkatecshop';
		private $user = 'root';
		private $password = '';

		public function connect() {
			$dbh = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
			return $dbh;
		}
	}
?>