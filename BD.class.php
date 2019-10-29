<?php

//Classe para criar o banco de dados.

class criar_BD {

	//Valores padrão. Por favor, substitua em cada campo o nome do servidor, o usuário e senha utilizados.

	//Indica o servidor local.
	public $servidor = 'localhost';
	//Nome de usuário do servidor local.
	public $usuario = 'root';
	//Senha utilizada pelo servidor local.
	public $senha = '';

	public function criar_BD () {
		//Faz a primeira conexão com o banco de dados.
		$conexao = mysqli_connect($this->servidor,$this->usuario,$this->senha);
		mysqli_set_charset($conexao, 'utf8');
		if (!$conexao) {
 		   echo "A conexão não foi bem sucedida.";
		}
		return $conexao;
	}

}

//Classe para se conectar com o banco de dados.

class conectar_BD extends criar_BD {

	//Nome do banco de dados criado.
	public $db = 'TPRM_MFGO';

	public function conectar_BD () {
		//Faz a primeira conexão com o banco de dados.
		$conexao = mysqli_connect($this->servidor,$this->usuario,$this->senha,$this->db);
		mysqli_set_charset($conexao, 'utf8');
		if (!$conexao) {
 		   echo "A conexão não foi bem sucedida.";
		}
		return $conexao;
	}

}


?>

