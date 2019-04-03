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
	}else{
		echo "<div class='semAnunciantes'>";
		echo "<h3>Oops!</h3>";
		echo "<p>AINDA NÃO EXISTEM ANUNCIANTES PRA ESSE PRODUTO.</p>";
		echo "<tr>";
		echo "</div>";
	}
?>
