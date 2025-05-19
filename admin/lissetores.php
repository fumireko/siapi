<?php
include "../validar_session.php";
include "../Config/config_sistema.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SEMED - Sistema de Gestao Escolar</title>
<style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
    .titulos{
        font-size: 2rem;
        font-family: 'Open Sans Condensed', sans-serif;
        color: rgba(31, 181, 172, 1.0);
        text-align: center;
    }
    .titulos:after, .titulos:before {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: rgba(31, 181, 172, 1.0);
        margin: auto;
    }
    </style>  
</head>
<!-- BEGIN BODY -->
<body>
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
    <?php include "index.php"; ?> 
        <!-- aqui termina o menu -->
        <div id="main-content">

            <section class="wrapper main-wrapper">

                <div class="clearfix"></div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 1em">
                    <div class="page-title">
                        <div class="pull-left">
                            <h1 class="title">Lista de Departamentos</h1>
                            <a id="gerarExcel" href="./cadcmei.php" class="btn btn-primary">Novo Setor</a>  
                        </div>
                    </div>
                </div>

                <div class="box container-fluid">
        
                    <form id="form1" name="form1" method="post" action="atendimentos.php" enctype="multipart/form-data"></form>

                <?php
                $quantidade = 100000;
                $pagina = isset($_GET["pagina"]) ? (int) $_GET["pagina"] : 1;
                $inicio = $quantidade * $pagina - $quantidade;
                $sql = "SELECT tbcmei_id, tbcmei_nome, 
                tbcmei_tel, tbcmei_coord , tbcmei_cep, tbcmei_end, tbcmei_num, 
                tbcmei_bairro, tbcmei_regiao, tbcmei_sec_id, sec_id, sec_nome
                from tbcmei  
                INNER JOIN tbsecretaria ON tbcmei.tbcmei_sec_id = tbsecretaria.sec_id
                order by tbcmei_nome ";
                $sql .= " LIMIT " . $inicio . "," . $quantidade;
                ($qr = mysqli_query($conn, $sql)) or die(mysqli_error());
                ?>

                <table id="example" class="table table-hover table-bordered display" cellspacing="0" width="100%">
                    <thead>
                        <tr>               
                            <th>Ação</th>         
                            <th>Cod</th>
                            <th>Departamento</th>
                            <th>Telefone</th>
                            <th>Coordenação</th>
                            <th>CEP</th>
                            <th>Enedreço</th>
                            <th>Numero</th>
                            <th>Bairro</th>
                            <th>Região</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php while ($ln = mysqli_fetch_assoc($qr)): ?>
                                
                        <tr>    
                            <td>
                                <div class="d-flex flex-column">
                                    <a href="precadequip.php?id=<?php echo $ln[
                                        "tbcmei_id"
                                    ]; ?>">Selecionar</a>
                                    / 
                                    <a href="editacmequip.php?tbcmei_id=<?php echo $ln[
                                        "tbcmei_id"
                                    ]; ?>">Editar</a>
                                </div>
                            </td>
                            <td><?php echo $ln["tbcmei_id"]; ?></td>
                            <td><?php echo $ln["tbcmei_nome"]; ?></td>
                            <td><?php echo $ln["tbcmei_tel"]; ?></td>
                            <td><?php echo $ln["tbcmei_coord"]; ?></td>
                            <td><?php echo $ln["tbcmei_cep"]; ?></td>
                            <td><?php echo $ln["tbcmei_end"]; ?></td>
                            <td><?php echo $ln["tbcmei_num"]; ?></td>
                            <td><?php echo $ln["tbcmei_bairro"]; ?></td>
                            <td><?php echo $ln["tbcmei_regiao"]; ?></td>
                        </tr>

                    <?php endWhile; ?>    
                    </tbody>                              
                </table>
                
            </section>               <!-- ********************************************** -->
        </div>

</body>

</html>