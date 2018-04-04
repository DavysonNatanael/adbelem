<?php

	require_once("config.php");

	// $Sql = new Sql();

	// $templos = $Sql->select("SELECT * FROM tb_templos;");

	// echo json_encode($templos);

	// // Carrega 1 ministro
	// $mk = new Ministros();

	// $mk->loadByID(1);

	// echo json_encode($mk);

	// // Carrega a lista dos Ministros
	// $lm = Ministros::getList();

	// echo json_encode($lm);

	// // Carrega uma lista de usuários buscando pelo login
	// $search = Ministros::search("K");

	// echo json_encode($search);

	// // Carregar um usuário - Login e Senha
	// $usuario = new Ministros();
	// $usuario->login("mauro_karyne0303", "mk03030302");

	// echo $usuario;
	
	// $nome_ele = "Mauro Vilhena Correa";
	// $dtnasc_ele = "03/03/1989";

	// $nome_ela = "Karyne Marcelle Sindeaux Correa";
	// $dtnasc_ela = "03/02/1986";
	
	// $p1 = explode(" ", mb_strtolower($nome_ele));
	// $p2 = explode(" ", mb_strtolower($nome_ela));
	// $p3 = explode("/", $dtnasc_ele);
	// $p4 = explode("/", $dtnasc_ela);
	
	// echo $login = $p1[0]."_".$p2[0].$p3[0].$p4[0];

	// $sql = new Sql();

	// $results = $sql->select("SELECT * FROM tb_ministros WHERE login_mn = :LOGIN", array(":LOGIN"=>$login));

	// echo count($results);

	$ministro = new Ministros();

	$ministro->setNomeEle("Mauro");
	$ministro->setNomeEla("Karyne");

	$ministro->setNascimentoEle("03/03/1989");
	$ministro->setNascimentoEla("03/02/1986");

	$ministro->insert();

?>