<?php 


session_start();
session_regenerate_id(true);

$login = $_POST['campoUsername'];
$senha = $_POST['campoSenha'];


  $db_host = 'localhost'; //endereço
	$db_database = 'virtualagro'; //banco de dados
	$db_username = 'root';//usuário
	$db_password = ''; //senha


   $minhaConexao = mysqli_connect($db_host,$db_username,$db_password,$db_database);
 


$result = mysqli_query($minhaConexao, "SELECT * FROM cadastros WHERE username = '$login' AND senha = '$senha'");



if(mysqli_num_rows ($result) > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
$_SESSION['nome'] = getNome($login, $senha);
$_SESSION['id'] = getId($login, $senha);
header('location:site.php'); //LOGIN EFETUADO COM SUCESSO - REDIRECIONA PARA O SITE VIRTUAL AGRO
}
else{
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  unset ($_SESSION['nome']);
  unset ($_SESSION['id']);
  header('location:index.php'); // NÃO EXISTE CADASTRO - VOLTA PRA ORIGEM
   
  }

?>