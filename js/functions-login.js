console.log("sou o js de login");


function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}
function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
	}
}


function doLogin(){

}




$('#botao').on('click', function(e){

	var telefone = $('#telefone').val();
	var pin = $('#pin').val();

	if(telefone == ''){
		lancarErro(1); //telefone inválido
	}else{
		if(telefone.length != 15){
			lancarErro(2); //telefone incompleto
		}else{
			if (pin == '') {
				lancarErro(3); //sem pin inserido
			}else{
				if (pin.length != 4) {
					lancarErro(4); //pin incompleto
				}else{                                           //ROTINA DE LOGIN 
					lancarErro(99);
					console.log("FAZENDO LOGIN  !")
					console.log("TELEFONE ENVIADO :" + telefone);
					console.log("PIN ENVIADO :" + pin);

					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {

			        switch(this.responseText){
			        	case "1":
			        	lancarErro(99);
			        	window.location.replace("site.php");
			        	break;

			        	case "2":
			        	lancarErro(6);
			        	break;

			        	case "3":
			        	lancarErro(7);
			        	break;
			        }
		}
	};
	                xhttp.open("POST", "accessManager.php?tipoOperacao=login" , true);
	                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	                xhttp.send("telefone="+telefone+"&pin="+pin);

				}
			}
		}
	}

});

function lancarErro(codigo){

	switch(codigo){

		case 1:
		$('.erro').html('<div class="erro-css"><p>   TELEFONE INVÁLIDO      </p></div>');
		break;

		case 2:
		$('.erro').html('<div class="erro-css"><p>    INSIRA O TELEFONE COMPLETO     </p></div>');
		break;

		case 3:
		$('.erro').html('<div class="erro-css"><p>     PIN INVÁLIDO     </p></div>');
		break;

		case 4:
		$('.erro').html('<div class="erro-css"><p>      INSIRA O PIN COMPLETO    </p></div>');
		break;

		case 5:
		$('.erro').html('<div class="erro-css"><p>    SUCESSO  </p></div>');
		break;

		case 6:
		$('.erro').html('<div class="erro-css"><p>      PIN INCORRETO      </p></div>');
		break;

		case 7:
		$('.erro').html('<div class="erro-css"><p>      SEM CADASTRO      </p></div>');
		break;


		case 99: //LIMPAR CAMPO DE ERROS
        $('.erro').html('');
        break;
	}
}