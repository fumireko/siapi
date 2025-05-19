
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   if (!isset($_SESSION)){
    session_start();
   }
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];
    // faz consulta no banco de dados
$consulta = mysqli_query($conn,"select * from usuarios where email = '$email_usuario'");
   //$new_sql = mysqli_query("SELECT * FROM usuarios where email = '".$email_usuario."'");
    //$consulta = mysqli_query($conn, $new_sql) ;
?>
<?php 
       include "index.php"
?> 
<style>
    #div2-1,
    #div1-1 {
        height: 30px;
        color: white;
        text-align: center;
        font-size: 150%;
    }
    #div2.col-md-3,
    #div1.col-md-8
    {
        padding:0px !important;
    }
    #div1-1 {
        background-color: #008080;
    }
    #div2-1{
        color: #008080;
    }
</style>
<section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>
                    <div class="col-lg-12">
                            <header>
                            <?php
                                switch ($nivel_usuario){
                                    case 0:
                                    break;
                                    case 1:
                                          echo "<a href='uploadNoticia.php' class='btn btn-primary'>Adicionar Noticia</a>";
                                    break;
                                    default:                                        
                                    break;
                                }
                            ?>
                                <center><h1>Seja Bem-vindo(a) <?php echo $nome_usuario;?>!</h1></center>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <!-- ********************************************** -->
                                        <div class="col-md-8" id="div1">
                                            <div id="div1-1">
                                                Notícias
                                            </div>
                                            <div id="div1-2">
                                                <?php
                                                    $search = "SELECT * FROM noticia ORDER BY id ASC";
                                                    $query  = mysqli_query($conn,$search) ;
                                                  //  $linha = mysqli_fetch_assoc($query);
                                                    ?>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="4">Registro</th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th colspan="1">Dia</th>
                                                        </tr>
                                                    </thead>
                                                <?php
                                                    $t = 0;
                                                    $i=0;
                                                    while($linha = mysqli_fetch_assoc($query)  )
                                                    {
                                                        $dia = $linha['dia_noticia'];
                                                        $data= implode("/",array_reverse(explode("-",$dia )));
                                                        $t++;
                                                
                                                        $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4">
                                                                <?php echo $linha['msg_noticia'];?>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="1">
                                                                <?php echo $data?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                <?php
                                                    }
                                                ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-3" id="div2">

                                            <div id="div2-1">
                                                Downloads
                                            </div>
                                            <div id="div2-2">
                                                <a href="downloads.php?id_arquivo=8"><h4>Tutoriais</h4></a></br>
                                                <a href="downloads.php?id_arquivo=9"><h4>Instruções Normativas</h4></a></br>
                                                <a href="downloads.php?id_arquivo=10"><h4>Orientações</h4></a></br>
                                                <a href="downloads.php?id_arquivo=11"><h4>Memorando Circular</h4></a></br>
											<i>	<a href="precadequip.php?id=0" title="Inserçao de Dispositivos no sistema " ><h4>Cadastro Equipamentos</h4></a></i> </br>
											<i>	<a href="busca_diversos.php" title="Consultar dispositivos cadastrados " ><h4> Consultas  Equipamentos</h4></a> </i> </br>
                                            <i>	<a href="reserva_cti_consulta3.php?page1" title="Consultar a Disponibilidade de CTI  " ><h4> Consultar Disponibilidade de CTI</h4></a> </i> </br>
                                            <i>	<a href="informa_correcao.php" title="Informar possiveis erros , correçoes ou bug no sistema  " ><h4>Informar Inconsistencia no sistema </h4></a> </i> </br>
												
                                            </div>
                                        </div>

                                        <!-- ********************************************** -->
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>
            </section>