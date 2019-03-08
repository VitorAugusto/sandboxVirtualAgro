<?php

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




?>