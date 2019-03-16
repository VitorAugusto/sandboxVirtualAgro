<?php

if (isset($_POST['produtos'])) {
	include_once('tools.php');

	ECHO "VOCÊ ENVIOU PRA MIM :";

	echo "<p>";

	$dados = $_POST['produtos'];



	//$data = file_get_contents( $_POST['produtos'] ); //$data is now the string '[1,2,3]';

    //$data = json_decode( $data ); //$data is now a php array array(1,2,3)



	 // SE RECEBEU O AJAX COM OS PRODUTOS PARA PESQUISAR.
}else{

	echo "o que voce está fazendo aqui ?";
}

?>