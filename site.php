<!DOCTYPE html>
<html>
  <head>
    <title>SEU PERFIL - Virtual Agro</title>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" sizes="64x64" href="imagens/logo/virtual-agro-logo-png.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet">

  </head>
  <body>
  <header class="navigation">
				<div class="container-header">
					<div class="left-side">
						<button type="button" class="btn-menu  js-btn-menu">
						<span class="icon-menu"><i class="fa fa-bars"></i></span>
						<span class="text-menu">MENU</span>
					</button>
				</div>
				<img class="logo-header" src="imagens/logo/virtual-agro-logo-nome.png">
				<div class="right-side">                                        
				</div>                
			</div>            
		</header>
		<div class="all">
			<section class="conteudo">
        <?php

          session_start();

          if((!isset ($_SESSION['id']))){ //SE USUÁRIO NÃO ESTIVER LOGADO , SE O ID NÃO ESTIVER NA SESSÃO.
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

        <a href="criarAnuncio.php">
        CRIAR ANÚNCIO
        </a>

        <a href="meusAnuncios.php">
        MEUS ANÚNCIOS
        </a>

        <a href="allAnuncios.php">
        TODOS OS ANÚNCIOS
        </a>

        <a href="logout.php">
        DESLOGAR
        </a>
			</section>
		</div>		               
		<footer>
			<div>
				<a class="brand" href="#">
					<img class="logo" src="./imagens/logo/virtual-agro-logo-png.png" alt="">            
				</a>
				<hr>
				<div class="copyright">Copyright 2019 © <a href="#"><b>Virtual Agro</b></a>.</div>
			</div>
		</footer>
  </body>
</html>