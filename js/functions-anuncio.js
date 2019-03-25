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
        $('.erro').html('');
        $('#categoria').change(function(e){
            var categoria = $('#categoria').val();
            $('.erro').html('<span class="mensagem">Aguarde, carregando ...</span>');  
             
            $.getJSON('accessManager.php?tipoOperacao=consultaProduto='+categoria, function (dados){ 
             
               if (dados.length > 0){    
                  var option = '<option>Selecione o Produto</option>';
                  $.each(dados, function(i, obj){
                      option += '<option value="'+obj.nome+'">'+obj.nome+'</option>';
                  })
                  $('.erro').html('<span class="mensagem">Total de estados encontrados.: '+dados.length+'</span>'); 
               }else{
                  $('.erro').html('<span class="mensagem">Não foram encontrados estados para esse país!</span>');  
               }
               $('#produto').html(option).show(); 
               proximo($(this));

            })
        })
    });
    
    $('input[name=proximo2]').click(function(){
        var array = anunciar.serializeArray();
        if(array[2].value == '--'){
            $('.erro').html('<div class="erro-css"><p>Escolha o produto que deseja anúnciar</p></div>');
        }else{
            $('.erro').html('');
            proximo($(this));
        }
    });
    

<<<<<<< HEAD
    $('input[name=proximo3]').click(function(){
       // if(array[1].value == ''){
      //      $('.erro').html('<div class="erro-css"><p>Escolha o produto que deseja anúnciar</p></div>');
        //}else{
            $('.erro').html('');
            proximo($(this));
        //}
    });

    $('input[name=proximo4]').click(function(){
       // if(array[1].value == ''){
      //      $('.erro').html('<div class="erro-css"><p>Escolha o produto que deseja anúnciar</p></div>');
        //}else{
            $('.erro').html('');
            proximo($(this));
        //}
    });

    $('input[type=submit]').click(function(evento){
        var array = anunciar.serializeArray();

            $.ajax({
                method: 'post',
                url: 'postAnuncio.php',
                data: {anunci: 'sim', campos: array},
                success: function(valor){
                    $('.erro').html(valor);                    
                }
            }); 
        
        evento.preventDefault();
    });
});
=======
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
>>>>>>> b132c1182361064642e1f1745acd62d8e15aad13
