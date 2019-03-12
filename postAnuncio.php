<?php

    session_start();
    include('tools.php');

    $idAgricultor = $_SESSION['id'];
    $idProduto = getIdProdutoPeloNome($_POST['produto']);
    $categoriaProduto = getCategoriaProdutoPeloId($idProduto);
    $textoAnuncio = $_POST['conteudo'];
    $observacao = $_POST['observacao'];

    $comandoInsertAnuncio = "INSERT INTO anuncios(id_anunciante, categoria, texto_anuncio, id_produto, observacao) VALUES('$idAgricultor','$categoriaProduto', '$textoAnuncio', '$idProduto','$observacao')";

    mysqli_query($GLOBALS['dao'], "set names 'utf8'");
    mysqli_query($GLOBALS['dao'],$comandoInsertAnuncio);

    header('location:meusAnuncios.php');
?>