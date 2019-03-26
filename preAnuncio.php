<?php
    session_start();
    include('tools.php');

	$tipoCategoria = $_REQUEST['tipoCategoria'];
	
	$result_sub_cat = "SELECT nome FROM produtos WHERE categoria = '$tipoCategoria' ORDER BY nome";

    
    mysqli_query($GLOBALS['dao'], "set names 'utf8'");
    mysqli_query($GLOBALS['dao'],$result_sub_cat);

	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'nome' => utf8_encode($row_sub_cat['nome']),
		);
	}
	
	echo(json_encode($sub_categorias_post));

?>