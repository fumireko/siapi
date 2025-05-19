<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $id_solicitacao = $_REQUEST['id_solicitacao'];
   if (!isset($_SESSION)){
    session_start();
   }
   ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">

    <head>
        <meta name="author" content="Admin" />
        <title>SEMED - Sistema de Gestao Escolar</title>
    </head>
    <!-- BEGIN BODY -->

    <body>

        <?php
        $consulta = "SELECT * from solicitacao_servicos where id_solicitacao like '%".$id_solicitacao."%'";
        $query  = mysql_query($consulta) or die(mysql_error());
        while($linhas = mysql_fetch_assoc($query)) {
            $i=0;
            $abertura = $linhas['dia_solic'];
            $comeco = $linhas['dia_comeco'];
            $fim = $linhas['dia_fim'];
            $dti = implode("/",array_reverse(explode("-",$abertura)));
            $dtc = implode("/",array_reverse(explode("-",$comeco)));
            $dtf = implode("/",array_reverse(explode("-",$fim)));
            $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'";
        ?>
            <table width="828" border="1" cellspacing="0" align="center">
                <tr>
                    <td colspan="6" align="left" bgcolor="#FFFFFF" style="font-size: 14px; color: #000; font-weight: bold;">
                        <h5> <img src="../images/Teste.png" width="747" height="124" vspace="0px" hspace="20px"/></h5></td>
                </tr>

                <tr>
                    <td height="24" colspan="6" bgcolor="#FFFFFF" align="center"><strong>DADOS DO SERVIÇO</strong></td>
                </tr>
                <tr>
                    <td height="26" bgcolor="#FFFFFF" colspan="2" align="right">Nº</td>
                    <td colspan="5" bgcolor="#FFFFFF">
                        <?PHP echo $linhas['id_pedido']?>/<?PHP echo $linhas['ano_pedido'];?>
                    </td>
                </tr>

                <tr>
                    <td height="26" bgcolor="#FFFFFF" colspan="2" align="right">Nº de Protocolo</td>
                    <td colspan="5" bgcolor="#FFFFFF">
                        <?PHP echo $linhas['num_pedido']?>
                    </td>
                </tr>

                <tr>
                    <td height="24" bgcolor="#FFFFFF" colspan="2" align="right">Data Abertura:</td>
                    <td bgcolor="#FFFFFF" colspan="4">
                        <?PHP echo $dti?>
                    </td>
                </tr>

                <tr>
                    <td height="24" bgcolor="#FFFFFF" colspan="2" align="right">Data Começo:</td>
                    <td bgcolor="#FFFFFF" colspan="4">
                        <?PHP echo $dtc?>
                    </td>
                </tr>

                <tr>
                    <td height="24" bgcolor="#FFFFFF" colspan="2" align="right">Data Fim:</td>
                    <td bgcolor="#FFFFFF" colspan="4">
                        <?PHP echo $dtf?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Unidade:</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['unidade'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Tipo De Serviço:</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['tipo_servico'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Categoria:</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['categoria'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Status</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['status_obra'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Solicitante</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['solicitante'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Email</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?php echo $linhas['email']?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Local</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['local_sala'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Material Disponivel</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['material_disponivel'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Descrição</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['descricao_servico_txt'];?>
                    </td>
                </tr>

                <?php
                                                }    
                                            ?>
                    <?php
                                                $search = "SELECT * FROM tbregistro INNER JOIN usuarios on tbregistro.tbregistro_usuario = usuarios.id WHERE tbregistro_id_solicitacao like '%".$id_solicitacao."%' ORDER BY tbregistro_id";
                                                $query  = mysql_query($search) or die(mysql_error());
                                            ?>
                        <tr>
                            <td height="24" colspan="6" bgcolor="#FFFFFF" align="center"><strong>REGISTROS</strong></td>
                        </tr>
                        <tr>
                            <td>Dia</td>
                            <td>Hora</td>
                            <td>Registro</td>
                            <td>Usuário</td>
                        </tr>
                        <?php
                                                $t = 0;    
                                                $i=0;
                                                while( $linha = mysql_fetch_assoc($query) )
                                                {
                                                    $dia = $linha['dia_registro'];
                                                    $data= implode("/",array_reverse(explode("-",$dia )));
                                                    $t++;
                                                    $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                            ?>
                            <tbody>
                                <tr>
                                    <td align="center" colspan="5">
                                        <?php echo $t;?>&#867; Registro
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $data?>
                                    </td>
                                    <td>
                                        <?php echo $linha['hora_registro'];?>
                                    </td>
                                    <td>
                                        <?php echo $linha['tbregistro_msg'];?>
                                    </td>
                                    <td>
                                        <?php echo $linha['nome'];?>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                                                }    
                                            ?>
            </table>
    </body>

    </html>