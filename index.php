<!DOCTYPE html>
<html>
<head>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>
		LOGIN
	</title>
</head>
<body>

	<?php

  session_start(); //COMEÇA A SESSÃO 

  if((isset ($_SESSION['id']))){ //SE JÁ ESTIVER LOGADO, NÃO VAI PRA PÁGINA DE LOGIN

      header('location:site.php');
   }

    ?>

    <div>

	<form action="accessManager.php?tipoOperacao=login" method="post">
		
		<label> LOGIN </label>
		<input type="text" name="campoUsername">
		<br>
		<br>
		<label>SENHA</label>
		<input type="password" name="campoSenha">
		<br>
		<br>
		<input type="submit" name="ENVIAR">
	</form>
</div>

	<h1>Não é cadastrado ? </h1>
	<a href="cadastro.php">
		CADASTRO
	</a>

	<H2> QUER VER TODOS OS ANÚNCIOS ? </H2>
	  <a href="allAnuncios.php">
    TODOS OS ANÚNCIOS
  </a>

</body>
</html>