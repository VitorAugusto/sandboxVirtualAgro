<?php 
//EU SOU O GERENCIADOR DE ACESSO AO SITE.

//GERENCIO O LOGIN E O CADASTRO.

include ('tools.php');

session_start();
session_regenerate_id(true);



$tipoOperacao = $_GET['tipoOperacao'];


switch ($tipoOperacao) {

	case 'login':

$login = $_POST['campoUsername'];
$senha = $_POST['campoSenha'];


$result = mysqli_query($GLOBALS['dao'], "SELECT * FROM cadastros WHERE username = '$login' AND senha = '$senha'");



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

		break;

	case 'cadastro':

$nome = $_POST["campoNome"];
$username = $_POST["campoUsername"];
$senha = $_POST["campoSenha"];


mysqli_query($GLOBALS['dao'],"INSERT INTO cadastros(nome, username, senha) VALUES ('$nome','$username','$senha')");
$_SESSION['login'] = $username;
$_SESSION['senha'] = $senha;
$_SESSION['nome'] = $nome;
$_SESSION['id'] = getId($username, $senha);
header('location:site.php'); //CADASTRO EFETUADO COM SUCESSO.
		break;
}

 ?>