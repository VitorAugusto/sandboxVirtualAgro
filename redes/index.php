<!DOCTYPE html>
<html>
<head>

	<h1>Conversor Binário => Hexadecimal</h1>
	    Feito por Vitor Augusto.

	<link rel="stylesheet" type="text/css" href="style.css">


	<title>
		IPV6
	</title>
</head>
<body>

	<br>
	<h3>BINÁRIOS 16 BITS</h3>
	<input type="number" id="bin1" value="" class="binariotext"> BINARIO 0
	<p>
	<input type="number" id="bin2" value="" class="binariotext"> BINARIO 1
	</p>
	<input type="number" id="bin3" value="" class="binariotext"> BINARIO 2
	<p>
	<input type="number" id="bin4" value="" class="binariotext"> BINARIO 3
	</p>
	<input type="number" id="bin5" value="" class="binariotext"> BINARIO 4
	<p>
	<input type="number" id="bin6" value="" class="binariotext"> BINARIO 5
    </p>
    <input type="number" id="bin7" value="" class="binariotext"> BINARIO 6
    <p>
    <input type="number" id="bin8" value="" class="binariotext"> BINARIO 7
    </p>

    <input type="button" name="botaoGenNumerosAleatorios" value="GERAR BINÁRIOS" onclick="gerarBinarios()" class="myButton2">


    <h3>HEXADECIMAL : </h3><input type="text" name="hexa" disabled="true" id="hexa">

    <br>
    <input type="button" name="botaoTransformar" value="TRANSFORMAR EM HEX" onclick="getHexValue()" class="myButton">
    <input type="button" name="botaoTransformar" value="COMPRIMIR ZEROS" onclick="getCompressValue()" class="myButton">
    <script type="text/javascript" src="functions.js?v=<?php echo time(); ?>"></script>
</body>
</html>