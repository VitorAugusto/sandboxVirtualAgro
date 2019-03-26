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



$('.escolherCategoria').click(function(){
	proximo($('a[name=lol]'));  //QUANDO CLICAR NA CATEGORIA ESSA FUNÇÃO É DISPARADA. 


	var val = $(this).closest("li").find("input[name='categoria']").val(); //CAPTURA A CATEGORIA SELECIONADA
	console.log("categoria selecionada : " + val);

	mostrarProdutos(val);

});


$("body").on("click", ".escolherProduto", function(){


	alert("CLICOU NO PRODUTO !");

	console.log("CLICOU NO PRODUTO");

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



//$('#myHiddenButton').click();


