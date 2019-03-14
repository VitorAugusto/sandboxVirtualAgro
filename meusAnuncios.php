<!DOCTYPE html>
<html>
	<head>
	<title>MEUS ANÚNCIOS - VIRTUAL AGRO</title>
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
				</div>                
			</div>            
		</header>
		<div class="all">
			<section class="conteudo">
				<?php 

					if (!isset($_SESSION['id'])) {
						ECHO "ACESSO NÃO AUTORIZADO";
					}else{
						$meuid = $_SESSION['id'];

						$selectMeusAnuncios = "SELECT * from anuncios WHERE id_anunciante = '$meuid'";
						
						mysqli_query($GLOBALS['dao'], "set names 'utf8'");

						$displayMeusAnuncios = mysqli_query($GLOBALS['dao'],$selectMeusAnuncios);

						while($coluna = mysqli_fetch_array($displayMeusAnuncios)) {
							echo "<br>";	
							echo "<div class='container'>";	 //
							echo "<div class='row'>";	 //
							$comandoGetIdProduto = "SELECT id_produto FROM anuncios WHERE id = '$coluna[id]'";  //ESSE MÓDULO AQUI ADICIONA AS IMAGENS NO ALL ANUNCIOS
							$display = mysqli_query($GLOBALS['dao'], $comandoGetIdProduto);
							echo "<div class='col-sm'>"; //
							getImagemProduto(mysqli_fetch_row($display)[0]);
							echo "</div>"; //
							echo "<div class='col-sm'>"; //
							echo "ID DO ANÚNCIO: " . $coluna['id'] ;
							echo "</div>"; //
							echo "<br>";
							echo "<div class='col-sm'>"; //
							echo "ID DO ANUNCIANTE: " . $coluna['id_anunciante'];
							echo "</div>"; //
							echo "<br>";
							echo "<div class='col-sm'>"; //
							echo "CATEGORIA: " . $coluna['categoria'] ;
							echo "</div>"; //
							echo "<br>";
							echo "<div class='col-sm'>"; //
							echo "TEXTO DO ANÚNCIO: " . $coluna['texto_anuncio'];
							echo "</div>"; //
							echo "<br>";
							echo "<div class='col-sm'>"; //
							echo "<a href='anuncio.php?idAnuncio={$coluna['id']}'> VISITAR ANÚNCIO </a>";
							echo "</div>"; //
							echo "<br>";
							echo "<div class='col-sm'>"; //
							echo "---Opções--";
							echo "</div>"; //
							echo "<div class='col-sm'>"; //
							echo "<a href='editarAnuncio.php?idAnuncio={$coluna['id']}'> EDITAR ANÚNCIO </a>";
							echo "</div>"; //
							echo "-";
							echo "<div class='col-sm'>"; //
							echo "<a href='excluirAnuncio.php?idAnuncio={$coluna['id']}'> EXCLUIR ANÚNCIO </a>";
							echo "</div>"; //
							echo "<br>";
							//echo "---------------------------";
							echo "<br>";
							echo "</div>";
							echo "</div>";
						}

						echo "<h2> <a href='site.php'> VOLTAR </a> </h2>";
					}

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