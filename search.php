<?php

//$categoria = $_GET['categoria'];

//ESSA PÁGINA FAZ TODO O MOTOR DE BUSCA DE IMAGENS DO PRODUTO PELA CATEGORIA ESCOLHIDA.

include_once('tools.php');

// if(!isset($_GET['categoria'])){
if(empty($_GET['categoria'])){
	// SE NÃO MANDOU NENHUMA CATEGORIA NO GET, IMPRIMIR TODOS OS PRODUTOS.

	$comando = "SELECT nome,id FROM produtos";

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$display = mysqli_query($GLOBALS['dao'], $comando);

	echo "<table border=5>";
	echo "<th> IMAGEM </th>";
	echo "<th> NOME </th>";

	while ($coluna = mysqli_fetch_array($display)) { // CADA COLUNA PRA SER PREENCHIDA É UM <tr>, CADA VALOR DESSA COLUNA É UM <td>
		echo "<tr>";

		echo "<td>". getImagemProduto($coluna['id']) . "</td>";
		echo "<td>" . mb_strtoupper($coluna['nome']) . "</td>";

		echo "</tr>";
	}

	echo "</table>";

}else{ //MANDOU CATEGORIA, ou um array de categorias


	$cat = $_GET['categoria'];

	$array = explode(',', $cat);

	$comando = "SELECT * FROM produtos WHERE categoria IN (".implode(',',$array).")";


	//echo $sql;

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$display = mysqli_query($GLOBALS['dao'],$comando);

	echo "<table border=5>";
	echo "<th> IMAGEM </th>";
	echo "<th> NOME </th>";

	while ($coluna = mysqli_fetch_array($display)) { // CADA COLUNA PRA SER PREENCHIDA É UM <tr>, CADA VALOR DESSA COLUNA É UM <td>
		echo "<tr>";

		echo "<td>". getImagemProduto($coluna['id']) . "</td>";
		echo "<td>" . mb_strtoupper($coluna['nome']) . "</td>";

		echo "</tr>";
	}

	echo "</table>";


}


?>