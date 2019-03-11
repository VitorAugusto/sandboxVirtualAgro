<html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</html>

<?php 



session_start();

include('tools.php');

if (!isset($_SESSION['id'])) {
	ECHO "ACESSO NÃO AUTORIZADO";
}
else{


   $meuid = $_SESSION['id'];

   $selectMeusAnuncios = "SELECT * from anuncios WHERE id_anunciante = '$meuid'";

   $displayMeusAnuncios = mysqli_query($GLOBALS['dao'],$selectMeusAnuncios);

   	while($coluna = mysqli_fetch_array($displayMeusAnuncios))
{
echo "<br>";	
echo "<div class='container'>";	 //
echo "<div class='row'>";	 //
	$comandoGetIdProduto = "SELECT id_produto FROM anuncios WHERE id = '$coluna[id]'";  //ESSE MÓDULO AQUI ADICIONA AS IMAGENS NO ALL ANUNCIOS
	$display = mysqli_query($GLOBALS['dao'], $comandoGetIdProduto);
	echo "<div class='col-sm'>"; //
	getImagemProduto(mysqli_fetch_row($display)[0]);
	echo "</div>"; //
echo "<div class='col-sm'>"; //
echo "ID DO ANÚNCIO: " . $coluna['id'] ;
echo "</div>"; //
echo "<br>";
echo "<div class='col-sm'>"; //
echo "ID DO ANUNCIANTE: " . $coluna['id_anunciante'];
echo "</div>"; //
echo "<br>";
echo "<div class='col-sm'>"; //
echo "CATEGORIA: " . $coluna['categoria'] ;
echo "</div>"; //
echo "<br>";
echo "<div class='col-sm'>"; //
echo "TEXTO DO ANÚNCIO: " . $coluna['texto_anuncio'];
echo "</div>"; //
echo "<br>";
echo "<div class='col-sm'>"; //
echo "<a href='anuncio.php?idAnuncio={$coluna['id']}'> VISITAR ANÚNCIO </a>";
echo "</div>"; //
echo "<br>";
echo "<div class='col-sm'>"; //
echo "---Opções--";
echo "</div>"; //
echo "<div class='col-sm'>"; //
echo "<a href='editarAnuncio.php?idAnuncio={$coluna['id']}'> EDITAR ANÚNCIO </a>";
echo "</div>"; //
echo "-";
echo "<div class='col-sm'>"; //
echo "<a href='excluirAnuncio.php?idAnuncio={$coluna['id']}'> EXCLUIR ANÚNCIO </a>";
echo "</div>"; //
echo "<br>";
//echo "---------------------------";
echo "<br>";
echo "</div>";
echo "</div>";
}

echo "<h2> <a href='site.php'> VOLTAR </a> </h2>";

}

 ?>