<?php

//include_once('tools.php');

include_once('microDAO.php');

$idAnuncio = $_POST['idAnuncio'];

$comandoConsultarAnuncio = "SELECT texto_anuncio, observacao, preco from anuncios WHERE id = '$idAnuncio'";

mysqli_query($GLOBALS['daomicro'], "set names 'utf8'");

$display = mysqli_query($GLOBALS['daomicro'], $comandoConsultarAnuncio);


$coluna = mysqli_fetch_array($display);


$medida = $coluna['texto_anuncio'];
$observacao = $coluna['observacao'];
$preco = $coluna['preco'];

echo $medida;
echo "|";
echo $observacao;
echo "|";
echo $preco;



?>