<?php

//NOVO SCRIPT PARA PUBLICAR O ANÚNCIO.

include_once('tools.php');
session_start();

$idAnunciante = $_SESSION['id'];
$categoria =  $_POST['categoria'];

$newCat = str_replace("'", '', $categoria);

echo $newCat;
$produto = $_POST['produto'];
$idProduto = getIdProdutoPeloNome($produto);
$medida = $_POST['medida'];
$obs = $_POST['observacao'];
$preco = $_POST['preco'];


$comandoPublicarAnuncio = "INSERT INTO anuncios(id_anunciante,categoria,texto_anuncio,id_produto,observacao,preco) VALUES
('$idAnunciante', '$newCat', '$medida', '$idProduto', '$obs', '$preco')";


mysqli_query($GLOBALS['dao'], "set names 'utf8'");
mysqli_query($GLOBALS['dao'],$comandoPublicarAnuncio);

//header('location:meusAnuncios.php');



?>