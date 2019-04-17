<?php
	$db_host = 'localhost'; //endereço
	$db_database = 'virtualagro'; //banco de dados
	$db_username = 'user';//usuário
	$db_password = 'virtualagroeunapolisbahia'; //senha

	$minhaConexao = mysqli_connect($db_host,$db_username,$db_password,$db_database);

	$GLOBALS['daomicro'] = $minhaConexao; //VARIÁVEL GLOBAL DE CONEXÃO

	function fecharCon(){
		echo "FECHOU CONEXÃO";
	}

	function abrirCon(){
		echo "ABRIU CONEXÃO";
	}
?>