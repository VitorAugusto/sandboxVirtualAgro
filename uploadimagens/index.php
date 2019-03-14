<?php

if(isset($_POST['botao'])){

$categoria = $_POST['categoria'];


$db_host = 'localhost'; //endereço
$db_database = 'virtualagro'; //banco de dados
$db_username = 'root';//usuário
$db_password = ''; //senha

$minhaConexao = mysqli_connect($db_host,$db_username,$db_password,$db_database);

for ($i=0; $i < sizeof($_FILES['image']['name']); $i++) { 


	$target = "../"."imagens/". $categoria ."/". basename($_FILES['image']['name'][$i]); // PRA ONDE VAI AS IMAGENS

	$imagem = $categoria ."/". $_FILES['image']['name'][$i];

	$nomeproduto = pathinfo($_FILES['image']['name'][$i], PATHINFO_FILENAME);


	$comandoSQL = "INSERT INTO produtos (nome,categoria,imagemprincipal) VALUES ('$nomeproduto','$categoria','$imagem')";

	mysqli_query($minhaConexao, "set names 'utf8'");

	mysqli_query($minhaConexao,$comandoSQL);

	if(move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)){

		$msg = "SUCESSO";
		echo "<br>";
	}else{
		$msg = "ERRO";
		echo "<br>";
	}

	echo $msg;

}


}


?>

<!DOCTYPE html>
<html>

<head>
	<title>
		Image Upload

	</title>
</head>
<body>

	<h2> PÁGINA PARA ADICIONAR PRODUTOS AO VIRTUAL AGRO - JUNTO COM SUAS IMAGENS</h2>


	<form method="post" action="index.php" enctype="multipart/form-data" >

		<input type="file" name="image[]" required="" multiple="multiple">

		<br>

		<select name="categoria">
			<option value="fruta">FRUTA</option>
			<option value="verdura">VERDURA</option>
			<option value="legume">LEGUME</option>
			<option value="tempero">TEMPERO</option>
			<option value="outro">OUTRO</option>
			<option value="ovo">OVO</option>
			<!-- ajaja -->
			<option value="especiaria">ESPECIARIA</option>
			<option value="cereais e grãos">CEREAIS E GRÃOS</option>
		</select>
		<br>
	    <input type="submit" name="botao">
	</form>

</body>
</html>