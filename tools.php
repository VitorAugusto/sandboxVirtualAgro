<?php

//ESSE ARQUIVO TOOLS CONTÉM UM CONJUNTO DE FERRAMENTAS(TOOLS) ÚTEIS PARA O VIRTUAL-AGRO.
include('masterDAO.php');


// function newGetId($itemA, $itemB){

// 	$telefone = $itemA;
// 	$pin = $itemB;

// 	$displayNewId = mysqli_query($GLOBALS['dao'], "SELECT id FROM cadastros WHERE telefone = '$telefone' AND pin = MD5($pin)");

// 	return(mysqli_fetch_row($displayNewId)[0]);
// }

function getNome($itemA){ //Pegar nome pelo id

	$id = $itemA;

	$displayNome = mysqli_query($GLOBALS['dao'], "SELECT nome FROM cadastros WHERE id = '$id'");

	return (mysqli_fetch_row($displayNome)[0]);
}

function getId($itemA){ //pegar id pelo telefone

	$telefone = $itemA;

	$displayId = mysqli_query($GLOBALS['dao'], "SELECT id FROM cadastros WHERE telefone = '$telefone'");

	return (mysqli_fetch_row($displayId)[0]);
}

function getTelefone($itemA){ //get telefone pelo id

	$id = $itemA;

	$displayTelefone = mysqli_query($GLOBALS['dao'], "SELECT telefone FROM cadastros WHERE id = '$id'");

	return (mysqli_fetch_row($displayTelefone)[0]);
}


function getIdAnuncianteIdAnuncio($itemA){ //itemA recebe o ID DO ANÚNCIO , e retorna o ID DO ANUNCIANTE. UM ÚNICO VALOR

	$displayIdAnunciante = mysqli_query($GLOBALS['dao'], "SELECT id_anunciante FROM anuncios WHERE id = '$itemA'");

	return (mysqli_fetch_row($displayIdAnunciante)[0]);
}

function getIdAnunciosIdAnunciante($itemA){ //itemA recebe o ID DO ANUNCIANTE, e retorna UM OU MAIS ID DE ANÚNCIOS. PORQUE UM ANUNCIANTE PODE TER VÁRIOS ANÚNCIOS.

	$displayIdAnuncio = mysqli_query($GLOBALS['dao'], "SELECT id FROM anuncios WHERE id_anunciante = '$itemA'");

	return mysqli_fetch_row($displayIdAnuncio);
}

function nomeDoAnunciante($idAnun){

	$selectNomeAnunciante = "select nome from cadastros WHERE ID = '$idAnun' ";

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$displayAnunciante = mysqli_query($GLOBALS['dao'],$selectNomeAnunciante);

	while ($coluna = mysqli_fetch_array($displayAnunciante)) {
		echo $coluna['nome'];
	}
}

function anuncioExiste($idAnun){

	$comandoAnuncioExiste = "SELECT * from anuncios WHERE id = '$idAnun'";

	$display = mysqli_query($GLOBALS['dao'], $comandoAnuncioExiste);

	return(mysqli_num_rows($display) > 0);
}

function meuAnuncio($idAnunciante,$meuId){

	return ($idAnunciante == $meuId);
}

function produtoExiste($idProd){
	$comandoProdutoExiste = "SELECT * from produtos WHERE id = '$idProd'";

	$display = mysqli_query($GLOBALS['dao'], $comandoProdutoExiste);

	return (mysqli_num_rows($display) > 0 );
}

function getImagemProduto($idProd){

	$comandoGetImagemProduto = "SELECT imagemprincipal FROM produtos WHERE id = '$idProd'";

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$display = mysqli_query($GLOBALS['dao'], $comandoGetImagemProduto);

	$imagem = mysqli_fetch_array($display);

	return ("<img src=imagens/".$imagem['imagemprincipal'] . " width=300px>");
}

function getImagemProdutoOption($idProd){

	$comandoGetImagemProduto = "SELECT imagemprincipal FROM produtos WHERE id = '$idProd'";

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$display = mysqli_query($GLOBALS['dao'], $comandoGetImagemProduto);

	$imagem = mysqli_fetch_array($display);

	return ($imagem['imagemprincipal']);
}

