<?php

if (isset($_POST['produtosParaPesquisar'])) {
	include_once('tools.php');

	ECHO "VOCÊ ENVIOU PRA MIM :";

	$dados = $_POST['produtosParaPesquisar'];
	print_r($dados);
	 // SE RECEBEU O AJAX COM OS PRODUTOS PARA PESQUISAR.
}else{

	echo "o que voce está fazendo aqui ?";
}

?>