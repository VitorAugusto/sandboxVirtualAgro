<!DOCTYPE html>
<html>
    <head>
	<title>TODOS OS ANÚNCIOS - VIRTUAL AGRO</title>
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
                <h2> <a href='site.php'> VOLTAR </a> </h2>
                <h1 class='chamadaPrincipal'>Todos os Anuncios</h1>
                <div class='telaAnuncio'>
                <?php

                $allAnuncios = getAllAnunciosDESC();
                    
                    while($coluna = mysqli_fetch_array($allAnuncios)){
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

                        if(isset($_SESSION['id'])){ //CASO ESTEJA LOGADO
                            if(meuAnuncio($coluna['id_anunciante'], $_SESSION['id'])){ //CASO APAREÇA ALGUM ANÚNCIO DELE NA PÁGINA - TODOS OS ANÚNCIOS-
                                echo "<div class='editar'>"; //
                                echo "<a href='editarAnuncio.php?idAnuncio={$coluna['id']}'> EDITAR ANÚNCIO </a>";
                                echo "</div>"; //
                                echo "<div class='excluir'>"; //
                                echo "<a href='excluirAnuncio.php?idAnuncio={$coluna['id']}'> EXCLUIR ANÚNCIO </a>";
                                echo "</div>"; //
                            }
                        }
                        echo "</div>"; 
                    }

                    echo "<h2> <a href='site.php'> VOLTAR </a> </h2>";

                ?>
                                                        <hr style="border-width: 4px;">
                    <p style="font-size: small;">
                        * As imagens dos produtos são meramente ilustrativas e não representam o produto final.
                    </p>
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