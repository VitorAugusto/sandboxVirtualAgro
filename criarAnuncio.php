<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>

	<?php

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
		<label>TIPO DO PRODUTO</label>
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
		<br>
	</form>

	<h2> <a href='site.php'> VOLTAR </a> </h2>



</body>
</html>