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

		// Data de Cadastro
		private $dtcadastro;

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

		//********** Getters & Setters - Data Cadastro ***********\\
		public function getDtCadastro() {
			return $this->dtcadastro;
		}

		public function setDtCadastro($value) {
			$this->dtcadastro = $value;
		}

		//********** Método para realizar o 'set' dos dados ***********\\
		public function setData($data) {

			// ID, Login e Senha
			$this->setIdMn($data['id_mn']);
			$this->setLoginMn($data['login_mn']);
			$this->setSenhaMn($data['senha_mn']);

			// Ele
			$this->setNomeEle($data['nome_ele']);
			$this->setNascimentoEle(new DateTime($data['nascimento_ele']));
			$this->setContatoEle($data['contato_ele']);

			// Ela
			$this->setNomeEla($data['nome_ela']);
			$this->setNascimentoEla(new DateTime($data['nascimento_ela']));
			$this->setContatoEla($data['contato_ela']);

			// Geral
			$this->setBairroGeral($data['bairro_geral']);
			$this->setTemploGeral($data['templo_geral']);
			$this->setCargoGeral($data['cargo_geral']);
			$this->setEmailGeral($data['email_geral']);
			$this->setDtCadastro(new DateTime($data['dtcadastro']));

		}

		//********** Função para buscar o Ministro pela ID ***********\\
		public function loadById($id) {
			
			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_ministros WHERE id_mn = :ID", array(
					":ID"=>$id
			));

			if (count($results) > 0) {
				
				$this->setData($results[0]);

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
				
				$this->setData($results[0]);

			} else {

				throw new Exception("Login e/ou Senha inválidos");
				

			}

		}

		//********** Função para cadastrar (insert) um Ministro ***********\\

		/*public function criaLogin() {
			
			$p1 = explode(" ", mb_strtolower($this->getNomeEle())); // 1º Nome Dele
			$p2 = explode(" ", mb_strtolower($this->getNomeEla())); // 1º Nome Dela
			$p3 = explode("/", $this->getNascimentoEle()); // Dia Nascimento Dele
			$p4 = explode("/", $this->getNascimentoEla()); // Dia Nascimento Dela

			$login = $p1[0]."_".$p2[0].$p3[0].$p4[0]; // Juntar as partes para criar o Login


			//***** Verificar se já existe o login *****\\
			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_ministros WHERE login_mn = :LOGIN", array(":LOGIN"=>$login));

		}*/

		//********** Função para cadastrar (insert) um Ministro ***********\\

		public function insert() {

			$sql = new Sql();

			//***** Preparar as informações para o Login *****\\
			$p1 = explode(" ", mb_strtolower($this->getNomeEle())); // 1º Nome Dele
			$p2 = explode(" ", mb_strtolower($this->getNomeEla())); // 1º Nome Dela
			$p3 = explode("/", $this->getNascimentoEle()); // Dia Nascimento Dele
			$p4 = explode("/", $this->getNascimentoEla()); // Dia Nascimento Dela

			$login = $p1[0]."_".$p2[0].$p3[0].$p4[0]; // Juntar as partes para criar o Login


			// Verificar se já existe o login
			$results = $sql->select("SELECT * FROM tb_ministros WHERE login_mn = :LOGIN", array(":LOGIN"=>$login));

			if (count($results) < 0 ) {

				$results = $sql->select("CALL sp_ministros_insert
					(
						:NOME_ELE, :NASCIMENTO_ELE, :CONTATO_ELE,
						:NOME_ELA, :NASCIMENTO_ELA, :CONTATO_ELA,
						:BAIRRO_GERAL, :TEMPLO_GERAL, :CARGO_GERAL, EMAIL:GERAL
					)",
					array (
						':NOME_ELE'=>$this->getNomeEle(),
						':NASCIMENTO_ELE'=>$this->getNomeEle(),
						':CONTATO_ELE'=>$this->getContatoEle(),

						':NOME_ELA'=>$this->getNomeEla(),
						':NASCIMENTO_ELA'=>$this->getNascimentoEla(),
						':CONTATO_ELA'=>$this->getContatoEla(),

						':BAIRRO_GERAL'=>$this->getBairroGeral(),
						':TEMPLO_GERAL'=>$this->getTemploGeral(),
						':CARGO_GERAL'=>$this->getCargoGeral(),
						'EMAIL:GERAL'=>$this->getEmailGeral()
					)
				);

				if (count($results) > 0) {

					$this->setData($results[0]);

				}

			} else {

				// throw new Exception("Erro L1. Favor entrar em contato com a administração do sistema.");
				$erro = "Erro";
				echo $erro;

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