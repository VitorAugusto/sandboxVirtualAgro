<?php

session_start();

$action = $_GET['action'];

$enderecoipv6 = '';

switch ($action) {
	case '1':
	transformarIPV6();
	break;
	
	case '2':
	check();
	break;

	case '3':
	unset($_SESSION['ipv6']);
	break;
}

function transformarIPV6(){

	$binarios = $_POST['binarios'];

	$binariosArray = array();

	$len = strlen($binarios);
	for ($i = 0; $i < $len; $i += 16){
		$binariosArray[] = substr($binarios, $i, 16);
	}

	//echo $binariosArray;
	//print_r($binariosArray);

	//echo "<br>";

	//echo "BINÁRIO :";

	// for ($i=0; $i < sizeof($binariosArray) ; $i++) {  //IMPRIME O CONTEÚDO DO ARRAY EM BINÁRIO
	// 	echo $binariosArray[$i];
	// 	echo "<br>";
	// }

	for ($i=0; $i < sizeof($binariosArray) ; $i++) {  //TRANSFORMA O BINÁRIO EM HEXA

		$binariosArray[$i] = strtoupper(dechex(bindec($binariosArray[$i])));

	}

	$full = '';

	//echo "HEXA : ";
	//echo "<br>";
	ob_start(); //começa a captura do IPV6
	for ($i=0; $i < sizeof($binariosArray) ; $i++) {  //IMPRIME EM HEXA ??
		$full = $binariosArray[$i] . ":";
		if ($i == 7) {
			$final = substr_replace($full, "", -1);
			echo $final;
		}else{
			echo $full;
		}
	}
	$enderecoipv6 = ob_get_contents();
	ob_end_clean();
	echo $enderecoipv6; // endereço IPV6 completo -- AQUI IMPRIME O IPV6 !!
	$_SESSION['ipv6'] = $enderecoipv6;
	//compactarIPV6($enderecoipv6);
}

function check(){

	if(!isset($_SESSION['ipv6'])){
		echo "SEM ENDEREÇO IPV6";
	}else{
		compactarIPV6($_SESSION['ipv6']);
	}
}

function compactarIPV6($address){

		//$address = "2001:0DB8:00AD:000F:0000:0000:0000:0001";

	if (strpos($address, '::') === FALSE) {
		$parts = explode(':', $address);
		$new_parts = array();
		$ignore = FALSE;
		$done = FALSE;

		for ($i = 0; $i < count($parts); $i++) {
			if (intval(hexdec($parts[$i])) === 0 && $ignore == FALSE && $done == FALSE) {
				$ignore = TRUE;
				$new_parts[] = '';
				if ($i == 0) {
					$new_parts = '';
				}
			} else if (intval(hexdec($parts[$i])) === 0 && $ignore == TRUE && $done == FALSE) {
				continue;
			} else if (intval(hexdec($parts[$i])) !== 0 && $ignore == TRUE) {
				$done = TRUE;
				$ignore = FALSE;
				$new_parts[] = $parts[$i];
			} else {
				$new_parts[] = $parts[$i];
			}
		}

    // Glue everything back together
		$address = implode(':', $new_parts);

	}
// Check to see if this ends in a shortened :0 before replacing all
// leading 0's
	if (substr($address, -2) != ':0') {
    // Remove the leading 0's
		$new_address = preg_replace("/:0{1,3}/", ":", $address);
	} else {
		$new_address = $address;
	}
// Since new_parts isn't always set, check to see if it's set before
// trying to fix possibly broken shortened addresses ending in 0.
// (Ex: Trying to shorten 2001:19f0::0 will result in unset array)
	if (isset($new_parts)) {
    // Some addresses (Ex: starting addresses for a range) can end in
    // all 0's resulting in the last value in the new parts array to be
    // an empty string.  Catch that case here and add the remaining :0
    // for a complete shortened address.
		if (count($new_parts) < 8 && array_pop($new_parts) == '') {
			$new_address .= ':0';
		}
	}

// $this->compact = $new_address;

// return $this->compact;
echo $new_address; // Outputs: 2001::6dcd:8c74:0:0:0:0
}






?>