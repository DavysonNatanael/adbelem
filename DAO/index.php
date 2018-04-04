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

	// Carregar um usuário - Login e Senha
	$usuario = new Ministros();
	$usuario->login("mauro_karyne0303", "mk03030302");

	echo $usuario;

?>