<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $tb_atendimento_id = $_REQUEST['tb_atendimento_id'];
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
        $consulta = "SELECT * from tb_atendimento INNER JOIN tbcmei ON tb_atendimento.tb_atendimento_departamento = tbcmei.tbcmei_id where tb_atendimento_id like '%".$tb_atendimento_id."%'";
        $query  = mysql_query($consulta) or die(mysql_error());
        while($linhas = mysql_fetch_assoc($query)) {
            $i=0;
            $data = $linhas['tb_atendimento_dia'];
            $dt = implode("/",array_reverse(explode("-",$data)));
            $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'";
        ?>
            <table width="828" border="1" cellspacing="0" align="center">
                <tr>
                    <td colspan="6" align="left" bgcolor="#FFFFFF" style="font-size: 14px; color: #000; font-weight: bold;">
                        <h5> <img src="../images/Teste.png" width="747" height="124" vspace="0px" hspace="20px"/></h5></td>
                </tr>

                <tr>
                    <td height="24" colspan="6" bgcolor="#FFFFFF" align="center"><strong>DADOS DO ATENDIMENTO</strong></td>
                </tr>
                <tr>
                    <td height="26" bgcolor="#FFFFFF" colspan="2" align="right">Requerente</td>
                    <td colspan="5" bgcolor="#FFFFFF">
                        <?PHP echo $linhas['tb_atendimento_nome'];?>
                    </td>
                </tr>

                <tr>
                    <td height="24" bgcolor="#FFFFFF" colspan="2" align="right">Data:</td>
                    <td bgcolor="#FFFFFF" colspan="4">
                        <?PHP echo $dt?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Hora:</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['tb_atendimento_hora'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Telefone:</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['tb_atendimento_telefone'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Tipo de Atendimento:</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['tb_atendimento_atendimento'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Assunto</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['tb_atendimento_assunto'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Departamento</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['tbcmei_nome'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Nº/ano</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?php echo $linhas['tb_atendimento_id_ano']?>/<?php echo $linhas['tb_atendimento_ano'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Descrição</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['tb_atendimento_descricao'];?>
                    </td>
                </tr>

                <tr>
                    <td height="25" bgcolor="#FFFFFF" colspan="2" align="right">Status</td>
                    <td bgcolor="#FFFFFF" colspan="5">
                        <?PHP echo $linhas['tb_atendimento_status'];?>
                    </td>
                </tr>
                <?php
                                                }    
                                            ?>
                    <?php
                                                $search = "SELECT * FROM tbregistro WHERE tbregistro_tb_atendimento_id like '%".$tb_atendimento_id."%' ORDER BY tbregistro_id";
                                                $query  = mysql_query($search) or die(mysql_error());
                                            ?>
                        <tr>
                            <td height="24" colspan="6" bgcolor="#FFFFFF" align="center"><strong>REGISTROS</strong></td>
                        </tr>
                        <tr>
                            <td>Dia</td>
                            <td>Hora</td>
                            <td>Mensagem</td>
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
                                </tr>
                            </tbody>
                            <?php
                                                }    
                                            ?>
            </table>
    </body>

    </html>