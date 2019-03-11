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
echo "ID DO ANÚNCIO: " . $coluna['id'] ;
echo "<br>";
echo "ID DO ANUNCIANTE: " . $coluna['id_anunciante'];
echo "<br>";
echo "CATEGORIA: " . $coluna['categoria'] ;
echo "<br>";
echo "TEXTO DO ANÚNCIO: " . $coluna['texto_anuncio'];
echo "<br>";
echo "<a href='anuncio.php?idAnuncio={$coluna['id']}'> VISITAR ANÚNCIO </a>";
echo "<br>";
echo "---Opções--";
echo "<a href='editarAnuncio.php?idAnuncio={$coluna['id']}'> EDITAR ANÚNCIO </a>";
echo "-";
echo "<a href='excluirAnuncio.php?idAnuncio={$coluna['id']}'> EXCLUIR ANÚNCIO </a>";
echo "<br>";
echo "---------------------------";
echo "<br>";
}

echo "<h2> <a href='site.php'> VOLTAR </a> </h2>";

}

 ?>