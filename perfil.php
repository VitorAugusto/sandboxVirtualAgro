<!DOCTYPE html>
<html>
<head>
	<title>PERFIL AGRICULTOR - Virtual Agro</title>
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
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2"></script>
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

			<h1 class='chamadaPrincipal'>Perfil do Agricultor</h1>

			<?php
			$infoPerfil = '';
			if(perfilExiste($_GET['id'])){
				$infoPerfil = getAllInfoPerfil($_GET['id']);
			}else{
				echo "NÃO HÁ CADASTRO";
				header('location:index.php');
			}

			function split_name($name) {
				$name = trim($name);
				$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
				$first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
				return array($first_name, $last_name);
			}
			?>


			<div class="telaAnuncio">

					<h3> NOME DO AGRICULTOR </h3>


					<?php
					echo $infoPerfil['nome'];

					$nomeCompleto = split_name($infoPerfil['nome']);
					$primeiroNome = $nomeCompleto[0];
					$segundoNome = $nomeCompleto[1];

					?>

					<h3> REGIÃO </h3>

					<p id="regiao"></p> <!-- AQUI SERÁ INSERIDO A REGIÃO DO AGRICULTOR-->

					<h3> CONTATO DO AGRICULTOR </h3>

					<?php
								$telefone = $infoPerfil['telefone'];
								$telefoneFull = "55".$telefone;
								$ddd = substr($telefone, 0, 2);
								$numero = substr($telefone, 2);
								echo '(' . $ddd . ')' . " ".$numero;

								$textoBasico = "Olá, quero saber mais sobre seus produtos anunciados no VirtualAgro.net ";

					?>

					<input type="hidden" name="ddd" id="ddd" class="ddd" value="<?php echo $ddd ?>">

					<a href='https://api.whatsapp.com/send?phone=<?php echo $telefoneFull ?>&text=<?php echo $textoBasico ?>'>
						<span><i class='fab fa-whatsapp'></i></span>
					</a> 
					<br>
						<a href='tel:<?php echo $telefoneFull ?>' class='btn btn-info btn-lg'>
			<span class='glyphicon glyphicon-earphone'></span> LIGAR
			</a>

			<h3>DIVULGAR</h3>
			<?php
			//$linkPerfil = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=".$_GET['id'];
			$linkPerfil = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=".$_GET['id'];


			$linkencoded = urlencode($linkPerfil);

			$textoCompartilhar = '';
			if (isset($_SESSION['id'])) {
				if ($_SESSION['id'] == $_GET['id']) {
				$textoCompartilhar = "Olá, visite minha tenda de frutas,verduras e legumes ! " . $linkPerfil ;	
				}else{
					$textoCompartilhar = "Olá, visite a tenda de frutas,verduras e legumes do " . $primeiroNome . " ! " . $linkPerfil ;
				}
			}else{
				$textoCompartilhar = "Olá, visite a tenda de frutas,verduras e legumes do " . $primeiroNome . " ! " . $linkPerfil ;
			}
			?>
				<a href='https://wa.me/?text=<?php echo $textoCompartilhar ?>' target=_blank> 
					<span><i class='fab fa-whatsapp'></i></span>
				</a> 
				<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo $linkencoded ?>&layout=button&size=large&width=117&height=28&appId" width="117" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

			<h3 style="text-align: center;font-size: 25px;font-weight: bold;"> ANÚNCIOS DE <?php  echo $primeiroNome ?> : </h3>

					<?php

						$meusAnuncios = getAllMeusAnuncios($_GET['id']);

						while($coluna = mysqli_fetch_array($meusAnuncios)) {
							echo "<div class='meuAnuncio2'>";
							$idProd = $coluna['id_produto'];
							echo "<div class='borda'>";
							echo "<div>"; //
							echo "<a href='anuncio.php?idAnuncio={$coluna['id']}'>";
							echo getImagemProduto($idProd);
							echo "</a>";
							echo "</div>"; //
							echo "</div>"; //
							echo "<h3>"; //
							echo getNomeProdutoPeloID($idProd);
							echo "</h3>";
							//echo "<div class='info'>"; //
							//echo "<b>CATEGORIA </b>" . "<p>". $coluna['categoria'] ;
							//echo "</div>"; //
							echo "<div class='info'>"; //
							echo "<b>CONTEÚDO</b>" . "<p>". $coluna['observacao'];
							echo "</div>"; //

							echo "<div class='info'>"; //
							echo "<b>PREÇO</b>" . "<p> R$". $coluna['preco'];
							echo "</div>"; //

							echo "<div class='visitar'>"; //
							echo "<a href='anuncio.php?idAnuncio={$coluna['id']}'> VISITAR ANÚNCIO </a>";
							echo "</div>"; //
							echo "</div>";
						}

					?>

				</div>

				<script type="text/javascript" src="js/getRegiaoUnica.js"></script>

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