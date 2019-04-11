
<?php 

include_once('tools.php');
session_start();
?>


<?php


	if(isset($_SESSION['id'])){ //SE ESTIVER LOGADO
		if(anuncioExiste($_GET['idAnuncio']) AND meuAnuncio(getIdAnuncianteIdAnuncio($_GET['idAnuncio']), $_SESSION['id'])){
			ECHO "ESSE ANÚNCIO É SEU";

			excluirAnuncio($_GET['idAnuncio']);

			header('location:meusAnuncios.php');

		}else{
			ECHO "ESSE ANÚNCIO NÃO TE PERTENCE OU NÃO EXISTE";
		}
	} else{				
		ECHO "OPERAÇÃO INVÁLIDA";
	}
	
	?>