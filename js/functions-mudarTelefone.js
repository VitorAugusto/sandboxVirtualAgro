console.log("carregou MUDAR TELEFONE ");

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

var telefone;
var gg;
var otpValido;

$(function(){
    var atual_fs, next_fs, prev_fs;
    var formulario = $('form[name=formulario]');

    function proximo(elem){ //PROXIMO FIELDSET
        atual_fs = $(elem).parent();
        next_fs = $(elem).parent().next();    

        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        atual_fs.hide(800);
        next_fs.show(800);
    }

    $('.prev').on('click', function(){ //RETORNAR AO FIELDSET ANTERIOR
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

        if($('#telefone').val() == ''){ //campo telefone vazio
            lancarErro(3);
        }else if($('#telefone').val().length != 15){ //telefone incompleto
            lancarErro(1);
        }else{
            if(telefoneJaCadastrado()){ //telefone já cadastrado no sistema
                lancarErro(2);
            }else{
                //passou em tudo..
                lancarErro(99);
                console.log("PASSOU");

                telefone = $('#telefone').val();

                enviarOTP(telefone);
                proximo($(this));
            }
        }

    })

    $('input[name=proximo2]').on('click', function(){  //verificação do SMS msg91

        if($('#sms').val() == ''){
            lancarErro(4);
        }else{

            if($('#sms').val().length != 6 || $('#sms').val().length > 6){
                lancarErro(5);
            }else{ //AQUI RODA A ROTINA DE VERIFICAR OTP

                if(otpValido == 1){ //vê se a resposta do servidor foi 1 ou 2
                    lancarErro(99);
                    setarNovoTelefone();
                    proximo($(this)); //código correto
                }else{
                    lancarErro(6);
                }

            }

        }


    })
});

function setarNovoTelefone(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        }
    };
    xhttp.open("POST", "accessManager.php?tipoOperacao=atualizar_telefone" , true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("telefone="+telefone);

}


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


function lancarErro(codigoErro){

    switch(codigoErro){

        case 1:
        $('.erro').html('<div class="erro-css"><p>Digite um TELEFONE válido</p></div>');
        break;

        case 2:
        $('.erro').html('<div class="erro-css"><p>NÚMERO DE TELEFONE JÁ CADASTRADO !</p></div>');
        break;

        case 3:
        $('.erro').html('<div class="erro-css"><p>Insira seu novo NÚMERO DE TELEFONE</p></div>');
        break;

        case 4:
        $('.erro').html('<div class="erro-css"><p>INSIRA O CÓDIGO ! !</p></div>');
        break;

        case 5:
        $('.erro').html('<div class="erro-css"><p>CÓDIGO DE 6 DÍGITOS</p></div>');
        break;

        case 6:
        $('.erro').html('<div class="erro-css"><p>Código Incorreto - Insira novamente </p></div>');
        break;

        case 99:
        $('.erro').html('');
        break;
    }
}