<!DOCTYPE html>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>

<script type="text/javascript">

	var categorias = [];

	function getProdutos() {


		$("input:checkbox[name=categoria]:checked").each(function(){
			categorias.push($(this).val());
		});

		for (var i = 0; i < categorias.length; i++) {
			console.log(categorias[i]);
		}




			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("campo").innerHTML += this.responseText;
				}
			};
			xhttp.open("GET", "search.php?categoria="+ categorias, true);

			//xhttp.setRequestHeader("Content-Type", "application/json");

			xhttp.send();

			$( 'input[type="checkbox"]' ).prop('checked', false); //DESMARCA TODOS OS CHECKBOX
			categorias = []; //ESVAZIA O ARRAY DE CATEGORIAS SELECIONADAS

		}


	</script>
	<head>
		<title>PRODUTOS </title>
	</head>
	<body>

		<input type="checkbox" name="categoria" value="'FRUTA'" checked="">
		<label>FRUTAS</label>

		<input type="checkbox" name="categoria" value="'VERDURA'">
		<label>VERDURAS</label>


		<input type="checkbox" name="categoria" value="'LEGUME'">
		<label>LEGUMES</label>


		<input type="checkbox" name="categoria" value="'GRÃOS'">
		<label>GRÃOS</label>


		<input type="checkbox" name="categoria" value="'TEMPERO'">
		<label>TEMPERO</label>


		<input type="checkbox" name="categoria" value="'OUTRO'">
		<label>OUTRO</label>


		<input type="checkbox" name="categoria" value="'ESPECIARIA'">
		<label>ESPECIARIA</label>

		<br>

		<button onclick="getProdutos()"> LISTAR PRODUTOS AQUI </button>



		<section id="campo">
			<!-- AQUI IREI CONSTRUIR OS PRODUTOS -->

		</section>

	</body>
	</html>