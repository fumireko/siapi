<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
$tbcmei_nome = $_SESSION['tbcmei_nome'];
?>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="author" content="Admin" />
        <title>SEMED - Sistema de Gestao Escolar</title>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <script src="js/app.js"></script>

        <body>
            <section class="wrapper main-wrapper">
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class="page-title">
                        <div class="pull-left">
                            <h1 class="title">Sistema de Gestão Escolar</h1>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">Matricular aluno</h2>
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div id="consulta">
                                        <div class="row">
                                            <div class="row">
                                                <div class="form-group  col-md-6">
                                                    <form class="form-horizontal" method="POST" id="busca_inc" action="atendimentos.php">

                                                        <table>
                                                            <tr>
                                                                <td> <label class="col-md-4 control-label" for="departamento">Departamento</label></td>                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                <select class="form-control m-bot15" name="departamento" required>
                                                                    <option value=""></option>
                                                                    <option value="Recepção">Recepção</option>
                                                                    <option value="RH Educação">RH Educação</option>
                                                                    <option value="Ouvidoria">Ouvidoria</option>
                                                                    <option value="Documentação Escolar-CMEI">Documentação Escolar-cmei</option>
                                                                    <option value="Documentação Escolar-Escolas">Documentação Escolar-Escolas</option>
                                                                    <option value="Pedagógico-Ed-Inf">Pedagógico-Ed-Inf</option>
                                                                    <option value="Pedagógico-Ens-Fund">Pedagógico-Ens-Fund</option>
                                                                    <option value="Transporte Escolar">Transporte Escolar</option>
                                                                    <option value="Suprimentos(Barracão)">Suprimentos(Barracão)</option>
                                                                    <option value="Obras e Manutenção">Obras e Manutenção</option>
                                                                    <option value="Controladorias Compras">Controladorias Compras</option>
                                                                    <option value="CAEC">CAEC</option>
                                                                    <option value="Departamento de Ed.Fisica">Departamento de Educação Fisica</option>
                                                                    <option value="Departamento do Ens.Fundamental">Departamento do Ensino Fundamental</option>
                                                                    <option value="Direção Executiva">Direção Executiva</option>
                                                                    <option value="Gabinete de Secretaria">Gabinete de Secretaria</option>
                                                                </select>
                                                                </td>
                                                                <td>
                                                                    <div align="center"><input type="submit" value="Buscar" name="buscar" class='btn btn-primary' /> </div>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                            </tr>
                                                        </table>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <br />
                                                </thead>
                                                </form>
                                    </div>
                                </div>
                            </div>
                    </section>
                    </div>
            </section>
        </body>

    </html>