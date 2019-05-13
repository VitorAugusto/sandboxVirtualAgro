<!DOCTYPE html>
<html lang="pt-br">
    <head>
	<title>FAQ - VIRTUAL AGRO</title>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" sizes="64x64" href="imagens/logo/virtual-agro-logo-png.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet">
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
				<h1 class="chamadaPrincipal">Manual</h1>
				<div class="faleConosco">
					<p class="p-FaleConosco">O site Virtual Agro foi desenvolvido com o intuito de ajudar os agricultores a vender seus
						produtos. O website tem um funcionamento bem simples com menus intuitivos e de fácil usabilidade,
						as opções são de cadastro, login, criação, edição e exclusão dos anúncios.
					</p>

   					<embed src="manual/manual.pdf" type="application/pdf" width="100%" height="600px" />
				</div>
			</section>
		</div>		               
		<footer>
			<div>
				<a class="brand" href="#">
					<img class="logo" src="./imagens/logo/virtual-agro-logo-png.png" alt="">            
				</a>
				<hr>
				<div class="copyright">Copyright 2019 &copy; <a href="#"><b>Virtual Agro</b></a>.</div>
			</div>
		</footer>
    </body>
</html>