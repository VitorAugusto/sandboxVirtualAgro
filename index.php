<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>LOGIN - Virtual Agro</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" sizes="64x64" href="imagens/logo/virtual-agro-logo-png.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<!-- ESSE NOVO LINK PRO NOSSO CSS IMPEDE AQUELE BUG QUE A GENTE MUDAVA NO CSS, MAS NÃO MUDAVA NO SITE. -->
	<!-- REPLICAR EM TODAS AS PÁGINAS INTERATIVAS -->
    <meta name="viewport" content="width=device-width, initial-scale=0.7">

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

					if((isset ($_SESSION['id']))){ //SE JÁ ESTIVER LOGADO, NÃO VAI PRA PÁGINA DE LOGIN

						header('location:site.php');
					}
					?>

					<form id="formLogin" name="formLogin" method="post">	
						<div class="erro" id="mensagem" style="width: fit-content; margin: auto">
							<!-- CAMPO DE MENSAGEM DE ERRO -->
						</div>


						<div class="login-senha">
							<input type="tel" name="telefone" placeholder="TELEFONE" maxlength="15" id="telefone">
							<button class="login" type="submit" disabled="disabled">
								<i class="fas fa-user"></i>
							</button>
						</div>			
						<div class="login-senha">
<!-- 							<input type="tel" onKeyPress="if(this.value.length==2) return false;" />
							<input type="text" pattern="\d*" maxlength="2"> -->
							<input type="number" pattern="\d*" name="pin" id="pin" placeholder="PIN DE ACESSO" onKeyPress="if(this.value.length==4) return false;" style="-webkit-text-security: disc;"> <!-- INPUT PIN DEFINITIVO -->

							<!-- <input type="tel" name="pin" placeholder="PIN DE ACESSO" maxlength="4"  pattern="[0-9]*" id="pin"> -->
							<button class="login" type="submit" disabled="disabled">
								<i class="fas fa-key"></i>
							</button>
						</div>

						<input class="entrar" type="button" id="botao" value="ENTRAR">
					</form>


					<script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.min.js"></script>
					<script type="text/javascript" src="js/functions-login.js?v=<?php echo time(); ?>"></script>

					<h3>Não é cadastrado?</h3>
					<a href='cadastro.php' class='btn btn-info btn-lg'>
						<span class='glyphicon glyphicon-earphone'></span> CADASTRO
					</a>

					<h4> QUER VER TODOS OS ANÚNCIOS?</h4>
					<a href='allAnuncios.php' class='btn btn-info btn-lg'>
						<span class='glyphicon glyphicon-earphone'></span> TODOS OS ANÚNCIOS
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