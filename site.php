<!DOCTYPE html>
<html>
  <head>
    <title>MEU PERFIL - Virtual Agro</title>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" sizes="64x64" href="imagens/logo/virtual-agro-logo-png.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <!-- ESSE NOVO LINK PRO NOSSO CSS IMPEDE AQUELE BUG QUE A GENTE MUDAVA NO CSS, MAS NÃO MUDAVA NO SITE. -->
    <!-- REPLICAR EM TODAS AS PÁGINAS INTERATIVAS -->
    <meta name="viewport" content="width=device-width, initial-scale=0.7">
    <meta name="theme-color" content="#2a7766">

  </head>
  <body>
    <header class="navigation">
			<div class="container-header">
				<div class="left-side">
					<button type="button" class="btn-menu  js-btn-menu">
					  <span class="icon-menu"><i class="fa fa-bars"></i></span>
					  <span class="text-menu">MENU</span>
            <?php 

              include_once('tools.php');
              session_start();

              if(!isset($_SESSION['id'])){
                  construirMenuLateralSemLogin(); 
              }else{
                  construirMenuLateralComLogin();
              }
            ?>
				  </button>
			  </div>
			  <img class="logo-header" src="imagens/logo/virtual-agro-logo-nome.png">
			  <div class="right-side">    
            <?php
            if(!isset($_SESSION['id'])) {
                construirMenuLogin();
            }else{
                construirLogout();
            }
            ?>                                  
			  </div>                
		  </div>            
		</header>
		<div class="all">
			<section class="conteudo">
        <?php

          if((!isset ($_SESSION['id']))){ //SE USUÁRIO NÃO ESTIVER LOGADO , SE O ID NÃO ESTIVER NA SESSÃO.
            unset($_SESSION['nome']);
            unset($_SESSION['id']);
            header('location:index.php');
          }

          echo "<div class='' id='menu-anunciante'>";
          echo "<h2>Seja Bem-Vindo, <p>",$_SESSION['nome'],", ao</h2>";
          echo "<h1>VIRTUAL AGRO!</h1>";
          echo "<div>";
          echo "<a href='criarAnuncio.php'><span><i class='fas fa-cart-plus'></i></span>CRIAR ANÚNCIO</a>";
          echo "</div>";
          echo "<div>";
          echo "<a href='meusAnuncios.php'><span><i class='fas fa-bullhorn'></i></span>MEUS ANÚNCIOS</a>";
          echo "</div>";
          echo "<div>";
          echo "<a href='allAnuncios.php'><span><i class='fas fa-store'></i></span>TODOS OS ANÚNCIOS</a>";
          echo "</div>";
          echo "<div>";
          echo "<a href='mudarTelefone.php' class=botaoAdicional><img src=imagens/icon/16-512-2.png width=160px>Mudar Telefone</a>";
          echo "</div>";
          echo "<div>";
          echo "<a href='perfil.php?id=$_SESSION[id]' class=botaoAdicional target=_blank><span><i class='fas fa-user'></i></span>Meu Perfil</a>";
          echo "</div>";
          echo "</div>";
        ?>


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