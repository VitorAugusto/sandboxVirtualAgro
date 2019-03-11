<!DOCTYPE html>
<!-- PÁGINA PRA MOSTRAR O RESPECTIVO PRODUTO, IGUAL O SOSFEIRA.

https://www.sosfeira.com.br/frutas/banana
https://www.sosfeira.com.br/frutas/abacaxi
 -->
<html>
<head>
	<title>
		
	</title>
</head>
<body>

	<?php
	include_once('tools.php');


	if(produtoExiste($_GET['idProduto'])){

		ECHO "ESSE PRODUTO EXISTE";

		getImagemProduto($_GET['idProduto']);
	}else{
		ECHO "ESSE PRODUTO NÃO EXISTE";
	}

	echo "<br>";



	?>


<h1> AGRICULTORES </h1>

<?php

if(existemAnunciantes($_GET['idProduto'])){
	//constroi tabela, etc

	construirTabelaAnunciantes();
	getAnunciantes($_GET['idProduto']);

	echo "</table>";
}else{
	ECHO "AINDA NÃO EXISTEM ANUNCIANTES PRA ESSE PRODUTO";
}

?>



</body>
</html>