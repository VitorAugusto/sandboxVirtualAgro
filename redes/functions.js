console.log("me importou");

window.onload = inicio();


function inicio(){
	gerarBinarios();
	limpar();
}


function getHexValue(){
	var bin1 = document.getElementById("bin1").value;
	var bin2 = document.getElementById("bin2").value;
	var bin3 = document.getElementById("bin3").value;
	var bin4 = document.getElementById("bin4").value;
	var bin5 = document.getElementById("bin5").value;
	var bin6 = document.getElementById("bin6").value;
	var bin7 = document.getElementById("bin7").value;
	var bin8 = document.getElementById("bin8").value;

	var stringBinariaConcatenada = bin1.concat(bin2,bin3,bin4,bin5,bin6,bin7,bin8);

	console.log("STRING FULL :  " + stringBinariaConcatenada);
	console.log("bits :" + stringBinariaConcatenada.length);


	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("hexa").value = this.responseText;
		}
	};
	xhttp.open("POST", "conversor.php?action=1" , true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("binarios="+stringBinariaConcatenada);


}

function getCompressValue(){

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("hexa").value = this.responseText;
		}
	};
	xhttp.open("POST", "conversor.php?action=2" , true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//xhttp.send("binarios="+stringBinariaConcatenada);
	xhttp.send();
}

function limpar(){
	document.getElementById("hexa").value = '';

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log("limpo");
		}
	};
	xhttp.open("POST", "conversor.php?action=3" , true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();

}

function gerarBinarios(){

	//campo1
	document.getElementById("bin1").value = '';
	while(document.getElementById("bin1").value.length != 16){
		var random = Math.round(Math.random());
		document.getElementById("bin1").value += random;
	}

	document.getElementById("bin2").value = '';
	while(document.getElementById("bin2").value.length != 16){
		var random = Math.round(Math.random());
		document.getElementById("bin2").value += random;
	}

	document.getElementById("bin3").value = '';
	while(document.getElementById("bin3").value.length != 16){
		var random = Math.round(Math.random());
		document.getElementById("bin3").value += random;
	}

	document.getElementById("bin4").value = '';
	while(document.getElementById("bin4").value.length != 16){
		var random = Math.round(Math.random());
		document.getElementById("bin4").value += random;
	}

	document.getElementById("bin5").value = '';
	while(document.getElementById("bin5").value.length != 16){
		var random = Math.round(Math.random());
		document.getElementById("bin5").value += random;
	}

	document.getElementById("bin6").value = '';
	while(document.getElementById("bin6").value.length != 16){
		var random = Math.round(Math.random());
		document.getElementById("bin6").value += random;
	}

	document.getElementById("bin7").value = '';
	while(document.getElementById("bin7").value.length != 16){
		var random = Math.round(Math.random());
		document.getElementById("bin7").value += random;
	}

	document.getElementById("bin8").value = '';
	while(document.getElementById("bin8").value.length != 16){
		var random = Math.round(Math.random());
		document.getElementById("bin8").value += random;
	}
}