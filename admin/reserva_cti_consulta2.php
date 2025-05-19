

<style>
    .example{
    height: 450px;
    width: 45%;
    border: 5px solid black;
    background-color: lemonchiffon;
    margin: 0 auto;
}
    .example_ERRO {
        height: 200px;
        width: 45%;
        border: 5px solid black;
        background-color: burlywood;
        margin: 0 auto;
    }


.sidebar{
     height:500px;   
}
    </style>


<?php
include "../validar_session.php";
include "../Config/config_sistema.php";
include "bco_fun.php";
//include "connpdo.php";
//$nome_usuario = $_SESSION['nome_usuario'];
//$email_usuario = $_SESSION['email_usuario'];
$num = $_POST['cti_num'];
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');

/*function insere_RESERVA_BY_CTI($Fconexao, $Fcti, $Fdados)  // insere cti em tabela reservados  
{
    $status = "1";
    $query = "insert into  `tb_reserva_cti` (`status`, `cti`, `dados`)VALUES('" . $status . "','" . $Fcti . "','" . $Fdados . "')";
    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
    return $resultadoDaInsercao;
    //INSERT INTO `tb_reserva_cti` (`id`, `status`, `cti`, `dados`) VALUES (NULL, '1', '3500', 'claudio 11/03/2025');
}/*/

?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                    <meta name="author" content="Admin" />
                                    <title>SMTI - Sistema de Gestao T.I</title>
         
                              <style>
                                  html,
                                  body,
                                  .intro {
                                      height: 100%;
                                  }

                                  table td,
                                  table th {
                                      text-overflow: ellipsis;
                                      white-space: nowrap;
                                      overflow: hidden;
                                  }

                                  thead th {
                                      color: #fff;
                                  }

                                  .card {
                                      border-radius: .5rem;
                                  }

                                  .table-scroll {
                                      border-radius: .5rem;
                                  }

                                      .table-scroll table thead th {
                                          font-size: 1.25rem;
                                      }

                                  thead {
                                      top: 0;
                                      position: sticky;
                                  }


                              </style>
    
    
    
                                </head>
                                <!-- BEGIN BODY -->
                                <body>
                                 <script type="text/javascript" src="ajaxbs_local2_emp.js"> </script>
                                  <script>
                                      $(document).on('Change', "[name='txtnome']", function () {
                               getDados();
                                      });

                                      $(document).ready(function(){
                                           getDados();
                                           };



                            </script>
                                    <!-- START TOPBAR -->
                                    <?php
                                    include "index.php"
                                        ?> 
                                    <div id="main-content">
                                    <section class="wrapper main-wrapper">
                                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                    <div class="page-title">
                                    <div class="pull-left">
                                        <h1 class="title">Sistema de Gestao T.I</h1>
                                    </div>
                                </div>
                                </div>
                                 <div class="clearfix"></div>
                                <section class="box ">
                                <header class="panel_header">
                                        <h2 class="title pull-left">Visualizar Reservas de CTI  </h2><br />
     
                                    <div class="form-group  col-md-6">
                                        </div>
                                        <div class="actions panel_actions pull-right">
                                          
                                        </div>
                                 </header>
                                <form class="form-horizontal" method="POST" id="sdev" action="emprest_consulta2.php">
                                <fieldset>
                                        <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                        role="alert">Solicitacao feita com sucesso!</div>
                                        <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
                                        role="alert">Erro ao realizar a solicitacao!</div>
                                        <!-- CAMPOS OCULTOS PARA INSERÇÃO DE DADOS-->
                                                  <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome; ?>" hidden>
          
                                        <!-- FIM DOS CAMPOS CULTOS PARA INSERÇÃO DE DADOS-->
                                        <br/>
           
                        <section class="intro">
                              <div class="bg-image h-100" style="background-color: #f5f7fa;">
                                <div class="mask d-flex align-items-center h-100">
                                  <div class="container">
                                    <div class="row justify-content-center">
                                      <div class="col-12">
                                        <div class="card">
                                          <div class="card-body p-0">
                                            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 350px">
                                              <table class="table table-striped mb-0">
                                                <thead style="background-color: #002d72;">
                                                  <tr>
                                                             
                                                              <th scope="col"> Status   </th>           
                                                              <th scope="col"> CTI   </th>
                                                              <th scope="col">  Dados </th>
                                                                 <th scope="col"> Reserva  </th>
                                                                <th scope="col"> Uso  </th>
                                                              </tr>
                                                      
                                                </thead>
                                                <tbody>


<?php
/*
$conn = new mysqli($host, $user, $pass, $db1);
// Verifica o status da conexão
if (!$conn) {
    die("A conexão com o banco de dados falhou: " . mysqli_connect_error());
}
/*
// Parâmetros de Conexão

// Conexão MySQLi
$conexao = mysqli_connect($host, $user, $pass, $db1);

// Verificando a conexão
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}
*/
// Determinação da Página Atual
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = 10; // Produtos por página
$offset = ($page - 1) * $perPage;

// Consulta Paginada com Bind
$query = "SELECT * FROM tb_reserva_cti  where cti = '".$num."'ORDER BY abs(cti) desc LIMIT ?, ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ii", $offset, $perPage);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$ret_status = '0';
// Obtendo os resultados
$linha = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Descobrindo o Número Total de Produtos para Paginação
//$totalStmt = mysqli_query($conexao, 'SELECT COUNT(*) FROM tb_reserva_cti  where cti ={$num}');
//$totalRows = mysqli_fetch_row($totalStmt)[0];
//$totalPages = ceil($totalRows / $perPage);

