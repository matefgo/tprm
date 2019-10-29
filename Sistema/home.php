<?php
	
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: login.php?erro=2');
	}

?>

<!DOCTYPE html>

<html>

	<head>
		<title>TPRM - Home</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../estilo.css"> 
		
	</head>
	
	<body id="body_padrao">
		<div id="navegacao_home">
			<div id="logo_home"><img src="../Media/tprmlogo.png" width="300px"></div>
			<div id="sessao"><p>Olá, <?= $_SESSION['nome_usuario'] ?> | <a href="sair.php">Encerrar sessão.</a></p>
			</div>
		</div>

		<div id="consulta">CONSULTAS</div>

		<div id="menu_home">
		<a href="consulta_usuario.php" class="acesso_home"><div id="usuarios" class="menu_cadastro">
			<p class="titulo_home">Usuários do Sistema</p>
			<p class="subtitulo_home">Realize cadastro de novos usuários, consultas, edições e remoção de usuários registrados no sistema.</p>
		</div></a>
		<br/>
		<a href="consulta_cliente.php" class="acesso_home"><div id="clientes" class="menu_cadastro">
			<p class="titulo_home">Clientes</p>
			<p class="subtitulo_home">Realize cadastros, consultas, alterações e exclusão de clientes da TPRM.</p>
		</div></a>
		</div>

	</body>

</html>