

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
//include "bco_fun.php";
//include "connpdo.php";
//$nome_usuario = $_SESSION['nome_usuario'];
//$email_usuario = $_SESSION['email_usuario'];

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
                                                                 <th scope="col">   </th>
                                                      
                                                              </tr>
                                                      
                                                </thead>
                                                <tbody>


<?php

// Parâmetros de Conexão
$host = 'localhost';
$db = 'colombo_siap';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Opções do PDO
$charset = 'utf8mb4';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// String de Conexão
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

// Determinação da Página Atual
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = 10; // Produtos por página
$offset = ($page - 1) * $perPage;

// Consulta Paginada com Bind Direto no Execute
$stmt = $pdo->prepare('SELECT * FROM tb_reserva_cti ORDER BY abs(cti) desc LIMIT :perPage OFFSET :offset');
$stmt->execute([':perPage' => $perPage, ':offset' => $offset]);
//$products = $stmt->fetchAll();
$linha = $stmt->fetchAll();;
// Descobrindo o Número Total de Produtos para Paginação
$totalStmt = $pdo->query('SELECT COUNT(*) FROM tb_reserva_cti');
$totalRows = $totalStmt->fetchColumn();
$totalPages = ceil($totalRows / $perPage);




// Exibindo os Produtos em uma Tabela
 //echo "<table border='1'><tr><th>ID</th><th>CTI</th><th>Solicitante</th></tr>";
//foreach ($products as $product) {
 //   echo "<tr><td>" . $product['id'] . "</td><td>" . $product['cti'] . "</td><td>" . $product['dados'] . "</td></tr>";
//}
//echo "</table>";


$ret_img_tec = "./img/reservado.png";
foreach ($linha as $linha) {

?>
  
  <?php
                                         //       do {
                                                    ?>
                                                    <tr>
                                                    
                                                     <td title=" <?php echo $linha['status']; ?>">  <?php echo $linha['status']; ?> </td>
                                                     <td title=" <?php echo $linha['cti']; ?>   "> <?php echo $linha['cti']; ?> </td>
                                                     <td title=" <?php echo $linha['dados']; ?>   "> <?php echo $linha['dados']; ?> </td>
                                                      <td title=" <?php echo $linha['dados']; ?>">  <img src="<?php echo $ret_img_tec; ?>" width="85" height="35" > </td>
                                                    </tr>
                                               <?php
                                            //    } while ($linha = mysqli_fetch_assoc($totalStmt));
                                                   } 
                                                ?>
                     
                                                </tbody>
                                              </table>
                
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                          <?php
                                          // Links de Paginação
                                          echo "<p style='text-align: center;'>";
                                          if ($page == 1) {
                                              echo '<a href="?page=' . ($page +1 ) . '"> Proxima  Página  </a> &nbsp &nbsp ';
                                              echo '<a href="?page=' . ($totalPages - 1) . '"> Ultima Página   </a> &nbsp &nbsp ';
                                          }
                                        else  
                                          {
                                              if ($page == $totalPages) {
                                                  echo '<a href="?page=' . (1) . '">  Primeira Página</a> &nbsp &nbsp ';
                                                  echo '<a href="?page=' . ($page - 1) . '"> Página Anterior  </a> &nbsp &nbsp ';
                                              }
                                              else {
                                                  if (($page > 1) and  ($page < $totalPages))
                                                  {
                                                      echo '<a href="?page=' . (1) . '"> Primeira Página  </a> &nbsp &nbsp ';
                                                      echo '<a href="?page=' . ($page - 1) . '"> Página Anterior  </a> &nbsp &nbsp ';
                                                      echo '<a href="?page=' . ($page + 1) . '">  Próxima Página</a> &nbsp &nbsp ';
                                                      echo '<a href="?page=' . ($totalPages) . '"> Ultima Página  </a> &nbsp &nbsp ';
                                                  }          
                                              }

                                          }
                                          echo "</p>";
                                          ?>

                            </section>   
                                 
                                 </fieldset>
                                    </form>
                                                      
                                </section> 
                                </section>   
                                </div>
                                </body>

                                </html>










<br> <br>
































<?php
/*


$hoje = $date;

$ret_img_tec =  "./img/reservado.png";
  $query = "select * from tb_reserva_cti order by abs(cti)  desc ";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);



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
                                                                 <th scope="col">   </th>
                                                      
                                                              </tr>
                                                      
                                                </thead>
                                                <tbody>
  <?php
                                                do {
                                                    ?>
                                                    <tr>
                                                    
                                                     <td title=" <?php echo $linha['status']; ?>">  <?php echo $linha['status']; ?> </td>
                                                     <td title=" <?php echo $linha['cti']; ?>   "> <?php echo $linha['cti']; ?> </td>
                                                     <td title=" <?php echo $linha['dados']; ?>   "> <?php echo $linha['dados']; ?> </td>
                                                      <td title=" <?php echo $linha['dados']; ?>">  <img src="<?php echo $ret_img_tec; ?>" width="85" height="35" > </td>
                                                    </tr>
                                               <?php
                                                } while ($linha = mysqli_fetch_assoc($dados));
                                                //   } 
                                                ?>
                     
                                                </tbody>
                                              </table>

                
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
 
<?php
    //}
   //      }
?>
*/