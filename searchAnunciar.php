<?php

//ESSA PÁGINA FAZ TODO O MOTOR DE BUSCA PELA CATEGORIA ESCOLHIDA.

//ESSE PÁGINA ESTÁ ACOPLADA À ANÚNCIAR PRODUTO.


include_once('tools.php');
header("Content-type: image/jpeg");

//echo "<h2> <a href='' onclick=voltar()> VOLTAR </a> </h2>";

echo "<div id=telaprodutos>";

if(empty($_GET['categoria'])){
	// SE NÃO MANDOU NENHUMA CATEGORIA NO GET, IMPRIMIR TODOS OS PRODUTOS.
	header("Content-type: image/jpeg");

	$comando = "SELECT nome,id FROM produtos";

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$display = mysqli_query($GLOBALS['dao'], $comando);

	echo "<table border=5>";
	echo "<th> IMAGEM </th>";
	echo "<th> NOME </th>";

	while ($coluna = mysqli_fetch_array($display)) { // CADA COLUNA PRA SER PREENCHIDA É UM <tr>, CADA VALOR DESSA COLUNA É UM <td>
		//echo "<ul class='list-group'>";
		echo "<tr>";
		// echo "<li class='list-group-item d-flex justify-content-between align-items-center'>". 
		// "<a href=# onclick=exibirProdutoDetails($coluna[id])>".
		// getImagemProduto($coluna['id']) . 
		// "</a>". 
		// "<span class='spanProdutos'> ANUNCIANTES : </span>". 
		// "<span class='badge badge-primary badge-pill'>". 
		// getNumeroAnunciantes($coluna['id']) . 
		// "</span>" . 
		// "</li>";
		//echo "<td>". "<a href=# onclick=exibirProdutoDetails($coluna[id])>".getImagemProduto($coluna['id']) . "</a>". "</td>"; // IMAGEM COM LINK
		echo "<td>". "<a href='#' class='escolherProduto'>". getImagemProduto($coluna['id']) . "</a>" . "</td>"; // IMAGEM SEM LINK
		echo "<td>" .  mb_strtoupper($coluna['nome']) . "</td>";
		// "<span class='badge badge-primary badge-pill'>14</span>".
		// "</li>";

		echo "</tr>";

		//echo "</ul>";

	}

	echo "</table>";

}else{ //MANDOU CATEGORIA, ou um array de categorias

	header("Content-type: image/jpeg");
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

		echo "<ul class='list-group'>";

		//echo "<td>". "<a href=produto?idProduto=$coluna[id]>".getImagemProduto($coluna['id']) . "</a>". "</td>"; // IMAGEM COM LINK
		echo "<li class='list-group-item d-flex justify-content-between align-items-center'>". "<a href='#' class='escolherProduto'>". getImagemProduto($coluna['id']) . 
		"<span class='badge badge-primary badge-pill' name='produto'>". mb_strtoupper($coluna['nome']) . "</span>".
		"</a>" . 
		"</li>";

		//echo "<span class='badge badge-primary badge-pill'>". mb_strtoupper($coluna['nome']) . "</span>";

		//echo "<li name='produto' class='list-group-item'>" . mb_strtoupper($coluna['nome']) . "</li>";

		//echo "</tr>";

		echo "</ul>";
	}

	//echo "</table>";


}

echo "</div>";

?>