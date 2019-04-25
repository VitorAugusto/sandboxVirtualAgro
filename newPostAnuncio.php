<?php

//NOVO SCRIPT PARA PUBLICAR O ANÚNCIO.

include_once('microDAO.php');
session_start();

function getIdProduto($nome){
	$comandoGetId = "SELECT id from produtos WHERE nome = '$nome'";

	mysqli_query($GLOBALS['daomicro'], "set names 'utf8'");
	$display = mysqli_query($GLOBALS['daomicro'], $comandoGetId);

	return(mysqli_fetch_row($display)[0]);
}


$idAnunciante = $_SESSION['id'];
$categoria =  $_POST['categoria'];

$newCat = str_replace("'", '', $categoria);

echo $newCat;
$produto = $_POST['produto'];
$idProduto = getIdProduto($produto);
$medida = $_POST['medida'];
$obs = $_POST['observacao'];
$preco = $_POST['preco'];


$comandoPublicarAnuncio = "INSERT INTO anuncios(id_anunciante,categoria,texto_anuncio,id_produto,observacao,preco) VALUES
('$idAnunciante', '$newCat', '$medida', '$idProduto', '$obs', '$preco')";


mysqli_query($GLOBALS['daomicro'], "set names 'utf8'");
mysqli_query($GLOBALS['daomicro'],$comandoPublicarAnuncio);


?>