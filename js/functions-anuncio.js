$(function(){
    var atual_fs, next_fs, prev_fs;
    var anunciar = $('form[name=anunciar]');

    function proximo(elem){
        atual_fs = $(elem).parent();
        next_fs = $(elem).parent().next();    

        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        atual_fs.hide(800);
        next_fs.show(800);
    }

    $('.prev').click(function(){
        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();
    
        $('.erro').html('');
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        atual_fs.hide(800);
        prev_fs.show(800);
    });
    
    $('input[name=proximo]').click(function(){
    var anunciar = $('form[name=anunciar]');
        var array = anunciar.serializeArray();
            $('.erro').html('');
            proximo($(this));        
    });
    
    $('input[name=proximo2]').click(function(){
        var array = anunciar.serializeArray();
        if(array[0].value == ''){
            $('.erro').html('<div class="erro-css"><p>Escolha o produto que deseja anúnciar</p></div>');
        }else{
            $('.erro').html('');
            proximo($(this));
        }
    });
    

    // $('input[name=anuncio]').click(function(evento){
    //     var array = anunciar.serializeArray();
    //     if(array[3].value == ''){
    //         $('.erro').html('<div class="erro-css"><p>Digite uma senha!</p></div>');
    //     }else if(array[3].value.length < 6){
    //         $('.erro').html('<div class="erro-css"><p>Senha informada menor que 6 digitos!</p></div>');
    //     }else if(array[4].value == ''){
    //         $('.erro').html('<div class="erro-css"><p>Confirme a senha!</p></div>');
    //     }else if(array[3].value != array[4].value){
    //         $('.erro').html('<div class="erro-css"><p>As senhas informadas não correspondem!</p></div>');
    //     }else{
    //         // $.ajax({
    //         //     method: 'post',
    //         //     url: 'accessManager.php?tipoOperacao=cadastro',
    //         //     data: {cadastrar: 'sim', campos: array},
    //         //     success: function(valor){
    //         //         window.location.replace("site.php");
    //         //     }
    //         // }); 
    //     }
    //     evento.preventDefault();
    // });
});