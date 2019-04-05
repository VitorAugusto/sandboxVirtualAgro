<?php

include_once('tools.php');

$idAnuncio = $_POST['idAnuncio'];

$comandoConsultarAnuncio = "SELECT texto_anuncio, observacao, preco from anuncios WHERE id = '$idAnuncio'";

mysqli_query($GLOBALS['dao'], "set names 'utf8'");

$display = mysqli_query($GLOBALS['dao'], $comandoConsultarAnuncio);


$coluna = mysqli_fetch_array($display);


$medida = $coluna['texto_anuncio'];
$observacao = $coluna['observacao'];
$preco = $coluna['preco'];



switch($_GET['action']){


	case "getMedidaProduto":
	echo $medida;
	break;

	case "getObservacaoProduto":
	echo $observacao;
	break;

	case "getPrecoProduto":
	echo $preco;
	break;


}





//SOU UMA PÁGINA QUE FAZ CONSULTAS NO ANÚNCIO POR AJAX.
//O AJAX ME MANDA UMA REQUISIÇÃO E EU RESPONDO





?>