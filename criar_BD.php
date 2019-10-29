<?php

	require_once('BD.class.php');

	$objBD = new criar_BD();
	$criar = $objBD-> criar_BD();

	//Criar o banco de dados.
	$sql = "CREATE DATABASE TPRM_MFGO";

	if (mysqli_query($criar, $sql)) {

		$objBD = new conectar_BD();
		$conexao = $objBD-> conectar_BD();
       
		//Criação da tabela de USUÁRIOS DO SISTEMA no Banco de dados.
		$sql = "CREATE TABLE usuarios (
		  	  	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		    	usuario VARCHAR(20) NOT NULL,
		    	senha VARCHAR(32) NOT NULL,
		    	nome_usuario VARCHAR(50) NOT NULL,
		    	email_usuario VARCHAR(100) NOT NULL
		    	)";
   		if(mysqli_query($conexao, $sql)){
	    	echo "Tabela USUÁRIOS DO SISTEMA criada com sucesso.";
	    	$sql = "INSERT INTO usuarios(usuario, senha, nome_usuario, email_usuario) VALUES 
	    			('admin', md5('admin'), 'Administrador', 'admin@admin.com'), 
	    			('Matheus', md5('12345'), 'Matheus', 'matheus@mfgo.com')";
	    	if(mysqli_query($conexao, $sql)){
	    		echo "Dados inseridos com sucesso na tabela de USUÁRIOS.";
	    	}

	    } else {
	    	echo "Erro na criação da tabela de USUÁRIOS DO SISTEMA.";
	    }

	    //Criação da tabela de CLIENTES no Banco de dados.
	    $sql = "CREATE TABLE clientes (
	    	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	    	nome_cliente VARCHAR(20) NOT NULL,
	    	endereço VARCHAR(32) NOT NULL,
	    	celular VARCHAR(50) NOT NULL,
	    	email_cliente VARCHAR(100) NOT NULL
	    	)";
	    if(mysqli_query($conexao, $sql)){
	    	echo "Tabela CLIENTES criada com sucesso.";
	    	$sql = "INSERT INTO clientes(nome_cliente, endereço, celular, email_cliente) VALUES 
	    			('admin', 'admin', 'Administrador', 'admin@admin.com'), 
	    			('Matheus', '12345', 'Matheus', 'matheus@mfgo.com')";
	    	if(mysqli_query($conexao, $sql)){
	    		echo "Dados inseridos com sucesso na tabela de USUÁRIOS.";
	    	}
	    } else {
	    	echo "Erro na criação da tabela de CLIENTES.";
	    }
		header('Location: Confirmar.php');
	} else {
	    echo "Erro na criação do banco de dados TPRM<br />";
	    echo "Descrição do erro: " . mysqli_error($criar);
	}


?>

