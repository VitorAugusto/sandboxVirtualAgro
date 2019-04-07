<!DOCTYPE html>

<html>
<?php 

include_once('tools.php');
session_start();

?>
<head>
	<title>EDITAR ANÚNCIO - VIRTUAL AGRO</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" sizes="64x64" href="imagens/logo/virtual-agro-logo-png.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=0.7">

</head>
<body>
	<header class="navigation">
		<div class="container-header">
			<div class="left-side">
				<button type="button" class="btn-menu">
					<span class="icon-menu">
						<i class="fa fa-bars"></i>
					</span>
					<span class="text-menu">MENU</span>

					<?php 
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
	<?php

	if(!anuncioExiste($_GET['idAnuncio']) AND !meuAnuncio(getIdAnuncianteIdAnuncio($_GET['idAnuncio']), $_SESSION['id'])){ //VERIFICA SE É MEU ANÚNCIO

		ECHO "ESSE ANÚNCIO NÃO TE PERTENCE OU NÃO EXISTE";
		header('location: meusAnuncios.php');

	}

	?>
	<div class="all">
		<section class="conteudo">
			<h2> <a href='<?php  echo $_SERVER['HTTP_REFERER'] ?>'> VOLTAR </a> </h2>
			<form action="newEditarAnuncio.php" method="post">

				<input type="hidden" id="idanunciohelper" name="idanunciohelper" value="<?php  echo $_GET['idAnuncio']; ?>">
				<p>
					<p></p>


					<h5> MUDAR A MEDIDA </h5>
					<div class="linha">
						<div class="check-box">
							<input id="KG" class="" type="radio" name="medida" value="KG" alt="Kg">
							<label for="">
								<span class="icon-menu"><span class="icon"></span></span>
								<span class="icon-text"><b>KG</b></span>
							</label>
						</div>                    
						<div class="check-box">
							<input id="UNIDADE" class="" type="radio" name="medida" value="UNIDADE" alt="Unidade">
							<label for="">
								<span class="icon-menu"><span class="icon"></span></span>
								<span class="icon-text">UNIDADE</span>
							</label>
						</div>
						<div class="check-box">
							<input id="1/2KG" class="" type="radio" name="medida" value="1/2KG" alt="1/2kg">
							<label for="">
								<span class="icon-menu"><span class="icon"></span></span>
								<span class="icon-text">1/2KG</span>
							</label>
						</div>
						<div class="check-box">
							<input id="PACOTE" class="" type="radio" name="medida" value="PACOTE" alt="Pacote">
							<label for="">
								<span class="icon-menu"><span class="icon"></span></span>
								<span class="icon-text">PACOTE</span>
							</label>
						</div>
						<div class="check-box">
							<input id="BANDEJA" class="" type="radio" name="medida" value="BANDEJA" alt="Bandeja">
							<label for="">
								<span class="icon-menu"><span class="icon"></span></span>
								<span class="icon-text">BANDEJA</span>
							</label>
						</div>												
					</div>

					<h6>Mais algum detalhe ?</h6>
					<div class="form-group basic-textarea rounded-corners">
						<textarea class="form-control z-depth-1" id="obs" rows="3" name="observacao" placeholder="Detalhes...observações..."></textarea>
					</div>


					<h5>Preço</h5>
					R$<input type="text" name="valor" placeholder="PREÇO" onKeyPress="return(moeda(this,'.',',',event))" id="preco" required="" onfocus="this.value=''">




					<button class="buscar" type="submit">
						<span class="icon-text">ENVIAR</span>
						<span class="icon-menu"><i class="fa fa-chevron-circle-right"></i></span>
					</button>

					<script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.min.js"></script>
					<script type="text/javascript" src="js/functions-editarAnuncio.js?v=<?php echo time(); ?>"></script>
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
	</body>
	</html>