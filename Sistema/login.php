<?php
	
	session_start();

	if(isset($_SESSION['usuario'])){
		header('Location: home.php');
	}

?>

<!DOCTYPE html>

<html>

	<head>
		<title>TPRM - Login</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../estilo.css">
	</head>

	<body id="body_login">
		<div id="principal_login">
			<img src="../Media/tprmlogo.png" id="logo_login" width=370px>
			<div id="login">
				<p id="bemvindo">Bem-vindo.</p>
				<div id="credenciais">
					<form method="post" action="verificar_login.php">
						<label class="texto_login">
							Login
							<input type="text" class="input_login" name="usuario">
						</label>
						<br />
						<label class="texto_login">
							Senha
							<input type="password" class="input_login" name="senha">
						</label>
						<br />
						<input type="submit" value="Entrar" id="button_login">
					</form>
					<div id="erro_login">
						<?php
							if(isset($_GET['erro'])){ 
								$erro = $_GET['erro']; 
								if($erro == 1){
							 		echo "Insira um usuário e senha válidos.";
								} 
								if($erro == 2){
							 		echo "Faça login para continuar.";
								} 
							} 
						?>
					</div>
				</div>
			</div>	
		</div>
	</body>

</html>