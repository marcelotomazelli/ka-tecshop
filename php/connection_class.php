<?php
	class Connection {
		private $host = 'localhost';
		private $database = 'db_ka';
		private $user = 'root';
		private $password = '';

		public function connect() {
			$dbh = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
			return $dbh;
		}
	}
?>