document.getElementById("etapa2CriarAnuncio").style.display = 'none';
document.getElementById("etapa3CriarAnuncio").style.display = 'none';
document.getElementById("etapa5CriarAnuncio").style.display = 'none';


var categoria;
var produto;
var medida;
var observacao;


function moeda(a, e, r, t) {
	let n = ""
	, h = j = 0
	, u = tamanho2 = 0
	, l = ajd2 = ""
	, o = window.Event ? t.which : t.keyCode;
	if (13 == o || 8 == o)
		return !0;
	if (n = String.fromCharCode(o),
		-1 == "0123456789".indexOf(n))
		return !1;
	for (u = a.value.length,
		h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
		;
	for (l = ""; h < u; h++)
		-1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
	if (l += n,
		0 == (u = l.length) && (a.value = ""),
		1 == u && (a.value = "0" + r + "0" + l),
		2 == u && (a.value = "0" + r + l),
		u > 2) {
		for (ajd2 = "",
			j = 0,
			h = u - 3; h >= 0; h--)
			3 == j && (ajd2 += e,
				j = 0),
		ajd2 += l.charAt(h),
		j++;
		for (a.value = "",
			tamanho2 = ajd2.length,
			h = tamanho2 - 1; h >= 0; h--)
			a.value += ajd2.charAt(h);
		a.value += r + l.substr(u - 2, u)
	}
	return !1
}


function proximo(elem){
	atual_fs = $(elem).parent();
	next_fs = $(elem).parent().next();    

	$('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
	atual_fs.hide(800);
	next_fs.show(800);
}

$("body").on("click", ".prev", function(){
	atual_fs = $(this).parent();
	prev_fs = $(this).parent().prev();

	$('.erro').html('');
	$('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
	atual_fs.hide(800);
	prev_fs.show(800);
});

$('input[name=proximo]').click(function(){
	proximo($(this));
});



$('.escolherCategoria').click(function(){ //ETAPA 1 , AQUI ELE ESCOLHE A CATEGORIA
	proximo($('a[name=lol]'));  //QUANDO CLICAR NA CATEGORIA ESSA FUNÇÃO É DISPARADA. 


	var val = $(this).closest("li").find("input[name='categoria']").val(); //CAPTURA A CATEGORIA SELECIONADA
	console.log("categoria selecionada : " + val);
	categoria = val;


	mostrarProdutos(val);


});


$("body").on("click", ".escolherProduto", function(){ //ETAPA 2, AQUI ELE ESCOLHE O PRODUTO QUE QUER ANÚNCIAR



	var val = $(this).closest("li").find("span[name='produto']").text();

	console.log("CLICOU NO PRODUTO : " + val);
	produto = val;

	proximo($('div[id=telaprodutos]'));

});


// $("#etapa3CriarAnuncio").on("click", $("input[name='proximo']"), function(){ //ETAPA 3 , CAPTURA O ATRIBUTO DO ANÚNCIO, KG , 1/2KG, BANDEJA, ETC
// 	// var atributo = $("input[name='atributo']:checked").val();

// 	// medida = atributo;

// 	// console.log(medida);
// 	//console.log(atributo);
// 	//montarAnuncio(atributo, 3);

// });


 // $('#obs').on('change', function(){ // CAPTURA A OBSERVAÇÃO

 // 	if($('#obs').val() === ''){
 // 		console.log("nenhuma observação");
 // 	}else{
 // 		console.log($('#obs').val());
 // 		observacao = $('#obs').val();
 // 	}
 // });


$('#showPreAnuncio').on('click', function(){ //ETAPA 5 , MOSTRAR O PRÉ ANÚNCIO 

	var atributo = $("input[name='atributo']:checked").val();

	medida = atributo;

	console.log("tela de pré anúncio");

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("etapa5CriarAnuncio").innerHTML = this.responseText;
		}
	};
	xhttp.open("POST", "preAnuncio.php" , true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// xhttp.send("categoria="+categoria+"&produto="+produto+"&medida="+medida+"&observacao="+observacao);
	xhttp.send("categoria="+categoria+"&produto="+produto+"&medida="+medida);


});


function mostrarProdutos(cat){
	categoria = cat;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var botoes = document.querySelectorAll('input[type=button]')
			document.getElementById("etapa2CriarAnuncio").innerHTML += this.responseText;
		}
	};
	xhttp.open("GET", "searchAnunciar.php?categoria="+ categoria, true);

	xhttp.send();
}

function publicarAnuncio(){

	observ = document.getElementById("obs").value;
	preco = document.getElementById("preco").value;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			window.location.replace('meusAnuncios.php');
		}
	};
	xhttp.open("POST", "newPostAnuncio.php" , true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// xhttp.send("categoria="+categoria+"&produto="+produto+"&medida="+medida+"&observacao="+observacao);
	xhttp.send("categoria="+categoria+"&produto="+produto+"&medida="+medida +"&observacao="+observ+"&preco="+preco);
}

function inseriuPreco(){

	return(!document.getElementById("preco").value == '');
}

function final(){

	if(inseriuPreco()){
		fecharBotao();
		publicarAnuncio();
	}else{
		alert("insira o preço");
	}
}

function fecharBotao(){
	document.getElementById("botaoPublicar").disabled = true;
}




//$('#myHiddenButton').click();


