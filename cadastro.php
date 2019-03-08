<!DOCTYPE html>
<html>
<head>
	<title>CADASTRO</title>
</head>
<body>

	<form action="accessManager.php?tipoOperacao=cadastro" method="POST">
		<label>NOME</label>
		<input type="text" name="campoNome" required="">
		<br>
		<br>
		<label>NOME PARA LOGIN(username)</label>
		<input type="text" name="campoUsername" required="">
		<br>
		<br>
		<label>SENHA</label>
		<input type="password" name="campoSenha" required="">

		<br>
		<br>
		<input type="submit" name="">

		
	</form>

	<?php
	
	?>

</body>
</html>