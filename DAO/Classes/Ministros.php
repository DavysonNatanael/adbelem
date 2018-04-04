<?php

	class Ministros {

		// ID, Login e Senha
		private $id_mn;
		private $login_mn;
		private $senha_mn;

		// Ele
		private $nome_ele;
		private $nascimento_ele;
		private $contato_ele;

		// Ela
		private $nome_ela;
		private $nascimento_ela;
		private $contato_ela;

		// Geral
		private $bairro_geral;
		private $templo_geral;
		private $cargo_geral;
		private $email_geral;

		//********** Getters & Setters - ID, Login e Senha ***********\\
		public function getIdMn() {
			return $this->id_mn;
		}

		public function setIdMn($value) {
			$this->id_mn = $value;
		}
		
		public function getLoginMn() {
			return $this->login_mn;
		}

		public function setLoginMn($value) {
			$this->login_mn = $value;
		}
		
		public function getSenhaMn() {
			return $this->senha_mn;
		}

		public function setSenhaMn($value) {
			$this->senha_mn = $value;
		}

		//********** Getters & Setters - Ele ***********\\
		public function getNomeEle() {
			return $this->nome_ele;
		}

		public function setNomeEle($value) {
			$this->nome_ele = $value;
		}

		public function getNascimentoEle() {
			return $this->nascimento_ele;
		}

		public function setNascimentoEle($value) {
			$this->nascimento_ele = $value;
		}

		public function getContatoEle() {
			return $this->contato_ele;
		}

		public function setContatoEle($value) {
			$this->contato_ele = $value;
		}

		//********** Getters & Setters - Ela ***********\\
		public function getNomeEla() {
			return $this->nome_ela;
		}

		public function setNomeEla($value) {
			$this->nome_ela = $value;
		}

		public function getNascimentoEla() {
			return $this->nascimento_ela;
		}

		public function setNascimentoEla($value) {
			$this->nascimento_ela = $value;
		}

		public function getContatoEla() {
			return $this->contato_ela;
		}

		public function setContatoEla($value) {
			$this->contato_ela = $value;
		}

		//********** Getters & Setters - Geral ***********\\
		public function getBairroGeral() {
			return $this->bairro_geral;
		}

		public function setBairroGeral($value) {
			$this->bairro_geral = $value;
		}

		public function getTemploGeral() {
			return $this->templo_geral;
		}

		public function setTemploGeral($value) {
			$this->templo_geral = $value;
		}

		public function getCargoGeral() {
			return $this->cargo_geral;
		}

		public function setCargoGeral($value) {
			$this->cargo_geral = $value;
		}

		public function getEmailGeral() {
			return $this->email_geral;
		}

		public function setEmailGeral($value) {
			$this->email_geral = $value;
		}

		//********** Função para buscar o Ministro pela ID ***********\\
		public function loadById($id) {
			
			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_ministros WHERE id_mn = :ID", array(
					":ID"=>$id
			));

			if (count($results) > 0) {
				
				$row = $results[0];

				// ID, Login e Senha
				$this->setIdMn($row['id_mn']);
				$this->setLoginMn($row['login_mn']);
				$this->setSenhaMn($row['senha_mn']);

				// Ele
				$this->setNomeEle($row['nome_ele']);
				$this->setNascimentoEle(new DateTime($row['nascimento_ele']));
				$this->setContatoEle($row['contato_ele']);

				// Ela
				$this->setNomeEla($row['nome_ela']);
				$this->setNascimentoEla(new DateTime($row['nascimento_ela']));
				$this->setContatoEla($row['contato_ela']);

				// Geral
				$this->setBairroGeral($row['bairro_geral']);
				$this->setTemploGeral($row['templo_geral']);
				$this->setCargoGeral($row['cargo_geral']);
				$this->setEmailGeral($row['email_geral']);

			}

		}

		//********** Função para buscar todos os Ministro da tabela ***********\\

		public static function getList() {

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_ministros ORDER BY id_mn;");

		}

		//********** Função para verificar se existe o Ministro na tabela ***********\\

		public static function search($login) {

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_ministros WHERE login_mn LIKE :SEARCH ORDER BY login_mn", array(
				':SEARCH'=>"%".$login."%"
			));

		}

		//********** Função para verificar se existe o Login do Ministro ***********\\

		public function login($login, $password) {

			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_ministros WHERE login_mn = :LOGIN AND senha_mn = :PASSWORD", array(
					":LOGIN"=>$login,
					":PASSWORD"=>$password
			));

			if (count($results) > 0) {
				
				$row = $results[0];
				
				$row = $results[0];

				// ID, Login e Senha
				$this->setIdMn($row['id_mn']);
				$this->setLoginMn($row['login_mn']);
				$this->setSenhaMn($row['senha_mn']);

				// Ele
				$this->setNomeEle($row['nome_ele']);
				$this->setNascimentoEle(new DateTime($row['nascimento_ele']));
				$this->setContatoEle($row['contato_ele']);

				// Ela
				$this->setNomeEla($row['nome_ela']);
				$this->setNascimentoEla(new DateTime($row['nascimento_ela']));
				$this->setContatoEla($row['contato_ela']);

				// Geral
				$this->setBairroGeral($row['bairro_geral']);
				$this->setTemploGeral($row['templo_geral']);
				$this->setCargoGeral($row['cargo_geral']);
				$this->setEmailGeral($row['email_geral']);

			} else {

				throw new Exception("Login e/ou Senha inválidos");
				

			}

		}

		public function __toString() {
			
			return json_encode(array(

				// ID, Login e Senha
				"id_mn"=>$this->getIdMn(),
				"login_mn"=>$this->getLoginMn(),
				"senha_mn"=>$this->getSenhaMn(),

				// Ele
				"nome_ele"=>$this->getNomeEle(),
				"nascimento_ele"=>$this->getNascimentoEle()->format("d/m/Y H:i:s"),
				"contato_ele"=>$this->getContatoEle(),

				// Ela
				"nome_ela"=>$this->getNomeEla(),
				"nascimento_ela"=>$this->getNascimentoEla()->format("d/m/Y H:i:s"),
				"contato_ela"=>$this->getContatoEla(),

				// Geral
				"bairro_geral"=>$this->getBairroGeral(),
				"templo_geral"=>$this->getTemploGeral(),
				"cargo_geral"=>$this->getCargoGeral(),
				"email_geral"=>$this->getEmailGeral()

			// ), JSON_UNESCAPED_UNICODE); // Pode ser útil em relação a acentuação.
			));

		}

	}

?>