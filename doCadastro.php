<?php

$nome = $_POST["campoNome"];
$username = $_POST["campoUsername"];
$senha = $_POST["campoSenha"];

  $comandoINSERT = "INSERT INTO cadastros(nome, username, senha) VALUES ('$nome','$username','$senha')"; 

    $db_host = 'localhost'; //endereço
	$db_database = 'virtualagro'; //banco de dados
	$db_username = 'root';//usuário
	$db_password = ''; //senha


    $minhaConexao = mysqli_connect($db_host,$db_username,$db_password,$db_database);

    try{
    	mysqli_query($minhaConexao,$comandoINSERT);
    }catch(Exception $a){
    	ECHO "NÃO FOI POSSÍVEL REALIZAR O CADASTRO";
    }finally{

    mysqli_close($minhaConexao);
    header('location:index.php');

    }

?>