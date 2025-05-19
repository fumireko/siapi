<?php
   include "../Config/config_sistema.php";
   include "upload.php";
?>
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
                <h2 class="title pull-left">Modelo de documentos - Controladoria e Finanças</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <label>Arquivo</label><br>
                            <input name="dados_documento" required type="file" class="input"/>
                            <input type="hidden" name="tipo_arquivo" id="tipo_arquivo" value="6">
                            <br>

                            <!--Enviar -->
                            <button type="submit" name="btn-upload">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-bordered ">
            <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Download</th>
                    </tr>
                </thead>
            <?php
            $query = "SELECT * FROM arquivo";
            $result = mysql_query($query) or die('Erro, query falhou');

            if(mysql_num_rows($result) > 0){
                while(list($id, $nome,$data_up, $tipo_arquivo) = mysql_fetch_array($result)){
                    if($tipo_arquivo == 6){
                        echo"<tbody>
                                <tr>
                                    <th scope='row'>$nome</th>
                                    <td><a href='download.php?file=$nome&tipo_arq=$tipo_arquivo'>Baixar</a></td>
                                </tr>
                            </tbody>";
                    }
                }
            }
            ?>
            </table>
        </section>

    </div>
</section>