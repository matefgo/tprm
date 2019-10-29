<?php

	session_start();
		
	require_once('../BD.class.php');

	if(!isset($_SESSION['usuario'])){
		header('Location: login.php?erro=2');
	}

	$objBD = new conectar_BD();
	$conexao = $objBD-> conectar_BD();

	//REMOÇÃO VIA ID
	if(isset($_POST['id_remove'])){
		if(!empty($_POST['id_remove'])){
			$id = $_POST['id_remove'];
		
			//Verificar se o ID fornecido consta no banco de dados.
			$sql = " SELECT id FROM usuarios WHERE id = '$id' ";

			$resposta = mysqli_query($conexao, $sql);

			$dados_usuario = mysqli_fetch_assoc($resposta);


			if(!isset($dados_usuario['id'])){
				echo 'Não existe usuário com esse ID no banco de dados da TPRM. Por favor, insira um ID válido.';
				die();
			} else {
				$sql = " DELETE FROM usuarios WHERE id = '$id'";
				$resposta = mysqli_query($conexao, $sql);
				if($resposta){
					echo "O usuário de ID = ".$id." foi encontrado e removido.";
					die();
				}
			}
		}	
	}

	//REMOÇÃO VIA USUÁRIO
	if(isset($_POST['usuario_remove'])){
		if(!empty($_POST['usuario_remove'])){
			$usuario = $_POST['usuario_remove'];
		
			//Verificar se o USUÁRIO fornecido consta no banco de dados.
			$sql = " SELECT usuario FROM usuarios WHERE usuario = '$usuario' ";

			$resposta = mysqli_query($conexao, $sql);

			$dados_usuario = mysqli_fetch_assoc($resposta);

			if(!isset($dados_usuario['usuario'])){
				echo 'Não existe usuário com esse nome de usuário no banco de dados da TPRM. Por favor, insira um nome de usuário válido.';
				die();
			} else {
				$sql = " DELETE FROM usuarios WHERE usuario = '$usuario'";
				$resposta = mysqli_query($conexao, $sql);
				if($resposta){
					echo "O usuário de nome de usuário = ".$usuario." foi encontrado e removido.";
					die();
				}
			}
		} 
	}	

	//REMOÇÃO VIA NOME
	if(isset($_POST['nome_remove'])){
		if(!empty($_POST['nome_remove'])){
			$nome = $_POST['nome_remove'];
		
			//Verificar se o NOME fornecido consta no banco de dados.
			$sql = " SELECT id, nome_usuario FROM usuarios WHERE nome_usuario = '$nome' ";

			$resposta = mysqli_query($conexao, $sql);

			$dados_usuario = mysqli_fetch_assoc($resposta);

			$id_teste = $dados_usuario['id'];

			do {
			} while ($id_teste == $dados_usuario['id'] && $dados_usuario = mysqli_fetch_assoc($resposta));

			if($id_teste != $dados_usuario['id'] && !$_POST['email_remove']){
				echo 'Existe mais de um usuário com esse nome no sistema. Por favor, insira mais dados para a correta remoção.';
				die();
			} else {
				$email = $_POST['email_remove'];
				$sql = " SELECT nome_usuario, email_usuario FROM usuarios WHERE nome_usuario = '$nome' AND email_usuario = '$email' ";
				$resposta = mysqli_query($conexao, $sql);
				if($resposta){
					$sql = " DELETE FROM usuarios WHERE nome_usuario = '$nome' AND email_usuario = '$email'";
					$resposta = mysqli_query($conexao, $sql);
					if($resposta){
						echo "O usuário de nome = ".$nome." e e-mail ".$email." foi encontrado e removido.";
						die();
					}
				}
			}

			if(!isset($dados_usuario['nome_usuario'])){
				echo 'Não existe usuário com esse nome no banco de dados da TPRM. Por favor, insira um nome válido.';
				die();
			} else {
				$sql = " DELETE FROM usuarios WHERE nome_usuario = '$nome'";
				$resposta = mysqli_query($conexao, $sql);
				if($resposta){
					echo "O usuário de nome = ".$nome." foi encontrado e removido.";
					die();
				}
			}
		} 
	}

	//REMOÇÃO VIA E-MAIL
	if(isset($_POST['email_remove'])){
		if(!empty($_POST['email_remove'])){
			$email = $_POST['email_remove'];
		
			//Verificar se o E-MAIL fornecido consta no banco de dados.
			$sql = " SELECT email_usuario FROM usuarios WHERE email_usuario = '$email' ";

			$resposta = mysqli_query($conexao, $sql);

			$dados_usuario = mysqli_fetch_assoc($resposta);

			if(!isset($dados_usuario['email_usuario'])){
				echo 'Não existe usuário com esse e-mail no banco de dados da TPRM. Por favor, insira um e-mail válido.';
				die();
			} else {
				$sql = " DELETE FROM usuarios WHERE email_usuario = '$email'";
				$resposta = mysqli_query($conexao, $sql);
				if($resposta){
					echo "O usuário de e-mail = ".$email." foi encontrado e removido.";
					die();
				}
			}	
		} 
	}	

?>