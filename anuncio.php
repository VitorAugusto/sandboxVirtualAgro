<!DOCTYPE html>
<html>
	<head>
		<?php
			include_once('tools.php');

			if(anuncioExiste($_GET['idAnuncio'])){
			}else{

				ECHO "ANÚNCIO NÃO EXISTE";
				header('location:index.php');
			}

			$comandoSelectAnuncio = "SELECT * from anuncios WHERE id = '$_GET[idAnuncio]'";
			mysqli_query($GLOBALS['dao'], "set names 'utf8'");
			$displayAnuncio = mysqli_query($GLOBALS['dao'], $comandoSelectAnuncio);
			$colunaAnuncio = mysqli_fetch_array($displayAnuncio);
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
				<div class="telaAnuncio">
					<?php
						$comandoGetIdProduto = "SELECT id_produto FROM anuncios WHERE id = '$_GET[idAnuncio]'";

						$display = mysqli_query($GLOBALS['dao'], $comandoGetIdProduto);
						echo "<div class='borda'>";
						echo getImagemProduto(mysqli_fetch_row($display)[0]);
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

					<h3> CONTATO DO AGRICULTOR </h3>

					<?php
								$telefone = getTelefone($colunaAnuncio['id_anunciante']);
								$ddd = substr($telefone, 0, 2);
								$numero = substr($telefone, 2);
								echo '(' . $ddd . ')' . " ".$numero ;
					?>

					<h3> CONTEÚDO DO ANÚNCIO</h3>

					<?php
						echo $colunaAnuncio['texto_anuncio'];
					?>
				</div>
				<h2> <a href='<?php  echo $_SERVER['HTTP_REFERER'] ?>'> VOLTAR </a> </h2>
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