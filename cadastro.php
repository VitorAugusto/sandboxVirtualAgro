<!DOCTYPE html>
<html>
	<head>
		<title>CADASTRO</title>
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
				<form action="accessManager.php?tipoOperacao=cadastro" method="POST">
					<div class="login-senha">
						<input type="text" name="campoNome" required="" placeholder="NOME">
						<button class="login" type="submit">
							<i class="fas fa-user-check"></i>
						</button>
					</div>
					<div class="login-senha">
						<input type="text" name="campoUsername" required="" placeholder="USERNAME">
						<button class="login" type="submit">
							<i class="fas fa-user"></i>
						</button>
					</div>
					<div class="login-senha">
					<input type="password" name="campoSenha" required="" placeholder="SENHA">
						<button class="login" type="submit">
							<i class="fas fa-key"></i>
						</button>
					</div>
					<button class="buscar" type="submit">
                		<span class="icon-text">ENVIAR</span>
            	        <span class="icon-menu"><i class="fa fa-chevron-circle-right"></i></span>
        	    	</button>				
				</form>
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

		<?php
		
		?>

	</body>
</html>