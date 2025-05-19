<?php
include "bco_fun.php";

//include "../validar_session.php";  
//include "../Config/config_sistema.php";
//include "bco_fun.php";
if (isset($_GET["par"])) {
    $tipo = $_GET['par'];

} else {
    $tipo = "0";
}

switch ($tipo) {
    case '0': {
        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_nome";


        break;
    }
    case '1': {
        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_cpf";


        break;
    }
    case '2': {
        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_curso";


        break;
    }
    case '3': {
        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_unipref";



        break;
    }
    case '4': {
        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_status";



        break;
    }
    case '5': {
        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_nome desc";


        break;
    }
    case '6': {
        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_cpf desc";


        break;
    }
    case '7': {
        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_curso desc";


        break;
    }
    case '8': {
        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_unipref desc";



        break;
    }
    case '9': {
        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                                FROM tbestagiario 
                                JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                                JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                                ORDER BY tbestagiario.tbestagiario_status desc ";



        break;
    }

}




?>
<!DOCTYPE html>
<html lang='pt-br' class=''>

<head>

 
  <title>Listar Curriculos</title>

  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link rel="shortcut icon" type="image/x-icon" href="#">
  <link rel="mask-icon" href="#" color="#111">
  <link rel="canonical" href="">

  
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/rwd.table.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


<style>
    h2 {
        text-align: center;
        padding: 20px 0;
    }

    .table-bordered {
        border: 1px solid #ddd !important;
    }

    table caption {
        padding: .5em 0;
    }

    @media screen and (max-width: 767px) {
        table caption {
            display: none;
        }
    }

    .p {
        text-align: center;
        padding-top: 140px;
        font-size: 14px;
    }




</style>
</head>

<h2>Controle Curriculos</h2>


<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive" data-pattern="priority-columns">


                            <?php
                           
                    //        $sql = "SELECT tbestagiario.tbestagiario_id, tbestagiario.tbestagiario_nome, tbestagiario.tbestagiario_cpf, tbestagiario.tbestagiario_status,tbestagiario.tbestagiario_curso,tbestagiario.tbestagiario_unipref, tbunidade.descricao_unidade, status_estag.descricao_status
                         //       FROM tbestagiario 
                          //      JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
                           //     JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
                            //    ORDER BY tbestagiario.tbestagiario_nome";
                          
                           
                            mysqli_query($conn, 'SET character_set_results=utf8');
                           // $sql = "SELECT * FROM tbestagiario  ORDER BY tbestagiario.tbestagiario_nome";
                                $qr  = mysqli_query($conn,$sql) or die(mysqli_error());
                        

                            $linha = mysqli_fetch_assoc($qr); 
                            ?> 
          <center>
                            <table summary="functionality" class="table table-bordered table-hover" id="example">
                              <caption class="text-center">Busca personalizada de Curriculos Cadastrados <a href="#" target="_blank"> Visualizar</a>:</caption>
                                <thead>
                                    <tr>
                                        <th data-priority="1">  <table>  <tr> <td> <a href="ger_estagiarios.php?par=0"  title="Alfabetica Crescente" target="_blank"> Nome</a> </td>  <td><a href="ger_estagiarios.php?par=5" title="Alfabetica Decrescente" ><img src="img/seta.png" class="media-object  img-responsive img-thumbnail" height="22" width="22" ></a></td>      </tr> </table>          </th>
                                        <th data-priority="2"><table>  <tr> <td><a href="ger_estagiarios.php?par=1" title="Crescente" target="_blank"> CPF</a></td>   <td>  <a href="ger_estagiarios.php?par=6" title="Decrescente"><img src="img/seta.png" class="media-object  img-responsive img-thumbnail" height="22" width="22" ></a></td>      </tr> </table>   </th>
                                        <th data-priority="3"><table>  <tr> <td><a href="ger_estagiarios.php?par=2" title="Alfabetica Crescente" target="_blank"> Curso</a></td>   <td><a href="ger_estagiarios.php?par=7" title="Alfabetica Decrescente"><img src="img/seta.png" class="media-object  img-responsive img-thumbnail" height="22" width="22" ></a></td>      </tr> </table>   </th>
                                        <th data-priority="4"><table>  <tr> <td><a href="ger_estagiarios.php?par=3" title="Alfabetica Crescente" target="_blank"> Unidade Preferencia </a></td>   <td><a href="ger_estagiarios.php?par=8" title="Alfabetica Decrescente" ><img src="img/seta.png" class="media-object  img-responsive img-thumbnail" height="22" width="22" ></a> </td>      </tr> </table>   </th>
                                        <th data-priority="1"><table>  <tr> <td>  <a href="ger_estagiarios.php?par=4" title="Alfabetica Crescente" target="_blank"> Status </a></td>   <td><a href="ger_estagiarios.php?par=9" title="Alfabetica Decrescente"><img src="img/seta.png" class="media-object  img-responsive img-thumbnail" height="22" width="22" ></a></td>      </tr> </table>     </th>
                                        <th data-priority="4">Curriculo</th>
                                        <th data-priority="2">Editar Estagiario</th>
                                    </tr>
                                </thead>

                              






                                <?php
                                if(mysqli_num_rows($qr) > 0){
                                   do{
                                        $id_estag = $linha['tbestagiario_id']; 
                                       $estag_nome =strtoupper($linha['tbestagiario_nome']);
                                        $estag_cpf = $linha['tbestagiario_cpf'];
                                        $estag_curso = $linha['tbestagiario_curso'];
                                        $estag_unid = nomedeunidade($conn,$linha['tbestagiario_unipref']);
                                        $estag_status = estag_status($conn,$linha['tbestagiario_status']);
                                        echo"<tbody>
                                                <tr>
                                                    <td>$estag_nome</td>
                                                    <td>$estag_cpf</td>
                                                    <td>$estag_curso</td>
                                                    <td>$estag_unid</td>
                                                    <td>$estag_status</td>
                                                    <td>
                                                        <a href='gerarCurriculoEstagiario.php?id_estag=$id_estag' class='btn btn-primary' target='_blank'>Curriculo</a>
                                                    </td>
                                                    <td>
                                                        <a href='editarEstag.php?id_estag=$id_estag' class='btn btn-primary'>Editar</a>
                                                    </td>
                                                </tr>
                                            </tbody>";
                                    }while($linha = mysqli_fetch_assoc($qr));
                                
                                }    
                                ?>                                   
                             <tfoot>
            <tr>
              <td colspan="5" class="text-center">Curriculos Gerais <a href="#" target="_blank">Acesso Sistema</a> and <a href="#" target="_blank">Abertura Chamado</a>.</td>
            </tr>
          </tfoot>
                            </table>
              </center>          
              </div>
                    </div>
                </div>
            </div>
<p class="p">Dados Gerais de Curriculos Cadastrados. <a href="#" target="_blank">Inicio</a>.</p>