$ret_img_tec = "./img/reservado.png";
$uso = ret_ctrl_ti($conn, $num);
if(ret_ctrl_ti($conexao, $num)==1)
    $uso = "./img/em_uso.png";
    else
    $uso = "./img/sem_uso.png";
// Exibindo os resultados
foreach ($linha as $linha) {
   // echo $linha['status'];
        if ($linha['status'] <> "1") 
           {
             
            ?>
                                                         <tr>
                                                                <td title="<?php echo $linha['status']; ?>">Nao</td>
                                                                <td title="<?php echo $linha['cti']; ?>"></td>
                                                                <td title="<?php echo $linha['dados']; ?>"></td>
                                                                <td title="<?php echo $linha['dados']; ?>"><img src="<?php echo $ret_img_tec; ?>" width="85" height="35"> "<?php echo $uso ?>"> </td>
                                                              <td title="<?php echo $linha['dados']; ?>"><img src="<?php echo $uso; ?>" width="85" height="35"> </td>   
                                                             
                                                          </tr>
            <?php
           } 
        else
            {
            $ret_status = '1'; 
            ?>
                                                         <tr>
                                                                <td title="<?php echo $linha['status']; ?>"><?php echo $linha['status']; ?></td>
                                                                <td title="<?php echo $linha['cti']; ?>"><?php echo $linha['cti']; ?></td>
                                                                <td title="<?php echo $linha['dados']; ?>"><?php echo $linha['dados']; ?></td>
                                                                <td title="<?php echo $linha['dados']; ?>"><img src="<?php echo $ret_img_tec; ?>" width="85" height="35"></td>
                                                           <td title="<?php echo $linha['dados']; ?>"><img src="<?php echo $uso; ?>" width="85" height="35">  </td>   
                                                         </tr>
             <?php
    }
}


if ($ret_status == "0")
{
    if ((ret_ctrl_ti($conexao, $num) == "0"))
        echo "<CENTER> <B> O  CTI  " . $num . " Nao possui reserva de Numeraçao ! logo Pode ser UTILIZADO ! </B> </CENTER>";
    else {
        echo "<br> <CENTER> <B> <p style= 'color:red;' >  O  CTI  " . $num . " ja esta em uso em CTRL_TI  ! <br> Logo nao Pode ser UTILIZADO ! </B> </CENTER> <br> </p>";
        echo "<a href='busca_diversos.php?cti=" . $num . "' title='Consulta Informaçoes do Equipamento '>Consulta Dados do Dispositvo CTI nº " . $num . "  </a><br /><br />";
    }
   }
echo "<a href='reserva_cti_consulta3.php?page=1' title='Voltar para Consulta de Reserva '>Voltar  </a><br /><br />";
//echo "zerado  ".$ret_status;
    /*
    // Links de Paginação
    echo "<p style='text-align: center;'>";
    if ($page == 1) {
        echo '<a href="?page=' . ($page + 1) . '">Proxima Página</a> &nbsp;&nbsp;';
        echo '<a href="?page=' . ($totalPages - 1) . '">Ultima Página</a> &nbsp;&nbsp;';
    } else {
        if ($page == $totalPages) {
            echo '<a href="?page=' . (1) . '">Primeira Página</a> &nbsp;&nbsp;';
            echo '<a href="?page=' . ($page - 1) . '">Página Anterior</a> &nbsp;&nbsp;';
        } else {
            if (($page > 1) && ($page < $totalPages)) {
                echo '<a href="?page=' . (1) . '">Primeira Página</a> &nbsp;&nbsp;';
                echo '<a href="?page=' . ($page - 1) . '">Página Anterior</a> &nbsp;&nbsp;';
                echo '<a href="?page=' . ($page + 1) . '">Próxima Página</a> &nbsp;&nbsp;';
                echo '<a href="?page=' . ($totalPages) . '">Última Página</a> &nbsp;&nbsp;';
                echo " <label>Consulta CTI  :  </label>  <input  type='text'  id='usuario'  name='usuario' type='text'  size = '5'  >";
                echo "  <button id='btn_cadastro_unidade' name='btn_cadastro_unidade' class='btn btn-primary'>Consultar</button> ";

            }
        }
    }
    echo "</p>";
    /*/
mysqli_close($conexao);

?>


                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                
                                            </section>   
                                 
                                 </fieldset>
                                          
                                    </form>
                                                      
                                </section> 
                                </section>   
                                </div>
                                  

                                </body>

                                </html>

                                                    
                                             




