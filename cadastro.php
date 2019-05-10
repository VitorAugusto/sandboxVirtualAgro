<!DOCTYPE html>
<html>
<head>
	<title>CADASTRO - Virtual Agro</title>
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
            }else{
                construirLogout();
            }
            ?>
			</div>                
		</div>            
	</header>
	<div class="all">
		<section class="conteudo">

        	    <form class="form-cadastro" name="formulario">
        	    	<ul class="progresso">

        	    		<li class="ativo">Início</li>
        	    		<li>Meio</li>
        	    		<li>Fim</li>

        	    	</ul>
        	    	<div class="erro" id="mensagem" style="width: fit-content; margin: auto">
        	    		<!-- CAMPO DE MENSAGEM DE ERRO -->
        	    	</div>

        	    	<fieldset id="etapa1Cadastro"> <!-- AQUI ELE INSERE O NOME DELE, E O NÚMERO DE TELEFONE -->
        	    		<h2>Configurações da conta</h2>
        	    		<h3>Configurações Iníciais</h3>
        	    		<input type="text" name="campoNome" required="" placeholder="Digite o seu nome...">
        	    		<input type="text" name="telefone" required="" placeholder="Digite o seu telefone..." id="telefone" maxlength="15" pattern="[0-9]+">

        	    		<input type="button" name="proximo" class="next acao" value="Próximo">        	    	
        	    	</fieldset>


        	    	<fieldset id="etapa2Cadastro"> <!-- VERIFICAÇÃO OPT , VIA SMS -->
        	    		<h2>Configurações da conta</h2>
        	    		<h3>Um SMS de 6 DÍGITOS foi enviado para você!</h3>
        	    		<input type="number" placeholder="Digite o código do sms..." id="sms" max="6" maxlength="6">

        	    		<input type="button" name="prev" class="prev acao" value="Anterior">
        	    		<input type="button" name="proximo2" class="next acao" value="Próximo">        	    	        	    	
        	    	</fieldset>




        	    	<fieldset id="etapa3Cadastro"> <!-- DEFINE O PIN DE ACESSO 4 DÍGITOS -->
        	    		<h2>Configurações da conta</h2>
        	    		<h3>Insira PIN de 4 digitos - esse PIN servirá como sua senha</h3>
<!--         	    	<input type="password" name="campoSenha" required="" placeholder="Informe um PIN DE ACESSO..." maxlength="4" pattern="\d*">
        	    	<input type="password" name="confirmaSenha" required="" placeholder="Confirme O PIN." maxlength="4" pattern="\d*"> -->

                    <input name="campoSenha"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    type = "number"
                    maxlength = "4"
                    pattern="\d*"
                    style="-webkit-text-security: disc;"
                    />
                    <input name="confirmaSenha"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    type = "number"
                    maxlength = "4"
                    pattern="\d*"
                    style="-webkit-text-security: disc;"
                    />



        	    		<input type="button" name="prev" class="prev acao" value="Anterior">

        	    		<input type="submit" name="cadastrar" class="acao" value="Finalizar" id="botaoCadastrar">
        	    	</fieldset>
        	    	

        	    	<script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.min.js"></script>
        	    	<script type="text/javascript" src="js/functions-cadastro_v2.js?v=<?php echo time(); ?>"></script>
        	    	<!-- SCRIPT RENOVADO -->

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