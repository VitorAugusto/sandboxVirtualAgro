<!DOCTYPE html>
<html>
	<?php
		session_start();
	?>
	<head>
		<title>PRÈ-ANÚNCIO - VIRTUAL AGRO</title>
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
				<?php
					if((!isset ($_SESSION['id']))){ //CASO NÃO ESTEJA LOGADO
						unset($_SESSION['nome']);
						unset($_SESSION['id']);
						header('location:index.php');
						ECHO "VOCÊ NÃO ESTÁ LOGADO !";
						header('location:index.php');
					}

					$meuNome = $_SESSION['nome'];
					$produto = $_POST['produto'];
					$atributo = $_POST['atributo'];
					$observacao = $_POST['textoAnuncio'];

					$textoAnuncioMontado = "VENDO ". $produto;

					switch($atributo){

						case 'kg':
							$textoAnuncioMontado = $textoAnuncioMontado . " POR QUILO.";
							break;
						case 'un':
							$textoAnuncioMontado = $textoAnuncioMontado . " POR UNIDADE.";
							break;
						case '1/2kg':
							$textoAnuncioMontado = $textoAnuncioMontado . " NO MEIO QUILO (1/2KG).";
							break;
						case 'pacote':
							$textoAnuncioMontado = $textoAnuncioMontado . " POR PACOTE.";
							break;
						case 'bandeja':
							$textoAnuncioMontado = $textoAnuncioMontado . " NA BANDEJA.";
							break;
					}
				?>

				<h2>PÁGINA DE PRÉ ANÚNCIO.<
					<h1> NOME DO AGRICULTOR </h1>

					<?php
						echo $meuNome;
					?>

					<h1> PRODUTO </h1>

					<?php
						echo $produto;
					?>

					<h1> CONTATO DO AGRICULTOR </h1>
					<?php
						echo rand();
					?>
					<h2> CONTEÚDO DO ANÚNCIO</h2>
					<?php
						echo $textoAnuncioMontado;
						echo "<br>";

						echo "-X-X-X-X- OBSERVAÇÃO -X-X-X-X-";
						echo "<br>";
						echo $_POST['textoAnuncio'];
					?>
				</h2>

				<form action="postAnuncio.php" method="post">
					<input type="hidden" name="produto" value="<?php echo $produto  ?>">
					<input type="hidden" name="conteudo" value="<?php  echo $textoAnuncioMontado ?>">
					<input type="hidden" name="observacao" value="<?php  echo $observacao ?>">
					<button>PUBLICAR ANÚNCIO</button>
				</form>

				<h2> <a href='site.php'> VOLTAR </a> </h2>				
				
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