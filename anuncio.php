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

			
			function split_name($name) {
				$name = trim($name);
				$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
				$first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
				return array($first_name, $last_name);
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

					<?php
					$nomeProduto = getNomeProdutoPeloID($colunaAnuncio['id_produto']);
					?>
					<h3 style="text-transform: uppercase;font-size: 30px;font-weight: bolder; text-align: center;"><?php echo $nomeProduto ?></h3>


					<h3> NOME DO AGRICULTOR </h3>
					<?php

                    $nomeCompleto = split_name(nomeDoAnunciante($colunaAnuncio['id_anunciante']));

                    $primeiroNome = $nomeCompleto[0];
                    $segundoNome = $nomeCompleto[1];
                    ?>



					<?php
					echo $primeiroNome . " " . $segundoNome;
					?>

					<h3> REGIÃO </h3>

					<p id="regiao"></p> <!-- AQUI SERÁ INSERIDO A REGIÃO DO AGRICULTOR-->


					<h3> CATEGORIA </h3>

					<?php
						echo $colunaAnuncio['categoria'];
					?>

					<h3> PREÇO </h3>

					<?php
					echo "R$ ". $colunaAnuncio['preco'] ." - ". $colunaAnuncio['texto_anuncio'];
					?>

					<h3> CONTATO DO AGRICULTOR </h3>

					<?php
								$telefone = getTelefone($colunaAnuncio['id_anunciante']);
								$telefoneFull = "55".$telefone;
								$ddd = substr($telefone, 0, 2);
								$numero = substr($telefone, 2);
								echo '(' . $ddd . ')' . " ".$numero ;

								$textoBasico = "Olá, quero saber mais sobre seu anúncio de ". mb_strtoupper($nomeProduto) ." no VirtualAgro.net ";

					?>

					<input type="hidden" name="ddd" id="ddd" class="ddd" value="<?php echo $ddd ?>">
					<br>
						<a href='tel:<?php echo $telefoneFull ?>' class='btn btn-info btn-lg'>
			<span class='glyphicon glyphicon-earphone'></span> LIGAR
			</a>
								<a href='https://api.whatsapp.com/send?phone=<?php echo $telefoneFull ?>&text=<?php echo $textoBasico ?>'>
						<span><i class='fab fa-whatsapp'></i></span>
					</a>

					<h3> CONTEÚDO DO ANÚNCIO</h3>

					<?php
						echo $colunaAnuncio['observacao'];
					?>

					<h3>DIVULGAR</h3>

					<?php
					$linkAnuncio = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?idAnuncio=".$_GET['idAnuncio'];
					$linkencoded = urlencode($linkAnuncio);

					$textoCompartilhar = '';
					if (isset($_SESSION['id'])) {
						if ($_SESSION['id'] == $_GET['idAnuncio']) {
							$textoCompartilhar = "Olá, visite meu anúncio no VirtualAgro ! " . $linkAnuncio ;	
						}else{
							$textoCompartilhar = "Olá, visite o anúncio de " . $primeiroNome . " no VirtualAgro ! " . $linkAnuncio ;
						}
					}else{
						$textoCompartilhar = "Olá, visite o anúncio de " . $primeiroNome . " no VirtualAgro ! " . $linkAnuncio ;
					}
					?>

					<a href='https://wa.me/?text=<?php echo $textoCompartilhar ?>' target=_blank> 
						<span><i class='fab fa-whatsapp'></i></span>
					</a> 

					<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo $linkencoded ?>&layout=button&size=large&width=117&height=28&appId" width="117" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>


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