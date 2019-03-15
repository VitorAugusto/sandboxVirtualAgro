<!DOCTYPE html>
<html>

<style type="text/css">
	#content{
		margin-left: 100px;
	}

</style>

<script type="text/javascript">
	function sumir() {

		var texto = document.getElementById("content");

		texto.style.display = "none";
}

function aparecer(){

	var texto = document.getElementById("content");
	texto.style = display = "block";

}
</script>
<head>
	<title>
		


	</title>
</head>
<body>


	<div id="content">

		Tenho COISAS AQUI DENTRO.

	</div>

	<button onclick="sumir()">
		FAZER SUMIR
	</button>

		<button onclick="aparecer()">
		FAZER APARECER 
	</button>


</body>
</html>