function getImagemCategoria($cat){

	$comandoGetImagemCategoria = "SELECT imagem FROM categoria WHERE nome = '$cat'";

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$display = mysqli_query($GLOBALS['dao'], $comandoGetImagemCategoria);

	$imagem = mysqli_fetch_array($display);

	return ("<img src=imagens/".$imagem['imagem'] . " width=300px>");

}

function produtoTemImagensAdicionais($idProd){ //VERIFICA SE O PRODUTO TEM IMAGENS ADIDIONAIS - ADD1 E ADD2.

	$comandoVerificarImagensAdicionais = "SELECT imagemadd1, imagemadd2 FROM produtos WHERE id = '$idProd'";

	$display = mysqli_query($GLOBALS['dao'], $comandoVerificarImagensAdicionais);

	while($foi = mysqli_fetch_array($display)){

		if(is_null($foi['imagemadd1']) AND is_null($foi['imagemadd2'])){

			return false;
		}else{
			return true;
		}
	}
}

function getImagensAdicionais($idProd){

	$comandoGetImagensAdicionais = "SELECT imagemadd1, imagemadd2 FROM produtos WHERE id = '$idProd' ";

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$display = mysqli_query($GLOBALS['dao'], $comandoGetImagensAdicionais);

	$imagens = mysqli_fetch_array($display);

	echo "<img src=imagens/".$imagens['imagemadd1'] . ">";
	echo "<img src=imagens/".$imagens['imagemadd2'] . ">";
}

function existemAnunciantes($produto){ //RETORNA SE EXISTEM ANUNCIANTES DAQUELE PRODUTO
	$comandoExistemAnunciantes = "SELECT * from anuncios WHERE id_produto = '$produto'";

	$display = mysqli_query($GLOBALS['dao'],$comandoExistemAnunciantes);

	return (mysqli_num_rows($display) > 0 );
}

function construirTabelaAnunciantes(){

	echo "<table cellpadding='5px'spacepadding='5px'>"; 

	echo "<th>AGRICULTOR</th>";
	echo "<th>DESCRIÇÃO</th>";
	echo "<th>MEDIDA</th>";
	echo "<th>PREÇO</th>";
	echo "<th>ENTRAR EM CONTATO</th>";

}

