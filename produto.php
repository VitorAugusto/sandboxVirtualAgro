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
	include('tools.php');


	if(produtoExiste($_GET['idProduto'])){

		ECHO "ESSE PRODUTO EXISTE";

		getImagemProduto($_GET['idProduto']);
	}else{
		ECHO "ESSE PRODUTO NÃO EXISTE";
	}

	echo "<br>";



	?>


</body>
</html>