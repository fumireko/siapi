<?php
// inclui o arquiv o de configuração do sistema
//include "Config/config_sistema.php";
include "../validar_session.php";
include "../Config/config_sistema.php";


// revebe dados do formulario

$tipo = $_POST['tipo'];
$local = $_POST['nome'];
$local_id = $_POST['id_loc'];
$sec_id = $_POST['id_sec'];
//echo "tipo de Dispositivo  " . $tipo . " Local " . $local . " Local ID " . $local_id;
if (($tipo == "7")){ // caso de componentes sem a necessidade de local especifico .
    $local = "Liberado";
    $local_id = "Liberado";
    $sec_id = "Liberado";
}

if (($local =="Nenhum local especificado")or($local =="") or ($local == "0"))
    {
  //  echo "tipo de Dispositivo  " . $tipo . " Local " . $local . " Local ID " . $local_id;
    header("Location: precadequip.php?id=0");
    
    }
else
    {


            // verifica e direciona para o formulario correto

    switch ($tipo) {
        case '0': {
            header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=0");
        }
            break;
        case '1': {
            // micro computador    echo "tipo ".$tipo." Local ".$local." Local ID ".$local_id;
            header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=1");
        }
            break;
        case '2': {
            header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");

        }
            break;
        case '3': {
            //echo "3";
            //echo "tipo de Dispositivo  Multiplos PCs no mesmo Local :  " . $tipo . " Local " . $local . " Local ID " . $local_id;
            header("Location: precad_multiplos.php?id=" . $local_id."");
        }
            break;
        case '4': {
            //          echo "4";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=4");
            //echo "tipo de Dispositivo Impressoras codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '5': {
            //                echo "5";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=5");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '6': {
            //                echo "5";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=6");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '7': {
            //                echo "componentes / Processador , Placa Mae e Kit prontos ";
             header("Location: caddiversos.php?loc=" . $local_id . "&tipo=7");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '8': {
            //                echo "Monitores";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=8");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '9': {
            //                echo "Tablets";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=9");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '10': {
            //                echo "Racks";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=10");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '11': {
            //                echo "pactch";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=11");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '12': {
            //                echo "Notebooks";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=12");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '13': {
            //             // procedimento de exclusao de registros por ID ou CTI mediante senha 
            include "bco_fun2.php";
           $modalidade = $_POST['tabela'];
            $cti_digitado = $_POST['cti'];
            $senha = $_POST['senha'];
                $nome_usuario = "GESTOR";
            if ($senha=="85574511991")
            {
                if (isset($_POST['ctrl']) == "id") {
                    echo $_POST['ctrl'] . "<br>";
                    //   echo $modalidade . "    " . $cti_digitado;
                    echo "<br><br>";
                    switch ($modalidade) {
                        case '0': {
                            //header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=0");
                        }
                            break;
                        case '1': {

                            $sql = "DELETE FROM `tbequip` WHERE `tbequip`.`tbequip_id` ='" . $cti_digitado . "'";
                            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            //$linha = mysqli_fetch_assoc($dados);
                            //  $total = mysqli_num_rows($dados);
                            if (mysqli_query($conn, $sql)) {
                                echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado ";
                                add_acao("EXC_equip", $cti_digitado, $nome_usuario);
                            } else
                                echo " Erro no delete do CTI " . $cti_digitado . "  realizado ";
                        }
                            break;
                        case '2': {
                            $sql = " DELETE FROM `tb_diversos` WHERE id ='" . $cti_digitado . "'";

                            // $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            //$linha = mysqli_fetch_assoc($dados);
                            //$total = mysqli_num_rows($dados);
                            if (mysqli_query($conn, $sql)) {
                                echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado ";
                                add_acao("EXC_div", $cti_digitado, $nome_usuario);
                            } else
                                echo " Erro no delete do CTI " . $cti_digitado . "  realizado ";

                        }
                            break;
                        case '3': {
                            $sql = " DELETE FROM `tb_monitores` WHERE id ='" . $cti_digitado . "'";

                            //$dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            //  $linha = mysqli_fetch_assoc($dados);
                            //$total = mysqli_num_rows($dados);
                            if (mysqli_query($conn, $sql)) {
                                echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado ";
                                add_acao("EXC_mon", $cti_digitado, $nome_usuario);
                            } else
                                echo " Erro no delete do CTI " . $cti_digitado . "  realizado ";

                        }
                            break;
                        case '4': {
                            $sql = " DELETE FROM `tb_controle_ti` WHERE id ='" . $cti_digitado . "'";

                            //$dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            //  $linha = mysqli_fetch_assoc($dados);
                            //$total = mysqli_num_rows($dados);
                            if (mysqli_query($conn, $sql)) {
                                echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado ";
                                add_acao("EXC_cti", $cti_digitado, $nome_usuario);
                            } else
                                echo " Erro no delete do CTI " . $cti_digitado . "  realizado ";

                        }
                            break;
                        case '5': {
                            //$cod_cti = substr(ret_caminho_ctrl_ti($conn, $cti_digitado), 0, 1);  // codigo da tabela id_equip  do pc novo buscado no controle_ti    
                            echo " Desabilitado essa opcao ";

                      } // fim do switch modalidade 
                            break;
                    
     
                      } // FIM DO SWITCH




                } else {
                    echo $_POST['ctrl'] . "<br>";

                    //   echo $modalidade . "    " . $cti_digitado;
                    echo "<br><br>";
                    switch ($modalidade) {
                        case '0': {
                            //header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=0");
                        }
                            break;
                        case '1': {

                            $sql = "DELETE FROM `tbequip` WHERE `tbequip`.`ctrl_ti` ='" . $cti_digitado . "'";
                            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            //$linha = mysqli_fetch_assoc($dados);
                            //  $total = mysqli_num_rows($dados);
                            if (mysqli_query($conn, $sql)) {
                                echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado ";
                                add_acao("EXC_equip", $cti_digitado, $nome_usuario);
                            } else
                                echo " Erro no delete do CTI " . $cti_digitado . "  realizado ";
                        }
                            break;
                        case '2': {
                            $sql = " DELETE FROM `tb_diversos` WHERE ctrl_ti ='" . $cti_digitado . "'";

                            // $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            //$linha = mysqli_fetch_assoc($dados);
                            //$total = mysqli_num_rows($dados);
                            if (mysqli_query($conn, $sql)) {
                                echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado ";
                                add_acao("EXC_div", $cti_digitado, $nome_usuario);
                            } else
                                echo " Erro no delete do CTI " . $cti_digitado . "  realizado ";

                        }
                            break;
                        case '3': {
                            $sql = " DELETE FROM `tb_monitores` WHERE ctrl_ti ='" . $cti_digitado . "'";

                            //$dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            //  $linha = mysqli_fetch_assoc($dados);
                            //$total = mysqli_num_rows($dados);
                            if (mysqli_query($conn, $sql)) {
                                echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado ";
                                add_acao("EXC_mon", $cti_digitado, $nome_usuario);
                            } else
                                echo " Erro no delete do CTI " . $cti_digitado . "  realizado ";

                        }
                            break;
                        case '4': {
                            $sql = " DELETE FROM `tb_controle_ti` WHERE ctrl_ti ='" . $cti_digitado . "'";

                            //$dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            //  $linha = mysqli_fetch_assoc($dados);
                            //$total = mysqli_num_rows($dados);
                            if (mysqli_query($conn, $sql)) {
                                echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado ";
                                add_acao("EXC_cti", $cti_digitado, $nome_usuario);
                            } else
                                echo " Erro no delete do CTI " . $cti_digitado . "  realizado ";

                        }
                            break;
                        case '5': {
                            $cod_cti = substr(ret_caminho_ctrl_ti($conn, $cti_digitado), 0, 1);  // codigo da tabela id_equip  do pc novo buscado no controle_ti    
                            echo $cod_cti;
                            if ($cod_cti == "C") {
                                // elimina cti controle_ti e cti tbequip
                                $sql = " DELETE FROM `tb_controle_ti` WHERE ctrl_ti ='" . $cti_digitado . "'";
                                if (mysqli_query($conn, $sql)) {
                                    $sql1 = " DELETE FROM `tbequip` WHERE ctrl_ti ='" . $cti_digitado . "'";
                                    if (mysqli_query($conn, $sql1)) {
                                        echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado nas tabelas Controle e Tabela equip ";
                                    } else
                                        echo " Erro de Exclusao em tbequip  do CTI " . $cti_digitado . "  nao realizado nas tabela equip ";
                                } else
                                    echo " Erro de Exclusao em tb_controle TI  do CTI " . $cti_digitado . "  nao realizado nas tabela  ";
                            } else {
                                if (($cod_cti == "D") || ($cod_cti == "T")) {
                                    // elimina cti controle_ti e cti tb_diversos
                                    $sql = " DELETE FROM `tb_controle_ti` WHERE ctrl_ti ='" . $cti_digitado . "'";
                                    if (mysqli_query($conn, $sql)) {
                                        $sql1 = " DELETE FROM `tb_diversos` WHERE ctrl_ti ='" . $cti_digitado . "'";
                                        if (mysqli_query($conn, $sql1)) {
                                            echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado nas tabelas Controle e Tabela Diversos ";
                                        } else
                                            echo " Erro de Exclusao em tb_diveros  do CTI " . $cti_digitado . "  nao realizado nas tabela Diversos ";
                                    } else
                                        echo " Erro de Exclusao em tb_controle TI  do CTI " . $cti_digitado . "  nao realizado nas tabela  ";

                                } else {
                                    if ($cod_cti == "M") {
                                        // elimina cti controle_ti e cti tb_monitores
                                        $sql = " DELETE FROM `tb_controle_ti` WHERE ctrl_ti ='" . $cti_digitado . "'";
                                        if (mysqli_query($conn, $sql)) {
                                            $sql1 = " DELETE FROM `tb_monitores` WHERE ctrl_ti ='" . $cti_digitado . "'";
                                            if (mysqli_query($conn, $sql1)) {
                                                echo " Processo de exclusao do CTI " . $cti_digitado . "  realizado nas tabelas Controle e Tabela Monitores ";
                                            } else
                                                echo " Erro de Exclusao em tb_monitores  do CTI " . $cti_digitado . "  nao realizado nas tabela Monitores ";
                                        } else
                                            echo " Erro de Exclusao em tb_controle TI  do CTI " . $cti_digitado . "  nao realizado nas tabela  ";


                                    }


                                }
                            }

                            //}


                        }

                            break;
                    } // fim do switch modalidade 
                    echo " <br><br><center> <strong>Indisponivel Momentaneamente  </strong>";
                    echo "<br><br> <a href='busca_diversos.php' title='Consultar Equipamentos'> Consultar Equipamentos</a><br /><br />";
                    echo "</center>";
                }// fim da opcao if cti
            }// fim da condicional senha ok
            else{
                echo " <br><br><center> <strong>Indisponivel Momentaneamente senha INCORRETA  </strong>";
                echo "<br><br> <a href='busca_diversos.php' title='Consultar Equipamentos'> Consultar Equipamentos</a><br /><br />";    
            }
                   }
            break;
        case '14': {
            //                echo " multiplos Monitores;
            header("Location: cadequipmult_mon.php?loc=" . $local_id . "&id_ref=0");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '15': {
            include "bco_fun2.php";
            //                insere notificacoes em arquivo txrt;
          //   echo "insere notificacao :   " . $tipo  ;
            // header("Location: cadequip2.php?par=outros");
            $agora = date('d/m/Y H:i');
            $usuario_ant = $_POST['usuario'];
             $titulo = $_POST['titulo'];
             $descricao = $_POST['descricao'];

            // if(empty($usuario_ant))                           //(empty($usuario_ant)))
            // if(isset($usuario_ant))                           //(empty($usuario_ant))) 
             if($descricao=="")                           //(empty($usuario_ant)))
            {
               echo " <h1><br><br> <P align='center'> ";
                    echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#FA6938' >   ";
                    echo "--------------------------------------------------------------------------------------------------------<br>";
                    echo "<br> <br>  <b> Algum campo não esta correto , revise a seus dados digitados !    <br>  <br> ";
                    echo "--------------------------------------------------------------------------------------------------------<br>";
                   echo "<br><br> <a href='informa_correcao.php' title='Incio do sistema'> Voltar </a><br /><br />";   
                    echo "</font>";
                    echo "</h1> </P>";
              
             //   echo " </b> </center>";
             }
             else {
            $nomeArquivo = "correcao.txt";
            $conteudo =  " Data : ". $agora. "  Usuario ".$usuario_ant."    Titulo : ".$titulo. "  Descricao :".$descricao. PHP_EOL;  

            //$msg = 'teste' . PHP_EOL;
            //file_put_contents('lista.txt', $msg, FILE_APPEND);
            file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
            $arquivo = fopen($_SERVER['DOCUMENT_ROOT']. $nomeArquivo, 'w');
                if($arquivo) 
                {
                // Escreve no arquivo
                    fwrite($arquivo,$conteudo);
                // fecha o arquivo
                    fclose($arquivo);
                }
                else
                {
       
                }
                echo " <br><br> <center> <b> Notificacao Registrada com sucesso !   " ;
                add_acao("In_notif", $titulo, $usuario_ant);
           echo "<br><br> <a href='newsfeed.php' title='Incio do sistema'> Inicio </a><br /><br />";    
        echo " </b> </center>";
             }
        }
            break;
        case '16': {
            //                echo "Acess Point";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=16");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '17': { // cadastro de nobreak
            //                echo "Acess Point";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=17");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '18': { // cadastro de modulos de baterias
            //                echo "Acess Point";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=18");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '19': { // cadastro de Controlador WI-Fi
            //                echo "Acess Point";
            header("Location: chk_plaquetadiv.php?id=" . $local_id . "&tipo=19");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '20': { // cadastro de Chromebooks
            //                echo "Acess Point";
             header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=20");
            //echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;




    }   
    
}
//    header("Location: cadequip2.php?par=computador");



	//header("Location: index.php?par=Erro_qr0");

?>

