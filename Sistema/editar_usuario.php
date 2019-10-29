<?php

	session_start();
		
	require_once('../BD.class.php');

	if(!isset($_SESSION['usuario'])){
		header('Location: login.php?erro=2');
	}

	$objBD = new conectar_BD();
	$conexao = $objBD-> conectar_BD();

	if(isset($_POST['id_edita'])){
		if(!empty($_POST['id_edita'])){
			$id = $_POST['id_edita'];
		} else {
			echo 'Por favor, insira um número de ID.';
			die();
		}
	}

	//Verificar se o ID fornecido consta no banco de dados.
	$sql = " SELECT id FROM usuarios WHERE id = '$id' ";

	$resposta = mysqli_query($conexao, $sql);

	$dados_usuario = mysqli_fetch_assoc($resposta);

	if(!isset($dados_usuario['id'])){
		echo 'Não existe usuário com esse ID no banco de dados da TPRM. Por favor, insira um ID válido.';
		die();
	} else {
		if(($_POST['usuario_edita']) == '' && ($_POST['nome_edita']) == '' && ($_POST['email_edita']) == ''){
			echo 'Nenhum dado foi alterado.';
			die();
		}
	}

	//O script prossegue com a alteração após os testes de controle.

		if(isset($_POST['usuario_edita']) && $_POST['usuario_edita'] != ''){
			$usuario = $_POST['usuario_edita'];
			$sql = " UPDATE usuarios SET usuario = '$usuario' WHERE id = '$id' ";

			$resposta = mysqli_query($conexao, $sql);
			if($resposta){
				echo 'O usuário foi alterado. ';
			}
		}

		if(isset($_POST['nome_edita']) && $_POST['nome_edita'] != ''){
			$nome = $_POST['nome_edita'];
			$sql = " UPDATE usuarios SET nome_usuario = '$nome' WHERE id = '$id' ";

			$resposta = mysqli_query($conexao, $sql);
			if($resposta){
				echo 'O nome foi alterado. ';
			}
		}

		if(isset($_POST['email_edita']) && $_POST['email_edita'] != ''){
			$email = $_POST['email_edita'];
			$sql = " UPDATE usuarios SET email_usuario = '$email' WHERE id = '$id' ";

			$resposta = mysqli_query($conexao, $sql);
			if($resposta){
				echo 'O e-mail foi alterado. ';
			}
		}


?>