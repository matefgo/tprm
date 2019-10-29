<?php

	session_start();
		
	require_once('../BD.class.php');

	if(!isset($_SESSION['usuario'])){
		header('Location: login.php?erro=2');
	}

	$objBD = new conectar_BD();
	$conexao = $objBD-> conectar_BD();

	if(isset($_POST['identificador'])){
		$controlar = $_POST['identificador'];
	} else {
		echo 'Por favor, insira um número de ID.';
		die();
	}



	if(isset($_POST['usuario_edita']) && $_POST['usuario_edita'] != ''){
		$usuario = $_POST['usuario_edita'];
		$sql = " UPDATE usuarios SET usuario = '$usuario' WHERE id = '$controlar' ";

		$resposta = mysqli_query($conexao, $sql);
		if($resposta){
			echo 'O usuário foi alterado.';
			echo $controlar;
		}
	}

	if(isset($_POST['nome_edita']) && $_POST['nome_edita'] != ''){
		$nome = $_POST['nome_edita'];
		$sql = " UPDATE usuarios SET nome_usuario = '$nome' WHERE id = '$controlar' ";

		$resposta = mysqli_query($conexao, $sql);
		if($resposta){
			echo 'O nome foi alterado.';
			echo $controlar;
		}
	}

	if(isset($_POST['email_edita']) && $_POST['email_edita'] != ''){
		$email = $_POST['email_edita'];
		$sql = " UPDATE usuarios SET email_usuario = '$email' WHERE id = '$controlar' ";

		$resposta = mysqli_query($conexao, $sql);
		if($resposta){
			echo 'O e-mail foi alterado.';
		}
	}

?>