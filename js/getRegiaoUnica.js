window.onload = preencherRegiaoUnica();


function preencherRegiaoUnica(){ //unica região pra preencher


	var dddAgricultor = document.getElementById("ddd").value;


	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("regiao").innerHTML = this.responseText;
		}
	};

	xhttp.open("GET", "consultaDDD.php?ddd="+ dddAgricultor, true);
	xhttp.send();
}