function getAnunciantes($produto){ //RETORNA OS ANUNCIANTES DAQUELE CERTO produto

	$comandoGetAnunciantes = "SELECT * from anuncios WHERE id_produto = '$produto'";

	mysqli_query($GLOBALS['dao'], "set names 'utf8'");

	$display = mysqli_query($GLOBALS['dao'], $comandoGetAnunciantes);

	if(mysqli_num_rows($display) > 0 ){ //SE EXISTEM ANUNCIANTES DAQUELE PRODUTO

		while($coluna = mysqli_fetch_array($display)){
			$telefone = getTelefone($coluna['id_anunciante']);
			$ddd = substr($telefone, 0, 2);
			$numero = substr($telefone, 2);
			$telefoneFull = "55".$telefone;
			
			$textoBasico = "Olá, quero saber mais sobre seu anúncio de ". mb_strtoupper(getNomeProdutoPeloID($coluna['id_produto'])) ." no VirtualAgro.net ";

		// CADA COLUNA PRA SER PREENCHIDA É UM <tr>, CADA VALOR DESSA COLUNA É UM <td>

			echo "<tr>";
			echo "<td>";
			nomeDoAnunciante($coluna['id_anunciante']);  //PREENCHE NOME
			echo "</td>";
			//echo "<td>". '(' . $ddd . ')' . " ".$numero . "</td>"; //PREENCHE TELEFONE
			echo "<td>". $coluna['observacao'] . "</td>";
			echo "<td>". $coluna['texto_anuncio'] . "</td>"; //PREENCHE O TEXTO DO ANÚNCIO
			echo "<td>" . "R$".$coluna['preco']. "</td>"; //PREÇO DO ANÚNCIO
			echo "<td>" .
			"<a href='tel:{$telefoneFull}' class='btn btn-info btn-lg'>
			<span class='glyphicon glyphicon-earphone'></span> LIGAR
			</a>" .
			"<a href='https://api.whatsapp.com/send?phone={$telefoneFull}&text={$textoBasico}'>
			<span class='fab fa-whatsapp' style='color:#088000;font-size: 45px;position: absolute;margin-inline-start: auto;'></span>
			</a>" 
			 ."</td>"; //EM CONT
			 echo "</tr>";
			}
		}
	}

	function getNumeroAnunciantes($produto){

		if(existemAnunciantes($produto)){

			$comandoGetNumeroAnuciantes = "SELECT * from anuncios WHERE id_produto = '$produto'";

			$display = mysqli_query($GLOBALS['dao'], $comandoGetNumeroAnuciantes);

			return (mysqli_num_rows($display));
		}else{
			return ('0');
		}

	}

	function listarTodosProdutos(){

		$comandoListarProdutos = "SELECT nome FROM produtos";

		mysqli_query($GLOBALS['dao'], "set names 'utf8'");

		$display = mysqli_query($GLOBALS['dao'], $comandoListarProdutos);

		while($coluna = mysqli_fetch_array($display)){
		//echo "<option value=$coluna[nome]>". ($coluna['nome']) ."</option>";
			echo '<option value="'.$coluna['nome'].'">'.$coluna['nome'].'</option>';
		}
	}

	function getIdProdutoPeloNome($nome){
		$comandoGetId = "SELECT id from produtos WHERE nome = '$nome'";

		mysqli_query($GLOBALS['dao'], "set names 'utf8'");
		$display = mysqli_query($GLOBALS['dao'], $comandoGetId);

		return(mysqli_fetch_row($display)[0]);
	}
	function getNomeProdutoPeloID($id){
		$comandoGetNome = "SELECT nome from produtos WHERE id = '$id'";

		mysqli_query($GLOBALS['dao'], "set names 'utf8'");
		$display = mysqli_query($GLOBALS['dao'], $comandoGetNome);

		return(mysqli_fetch_row($display)[0]);
	}

	function getCategoriaProdutoPeloId($id){

		$comandoGetCategoria = "SELECT categoria from produtos WHERE id = '$id'";

		mysqli_query($GLOBALS['dao'], "set names 'utf8'");

		$display = mysqli_query($GLOBALS['dao'],$comandoGetCategoria);

		return(mysqli_fetch_row($display)[0]);
	}

	function construirMenuLateralSemLogin(){

		echo "<div class='box-menu'>";
		echo "<ul class='submenu'>";
		echo "<li><a href='home.php'>Home</a></li>";
		echo "<li><a href='index.php'>Login</a></li>";
		echo "<li><a href='cadastro.php'>Cadastre-se</a></li>";
		echo "<li><a href='faleconosco.php'>Fale Conosco</a></li>";
		echo "<li><a href='faq.php'>Dúvidas</a></li>";
		echo "</ul>";
		echo "</div>";
	}

	function construirMenuLateralComLogin(){

		echo " <div class='box-menu'>";
		echo "<ul class='submenu'>";
		echo "<li><a href='home.php'>Home</a></li>";
		echo "<li><a href='site.php'>Minha Conta</a></li>";
		echo "<li><a href='criarAnuncio.php'>Criar Anúncio</a></li>";
		echo "<li><a href='meusAnuncios.php'>Meus Anúncios</a></li>";
		echo "<li><a href='faleconosco.php'>Fale Conosco</a></li>";
		echo "<li><a href='faq.php'>Dúvidas</a></li>";
		echo "<li><a href='logout.php'>Sair</a></li>";
		echo "</ul>";
		echo "</div> ";
	}


	function construirMenuLogin(){
		echo "<button type=button class='btn-login'>";
		echo "<span class='icon-menu'><i class='fas fa-sign-in-alt'></i></span>";
		echo "<a href='index.php'>login";
		echo "</a>";
		echo "</button>";
	}

	function excluirAnuncio($idAnun){

		$comandoExcluirAnuncio = "DELETE FROM anuncios WHERE id = '$idAnun'";

		mysqli_query($GLOBALS['dao'],$comandoExcluirAnuncio);
	}

	?>