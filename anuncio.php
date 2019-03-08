<!DOCTYPE html>
<html>
<head>

<?php



include('tools.php');

if(anuncioExiste($_GET['idAnuncio'])){
	echo "ANÚNCIO EXISTE";
}else{

	ECHO "ANÚNCIO NÃO EXISTE";
	header('location:index.php');
}


	$comandoSelectAnuncio = "SELECT * from anuncios WHERE id = '$_GET[idAnuncio]'";
    $displayAnuncio = mysqli_query($minhaConexao, $comandoSelectAnuncio);
    $colunaAnuncio = mysqli_fetch_array($displayAnuncio);





?>

	<title>
		
	</title>

</head>
<body>


	<h1> NOME DO AGRICULTOR </h1>

	<?php
	//echo $colunaAnuncio['id_anunciante'];

	echo nomeDoAnunciante($colunaAnuncio['id_anunciante']);

	?>

	<h1> TIPO DE ANÚNCIO </h1>

	<?php

	echo $colunaAnuncio['tipo_anuncio'];

	?>
	<h1> CONTATO DO AGRICULTOR </h1>
	<?php

	echo rand();

	?>
	<h2> CONTEÚDO DO ANÚNCIO</h2>

	<?php

	echo $colunaAnuncio['texto_anuncio'];

	?>

	<h2> <a href='site.php'> VOLTAR </a> </h2>
</body>
</html>