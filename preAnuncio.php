<?php
include_once('tools.php');

$categoria =  $_POST['categoria'];
$produto = $_POST['produto'];
$medida = $_POST['medida'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>

	</title>
</head>
<body>
	<?php
	echo "<div class='borda'> " . getImagemProduto(getIdProdutoPeloNome($produto)) . "</div>";
	echo "<h1>".$produto."</h1>";

	echo "<h4>R$ / ".$medida."</h4>" .
	"<input type='text' name='valor' placeholder='PREÇO' id='preco' required='' onKeyPress=return(moeda(this,'.',',',event))>".
	"<h4>Mais algum detalhe?</h4>".
	"<div class='form-group basic-textarea rounded-corners'>".
	"<textarea class='form-control z-depth-1' id='obs' rows='3' name='observacao' placeholder='Detalhes...observações...'></textarea>".
	"</div>".
	"<input type='button' name='publicarButton' value='PUBLICAR' placeholder='PUBLICAR' class='btn btn-success' onclick='final()' id='botaoPublicar'>" .
	"<input type='button' name='prev' class='prev acao' value='VOLTAR'>";

	?>
	
</body>
</html>


