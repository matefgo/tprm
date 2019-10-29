<?php
	
	session_start();
		
	require_once('../BD.class.php');

	if(!isset($_SESSION['usuario'])){
		header('Location: login.php?erro=2');
	}

	$objBD = new conectar_BD();
	$conexao = $objBD-> conectar_BD();

	$usuario = $_POST['usuario_cadastro'];
	$senha = md5($_POST['senha_cadastro']);
	$email = $_POST['email_cadastro'];
	$nome = $_POST['nome_cadastro'];

	//Verifica se  o nome de usuário utilizado já existe.
	$verificar_usuario = false;
	$sql = " SELECT * FROM usuarios WHERE usuario = '$usuario' ";
	$resposta = mysqli_query($conexao, $sql);

	if($resposta){
		$dados_usuario = mysqli_fetch_assoc($resposta);
		if(isset($dados_usuario['usuario'])){
			$verificar_usuario = true;
			$erro = 3;
		}
	} else {
		echo "Erro ao tentar se conectar com o banco de dados.";
	}

	//Verifica se  o e-mail de usuário utilizado já existe.
	$verificar_email = false;
	$sql = " SELECT * FROM usuarios WHERE email_usuario = '$email' ";
	$resposta = mysqli_query($conexao, $sql);

	if($resposta){
		$dados_usuario = mysqli_fetch_assoc($resposta);
		if(isset($dados_usuario['email_usuario'])){
			$verificar_email = true;
			$erro = 4;
		}
	} else {
		echo "Erro ao tentar se conectar com o banco de dados.";
	}

	if($verificar_usuario == true || $verificar_email == true){
		if($verificar_usuario == true && $verificar_email == true){
			$erro = 5;
			echo $erro;			
		} else {
			echo $erro;		
		}
	}

	//Caso usuário e e-mail não existam no banco de dados, o registro é feito.
	$sql = " INSERT INTO usuarios(usuario, senha, nome_usuario, email_usuario) VALUES ('$usuario', '$senha', '$nome', '$email')";

	if($verificar_usuario == false && $verificar_email == false){
		$resultado = mysqli_query($conexao, $sql);
	}

?>

