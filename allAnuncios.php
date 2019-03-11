<html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</html>

<?php

include('tools.php');

session_start();


   $selectTodosAnuncios = "SELECT * from anuncios";
   mysqli_query($GLOBALS['dao'], "set names 'utf8'");


   	$displayTodosAnuncios = mysqli_query($GLOBALS['dao'], $selectTodosAnuncios);

   while($coluna = mysqli_fetch_array($displayTodosAnuncios)){

echo "<br>";
echo "<div class='container'>";	 //
echo "<div class='row'>";	 //
//
	$comandoGetIdProduto = "SELECT id_produto FROM anuncios WHERE id = '$coluna[id]'";  //ESSE MÓDULO AQUI ADICIONA AS IMAGENS NO ALL ANUNCIOS
	$display = mysqli_query($GLOBALS['dao'], $comandoGetIdProduto);
	echo "<div class='col-sm'>"; //
	getImagemProduto(mysqli_fetch_row($display)[0]);
	echo "</div>"; //
//
echo "<div class='col-sm'>"; //
echo "ID DO ANÚNCIO: " . $coluna['id'] ;
echo "</div>"; //
echo "<br>";
echo "<div class='col-sm'>"; //
echo "<b>ANUNCIANTE: </b>  "; nomeDoAnunciante($coluna['id_anunciante']); // TEM Q MOSTRAR O NOME DO ANUNCIANTE
echo "</div>"; //
echo "<br>";
echo "<div class='col-sm'>"; //
echo "<b>CATEGORIA: </b>" . $coluna['categoria'] ;
echo "</div>"; //
echo "<br>";
echo "<div class='col-sm'>"; //
echo "<b>TEXTO DO ANÚNCIO: </b>" . $coluna['texto_anuncio'];
echo "</div>"; //
echo "<br>";
echo "<div class='col-sm'>"; //
echo "<a href='anuncio.php?idAnuncio={$coluna['id']}'> VISITAR ANÚNCIO </a>";
echo "</div>"; //
echo "<br>";

if(isset($_SESSION['id'])){ //CASO ESTEJA LOGADO


if(meuAnuncio($coluna['id_anunciante'], $_SESSION['id'])){ //CASO APAREÇA ALGUM ANÚNCIO DELE NA PÁGINA - TODOS OS ANÚNCIOS-
echo "<div class='col-sm'>"; //
echo "---Opções--";
echo "</div>"; //
echo "<div class='col-sm'>"; //
echo "<a href='editarAnuncio.php?idAnuncio={$coluna['id']}'> EDITAR ANÚNCIO </a>";
echo "</div>"; //
//echo "-";
echo "<div class='col-sm'>"; //
echo "<a href='excluirAnuncio.php?idAnuncio={$coluna['id']}'> EXCLUIR ANÚNCIO </a>";
echo "</div>"; //
echo "<br>";
}
}
//echo "---------------------------";
echo "</div>"; // 
echo "</div>"; //
   }

  echo "<br>";
   echo "<h2> <a href='site.php'> VOLTAR </a> </h2>";


?>