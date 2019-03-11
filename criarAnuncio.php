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
		 <select required="" name="produto">
		 	<option value="">--</option>
		 	<!-- VAI CONSTRUIR OS OPTION -->
		 	<?php
		 	listarTodosProdutos();

		 	?>
		 </select>
		 <br>

		 <input type="radio" name="atributo" value="kg" checked=""> KG
		 <br>
		 <input type="radio" name="atributo" value="un"> UNIDADE
		 <br>
		 <input type="radio" name="atributo" value="1/2kg"> 1/2KG
		 <br>
		 <input type="radio" name="atributo" value="pacote"> PACOTE
		 <br>
		 <input type="radio" name="atributo" value="bandeja"> BANDEJA
		 <br>

		<label>OBSERVAÇÕES</label>
		<!-- <input type="textarea" name="textoAnuncio" required=""> -->
		<textarea name="textoAnuncio"></textarea>
		<br>

		<input type="submit" name="botao">

	</form>

	<h2> <a href='site.php'> VOLTAR </a> </h2>



</body>
</html>