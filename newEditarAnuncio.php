<?php

//include_once('tools.php');

include_once('microDAO.php');

echo "<h2>";
echo "</h2>";

echo "ID DO ANÚNCIO PRA MUDAR : " . $_POST['idanunciohelper'];
echo "<br>";
echo "<br>";
echo "MEDIDA : " . $_POST['medida'];
echo "<br>";
echo "OBSERVACAO : " . $_POST['observacao'];
echo "<br>";
echo "PREÇO : " . $_POST['valor'];


$idAnuncio = $_POST['idanunciohelper'];
$medidaProduto = $_POST['medida'];
$observacaoProduto = $_POST['observacao'];
$precoProduto = $_POST['valor'];



$comandoUpdateAnuncio = "UPDATE anuncios SET 
texto_anuncio = '$medidaProduto', 
observacao =  '$observacaoProduto',
preco = '$precoProduto' WHERE id = '$idAnuncio'";

mysqli_query($GLOBALS['daomicro'], "set names 'utf8'");

if(mysqli_query($GLOBALS['daomicro'], $comandoUpdateAnuncio)){
	echo " <h2> EDITADO COM SUCESSO ! </h2>";
	header('location: meusAnuncios.php');
}else{

	echo mysqli_error($GLOBALS['daomicro']);
}


?>