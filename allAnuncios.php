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
                <?php


                    $selectTodosAnuncios = "SELECT * from anuncios ORDER BY id DESC";
                    mysqli_query($GLOBALS['dao'], "set names 'utf8'");

                    $displayTodosAnuncios = mysqli_query($GLOBALS['dao'], $selectTodosAnuncios);
                    
                    while($coluna = mysqli_fetch_array($displayTodosAnuncios)){
                        echo "<a href='anuncio.php?idAnuncio={$coluna['id']}'>";
                        echo "<ul class='list-group' id='ulAnuncio'>";
                        $comandoGetIdProduto = "SELECT id_produto FROM anuncios WHERE id = '$coluna[id]'";  //ESSE MÓDULO AQUI ADICIONA AS IMAGENS NO ALL ANUNCIOS
                        $display = mysqli_query($GLOBALS['dao'], $comandoGetIdProduto);
                        echo "<li class='list-group-item' id='imgAnuncio'>"; //
                        echo getImagemProduto(mysqli_fetch_row($display)[0]);
                        echo "</li>"; //
                        //
                        echo "<li class='list-group-item'>"; //
                        echo "<span class='spanProdutos'>Anunciante:"; nomeDoAnunciante($coluna['id_anunciante'])."</span>"; // TEM Q MOSTRAR O NOME DO ANUNCIANTE
                        echo "</li>"; //
                        echo "<li class='list-group-item'>"; //
                        echo "<span class='spanProdutos'>Categoria:</span><p>". $coluna['categoria']."</p>";
                        echo "</li>"; //
                        echo "<li class='list-group-item'>"; //
                        echo "<span class='spanProdutos'>TEXTO DO ANÚNCIO:" . $coluna['texto_anuncio']."</span>";
                        echo "</li>"; //

                        if(isset($_SESSION['id'])){ //CASO ESTEJA LOGADO
                            if(meuAnuncio($coluna['id_anunciante'], $_SESSION['id'])){ //CASO APAREÇA ALGUM ANÚNCIO DELE NA PÁGINA - TODOS OS ANÚNCIOS-
                                echo "<li class='list-group-item'>"; //
                                echo "<a href='editarAnuncio.php?idAnuncio={$coluna['id']}'> EDITAR ANÚNCIO </a>";
                                echo "</li>"; //
                                echo "<li class='list-group-item'>"; //
                                echo "<a href='excluirAnuncio.php?idAnuncio={$coluna['id']}'> EXCLUIR ANÚNCIO </a>";
                                echo "</li>"; //
                            }
                        }
                        echo "</ul>".
                        "</a>";
                    }

                    echo "<h2> <a href='site.php'> VOLTAR </a> </h2>";

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