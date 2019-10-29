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

		<script src="../jquery.js"></script>

		<script type="text/javascript">
			
			$(document).ready( function(){

				//Ocultar formulários.
				$('#cadastro_formulario').hide();

				$('#busca_formulario').hide();

				$('#resultados').hide();

				$('#formulario_editar_usuario').hide();

				$('#formulario_remover_usuario').hide();

				$('#tabela_usuario_remover').hide();

				$('#cadastrar').click( function(){
					$('#cadastro_formulario').toggle('slow');
					$('#busca_formulario').hide('slow');					
					$('#resultados').hide('slow');
					$('#formulario_editar_usuario').hide('slow');
					$('#tabela_usuario_editar').hide('slow');
					$('#formulario_remover_usuario').hide('slow');
					$('#tabela_usuario_remover').hide('slow');
				});

				$('#buscar').click( function(){				
					$('#cadastro_formulario').hide('slow');
					$('#busca_formulario').toggle('slow');					
					$('#resultados').hide('slow');
					$('#formulario_editar_usuario').hide('slow');					
					$('#tabela_usuario_editar').hide('slow');
					$('#formulario_remover_usuario').hide('slow');
					$('#tabela_usuario_remover').hide('slow');
				});

				$('#editar').click( function(){
					$('#cadastro_formulario').hide('slow');					
					$('#busca_formulario').hide('slow');
					$('#resultados').hide('slow');
					$('#formulario_editar_usuario').toggle('slow');
					$('#tabela_usuario_editar').toggle('slow');	
					$('#formulario_remover_usuario').hide('slow');
					$('#tabela_usuario_remover').hide('slow');
					$.ajax({
						url:'relacao_usuario.php',
						method: 'post',
						success: function(data){
							$('#tabela_usuario_editar').html(data);
						}
					});				
				});

				$('#remover').click( function(){
					$('#cadastro_formulario').hide('slow');					
					$('#busca_formulario').hide('slow');
					$('#resultados').hide('slow');
					$('#formulario_editar_usuario').hide('slow');
					$('#tabela_usuario_editar').hide('slow');	
					$('#formulario_remover_usuario').toggle('slow');	
					$('#tabela_usuario_remover').toggle('slow');	
					$.ajax({
						url:'relacao_usuario.php',
						method: 'post',
						success: function(data){
							$('#tabela_usuario_remover').html(data);
						}
					});				
				});

				$('#efetuar_cadastro').click( function(){					
					$.ajax({
						url:'cadastra_usuario.php',
						method: 'post',
						data: $('#formulario_cadastro').serialize(),						
						success: function(data){							
							if(data == 3){
								$('#div_erro').html('Usuário já cadastrado no sistema.');
							} else if (data == 4){
								$('#div_erro').html("E-mail já cadastrado no sistema.");
							} else if (data == 5){
								$('#div_erro').html("Usuário e e-mail já cadastrados no sistema.");
							} else {
								$('#div_erro').html('');
								$('#usuario_cadastro').val('');
								$('#senha_cadastro').val('');
								$('#nome_cadastro').val('');
								$('#email_cadastro').val('');
								alert('Cadastro efetuado com sucesso!');
							}
						}
					});

				});

				$('#efetuar_busca').click( function(){					
					$.ajax({
						url:'busca_usuario.php',
						method: 'post',
						data: $('#formulario_busca').serialize(),						
						success: function(data){
							$('#resultados').show();
							$('#resultados').html(data);
						}
					});

				});		

				$('#efetuar_edita').click( function(){
					$.ajax({
						url: 'editar_usuario.php',
						method: 'post',
						data: $('#edita_formulario').serialize(),
						success: function(data){
							alert(data);
							$('#usuario_edita').val('');
							$('#id_edita').val('');
							$('#nome_edita').val('');
							$('#email_edita').val('');

						}				
					});

				});	

				$('#efetuar_remove').click( function(){
					$.ajax({
						url: 'remover_usuario.php',
						method: 'post',
						data: $('#remove_formulario').serialize(),
						success: function(data){
							alert(data);
							$('#usuario_remove').val('');
							$('#id_remove').val('');
							$('#nome_remove').val('');
							$('#email_remove').val('');

						}				
					});

				});	

			});

			function habilitarForm(val){
				if(val == 1){
					document.getElementById("usuario_busca").disabled = false;
					document.getElementById("nome_busca").disabled = true;
					document.getElementById("email_busca").disabled = true;
					$('#nome_busca').val('');
					$('#email_busca').val('');
				} else if(val == 2){
					document.getElementById("usuario_busca").disabled = true;
					document.getElementById("nome_busca").disabled = false;
					document.getElementById("email_busca").disabled = true;
					$('#usuario_busca').val('');
					$('#email_busca').val('');
				} else if(val == 3){
					document.getElementById("usuario_busca").disabled = true;
					document.getElementById("nome_busca").disabled = true;
					document.getElementById("email_busca").disabled = false;
					$('#nome_busca').val('');
					$('#usuario_busca').val('');
				}

			}		
		</script>

	</head>
	
	<body id="body_padrao">
		<div id="navegacao_home">
			<div id="logo_home"><img src="../Media/tprmlogo.png" width="300px"></div>
			<div id="sessao"><p>Olá, <?= $_SESSION['nome_usuario'] ?> | <a href="sair.php">Encerrar sessão.</a></p>
			</div>
		</div>

		<div id="consulta">CONSULTAS</div>

		<div id="principal_USUARIO">
			<div id="menu_USUARIO">
				<p id="titulo_consulta">Usuários do Sistema</p>
				<span id="cadastrar">Cadastrar</span> | <span id="buscar">Buscar</span> | <span id="editar">Editar</span> | <span id="remover">Remover</span>
			</div>

			<div id="formulario_editar_usuario">
				<form id="edita_formulario" method="post">
					<p>Entre com os dados do usuário que você gostaria de alterar. O campo ID é obrigatório. Os restantes são opcionais, ou seja, caso deixe-os em branco, não haverá alterações.</p>
					<label>ID</label>
					<input type="text" name="id_edita" id="id_edita">				
					<label>Usuário</label>
					<input type="text" name="usuario_edita" id="usuario_edita">
					<label>Nome</label>
					<input type="text" name="nome_edita" id="nome_edita">
					<label>E-mail</label>
					<input type="text" name="email_edita" id="email_edita">
					<button type="button" id="efetuar_edita">Editar</button>
				</form>
			</div>

			<div id="formulario_remover_usuario">
				<form id="remove_formulario" method="post">
					<p>Entre com os dados do usuário que você gostaria de remover. Antes de excluir um usuário, confirme com o administrador local a operação. Uma mensagem de confirmação será exibida.</p>
					<label>ID</label>
					<input type="text" name="id_remove" id="id_remove">				
					<label>Usuário</label>
					<input type="text" name="usuario_remove" id="usuario_remove">
					<label>Nome</label>
					<input type="text" name="nome_remove" id="nome_remove">
					<label>E-mail</label>
					<input type="text" name="email_remove" id="email_remove">
					<button type="button" id="efetuar_remove">Remover</button>
				</form>
			</div>

			<div id="conteudo_cadastro">
				<div id="cadastro_formulario">
					<form method="post" id="formulario_cadastro" name="formulario_cadastro">
						<label>Usuário</label>
						<input type="text" name="usuario_cadastro" id="usuario_cadastro">
						<label>Senha</label>
						<input type="password" name="senha_cadastro" id="senha_cadastro">
						<label>Nome</label>
						<input type="text" name="nome_cadastro" id="nome_cadastro">
						<label>E-mail</label>
						<input type="text" name="email_cadastro" id="email_cadastro">
						<button type="button" id="efetuar_cadastro">Cadastrar</button>
					</form>
					<div id="div_erro">
					</div>
				</div>

				<div id="busca_formulario">
					Você pode: buscar pelo USUÁRIO, buscar pelo NOME ou buscar pelo E-MAIL.
					<br />
					Selecione a opção desejada:
					<form method="post" id="formulario_busca" name="formulario_busca">
						<input type="radio" name="selecao_busca" value="1" id="usuario_check" onclick="habilitarForm(this.value)">Usuário <input type="text" name="usuario_busca" id="usuario_busca" disabled="true">
						<input type="radio" name="selecao_busca" value="2" id="nome_check" onclick="habilitarForm(this.value)">Nome <input type="text" name="nome_busca" id="nome_busca" disabled="true">
						<input type="radio" name="selecao_busca" value="3" id="email_check" onclick="habilitarForm(this.value)">E-mail <input type="text" name="email_busca" id="email_busca" disabled="true">
						<input type="button" id="efetuar_busca" value="Buscar">				
					</form>
					<div id="div_erro">
					</div>
				</div>

				<div id="tabela_editar">
					<table id="tabela_usuario_editar"></table>									
				</div>

				<div id="tabela_remover">
					<table id="tabela_usuario_remover"></table>
				</div>

				<div id="resultados_busca">
					<table id="resultados"></table>
				</div>	

			</div>

		</div>
	
	</body>

</html>