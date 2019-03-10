<!DOCTYPE html>
<html>
	<head>
			<title>LOGIN - Virtual Agro</title>
			<meta charset="UTF-8">
			<link rel="icon" type="image/png" sizes="64x64" href="imagens/logo/virtual-agro-logo-png.png">
			<link href="css/style.css" rel="stylesheet">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
				<img class="logo-header" src="imagens/logo/virtual-agro-logo-png.png">
				<div class="right-side">                                        
				</div>                
			</div>            
		</header>
		<div class="all">
			<section class="conteudo">
				<?php

					session_start(); //COMEÇA A SESSÃO 

					if((isset ($_SESSION['id']))){ //SE JÁ ESTIVER LOGADO, NÃO VAI PRA PÁGINA DE LOGIN

						header('location:site.php');
					}

				?>
				
					<form action="accessManager.php?tipoOperacao=login" method="post">				
						<label> LOGIN </label>
						<input type="text" name="campoUsername">
						<br>
						<br>
						<label>SENHA</label>
						<input type="password" name="campoSenha">
						<br>
						<br>
						<button class="buscar" type="submit">
                	    	<span class="icon-text">ENVIAR</span>
            	        	<span class="icon-menu"><i class="fa fa-chevron-circle-right"></i></span>
        	        	</button>
					</form>

				<h1>Não é cadastrado ? </h1>
				<a href="cadastro.php">
					CADASTRO
				</a>

				<H2> QUER VER TODOS OS ANÚNCIOS ? </H2>
				<a href="allAnuncios.php">
					TODOS OS ANÚNCIOS
				</a>
			</section>
		</div>		               
		<footer>
			<div>
				<a class="brand" href="#">
				<img class="logo" src="./imagens/logo/virtual-agro-logo-png.png" alt="">            
				</a>
				<hr>
				<div class="copyright">Copyright 2019 © <a href="#">Virtual Agro</a>.</div>
			</div>
		</footer>
	</body>
</html>