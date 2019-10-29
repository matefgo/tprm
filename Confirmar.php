<!DOCTYPE html>

<html>
	<head>
		<title>TPRM - Sucesso!</title>
		<meta charset="utf-8" />

		<style type="text/css">

			@font-face {
 				font-family: TPRM;
 				src: url("Media/Biryani/Biryani-Regular.ttf");
			}

			#principal_BD {
				width: 500px;
				height: 400px;				
				border-radius: 10px 10px 0px 0px;
				border-bottom: 15px solid #FF6D02;
				box-shadow: 0px 3px 10px #E3E3E3;
				text-align: center;
				position: fixed;
				top: 100px;
				left: 425px;
			}


			#txt {
				color: #FF6D02;
				font-family: TPRM;
				padding: 70px 70px 10px 70px;

			}

			p {
				color: #C8C8C8;
				font-family: TPRM;

			}

			#area_botao_BD {
				vertical-align: middle;
				text-align: center;
			}

			#botao_BD{
			  background-color: #E3E3E3;
			  border: none;
			  color: #FF6D02;			  
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 18px;
			  font-weight: bold;
			  padding: 15px 25px;
			}

		</style>


	</head>

	<body>
		<div id="principal_BD">
		<div id="txt"><h1>Banco de dados criado com sucesso!</h1>
		<p>Os dados dos usuários do sistema, bem como os dados dos clientes, já foram inseridos.</p></div>
		<form method="post" action='Sistema/login.php'>
			<button id="botao_BD">Prosseguir para o login em TPRM.</button>
		</form>
		</div>
	</body>
</html>