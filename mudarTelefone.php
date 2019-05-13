<!DOCTYPE html>
<html>
<head>
	<title>MUDAR TELEFONE - Virtual Agro</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" sizes="64x64" href="imagens/logo/virtual-agro-logo-png.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<!-- ESSE NOVO LINK PRO NOSSO CSS IMPEDE AQUELE BUG QUE A GENTE MUDAVA NO CSS, MAS NÃO MUDAVA NO SITE. -->
	<!-- REPLICAR EM TODAS AS PÁGINAS INTERATIVAS -->
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
	<meta name="theme-color" content="#2a7766">


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
					$origem = $_SERVER['HTTP_REFERER'];

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
            }else{
                construirLogout();
            }
            ?>
			</div>                
		</div>            
	</header>
	<div class="all">
		<section class="conteudo">
			<h2> <a href='<?php  echo $origem ?>'> VOLTAR </a> </h2>

			<?php
			if((!isset ($_SESSION['id']))){ //SE USUÁRIO NÃO ESTIVER LOGADO , SE O ID NÃO ESTIVER NA SESSÃO.
            unset($_SESSION['nome']);
            unset($_SESSION['id']);
            header('location:index.php');
          }
			?>


        	    <form class="form-cadastro" name="formulario">
        	    	<ul class="progresso">

        	    		<li class="ativo">Início</li>
        	    		<li>Meio</li>
        	    		<li>Fim</li>

        	    	</ul>
        	    	<div class="erro" id="mensagem" style="width: fit-content; margin: auto">
        	    		<!-- CAMPO DE MENSAGEM DE ERRO -->
        	    	</div>

        	    	<fieldset id="etapa1MudancaNumero"> <!-- INSERE O NOVO NÚMERO DE TELEFONE-->
        	    		<h2>Mudança de Telefone</h2>
        	    		<h3>Insira seu NOVO Número de Telefone </h3>   

        	    		<input type="text" name="telefone" required="" placeholder="Digite o seu telefone..." id="telefone" maxlength="15" pattern="[0-9]+">
        	    		<input type="button" name="proximo" class="next acao" value="Próximo">   	    	
        	    	</fieldset>


        	    	<fieldset id="etapa2MudancaNumero"> <!-- VERIFICAÇÃO OPT DO NOVO NÚMERO , VIA SMS -->    
        	    		<h2>Mudança de Telefone</h2>
        	    		<h3>Um SMS foi enviado para você!</h3>
        	    		<input type="number" placeholder="Digite o código do sms..." id="sms" max="6" maxlength="6">

        	    		<input type="button" name="prev" class="prev acao" value="Anterior">
        	    		<input type="button" name="proximo2" class="next acao" value="Próximo"> 

        	    	</fieldset>




        	    	<fieldset id="etapa3MudancaNumero"> <!-- CONFIRMAÇÃO DE MUDANÇA DE NÚMERO -->
        	    		<h2>Sucesso !</h2>
        	    		<p> SEU NÚMERO DE TELEFONE FOI ATUALIZADO !</p>
        	    		<a href="site.php">
        	    		<input type="button" name="" class="next acao" value="SAIR">
        	    		</a>
        	    	</fieldset>
        	    	

        	    	<script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.min.js"></script>
        	    	<script type="text/javascript" src="js/functions-mudarTelefone.js?v=<?php echo time(); ?>"></script>


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