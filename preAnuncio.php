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

  $meuNome = $_SESSION['nome'];
  $produto = $_POST['produto'];
  $atributo = $_POST['atributo'];
  $observacao = $_POST['textoAnuncio'];

  $textoAnuncioMontado = "VENDO ". $produto;

  switch($atributo){

  	case 'kg':
  		$textoAnuncioMontado = $textoAnuncioMontado . " POR QUILO.";
  		break;
  	case 'un':
  		$textoAnuncioMontado = $textoAnuncioMontado . " POR UNIDADE.";
  		break;
  	case '1/2kg':
  		$textoAnuncioMontado = $textoAnuncioMontado . " NO MEIO QUILO (1/2KG).";
  		break;
  	case 'pacote':
  		$textoAnuncioMontado = $textoAnuncioMontado . " POR PACOTE.";
  		break;
  	case 'bandeja':
  		$textoAnuncioMontado = $textoAnuncioMontado . " NA BANDEJA.";
  		break;
  }


	?>

	<h2>
		PÁGINA DE PRÉ ANÚNCIO.

		<h1> NOME DO AGRICULTOR </h1>

	<?php

	echo $meuNome;

	?>

	<h1> PRODUTO </h1>

	<?php

	echo $produto;

	?>
	<h1> CONTATO DO AGRICULTOR </h1>
	<?php

	echo rand();

	?>
	<h2> CONTEÚDO DO ANÚNCIO</h2>

	<?php


	echo $textoAnuncioMontado;
	echo "<br>";

	echo "-X-X-X-X- OBSERVAÇÃO -X-X-X-X-";
    echo "<br>";
	echo $observacao;

	?>

	</h2>

	  
	  <br>

	  <form action="postAnuncio.php" method="post">
	  	<button>PUBLICAR ANÚNCIO</button>
	  </form>

 <h2> <a href='site.php'> VOLTAR </a> </h2>
	  

</body>
</html>