<?php
	
	class Conexao {
		private $sgbd = 'mysql';
		private $host = 'localhost';
		private $db = 'db_ka';
		private $user = 'root';
		private $key = '';

		public function conectar() {
			try {
				$conexao = new PDO(
					$this->sgbd.':host='.$this->host.';dbname='.$this->db,
					$this->user,
					$this->key
				);
				return $conexao;
			} catch (PDOException $e) {
				'<p style="color: red; font-size: 1.3em; font-weight: bold;"> O ocorreu um erro, perdoe-nos por isso. Por favor tente novamente mais tarde.<p>';
			}
			
		}
	}

	$conexao = new Conexao();
	$conexao = $conexao->conectar();


	$query = '
		select 
			`id_produto`, `nome_curto`, `valor` 
		from 
			`tb_produtos`
	';


	$stmt = $conexao->query($query);
	$lista_produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>