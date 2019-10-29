<?php
	
	session_start();

	require_once('../BD.class.php');

	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	$objBD = new conectar_BD();
	$conexao = $objBD-> conectar_BD();

	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

	$resultado_login = mysqli_query($conexao, $sql);

	if($resultado_login){
	
		$dados_usuario = mysqli_fetch_assoc($resultado_login);

		if(isset($dados_usuario['usuario'])){
			
			$_SESSION['usuario'] = $usuario;
			$_SESSION['nome_usuario'] = $dados_usuario['nome_usuario'];
			$_SESSION['email'] = $dados_usuario['email_usuario'];	-

			header('Location: home.php');

		} else {
			header('Location: login.php?erro=1');
		}
	} else {
		echo "Não foi possível se conectar com o Banco de Dados.";
	}

?>