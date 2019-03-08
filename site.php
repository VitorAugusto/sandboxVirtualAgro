<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  

  <title>
    

  </title>
</head>
<body>
  <?php

  session_start();

  if((!isset ($_SESSION['id']))) //SE USUÁRIO NÃO ESTIVER LOGADO , SE O ID NÃO ESTIVER NA SESSÃO.
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  unset($_SESSION['nome']);
  unset($_SESSION['id']);
  header('location:index.php');
  }

  echo "BEM VINDO AO SITE";
  echo "<br>";
  echo $_SESSION['nome'];
  echo "<br>";
  echo "SEU ID : ". $_SESSION['id'];


  ?>
  <br>
  <a href="criarAnuncio.php">
    CRIAR ANÚNCIO
  </a>
<br>
  <a href="meusAnuncios.php">
    MEUS ANÚNCIOS
  </a>

  <br>
  <a href="allAnuncios.php">
    TODOS OS ANÚNCIOS
  </a>
<br>
<br>
<br>
    <a href="logout.php">
    DESLOGAR
  </a>



</body>
</html>