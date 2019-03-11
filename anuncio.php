<!DOCTYPE html>
<html>
<head>

<?php



include_once('tools.php');

if(anuncioExiste($_GET['idAnuncio'])){
	echo "ANÚNCIO EXISTE";
}else{

	ECHO "ANÚNCIO NÃO EXISTE";
	header('location:index.php');
}


	$comandoSelectAnuncio = "SELECT * from anuncios WHERE id = '$_GET[idAnuncio]'";
    $displayAnuncio = mysqli_query($GLOBALS['dao'], $comandoSelectAnuncio);
    $colunaAnuncio = mysqli_fetch_array($displayAnuncio);





?>

	<title>
		
	</title>

</head>
<body>

	<?php
	$comandoGetIdProduto = "SELECT id_produto FROM anuncios WHERE id = '$_GET[idAnuncio]'";
	$display = mysqli_query($GLOBALS['dao'], $comandoGetIdProduto);
	getImagemProduto(mysqli_fetch_row($display)[0]);
	?>


	<h1> NOME DO AGRICULTOR </h1>

	<?php
	//echo $colunaAnuncio['id_anunciante'];

	echo nomeDoAnunciante($colunaAnuncio['id_anunciante']);

	?>

	<h1> CATEGORIA </h1>

	<?php

	echo $colunaAnuncio['categoria'];

	?>
	<h1> CONTATO DO AGRICULTOR </h1>
	<?php

	echo rand();

	?>
	<h2> CONTEÚDO DO ANÚNCIO</h2>

	<?php

	echo $colunaAnuncio['texto_anuncio'];

	?>

	<h2> <a href='allAnuncios.php'> VOLTAR </a> </h2>
</body>
</html>