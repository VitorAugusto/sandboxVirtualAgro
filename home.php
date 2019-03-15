<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>HOME - Virtual Agro</title>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" sizes="64x64" href="imagens/logo/virtual-agro-logo-png.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">


        <script>

            function construirExibicaoProdutos(){
                var conteudo = document.querySelector(".conteudo");

                conteudo.style.display = "none";

                checarProdutos();
            }

            function checarProdutos(){

            var produtosParaBusca = [];
            var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
            for (var i = 0; i < checkboxes.length; i++) {
            produtosParaBusca.push(checkboxes[i].value)
        }

        for (var i = 0; i < produtosParaBusca.length; i++) {
            console.log(produtosParaBusca[i]);
        }
            }



            
        </script>
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
                        <div class="clearfix">
            
                            <h1 class="search-title">
                                PRODUTOS ORGÂNICOS<br>
                                <span>LIVRES DE AGROTÓXICOS</span>
                            </h1>
                        </div>
                        <div class="search-content">
                            <!-- <form id="home"> -->
                                <p class="search-label description">Com o Virtual Agro você pode conferir os números de telefone e whatsapp de agricultores de sua região. Com isso oferecemos uma opção pra quem deseja consumir produtos 100% orgânicos e sem agrotóxicos. Confira!
                                </p>
                                <br>
                                <div class="label-chamada">O que você procura?</div>
                                <div class="linha">
                                    <div class="check-box">
                                        <input id="" class="" type="checkbox" name="buscaproduto" value="Frutas" alt="Frutas" checked>
                                        <label for="">
                                            <span class="icon-menu"><span class="icon"></span></span>
                                            <span class="icon-text">FRUTAS</span>
                                        </label>
                                    </div>                    
                                    <div class="check-box">
                                        <input id="" class="" type="checkbox" name="buscaproduto" value="Legumes" alt="Legumes">
                                        <label for="">
                                            <span class="icon-menu"><span class="icon"></span></span>
                                            <span class="icon-text">LEGUMES</span>
                                        </label>
                                    </div>
                                    <div class="check-box">
                                        <input id="" class="" type="checkbox" name="buscaproduto" value="Verduras" alt="Verduras">
                                        <label for="">
                                            <span class="icon-menu"><span class="icon"></span></span>
                                            <span class="icon-text">VERDURAS</span>
                                        </label>
                                    </div>
                                </div>
                                <button class="buscar" type="submit" onclick="construirExibicaoProdutos()">
                                    <span class="icon-text">BUSCAR</span>
                                    <span class="icon-menu"><i class="fa fa-chevron-circle-right"></i></span>
                                </button>
                            <!-- </form> -->
                    </div>
            </section>
        </div>
       
        <footer>
            <div class="container">
                <a class="brand" href="#">
                    <img class="logo" src="./imagens/logo/virtual-agro-logo-png.png" alt="">            
                </a>
                <hr>
                <div class="copyright">Copyright 2019 © <a href="#">Virtual Agro</a>.</div>
            </div>
        </footer>
    </body>
</html>