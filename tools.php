<?php

//ESSE ARQUIVO TOOLS CONTÉM UM CONJUNTO DE FERRAMENTAS(TOOLS) ÚTEIS PARA O VIRTUAL-AGRO.
include('masterDAO.php');


function getNome($itemA, $itemB){

	$login = $itemA;
	$senha = $itemB;


  	$displayNome = mysqli_query($GLOBALS['dao'], "SELECT nome FROM cadastros WHERE username = '$login' AND senha= '$senha'");


  	return (mysqli_fetch_row($displayNome)[0]);

}

function getId($itemA, $itemB){

	$login = $itemA;
	$senha = $itemB;

  	$displayId = mysqli_query($GLOBALS['dao'], "SELECT id FROM cadastros WHERE username = '$login' AND senha= '$senha'");

  	return (mysqli_fetch_row($displayId)[0]);

}


function getIdAnuncianteIdAnuncio($itemA){ //itemA recebe o ID DO ANÚNCIO , e retorna o ID DO ANUNCIANTE. UM ÚNICO VALOR

	$displayIdAnunciante = mysqli_query($GLOBALS['dao'], "SELECT id_anunciante FROM anuncios WHERE id = '$itemA'");

	return (mysqli_fetch_row($displayIdAnunciante)[0]);
}


function getIdAnunciosIdAnunciante($itemA){ //itemA recebe o ID DO ANUNCIANTE, e retorna UM OU MAIS ID DE ANÚNCIOS. PORQUE UM ANUNCIANTE PODE TER VÁRIOS ANÚNCIOS.

	$displayIdAnuncio = mysqli_query($GLOBALS['dao'], "SELECT id FROM anuncios WHERE id_anunciante = '$itemA'");

	return mysqli_fetch_row($displayIdAnuncio);

}

function nomeDoAnunciante($idAnun){


   $selectNomeAnunciante = "select nome from cadastros WHERE ID = '$idAnun' ";

   $displayAnunciante = mysqli_query($GLOBALS['dao'],$selectNomeAnunciante);

	while ($coluna = mysqli_fetch_array($displayAnunciante)) {
		echo $coluna['nome'];
	}

}

function anuncioExiste($idAnun){

	$comandoAnuncioExiste = "SELECT * from anuncios WHERE id = '$idAnun'";

	$display = mysqli_query($GLOBALS['dao'], $comandoAnuncioExiste);

	return(mysqli_num_rows($display) > 0);
}

function meuAnuncio($idAnunciante,$meuId){

	return ($idAnunciante == $meuId);
}

function produtoExiste($idProd){
	$comandoProdutoExiste = "SELECT * from produtos WHERE id = '$idProd'";

	$display = mysqli_query($GLOBALS['dao'], $comandoProdutoExiste);

	return (mysqli_num_rows($display) > 0 );
}

function getImagemProduto($idProd){

	$comandoGetImagemProduto = "SELECT imagemprincipal FROM produtos WHERE id = '$idProd'";

	$display = mysqli_query($GLOBALS['dao'], $comandoGetImagemProduto);

	$imagem = mysqli_fetch_array($display);

	echo "<img src=imagens/".$imagem['imagemprincipal'] . ">";
}

function produtoTemImagensAdicionais($idProd){ //VERIFICA SE O PRODUTO TEM IMAGENS ADIDIONAIS - ADD1 E ADD2.

	$comandoVerificarImagensAdicionais = "SELECT imagemadd1, imagemadd2 FROM produtos WHERE id = '$idProd'";

	$display = mysqli_query($GLOBALS['dao'], $comandoVerificarImagensAdicionais);

	while($foi = mysqli_fetch_array($display)){

		if(is_null($foi['imagemadd1']) AND is_null($foi['imagemadd2'])){

			return false;
		}else{
			return true;
		}

	}
}

function getImagensAdicionais($idProd){

	$comandoGetImagensAdicionais = "SELECT imagemadd1, imagemadd2 FROM produtos WHERE id = '$idProd' ";

	$display = mysqli_query($GLOBALS['dao'], $comandoGetImagensAdicionais);


	$imagens = mysqli_fetch_array($display);

	echo "<img src=imagens/".$imagens['imagemadd1'] . ">";
	echo "<img src=imagens/".$imagens['imagemadd2'] . ">";

}




?>