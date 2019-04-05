<?php
include_once('tools.php');

$categoria =  $_POST['categoria'];
$produto = $_POST['produto'];
$medida = $_POST['medida'];

?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<link rel="icon" type="image/png" sizes="64x64" href="imagens/logo/virtual-agro-logo-png.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--     <link href="css/style.css" rel="stylesheet"> -->
	<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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
	<input type="button" name="publicarButton" value="PUBLICAR" placeholder="PUBLICAR" class="btn btn-success" onclick="final()"> 
	<input type="button" name="prev" class="prev acao" value="VOLTAR">


</body>

</html>