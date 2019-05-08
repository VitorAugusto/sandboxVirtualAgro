<?php
	include_once('tools.php');

	if(produtoExiste($_GET['idProduto'])){
		echo "<div class='borda'>";
		echo getImagemProduto($_GET['idProduto']);
		echo "</div>";
		echo "<h1>";
		echo getNomeProdutoPeloID($_GET['idProduto']); 
		echo "</h1>";
	}else{
		ECHO "ESSE PRODUTO NÃO EXISTE";
	}

	echo "<h2>Agricultores</h2>";

	if(existemAnunciantes($_GET['idProduto'])){
		//constroi tabela, etc
		construirTabelaAnunciantes();
		getAnunciantes($_GET['idProduto']);

		echo "</table>";


		echo "<hr style='border-width: 4px;'>";
		echo "<p style='font-size: small;'>";
		echo "* As imagens dos produtos são meramente ilustrativas.";
		echo "</p>";



	}else{
		echo "<div class='semAnunciantes'>";
		echo "<h3>Oops!</h3>";
		echo "<p>AINDA NÃO EXISTEM ANUNCIANTES PARA ESSE PRODUTO.</p>";
		echo "<tr>";
		echo "</div>";
	} 
?>
