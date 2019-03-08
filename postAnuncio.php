<?php

session_start();

include('tools.php');

$meuTipoProduto = $_POST['tipoProduto'];
$meuTextoAnuncio = $_POST['textoAnuncio'];
$meuId = $_SESSION['id'];
$meuNome = $_SESSION['nome'];

$comandoInsertAnuncio = "INSERT INTO anuncios(id_anunciante, tipo_anuncio, texto_anuncio) VALUES ('$meuId','$meuTipoProduto','$meuTextoAnuncio')";

   mysqli_query($GLOBALS['dao'],$comandoInsertAnuncio);

   header('location:meusAnuncios.php');

?>