<?php 
//EU SOU O GERENCIADOR DE ACESSO AO SITE.

//GERENCIO O LOGIN E O CADASTRO.

include ('tools.php');

session_start();
session_regenerate_id(true);

$tipoOperacao = $_GET['tipoOperacao'];


switch ($tipoOperacao) {

	case 'login':

  $telefone = $_POST['telefone'];
  $pin = $_POST['pin'];
  $newTel = preg_replace("/[^a-fA-F0-9]/",'',$telefone);

  $comandoLogin = "SELECT id,nome FROM cadastros WHERE telefone = '$newTel' AND pin = MD5('$pin')";

  $displayLogin = mysqli_query($GLOBALS['dao'], $comandoLogin);

  if(mysqli_num_rows($displayLogin)){ //SE VOCÊ TEM CADASTRO;

    $coluna = mysqli_fetch_array($displayLogin);

    $_SESSION['id'] = $coluna['id'];
    $_SESSION['nome'] = $coluna['nome'];

    echo "1"; //CÓDIGO DE SUCESSO

  }else{ //CASO PIN INCORRETO MAS O TELEFONE CERTO


    $comandoChecar = "SELECT id FROM cadastros WHERE telefone = '$newTel'";

    $displayChecar = mysqli_query($GLOBALS['dao'],$comandoChecar);

    if(mysqli_num_rows($displayChecar)){
      echo "2"; //PIN INCORRETO
    }else{
      echo "3"; //CADASTRO NÃO EXISTE
    }

  }


  break;






  case 'cadastro':


  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $newTel = preg_replace("/[^a-fA-F0-9]/",'',$telefone);
  $pin = $_POST['pin'];



  mysqli_query($GLOBALS['dao'], "set names 'utf8'");

  $comandoCadastrar = "INSERT INTO cadastros(nome,telefone,pin) VALUES ('$nome', '$newTel', MD5('$pin'))";

  mysqli_query($GLOBALS['dao'], $comandoCadastrar);

    $_SESSION['id'] = getId($newTel); //get id pelo telefone, e insere na variável de sessão.
    $_SESSION['nome'] = $nome; //variável de sessão nome.

    break;


    case 'consulta':

    $telefone = $_POST['telefone'];
    $newTel = preg_replace("/[^a-fA-F0-9]/",'',$telefone);


    $comandoVerificarTelefone = "SELECT id from cadastros WHERE telefone = '$newTel'";

    $displayVerificarTelefone = mysqli_query($GLOBALS['dao'], $comandoVerificarTelefone);

    if(mysqli_num_rows($displayVerificarTelefone)){
      echo "4"; //NÚMERO JÁ CADASTRADO
    }else{
      echo "5"; //NÚMERO NÃO CADASTRADO
    }

    break;


    case 'atualizar_telefone':
    $telefone = $_POST['telefone'];
    $newTel = preg_replace("/[^a-fA-F0-9]/",'',$telefone);

    $comandoAtualizarTelefone = "UPDATE cadastros SET telefone = '$newTel' WHERE id = $_SESSION[id]";

    mysqli_query($GLOBALS['dao'],$comandoAtualizarTelefone);
    
    break;
  }
  ?>
