<!DOCTYPE html>
<html>
	<head>
		<?php
			include_once('tools.php');

			$origem = $_SERVER['HTTP_REFERER'];
			$colunaAnuncio = '';

			if(anuncioExiste($_GET['idAnuncio'])){
				//rodar o coletar info anuncio
				$colunaAnuncio = getAllInfoAnuncio($_GET['idAnuncio']);

			}else{

				ECHO "ANÚNCIO NÃO EXISTE";
				header('location:index.php');
			}

		?>

		<title>ANÚNCIO - VIRTUAL AGRO</title>
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
                        }
                    ?>                                       
				</div>                
			</div>            
		</header>
		<div class="all">
			<section class="conteudo">	
				<h2> <a href='<?php  echo $origem ?>'> VOLTAR </a> </h2>
				<div class="telaAnuncio">
					<?php

						echo "<div class='borda'>";
						echo getImagemProduto($colunaAnuncio['id_produto']);
						echo "</div>";

					?>

					<h3> NOME DO AGRICULTOR </h3>

					<?php
						echo nomeDoAnunciante($colunaAnuncio['id_anunciante']);
					?>

					<h3> CATEGORIA </h3>

					<?php
						echo $colunaAnuncio['categoria'];
					?>

					<h3> MEDIDA </h3>

					<?php
					echo $colunaAnuncio['texto_anuncio'];
					?>

					<h3> CONTATO DO AGRICULTOR </h3>

					<?php
								$telefone = getTelefone($colunaAnuncio['id_anunciante']);
								$telefoneFull = "55".$telefone;
								$ddd = substr($telefone, 0, 2);
								$numero = substr($telefone, 2);
								echo '(' . $ddd . ')' . " ".$numero ;

					?>
					<br>
						<a href='tel:<?php echo $telefoneFull ?>' class='btn btn-info btn-lg'>
			<span class='glyphicon glyphicon-earphone'></span> LIGAR
			</a>

					<h3> CONTEÚDO DO ANÚNCIO</h3>

					<?php
						echo $colunaAnuncio['observacao'];
					?>

				</div>
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