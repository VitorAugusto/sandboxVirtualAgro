<!DOCTYPE html>
<html lang="pt-br">
    <head>
	<title>FALE CONOSCO - VIRTUAL AGRO</title>
		<meta charset="UTF-8">
		<link rel="icon" type="image/png" sizes="64x64" href="imagens/logo/virtual-agro-logo-png.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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
               <h2>FALE CONOSCO</h2>
			   <div class id='menu-anunciante'>
			 <div style="font-size:75px; display:contents;">
			   						<a href='tel:5573999598620' class='btn btn-info btn-lg' style="font-size:50px;">
			                        <span class='glyphicon glyphicon-earphone'></span> LIGAR
			                        </a> 
			</div>
			
			<div style="display:contents;">
								<a href='https://api.whatsapp.com/send?phone=5573999598620&text=PRECISO DE AJUDA NO VirtualAgro.net'>
						        <span><i class='fab fa-whatsapp'></i></span>
					            </a>
			</div>
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