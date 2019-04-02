/* Máscaras ER */

console.log("v2 javcstro");

//-X-X-X-X-X-X-X-X-X-X-X-X-X-X-X- MÁSCARA DE NÚMERO TELEFONE -X-X-X-X-X-X

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

//-X-X-X-X-X-X-X-X-X-X-X-X-X-X-X

var nome;
var telefone;
var pin;
var gg;
var otpValido;

$(function(){
    var atual_fs, next_fs, prev_fs;
    var formulario = $('form[name=formulario]');

    function proximo(elem){
        atual_fs = $(elem).parent();
        next_fs = $(elem).parent().next();    

        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        atual_fs.hide(800);
        next_fs.show(800);
    }

    $('.prev').on('click', function(){
        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();

        $('.erro').html('');
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        atual_fs.hide(800);
        prev_fs.show(800);
    });

    $('#telefone').keyup(function(){
        if($('#telefone').val().length == 15){
            checkTelefone($('#telefone').val());
        }
    });

    $('#sms').on('keyup', function(){
        if($('#sms').val().length > 5){
            verificarOTP($('#sms').val()); //verifica otp
        }
    });

    $('input[name=proximo]').on('click', function(){

        var array = formulario.serializeArray();

        if(array[0].value == ''){ //campo NOME
             lancarErro(1);//erro 1
        }else if(array[1].value == ''){ //campo TELEFONE 
             lancarErro(2);//erro 2
         }else if(array[1].value.length != 15){
            lancarErro(3);//erro 3
        }else{
            if(telefoneJaCadastrado()){
                lancarErro(9);
            }else{

            lancarErro(99); //erro 99 limpa o campo de erro
            nome = array[0].value;
            telefone = array[1].value;

            enviarOTP(telefone);
            proximo($(this)); //todos os campos preenchidos e diferentes de ''

        }
    }
});

    function enviarOTP(tel){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            }
        };
        xhttp.open("POST", "controllerSMS.php?action=enviar_otp" , true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("telefone="+tel);

    }

    function verificarOTP(otp){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                otpValido = this.responseText;
            }
        };
        xhttp.open("POST", "controllerSMS.php?action=verificar_otp" , true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("otp="+otp);

    }
    
    $('input[name=proximo2]').on('click', function(){  //verificação do SMS msg91

        if($('#sms').val() == ''){
            lancarErro(11);
        }else{

            if($('#sms').val().length != 6 || $('#sms').val().length > 6){
                lancarErro(10);
            }else{ //AQUI RODA A ROTINA DE VERIFICAR OTP

                if(otpValido == 1){ //vê se a resposta do servidor foi 1 ou 2
                    lancarErro(99);
                    proximo($(this)); //código correto
                }else{
                    lancarErro(12);
                }

            }

        }


    });


    $('input[name=cadastrar]').on('click', function(evento){
        var array = formulario.serializeArray();
        lancarErro(99);

        if(array[2].value == '' && array[3].value == ''){ //SEM PIN DIGITADO

              //erro 5
              lancarErro(5);

        }else if(array[2].value.length != 4){ //PIN DE 4 DÍGITOS !!!!

             //erro 6
             lancarErro(6);

        }else if(array[3].value == '' && array[2].value != ''){ //CONFIRMAR PIN

             //erro 7
             lancarErro(7);

        }else if(array[2].value != array[3].value){ //PINS NÃO CORRESPONDEM

             //erro 8

             lancarErro(8);

         }else{

            pin = array[2].value;

            console.log("cadastro completo");

            //ajax de cadastro !
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.replace("site.php");
                }
            };
            xhttp.open("POST", "accessManager.php?tipoOperacao=cadastro" , true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("nome="+nome+"&telefone="+telefone+"&pin="+pin);
        }

        evento.preventDefault();

    });
});



function checkTelefone(tel){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            gg = this.responseText;
        }
    };
    xhttp.open("POST", "accessManager.php?tipoOperacao=consulta" , true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("telefone="+tel);
}


function telefoneJaCadastrado(){

    if(gg == 4){
        return true;
    }else{
        return false;
    }
}

function lancarErro(codigoErro){
    //função para lançar erros na hora do cadastro.

    switch(codigoErro){

        case 1:
        $('.erro').html('<div class="erro-css"><p>Insira seu nome</p></div>');
        break;

        case 2:
        $('.erro').html('<div class="erro-css"><p>Insira seu NÚMERO DE TELEFONE</p></div>');
        break;

        case 3:
        $('.erro').html('<div class="erro-css"><p>Digite um TELEFONE válido</p></div>');
        break;

        case 4:
        $('.erro').html('<div class="erro-css"><p>CÓDIGO INCORRETO</p></div>');
        break;

        case 5:
        $('.erro').html('<div class="erro-css"><p>Digite UM PIN !</p></div>');
        break;

        case 6:
        $('.erro').html('<div class="erro-css"><p>Insira um pin de 4 digitos!</p></div>');
        break;

        case 7:
        $('.erro').html('<div class="erro-css"><p>Confirme O PIN !</p></div>');
        break;

        case 8:
        $('.erro').html('<div class="erro-css"><p>Os PINS não correspondem !</p></div>');
        break;

        case 9:
        $('.erro').html('<div class="erro-css"><p>NÚMERO DE TELEFONE JÁ CADASTRADO !</p></div>');
        break;

        case 10:
        $('.erro').html('<div class="erro-css"><p>CÓDIGO DE 6 DÍGITOS</p></div>');
        break;

        case 11:
        $('.erro').html('<div class="erro-css"><p>INSIRA O CÓDIGO ! !</p></div>');
        break;

        case 12:
        $('.erro').html('<div class="erro-css"><p>Código Incorreto - Insira novamente </p></div>');
        break;

        case 99: //LIMPAR CAMPO DE ERROS
        $('.erro').html('');
        break;
    }
}