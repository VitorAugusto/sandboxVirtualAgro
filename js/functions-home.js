var categorias = [];

        function getProdutos(){

            document.getElementById('conteudo1').style.display = 'none';
            document.getElementById('conteudo2').style.display = 'block';

            $("input:checkbox[name=categoria]:checked").each(function(){
                categorias.push($(this).val());
            });

            for (var i = 0; i < categorias.length; i++) {
                console.log(categorias[i]);
            }




            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("conteudo2").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "searchHome.php?categoria="+ categorias, true);

            //xhttp.setRequestHeader("Content-Type", "application/json");

            xhttp.send();

            $( 'input[type="checkbox"]' ).prop('checked', false); //DESMARCA TODOS OS CHECKBOX
            categorias = []; //ESVAZIA O ARRAY DE CATEGORIAS SELECIONADAS

        }

        function voltar(){

           document.getElementById('conteudo1').style.display = 'block';
           document.getElementById('conteudo2').style.display = 'none';
           location.reload();

       }

       function back(){
        document.getElementById('detalhesproduto').style.display = 'none';
        document.getElementById('telaprodutos').style.display = 'block';
        document.getElementById('detalhesproduto').remove();
        rollbackBotaoVoltar();
    }

    function rollbackBotaoVoltar(){
        document.getElementById('botaoVoltar').setAttribute("onclick","voltar()");
    }

    function exibirProdutoDetails(idProd){
        document.getElementById('botaoVoltar').setAttribute("onclick","back()");
        document.getElementById('conteudo2').style.display = 'block';
        document.getElementById('telaprodutos').style.display = 'none';


        var divDetalhesProduto = document.createElement("div");

        divDetalhesProduto.setAttribute("id", "detalhesproduto");





        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                    //var resposta = document.createTextNode(this.responseText);
                    //divDetalhesProduto.textContent = this.responseText;
                    document.getElementById("conteudo2").appendChild(divDetalhesProduto);
                    document.getElementById('detalhesproduto').style.display = 'block';
                    document.getElementById("detalhesproduto").innerHTML = this.responseText;

                }
            };
            xhttp.open("GET", "produto.php?idProduto="+ idProd , true);

            //xhttp.setRequestHeader("Content-Type", "application/json");

            xhttp.send();


        }

