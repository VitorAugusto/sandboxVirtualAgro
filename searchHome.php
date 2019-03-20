<?php

//$categoria = $_GET['categoria'];

//ESSA PÁGINA FAZ TODO O MOTOR DE BUSCA DO PRODUTO PELA CATEGORIA ESCOLHIDA.

//ESSE PÁGINA ESTÁ ACOPLADA À HOME.

include_once('tools.php');

//echo "<h2> <a href='' onclick=voltar()> VOLTAR </a> </h2>";

echo "<div id=telaprodutos>";

if(empty($_GET['categoria'])){
	// SE NÃO MANDOU NENHUMA CATEGORIA NO GET, IMPRIMIR TODOS OS PRODUTOS.

	$comando = "SELECT nome,id FROM produtos";

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$display = mysqli_query($GLOBALS['dao'], $comando);

	//echo "<table border=5>";
	//echo "<th> IMAGEM </th>";
	//echo "<th> NOME </th>";

	while ($coluna = mysqli_fetch_array($display)) { // CADA COLUNA PRA SER PREENCHIDA É UM <tr>, CADA VALOR DESSA COLUNA É UM <td>
		echo "<ul class='list-group'>";
		//echo "<tr>";
		echo "<li class='list-group-item d-flex justify-content-between align-items-center'>". 
		"<a href=# onclick=exibirProdutoDetails($coluna[id])>".
		getImagemProduto($coluna['id']) . 
		"</a>". 
		"<span class='spanProdutos'> ANUNCIANTES : </span>". 
		"<span class='badge badge-primary badge-pill'>". 
		getNumeroAnunciantes($coluna['id']) . 
		"</span>" . 
		"</li>";
		//echo "<td>". "<a href=# onclick=exibirProdutoDetails($coluna[id])>".getImagemProduto($coluna['id']) . "</a>". "</td>"; // IMAGEM COM LINK
		//echo "<td>". getImagemProduto($coluna['id']) . "</td>"; // IMAGEM SEM LINK
		echo "<li class='list-group-item'>" .
		 mb_strtoupper($coluna['nome']) . 
		// "<span class='badge badge-primary badge-pill'>14</span>".
		 "</li>";

		//echo "</tr>";

		echo "</ul>";

		echo "<br>";
	}

	echo "</table>";

}else{ //MANDOU CATEGORIA, ou um array de categorias


	$cat = $_GET['categoria'];

	$array = explode(',', $cat);

	$comando = "SELECT * FROM produtos WHERE categoria IN (".implode(',',$array).")";


	//echo $sql;

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$display = mysqli_query($GLOBALS['dao'],$comando);

	//echo "<table border=5>";
	//echo "<th> IMAGEM </th>";
	//echo "<th> NOME </th>";

	while ($coluna = mysqli_fetch_array($display)) { // CADA COLUNA PRA SER PREENCHIDA É UM <tr>, CADA VALOR DESSA COLUNA É UM <td>
		//echo "<tr>";

		echo "<ul>";

		//echo "<td>". "<a href=produto?idProduto=$coluna[id]>".getImagemProduto($coluna['id']) . "</a>". "</td>"; // IMAGEM COM LINK
		//echo "<td>". getImagemProduto($coluna['id']) . "</td>"; // IMAGEM SEM LINK
		echo "<li>". "<a href=# onclick=exibirProdutoDetails($coluna[id])>".getImagemProduto($coluna['id']) . "</a>". "</li>";
		echo "<li>" . mb_strtoupper($coluna['nome']) . "</li>";

		echo "</ul>";
	}

	//echo "</table>";


}

echo "</div>";


?>