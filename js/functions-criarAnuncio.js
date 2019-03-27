document.getElementById("etapa2CriarAnuncio").style.display = 'none';
document.getElementById("etapa3CriarAnuncio").style.display = 'none';
document.getElementById("etapa4CriarAnuncio").style.display = 'none';
document.getElementById("etapa5CriarAnuncio").style.display = 'none';



function proximo(elem){
	atual_fs = $(elem).parent();
	next_fs = $(elem).parent().next();    

	$('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
	atual_fs.hide(800);
	next_fs.show(800);
}

$('.prev').click(function(){
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

	montarAnuncio(val,1);

	mostrarProdutos(val);


});


$("body").on("click", ".escolherProduto", function(){ //ETAPA 2, AQUI ELE ESCOLHE O PRODUTO QUE QUER ANÚNCIAR



	var val = $(this).closest("li").find("span[name='produto']").text();

	console.log("CLICOU NO PRODUTO : " + val);

	proximo($('div[id=telaprodutos]'));

	montarAnuncio(val,2);

});

$("#etapa3CriarAnuncio").on("click", $("input[name='atributo']"), function(){ //ETAPA 3 , CAPTURA O ATRIBUTO DO ANÚNCIO, KG , 1/2KG, BANDEJA, ETC
	var atributo = $("input[name='atributo']:checked").val();
	//console.log(atributo);
	montarAnuncio(atributo, 3);
	// $("input[name='atributo']").click(function(){
	// 	atributo = $("input[name='atributo']:checked").val();
	// 	montarAnuncio(atributo, 3);
 //    });

});

function montarAnuncio(item, step){

	var categoria;
	var produto;
	var medida;
	var observacao;
	var anuncioMontado = [];

	switch(step){

		case 1:
		categoria = item;
		console.log("ADICIONADO : " + item + " À CATEGORIA");
		break;

		case 2:
		produto = item;
		console.log("ADICIONADO : " + item + " AO PRODUTO");
		break;

		case 3:
		medida = item;
		console.log("ADICIONADO : " + item + " À MEDIDA");
		break;

		case 4:
		console.log("ADICIONADO : " + item + " COMO OBSERVAÇÃO ");
		observacao = item;
		break;
	}
}


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



//$('#myHiddenButton').click();


