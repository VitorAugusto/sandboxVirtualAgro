<!DOCTYPE html>
<html>
<?php

session_start();

?>
<head>
	<title>
		


	</title>
</head>
<body>

	<?php

	  if((!isset ($_SESSION['id']))) //CASO NÃO ESTEJA LOGADO
{
  unset($_SESSION['nome']);
  unset($_SESSION['id']);
  header('location:index.php');
  ECHO "VOCÊ NÃO ESTÁ LOGADO !";
  header('location:index.php');
  }


$meuTipoProduto = $_POST['tipoProduto'];
$meuTextoAnuncio = $_POST['textoAnuncio'];
$meuId = $_SESSION['id'];
$meuNome = $_SESSION['nome'];

	?>

	<h2>
		PÁGINA DE PRÉ ANÚNCIO.

		<h1> NOME DO AGRICULTOR </h1>

	<?php
	//echo $colunaAnuncio['id_anunciante'];

	echo $meuNome;

	?>

	<h1> TIPO DE ANÚNCIO </h1>

	<?php

	echo $meuTipoProduto;

	?>
	<h1> CONTATO DO AGRICULTOR </h1>
	<?php

	echo rand();

	?>
	<h2> CONTEÚDO DO ANÚNCIO</h2>

	<?php

	echo $meuTextoAnuncio;

	?>

	</h2>

	  
	  <br>

	  <form action="postAnuncio.php" method="post">
	  	<input type="hidden" name="tipoProduto" value="<?php echo $meuTipoProduto ?>">
	  	<input type="hidden" name="textoAnuncio" value="<?php echo $meuTextoAnuncio ?>">
	  	<button>PUBLICAR ANÚNCIO</button>
	  </form>

 <h2> <a href='site.php'> VOLTAR </a> </h2>
	  

</body>
</html>