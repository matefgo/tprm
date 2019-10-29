<?php
	
	session_start();
		
	require_once('../BD.class.php');

	if(!isset($_SESSION['usuario'])){
		header('Location: login.php?erro=2');
	}

	$objBD = new conectar_BD();
	$conexao = $objBD-> conectar_BD();

	if(isset($_POST['usuario_busca'])){
		$usuario = $_POST['usuario_busca'];
		$sql = " SELECT id, usuario, nome_usuario, email_usuario FROM usuarios WHERE usuario LIKE '%$usuario%' ";

		$resposta = mysqli_query($conexao, $sql);
		while($dados_usuario = mysqli_fetch_assoc($resposta)){
			echo "<br />";
			echo "<tr><td>".$dados_usuario['id']."</td> <td>".$dados_usuario['usuario']."</td> <td>".$dados_usuario['nome_usuario']."</td> <td>".$dados_usuario['email_usuario']."</td> </tr>";
			echo "<br />";
		}
	}

	if(isset($_POST['email_busca'])){
		$email = $_POST['email_busca'];
		$sql = " SELECT id, usuario, nome_usuario, email_usuario FROM usuarios WHERE email_usuario LIKE '%$email%' ";

		$resposta = mysqli_query($conexao, $sql);
		while($dados_usuario = mysqli_fetch_assoc($resposta)){
			echo "<br />";
			echo "<tr><td>".$dados_usuario['id']."</td> <td>".$dados_usuario['usuario']."</td> <td>".$dados_usuario['nome_usuario']."</td> <td>".$dados_usuario['email_usuario']."</td> </tr>";
			echo "<br />";
		}
	}

	if(isset($_POST['nome_busca'])){
		$nome = $_POST['nome_busca'];
		$sql = " SELECT id, usuario, nome_usuario, email_usuario FROM usuarios WHERE nome_usuario LIKE '%$nome%' ";

		$resposta = mysqli_query($conexao, $sql);
		while($dados_usuario = mysqli_fetch_assoc($resposta)){
			echo "<br />";
			echo "<tr><td>".$dados_usuario['id']."</td> <td>".$dados_usuario['usuario']."</td> <td>".$dados_usuario['nome_usuario']."</td> <td>".$dados_usuario['email_usuario']."</td> </tr>";
			echo "<br />";
		}
	}

?>

