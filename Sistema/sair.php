<?php
	
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: login.php?erro=2');
	} else {
		unset ($_SESSION['usuario']);
		unset ($_SESSION['email']);
		unset ($_SESSION['nome_usuario']);
		header('Location: login.php');
	}

?>