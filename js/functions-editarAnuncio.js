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

var idAnuncio = document.getElementById("idanunciohelper").value;

var medida;
var observacao;
var preco;

window.onload = capturarCampos();


function getMedidaProduto(){

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			medida = this.responseText;
			changeMedida();
		}
	};
	xhttp.open("POST", "consultarAnuncioHelper.php?action=getMedidaProduto" , true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("idAnuncio="+idAnuncio);

}

function getObservacaoProduto(){

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			observacao = this.responseText;
			changeObservacao();
		}
	};
	xhttp.open("POST", "consultarAnuncioHelper.php?action=getObservacaoProduto" , true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("idAnuncio="+idAnuncio);

}

function getPrecoProduto(){

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			preco = this.responseText;
			changePreco();
		}
	};
	xhttp.open("POST", "consultarAnuncioHelper.php?action=getPrecoProduto" , true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("idAnuncio="+idAnuncio);

}

function changePreco(){
	document.getElementById("preco").value = preco;
}

function changeObservacao(){
	document.getElementById("obs").value = observacao;
}

function changeMedida(){
	document.getElementById(medida).checked = true;
}



function capturarCampos(){
	getMedidaProduto();
	getObservacaoProduto();
	getPrecoProduto();
}


