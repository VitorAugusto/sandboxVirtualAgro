<?php

session_start();

include('tools.php');

if(isset($_SESSION['id'])){ //SE ESTIVER LOGADO


if(meuAnuncio(getIdAnuncianteIdAnuncio($_GET['idAnuncio']), $_SESSION['id'])){
	ECHO "ESSE ANÚNCIO É SEU";
}else{
	ECHO "ESSE ANÚNCIO NÃO TE PERTENCE";
}


} else{

	ECHO "OPERAÇÃO INVÁLIDA";
}
?>