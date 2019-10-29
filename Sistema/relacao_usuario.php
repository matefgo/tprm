<?php

	session_start();
		
	require_once('../BD.class.php');

	if(!isset($_SESSION['usuario'])){
		header('Location: login.php?erro=2');
	}

	$objBD = new conectar_BD();
	$conexao = $objBD-> conectar_BD();

	$sql = " SELECT id, usuario, nome_usuario, email_usuario FROM usuarios ";

	$resposta = mysqli_query($conexao, $sql);

	while($dados_usuario = mysqli_fetch_assoc($resposta)){
		echo "<tr><td>".$dados_usuario['id']."</td> <td>".$dados_usuario['usuario']."</td> <td>".$dados_usuario['nome_usuario']."</td> <td>".$dados_usuario['email_usuario']."</td>";		
	}

?>