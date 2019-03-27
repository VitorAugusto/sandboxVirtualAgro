<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function anunciarProduto(){

			var categoria = 'FRUTA';
			var produto = "ABACATE";
			var medida = "KG";
			var observ = "ABACATE MADURO.";

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.querySelector("body").innerHTML = this.responseText;
				}
			};
			xhttp.open("POST", "newPostAnuncio.php" , true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// xhttp.send("categoria="+categoria+"&produto="+produto+"&medida="+medida+"&observacao="+observacao);
	xhttp.send("categoria="+categoria+"&produto="+produto+"&medida="+medida +"&observacao="+observ);
}
</script>

<title>



</title>
</head>
<body>

	vou testar o new post anuncio.

	<button onclick="anunciarProduto()">FAZER</button>

</body>
</html>