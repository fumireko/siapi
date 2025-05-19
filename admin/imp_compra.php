<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $id = $_REQUEST['id'];
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
        $consulta = "SELECT * from compra where id = $id";
        $query  = mysql_query($consulta) or die(mysql_error());
        while($linhas = mysql_fetch_assoc($query)) {
            $i=0;
            $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'";
        ?>
            <table width="828" border="1" cellspacing="0" align="center">
                <tr>
                    <td colspan="6" align="left" bgcolor="#FFFFFF" style="font-size: 14px; color: #000; font-weight: bold;">
                        <h5> <img src="../images/Teste.png" width="747" height="124" vspace="0px" hspace="20px"/></h5></td>
                </tr>

                <tr>
                    <td height="24" colspan="6" bgcolor="#FFFFFF" align="center"><strong>DADOS DA REQUISIÇÃO</strong></td>
                </tr>
                <tr>
                    <td height="26" bgcolor="#FFFFFF" colspan="2" align="right">Requisição Nº</td>
                    <td colspan="5" bgcolor="#FFFFFF">
                        <?PHP echo $linhas['id_pedido']?>/<?PHP echo $linhas['ano_pedido'];?>
                    </td>
                </tr>
                
                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Etapa</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['estagio'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Item</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['item'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Quantidade</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['quantidade'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Justificativa</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['justificativa'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Unidade</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['unidade_usuario'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Substituição ou compra de novo:</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?php echo $linhas['ação']?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Substituição?</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['substitui'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Já Solicitou</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['solicitacao'];?>
                    </td>
                </tr>
                <?php
                                                }    
                                            ?>
                    <?php
                                                $search = "SELECT * FROM tbregistro INNER JOIN usuarios on tbregistro.tbregistro_usuario = usuarios.id WHERE tbregistro_compra_id like '%".$id."%' ORDER BY tbregistro_id";
                                                $query  = mysql_query($search) or die(mysql_error());
                                            ?>
                        <tr>
                            <td height="24" colspan="6" bgcolor="#FFFFFF" align="center"><strong>REGISTROS</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3">Registro</td>
                            <td>Usuário</td>
                        </tr>
                        <?php
                                                $t = 0;    
                                                $i=0;
                                                while( $linha = mysql_fetch_assoc($query) )
                                                {
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
                                    <td colspan="3">
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