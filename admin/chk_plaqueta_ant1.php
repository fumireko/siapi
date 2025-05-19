<?php
include "../validar_session.php";
include "../Config/config_sistema.php";
$ret_cmei_id = $_GET["id"];
$ret_tipo = $_GET["tipo"];
if ($ret_cmei_id == 0 or $ret_cmei_id == "") {
    $unidade = "Nenhum local especificado";
    $ret_sec_id = "0";
    $ret_cmei_id = "0";
    // echo "<input  type='hidden'  id='nome'  name='nome' type='text' value='" . $unidade . " teste' size = '60' >";
    // echo "<input  type='hidden'  id='id_loc'  name='id_loc' type='text' value='" . $ret_cmei_id . "' size = '60' >";
    //echo "<input  type='hidden'  id='id_sec'  name='id_sec' type='text' value='" . $ret_sec_id . "' size = '60' >";
    //echo "Voce deve selecionar o Local de instalaçao do dispositivo";
} else {
    $sql1 = "SELECT * FROM tbcmei where tbcmei_id ='" . $ret_cmei_id . "' ";
    ($resultado1 = mysqli_query($conn, $sql1)) or
        die("Erro ao selecionar especialidade: " . mysqli_error());
    $qtd = mysqli_num_rows($resultado1); // $option = '';
    if ($qtd == 0) {
        $nome_local = "Nenhum local encontrado";
    } else {
        do {
            $row = mysqli_fetch_assoc($resultado1);
            $nome_local = $row["tbcmei_nome"];
            $ret_sec_id = $row["tbcmei_sec_id"];
            $unidade = $nome_local;
            echo "<input  type='hidden'  id='nome'  name='nome' type='text' value='" .
                $nome_local .
                " teste' size = '60' >";
            echo "<input  type='hidden'  id='id_loc'  name='id_loc' type='text' value='" .
                $ret_cmei_id .
                "' size = '60' >";
            echo "<input  type='hidden'  id='id_sec'  name='id_sec' type='text' value='" .
                $ret_sec_id .
                "' size = '60' >";
        } while ($row = mysqli_fetch_assoc($resultado1));
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Cadastro de departamentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
   
        <script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/java_busplaq.js"></script>
    
        
    
    <!-- Adicionando Javascript -->
   
    </head>
<!-- BEGIN BODY -->

<body>
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
         
    <?php include "index.php"; ?> 
         <!-- aqui termina o menu -->
        <!-- MAIN MENU - END -->
        <!--  SIDEBAR - END -->
        <!-- START CONTENT -->
        
        <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box">
                            <header class="card-header">
                                <h2 class="title">PRE-CADASTRO DE EQUIPAMENTO</h2>
                            </header>
                            
                            <div class="container-fluid" style="padding-bottom: 1em;">
                                <div class="col">
                                    <h4 class="bold text-left"> <?php echo $unidade; ?></h4>
                                    
                                    <?php if ($ret_cmei_id <= 0): ?> <h4 class="text-muted">Escolha um setor antes de cadastrar um equipamento.</h4> <?php endif; ?>
                                        
                                    <a id="gerarExcel" href="./lissetores.php" class="btn btn-primary">Listar setores</a>
                                </div> 
                                                         
                            </div> 
                            
                            <form method="post" action="direciona2.php">    
                                <input  type="hidden"  id="nome"  name="nome" type="text" value=  "<?php echo $unidade; ?>"  size = "10" >
                                <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value=  <?php echo $ret_cmei_id; ?>  size = "10" >
                                <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value=  <?php echo $ret_sec_id; ?>  size = "10" >
                                <input  type="hidden"  id="id_tipo"  name="id_tipo" type="text" value=  <?php echo $ret_tipo; ?>  size = "10" >
                                        
                                <hr>

                                <div class="container-fluid">
                                    <h4 class="bold">Digite o Controle T.I. :</h4>  
                                    <input type="text" id="plaqueta" name="plaqueta" type="text" size="30">
                                </div>
                                <div id="resultado">
                                    
                                </div>
                                    <?php
                                    //include ('conecta_memo.php');
                                    //   include "../Config/config_sistema.php";
                                    $mysqli = new mysqli(
                                        $host,
                                        $user,
                                        $pass,
                                        $db1
                                    );
                                    $ref = "vazio..";
                                    $sql = $mysqli->prepare(
                                        "select id,ctrl_ti,tab_cam ,tab_chave from tb_controle_ti where ctrl_ti ='" .
                                            $ref .
                                            "' ORDER BY id"
                                    );
                                    //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_plaqueta ='" . $ref . "' ORDER BY tbequip_plaqueta");
                                    $sql->execute();
                                    $sql->bind_result(
                                        $id,
                                        $ctrl_ti,
                                        $cam,
                                        $pos
                                    );
                                    //echo "Inicio da visualizaçao <br> ";

                                    echo "
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th></th>                    
                                                        <th></th>                    
                                                    </tr>
                                                </thead>

                                                <tbody>
                                        ";

                                    while ($sql->fetch()) {
                                        echo "
                                            <tr>
                                            <td>$cam</td>
                                            <td> <a href=nota_ind.php?parametro=" .
                                            $cam .
                                            "></a> </td>	              
       
            
                                    </tr>
                                        ";
                                    }
                                    echo "</tbody>     </table>  <br>  ";
                                    //<img src='img\checar1.png' BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = 'Visualizar dados'  /> </a>
                                    //echo "FIM  visualizaçao <br> ";
                                    ?>  
                            </form>      
                        </section>
                    </div>
                </section>
        </section>
        
</body>

</html>
