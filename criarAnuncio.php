<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>

	<?php
	include_once('tools.php');

  session_start();

  if((!isset ($_SESSION['id']))) //CASO NÃO ESTEJA LOGADO
{
  unset($_SESSION['nome']);
  unset($_SESSION['id']);
  header('location:index.php');
  ECHO "VOCÊ NÃO ESTÁ LOGADO !";
  header('location:index.php');
  }
  ?>



	<form action="preAnuncio.php" method="post">

		<label> QUERO ANUNCIAR </label>
		 <select>
		 	<option value="">--</option>
		 	<!-- VAI CONSTRUIR OS OPTION -->
		 	<?php
		 	listarTodosProdutos();

		 	?>
		 </select>
		 <br>

		 <input type="radio" name="atributo"> KG
		 <input type="radio" name="atributo"> UNIDADE
		 <input type="radio" name="atributo"> 1/2KG
		 <input type="radio" name="atributo"> PACOTE
		 <input type="radio" name="atributo"> BANDEJA

<!-- 		<label>TIPO DO PRODUTO</label>
		<select name="tipoProduto" required="">
			<option value="">----</option>
			<option value="FRUTA">FRUTA</option>
			<option value="VERDURA">VERDURA</option>
			<option value="LEGUME">LEGUME</option>
			<option value="TEMPERO">TEMPERO</option>
			<option value="OUTRO">OUTRO</option>
		</select>

		<br>

		<label>TEXTO DO ANÚNCIO</label>
		<input type="text" name="textoAnuncio" required="">
		<br>
		<input type="submit" name="">
		<br> -->
	</form>

	<h2> <a href='site.php'> VOLTAR </a> </h2>



</body>
</html>