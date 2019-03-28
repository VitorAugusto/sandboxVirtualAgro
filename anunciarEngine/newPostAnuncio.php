<?php

//NOVO SCRIPT PARA PUBLICAR O ANÚNCIO.

//include_once('../tools.php');
//session_start();

	$db_host = 'localhost'; //endereço
	$db_database = 'virtualagro'; //banco de dados
	$db_username = 'root';//usuário
	$db_password = ''; //senha

	$minhaConexao = mysqli_connect($db_host,$db_username,$db_password,$db_database);

	//$GLOBALS['dao'] = $minhaConexao; //VARIÁVEL GLOBAL DE CONEXÃO

	$idAnunciante = 3;

	$categoria =  $_POST['categoria'];
	$produto = $_POST['produto'];
	$idProduto = 3;
	$medida = $_POST['medida'];
	$obs = $_POST['observacao'];

	$comandoPublicarAnuncio = "INSERT INTO anuncios(id_anunciante,categoria,texto_anuncio,id_produto,observacao) VALUES
	('$idAnunciante', '$categoria', '$medida', '$idProduto', '$obs')";




	mysqli_query($minhaConexao, "set names 'utf8'");
	mysqli_query($minhaConexao,$comandoPublicarAnuncio);

	echo (mysqli_error($minhaConexao));

	//header('location:meusAnuncios.php');



	?>