<?php

    if(isset($_POST['anunci']) && $_POST['anunci'] == 'sim'):
        $inserir = array();
        $post = $_POST['campos'];
        foreach($post as $indice => $valor){
            $inserir[$valor['name']] = $valor['value'];
        }
        $idAgricultor = $_SESSION['id'];
        $produto = $inserir['produto'];
        $atributo = $inserir['atributo'];
        $idProduto = getIdProdutoPeloNome($inserir['produto']);
        $categoriaProduto = getCategoriaProdutoPeloId($idProduto);
        $textoAnuncio = $inserir['textoAnuncio'];

        $textoAnuncioMontado = "VENDO ". $produto;

        switch($atributo){

            case 'kg':
                $textoAnuncioMontado = $textoAnuncioMontado . " POR QUILO.";
                break;
            case 'un':
                $textoAnuncioMontado = $textoAnuncioMontado . " POR UNIDADE.";
                break;
            case '1/2kg':
                $textoAnuncioMontado = $textoAnuncioMontado . " NO MEIO QUILO (1/2KG).";
                break;
            case 'pacote':
                $textoAnuncioMontado = $textoAnuncioMontado . " POR PACOTE.";
                break;
            case 'bandeja':
                $textoAnuncioMontado = $textoAnuncioMontado . " NA BANDEJA.";
                break;
        }

        $comandoInsertAnuncio = "INSERT INTO anuncios(id_anunciante, categoria, texto_anuncio, id_produto, observacao) VALUES('$idAgricultor','$categoriaProduto', '$textoAnuncio', '$idProduto','$textoAnuncioMontado')";

        mysqli_query($GLOBALS['dao'], "set names 'utf8'");
        mysqli_query($GLOBALS['dao'],$comandoInsertAnuncio);

    endif;
?>