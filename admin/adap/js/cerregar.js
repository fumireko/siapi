/*prestar atenção na utilização dos parenteses e chaves*/
/*iniciamos com $ pra chamar o JQuery e dentro dele iniciamos uma função*/
$(function(){
    /*se clicar na tag de class exibir, iniciamos um uma "sub-função"*/
     $(".exibir").click(function(){
     /*escondemos com fadeOut a tag com id form, podiamos usar tb o hide("fast ou slow"), o 10 é a velocidade a escondê-la*/
       $("#form").fadeOut(10);
       /*definimos as variaveis e informaos as class de CSS contém um valor .val*/
       var nome = $(".nome").val();
       var exibir = $(".exibir").val();
       /*setamos o método POST informamos o arquivo PHP que irá retornar as informaçoẽs, para isso criamos a function retorno, e passmos variavel que criamos e informamos o nome dela*/
       $.post("/assets/html/subhtml/dados.php", {nome: nome, exibir: exibir}, function(mostrar){
       /*a div mostrar que estava com display none agora será exibida, pois nela estará os dados do dados.php*/
       $("#mostrar").fadeIn(2000).html(mostrar)       
    
          });
      });
    
    });