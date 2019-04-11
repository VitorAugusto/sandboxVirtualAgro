<?php
include_once('tools.php');

$categoria =  $_POST['categoria'];
$produto = $_POST['produto'];
$medida = $_POST['medida'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php
	echo "<ul class='list-group'>";
	echo "<li class='list-group-item d-flex justify-content-between align-items-center'> " . getImagemProduto(getIdProdutoPeloNome($produto)) . "</li>";
	echo "<li class='list-group-item d-flex justify-content-between align-items-center'> " . 
	"<span class='badge badge-primary badge-pill' name='nomeProduto'>". $produto . "</span>".
	"<span class='badge badge-primary badge-pill' name='nomeProduto'>". $medida . "</span>"
	. "</li>";

	echo "</ul>";

	?>
	<p></p>


	<h5>Preço</h5>
	R$<input type="text" name="valor" placeholder="PREÇO" onKeyPress="return(moeda(this,'.',',',event))" id="preco" required="">
	<p></p>
	<h6>Mais algum detalhe ?</h6>
	<div class="form-group basic-textarea rounded-corners">
		<textarea class="form-control z-depth-1" id="obs" rows="3" name="observacao" placeholder="Detalhes...observações..."></textarea>
	</div>
	<input type="button" name="publicarButton" value="PUBLICAR" placeholder="PUBLICAR" class="btn btn-success" onclick="final()" id="botaoPublicar"> 
	<input type="button" name="prev" class="prev acao" value="VOLTAR">


</body>

</html>