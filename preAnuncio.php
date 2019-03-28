<?php
include_once('tools.php');

$categoria =  $_POST['categoria'];
$produto = $_POST['produto'];
$medida = $_POST['medida'];

?>

<!DOCTYPE html>
<html>
<head>
		<p>TELA DE PRÉ ANÚNCIO</p>
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



  <div class="form-group basic-textarea rounded-corners">
    <textarea class="form-control z-depth-1" id="obs" rows="3" name="observacao"></textarea>
  </div>
 
 <input type="button" name="publicarButton" value="PUBLICAR" placeholder="PUBLICAR" class="btn btn-success" onclick="publicarAnuncio()"> 
 <input type="button" name="prev" class="prev acao" value="VOLTAR">


	</body>

	</html>