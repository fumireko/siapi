var app = angular.module('App', ['ngRoute']);

app.config(function($routeProvider){
    $routeProvider
    .when('/telaDeErro',{
        templateUrl: 'telaErro.html'
    })
    .when('/cadatendimentos',{
        templateUrl: 'cadatendimentos.php'
    })
  
    .when('/caddemanda',{
        templateUrl: 'caddemanda.php'
    })
    .when('/listademanda',{
        templateUrl: 'listademanda.php'
    })

    .when('/cadusuarios',{
        templateUrl: 'cadusuarios.php'
    })

    .when('/cadaluno',{
        templateUrl: 'cadaluno.php'
    })

    .when('/frmalterasenha',{
        templateUrl: 'frmalterasenha.php'
    })

    .when('/cadevento',{
        templateUrl: 'cadevento.php'
    })

    .when('/cadgrupo',{
        templateUrl: 'cadgrupo.php'
    })

    .when('/cadcmei',{
        templateUrl: 'cadcmei.php'
    })

    .when('/salvaaluno',{
        templateUrl: 'salvaaluno.php'
    })

    .when('/search',{
       templateUrl: 'search.php'
    })
    
    .when('/dadosfila',{
        templateUrl: 'dadosfila.php'
    })

    .when('/teste',{
        templateUrl: 'cadUnidadesSemed.php'
    })

    .when('/busca_inc',{
        templateUrl: 'busca_inc.php'
    })

    .when('/matricular',{
    templateUrl: 'matricular.php'
    })
    
    .when('/matricularadm',{
        templateUrl: 'matricularadm.php'
    })

    .when('/transferir',{
        templateUrl: 'transferir.php'
    })
    
    .when('/matriculaluno',{
        templateUrl: 'matriculaluno.php'
    })

    .when('/incfilaadm',{
        templateUrl: 'incfilaadm.php'
    })

    .when('/listatransf',{
        templateUrl: 'listatransf.php'
    })
    .when('/listapre4',{
        templateUrl: 'listapre4.php'
    })

    .when('/abrircha_logado',{
        templateUrl: 'abrircha_logado.php'
    })

    .when('/frmatenderdireto',{
        templateUrl: 'frmatenderdireto.php'
    })
    
    .when('/caddpto',{
        templateUrl: 'caddpto.php'
    })

    .when('/listadepto',{
        templateUrl: 'listadepto.php'
    })
 
    .when('/listauser',{
        templateUrl: 'listauser.php'
    })
    .when('/sistemaOrganiz',{
        templateUrl: 'sistemaOrganiz.php'
    })

    .when('/listademanda',{
        templateUrl: 'listademanda.php.php'
    })

    .when('/busca_cadaluno',{
        templateUrl: 'busca_cadaluno.php'
    })

    .when('/listaequip',{
        templateUrl: 'listaequip.php'
    })

    .when('/cadcursista',{
        templateUrl: 'cadcursista.php'
    })

    .when('/cadsec',{
        templateUrl: 'cadsec.php'
    })

    .when('/atenderdireto',{
        templateUrl: 'atenderdireto.php'
    })

    .when('/frmporstatus',{
        templateUrl: 'frmporstatus.php'
    })
     .when('/listavisitante',{
        templateUrl: 'listavisitante.php'
    })
    
});

$(document).ready(function(){
    $("#pesquisa").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
