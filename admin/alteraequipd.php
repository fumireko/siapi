<?php
include "../Config/config_sistema.php";
include "bco_fun.php";
include "conn2.php";

// processo de identificacao da maquina pelo ip .
$ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
//echo "$ip"."<br>"; // imprimi o número IP
$ipF = $_SERVER["REMOTE_ADDR"]; //Pego o IP
//echo "$ip"."<br>"; // imprimi o número IP
$host = gethostbyaddr("$ip"); //pego o host

// registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);  $tabela = "1";// tbequip = 1 diversos =2 monitores=3 "; $nome_usuario = $_SESSION['nome_usuario'];$id_equip = $_POST['codequip'];
$hoje = date("d/m/Y H:i:s ");
$nome_usuario = $_SESSION['nome_usuario'];
$outros = $host;
$tabela = "2";// tbequip = 1 diversos =2 monitores=3 ";

$id_equip = $_POST['codequip'];
/*
id , status , id_equip , mon_marca , mon_tam , mon_plaqueta , mon_tipo , data , mon_saida , usuario , ref , local_id , sec_id , ctrl_ti


*/
$ctrl_ti = $_POST['ctrl_ti'];
$ret_cod_desc = $_POST['descricao_cod'];

switch ($ret_cod_desc)  // 1 -> Patch Panel  2 ->  Rack   3 ->  Switch   4 -> TV 
{
    case '0': {
        echo " NENHUM RETORNO";
        break;
    }
    case '1': // patch panel
        {
         // busca de dados em formulario de alteracao
                   $ret_dispositivo = $_POST['descricao_equip'];       
                    $ret_marca = $_POST['mon_marca'];
                    $ret_rede = $_POST['rede'];
                    $ret_plaqueta = STRTOUPPER($_POST['mon_plaqueta']);
                    $ret_tipo = $_POST['tipo'];
                  
                    //$ret_por_tot = $_POST['por_total'];
                    //$ret_por_uso = $_POST['por_uso'];
                    //$id_por_disp = $_POST['por_disp'];
                    $ret_portas = $_POST['portas'];

                      // busca de dados da base de dados
                        $resumo = "Alterado em " . $hoje . "  usuario :" . $nome_usuario;
                    $tbequip_id = $id_equip;
                    $sql = "SELECT * from tb_diversos where id = '$tbequip_id' ORDER BY id";
                    //$qr = mysql_query($sql) or die(mysql_error());
                    $qr = mysqli_query($conn, $sql);//or die(mysqli_error());
                    //$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
                    //$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
                    while ($ln = mysqli_fetch_assoc($qr)) {
                        // $ret_idb = $_POST['id'];
                        $ret_marcab = $ln['marca'];
                        $ret_redeb = $ln['rede'];
                        $ret_plaquetab = STRTOUPPER($ln['patrimonio']);
                        $ret_tipob = $ln['tipo'];
                        $ret_portasb = $ln['portas'];
                        $ret_id_loc = $ln['local_cod'];
                        //$ret_pcb = $ln['id_equip'];
                        //$ret_loc_id = $ln['local_id'];
                    }

                   

                    if ($id_equip != "") {
                        $teste = "1";
                        //altera registro 
                        $query_alt = "UPDATE `tb_diversos` SET `marca`='" . $ret_marca . "',`tipo`='" . $ret_tipo . "',`patrimonio`='" . $ret_plaqueta . "',`portas`='" . $ret_portas . "',`obs`='" . $resumo . "',`rede`='" . $ret_rede . "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
                        //$query_alt = "UPDATE `tb_diversos` SET `marca`='" . $ret_marca . "',`tipo`='" . $ret_tipo . "',`patrimonio`='" . $ret_plaqueta .  "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";   
                        $result = mysqli_query($conn, $query_alt);

                        if ($result == 0) {
                            echo "<script>alert('DADOS DO ".$ret_dispositivo. "   CTI " . $ctrl_ti . "( " . $id_equip . ") NAO FORAM  ALTERADOS');</script>";
                        } else {
                                // rotina para registrar alteracao // 

                                if ($ret_marcab <> $ret_marca) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                                    $campo = "Marca";
                                    $dados = $ret_marcab." --> ". $ret_marca;
                                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                                }
                                if ($ret_redeb <> $ret_rede) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                                    $campo = "rede";
                                    $dados = $ret_redeb . " --> " . $ret_rede;
                                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                                }
                                if ($ret_plaquetab <> $ret_plaqueta) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                                    $campo = "plaqueta";
                                    $dados = $ret_plaquetab . " --> " . $ret_plaqueta;
                                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                                }
                                if ($ret_tipob <> $ret_tipo) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                                    $campo = "tipo  ";
                                    $dados = $ret_tipob . " --> " . $ret_tipo;
                                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                                }
                                if ($ret_portasb <> $ret_portas) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                                    $campo = "portas";
                                    $dados = $ret_portasb . " --> " . $ret_portas;
                                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                                }

                                //$retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, "usuario", $nome_usuario, $outros, $nome_usuario);
                                // fim da rotina registra alter
                           add_acao("Alt_Patch", $ctrl_ti, $nome_usuario);
                            $loc_cad = nomedolocal($conn, $ret_id_loc);
                            $msg = "<br><br>  ".$ret_dispositivo. "  CTI " . $ctrl_ti . " ( " . $id_equip . " )  \n do  Local ( " . $loc_cad . " ), \n Alterado com sucesso ! ";
                            echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
                            ?>
                           <center> <a href="newsfeed.php"> Inicio </a> </center>
                    <?php
                        }

                    }
                   
        break;
    }
    case '2': { // Rack
                                    // busca de dados em formulario de alteracao
                                    $ret_dispositivo = $_POST['descricao_equip'];
                                  //  $ret_marca = $_POST['mon_marca'];
        
                                    $ret_plaqueta = STRTOUPPER($_POST['mon_plaqueta']);
                                    $ret_tam = $_POST['mon_tam'];
                                   // $ret_tipo = $_POST['tipo'];
                                    $ret_pos = $_POST['posicao'];
                                    $ret_localizacao = $_POST['localizacao'];
                                    $ret_comps = $_POST['comps'];
                                    //$ret_por_tot = $_POST['por_total'];
                                    //$ret_por_uso = $_POST['por_uso'];
                                    //$id_por_disp = $_POST['por_disp'];
                                  //  $ret_portas = $_POST['portas'];

                                    // busca de dados da base de dados
                                    $resumo = "Alterado em " . $hoje . "  usuario :" . $nome_usuario;
                                    $tbequip_id = $id_equip;
                                    $sql = "SELECT * from tb_diversos where id = '$tbequip_id' ORDER BY id";
                                    //$qr = mysql_query($sql) or die(mysql_error());
                                    $qr = mysqli_query($conn, $sql);//or die(mysqli_error());
                                    //$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
                                    //$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
                                    while ($ln = mysqli_fetch_assoc($qr)) {
                                        // $ret_idb = $_POST['id'];
                                        $ret_posb = $ln['posicao'];
                                        //$ret_redeb = $ln['rede'];
                                        $ret_plaquetab = STRTOUPPER($ln['patrimonio']);
                                        $ret_tipob = $ln['tipo'];
                                        $ret_compsb = $ln['comps'];
                                        $ret_localizacaob = $ln['localizacao'];
                                        $ret_id_loc = $ln['local_cod'];
                                        $ret_tamb = $ln['tam'];
                                        //$ret_loc_id = $ln['local_id'];
                                    }



                                    if ($id_equip != "") {
                                        $teste = "1";
                                        //altera registro 
                                        $query_alt = "UPDATE `tb_diversos` SET `patrimonio`='" . $ret_plaqueta . "',`tam`='" . $ret_tam . "',`localizacao`='" . $ret_localizacao . "',`obs`='" . $resumo . "',`posicao`='" . $ret_pos . "',`comps`='" . $ret_comps . "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
                                        //$query_alt = "UPDATE `tb_diversos` SET `marca`='" . $ret_marca . "',`tipo`='" . $ret_tipo . "',`patrimonio`='" . $ret_plaqueta . "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
                                        $result = mysqli_query($conn, $query_alt);

                                        if ($result == 0) {
                                            echo "<script>alert('DADOS DO " . $ret_dispositivo . "   CTI " . $ctrl_ti . "( " . $id_equip . ") NAO FORAM  ALTERADOS');</script>";
                                        } else {
                                            // rotina para registrar alteracao // 

                                            if ($ret_localizacaob <> $ret_localizacao) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                                                $campo = "Localizacao";
                                                $dados = $ret_localizacaob . " --> " . $ret_localizacao;
                                                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                                            }


                                            if ($ret_posb <> $ret_pos) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                                                $campo = "Posicao";
                                                $dados = $ret_posb . " --> " . $ret_pos;
                                                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                                            }

                                            if ($ret_tamb <> $ret_tam) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                                                $campo = "Tamanho";
                                                $dados = $ret_tamb . " --> " . $ret_tam;
                                                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                                            }



                                            if ($ret_plaquetab <> $ret_plaqueta) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                                                $campo = "plaqueta";
                                                $dados = $ret_plaqueta . " --> " . $ret_plaqueta;
                                                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                                            }

                                            if ($ret_compsb <> $ret_comps) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                                                $campo = "Componentes  ";
                                                $dados = $ret_compsb . " --> " . $ret_comps;
                                                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                                            }

              
                                            //$retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, "usuario", $nome_usuario, $outros, $nome_usuario);
                                            // fim da rotina registra alter


                                            add_acao("Alt_Rack", $ctrl_ti, $nome_usuario);
                                            $loc_cad = nomedolocal($conn, $ret_id_loc);
                                            $msg = "<br><br>  " . $ret_dispositivo . "  CTI " . $ctrl_ti . " ( " . $id_equip . " )  \n do  Local ( " . $loc_cad . " ), \n Alterado com sucesso ! ";
                                            echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
                                            ?>
                                                       <center> <a href="newsfeed.php"> Inicio </a> </center>
                                                <?php
                                        }

                                    }

        break;
    }
    case '3': {// switch
        // busca de dados em formulario de alteracao
        $ret_dispositivo = $_POST['descricao_equip'];
        $ret_plaqueta = STRTOUPPER($_POST['mon_plaqueta']);
        $ret_marca = $_POST['mon_marca'];
        $ret_ip = $_POST['ip'];
        $ret_gerenciavel = $_POST['gerenciavel'];
        $ret_poe = $_POST['poe'];
        $ret_por_tot = $_POST['por_tot'];
        $ret_por_uso = $_POST['por_util'];
        $ret_por_livre = $_POST['por_disp'];
        $ret_rack = $_POST['rack'];

        // busca de dados da base de dados
        $resumo = "Alterado em " . $hoje . "  usuario :" . $nome_usuario;
        $tbequip_id = $id_equip;
        $sql = "SELECT * from tb_diversos where id = '$tbequip_id' ORDER BY id";
             $qr = mysqli_query($conn, $sql);//or die(mysqli_error());
        while ($ln = mysqli_fetch_assoc($qr)) {
            $ret_marcab = $ln['marca'];
            $ret_plaquetab = STRTOUPPER($ln['patrimonio']);
            $ret_ipb = $ln['ip'];
            $ret_gerenciavelb = $ln['gerenciavel'];
            $ret_poeb = $ln['poe'];
            $ret_por_usob = $ln['por_util'];
            $ret_por_livreb = $ln['por_disp'];
            $ret_por_totb = $ln['por_total'];
            $ret_id_loc = $ln['local_cod'];
            $ret_rackb = $ln['rack'];
        }



        if ($id_equip != "") {
            $teste = "1";
            //altera registro 
            $query_alt = "UPDATE `tb_diversos` SET `patrimonio`='" . $ret_plaqueta . "',`marca`='" . $ret_marca . "',`ip`='" . $ret_ip . "',`obs`='" . $resumo . "',`gerenciavel`='" . $ret_gerenciavel . "',`rack`='" . $ret_rack . "',`poe`='" . $ret_poe . "',`por_total`='" . $ret_por_tot . "',`por_util`='" . $ret_por_uso . "',`por_disp`='" . $ret_por_livre . "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            //$query_alt = "UPDATE `tb_diversos` SET `marca`='" . $ret_marca . "',`tipo`='" . $ret_tipo . "',`patrimonio`='" . $ret_plaqueta . "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            $result = mysqli_query($conn, $query_alt);

            if ($result == 0) {
                echo "<script>alert('DADOS DO " . $ret_dispositivo . "   CTI " . $ctrl_ti . "( " . $id_equip . ") NAO FORAM  ALTERADOS');</script>";
            } else {
                // rotina para registrar alteracao // 

                if ($ret_marcab <> $ret_marca) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Marca";
                    $dados = $ret_marcab . " --> " . $ret_marca;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }


                if ($ret_ipb <> $ret_ip) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "IP";
                    $dados = $ret_ipb . " --> " . $ret_ip;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_gerenciavelb <> $ret_gerenciavel) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Gerenciavel";
                    $dados = $ret_gerenciavelb . " --> " . $ret_gerenciavel;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }



                if ($ret_plaquetab <> $ret_plaqueta) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "plaqueta";
                    $dados = $ret_plaquetab . " --> " . $ret_plaqueta;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_poeb <> $ret_poe) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "POE  ";
                    $dados = $ret_poeb . " --> " . $ret_poe;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_por_totb <> $ret_por_tot) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Portas Total  ";
                    $dados = $ret_por_totb . " --> " . $ret_por_tot;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }
                if ($ret_por_usob <> $ret_por_uso) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Portas  Uso ";
                    $dados = $ret_por_usob . " --> " . $ret_por_uso;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }
                if ($ret_por_livreb <> $ret_por_livre) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Portas Livre ";
                    $dados = $ret_por_livreb . " --> " . $ret_por_livre;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }
                if ($ret_rackb <> $ret_rack) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Rack ";
                    $dados = $ret_rackb . " --> " . $ret_rack;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }



                //$retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, "usuario", $nome_usuario, $outros, $nome_usuario);
                // fim da rotina registra alter


                add_acao("Alt_Swt", $ctrl_ti, $nome_usuario);
                $loc_cad = nomedolocal($conn, $ret_id_loc);
                $msg = "<br><br>  " . $ret_dispositivo . "  CTI " . $ctrl_ti . " ( " . $id_equip . " )  \n do  Local ( " . $loc_cad . " ), \n Alterado com sucesso ! ";
                echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
                ?>
                                                       <center> <a href="newsfeed.php"> Inicio </a> </center>
                                                <?php
            }

        }


        break;
    }
    case '4': { // TV
        // busca de dados em formulario de alteracao
        $ret_id_loc = $_POST['unidade_id'];
        $ret_dispositivo = $_POST['descricao_equip'];
        $ret_plaqueta = STRTOUPPER($_POST['mon_plaqueta']);
        $ret_marca = $_POST['mon_marca'];
        $ret_tam = $_POST['mon_tam'];
        $ret_resp = $_POST['resp'];
        // $ret_portas = $_POST['portas'];

        // busca de dados da base de dados
        $resumo = "Alterado em " . $hoje . "  usuario :" . $nome_usuario;
        $tbequip_id = $id_equip;
        $sql = "SELECT * from tb_diversos where id = '$tbequip_id' ORDER BY id";
        $qr = mysqli_query($conn, $sql);//or die(mysqli_error());
        while ($ln = mysqli_fetch_assoc($qr)) {
            $ret_marcab = $ln['marca'];
            $ret_plaquetab = STRTOUPPER($ln['patrimonio']);
            $ret_tamb = $ln['tam'];
            $ret_respb = $ln['resp'];
           
        }



        if ($id_equip != "") {
            $teste = "1";
            //altera registro 
            $query_alt = "UPDATE `tb_diversos` SET `patrimonio`='" . $ret_plaqueta . "',`marca`='" . $ret_marca . "',`tam`='" . $ret_tam . "',`resp`='" . $ret_resp . "'   WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            //$query_alt = "UPDATE `tb_diversos` SET `marca`='" . $ret_marca . "',`tipo`='" . $ret_tipo . "',`patrimonio`='" . $ret_plaqueta . "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            $result = mysqli_query($conn, $query_alt);

            if ($result == 0) {
                echo "<script>alert('DADOS DO " . $ret_dispositivo . "   CTI " . $ctrl_ti . "( " . $id_equip . ") NAO FORAM  ALTERADOS');</script>";
            } else {
                // rotina para registrar alteracao // 

                if ($ret_marcab <> $ret_marca) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Marca";
                    $dados = $ret_marcab . " --> " . $ret_marca;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_plaquetab <> $ret_plaqueta) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "plaqueta";
                    $dados = $ret_plaquetab . " --> " . $ret_plaqueta;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_tamb <> $ret_tam) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Tam  ";
                    $dados = $ret_tamb . " --> " . $ret_tam;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_respb <> $ret_resp) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Resp  ";
                    $dados = $ret_respb . " --> " . $ret_resp;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }
                
                //$retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, "usuario", $nome_usuario, $outros, $nome_usuario);
                // fim da rotina registra alter
                add_acao("Alt_Tv", $ctrl_ti, $nome_usuario);
                $loc_cad = nomedolocal($conn, $ret_id_loc);
                $msg = "<br><br>  " . $ret_dispositivo . "  CTI " . $ctrl_ti . " ( " . $id_equip . " )  \n do  Local ( " . $loc_cad . " ), \n Alterado com sucesso ! ";
                echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
                ?>
                                                       <center> <a href="newsfeed.php"> Inicio </a> </center>
                                                <?php
            }

        }





        break;
    }
    case '5': { // impressoras
        break;
    }
    case '6': { //  acess point
        // busca de dados em formulario de alteracao
        $ret_id_loc = $_POST['unidade_id'];
        $ret_dispositivo = $_POST['descricao_equip'];
        $ret_plaqueta = STRTOUPPER($_POST['mon_plaqueta']);
        $ret_marca = $_POST['mon_marca'];
        $ret_tam = $_POST['mon_tam'];
        $ret_resp = $_POST['resp'];
        // $ret_portas = $_POST['portas'];

        // busca de dados da base de dados
        $resumo = "Alterado em " . $hoje . "  usuario :" . $nome_usuario;
        $tbequip_id = $id_equip;
        $sql = "SELECT * from tb_diversos where id = '$tbequip_id' ORDER BY id";
        $qr = mysqli_query($conn, $sql);//or die(mysqli_error());
        while ($ln = mysqli_fetch_assoc($qr)) {
            $ret_marcab = $ln['marca'];
            $ret_plaquetab = STRTOUPPER($ln['patrimonio']);
            $ret_tamb = $ln['tam'];
            $ret_respb = $ln['resp'];

        }



        if ($id_equip != "") {
            $teste = "1";
            //altera registro 
            $query_alt = "UPDATE `tb_diversos` SET `patrimonio`='" . $ret_plaqueta . "',`marca`='" . $ret_marca . "',`tam`='" . $ret_tam . "',`resp`='" . $ret_resp . "'   WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            //$query_alt = "UPDATE `tb_diversos` SET `marca`='" . $ret_marca . "',`tipo`='" . $ret_tipo . "',`patrimonio`='" . $ret_plaqueta . "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            $result = mysqli_query($conn, $query_alt);

            if ($result == 0) {
                echo "<script>alert('DADOS DO " . $ret_dispositivo . "   CTI " . $ctrl_ti . "( " . $id_equip . ") NAO FORAM  ALTERADOS');</script>";
            } else {
                // rotina para registrar alteracao // 

                if ($ret_marcab <> $ret_marca) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Marca";
                    $dados = $ret_marcab . " --> " . $ret_marca;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_plaquetab <> $ret_plaqueta) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "plaqueta";
                    $dados = $ret_plaquetab . " --> " . $ret_plaqueta;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_tamb <> $ret_tam) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Tam  ";
                    $dados = $ret_tamb . " --> " . $ret_tam;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_respb <> $ret_resp) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Resp  ";
                    $dados = $ret_respb . " --> " . $ret_resp;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                //$retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, "usuario", $nome_usuario, $outros, $nome_usuario);
                // fim da rotina registra alter
                add_acao("Alt_acess", $ctrl_ti, $nome_usuario);
                $loc_cad = nomedolocal($conn, $ret_id_loc);
                $msg = "<br><br>  " . $ret_dispositivo . "  CTI " . $ctrl_ti . " ( " . $id_equip . " )  \n do  Local ( " . $loc_cad . " ), \n Alterado com sucesso ! ";
                echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
                ?>
                                                       <center> <a href="newsfeed.php"> Inicio </a> </center>
                                                <?php
            }

        }





        break;
    }
    case '7': { //  altera nobreak
        // busca de dados em formulario de alteracao
        $ret_id_loc = $_POST['unidade_id'];
        $ret_dispositivo = $_POST['descricao_equip'];
        $ret_plaqueta = STRTOUPPER($_POST['mon_plaqueta']);
        $ret_marca = $_POST['mon_marca'];
        $ret_obs = $_POST['obs'];
       // $ret_resp = $_POST['resp'];
        // $ret_portas = $_POST['portas'];

        // busca de dados da base de dados
        $resumo = "Alterado em " . $hoje . "  usuario :" . $nome_usuario;
        $tbequip_id = $id_equip;
        $sql = "SELECT * from tb_diversos where id = '$tbequip_id' ORDER BY id";
        $qr = mysqli_query($conn, $sql);//or die(mysqli_error());
        while ($ln = mysqli_fetch_assoc($qr)) {
            $ret_marcab = $ln['marca'];
            $ret_plaquetab = STRTOUPPER($ln['patrimonio']);
            $ret_obsb = $ln['obs'];
            $ret_respb = $ln['resp'];

        }



        if ($id_equip != "") {
            $teste = "1";
            //altera registro 
            $query_alt = "UPDATE `tb_diversos` SET `patrimonio`='" . $ret_plaqueta . "',`marca`='" . $ret_marca . "',`obs`='" . $ret_obs . "'   WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            //$query_alt = "UPDATE `tb_diversos` SET `marca`='" . $ret_marca . "',`tipo`='" . $ret_tipo . "',`patrimonio`='" . $ret_plaqueta . "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            $result = mysqli_query($conn, $query_alt);

            if ($result == 0) {
                echo "<script>alert('DADOS DO " . $ret_dispositivo . "   CTI " . $ctrl_ti . "( " . $id_equip . ") NAO FORAM  ALTERADOS');</script>";
            } else {
                // rotina para registrar alteracao // 

                if ($ret_marcab <> $ret_marca) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Marca";
                    $dados = $ret_marcab . " --> " . $ret_marca;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_plaquetab <> $ret_plaqueta) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "plaqueta";
                    $dados = $ret_plaquetab . " --> " . $ret_plaqueta;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_obsb <> $ret_obs) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Obs  ";
                    $dados = $ret_obsb . " --> " . $ret_obs;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                //$retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, "usuario", $nome_usuario, $outros, $nome_usuario);
                // fim da rotina registra alter
                add_acao("Alt_nobb", $ctrl_ti, $nome_usuario);
                $loc_cad = nomedolocal($conn, $ret_id_loc);
                $msg = "<br><br>  " . $ret_dispositivo . "  CTI " . $ctrl_ti . " ( " . $id_equip . " )  \n do  Local ( " . $loc_cad . " ), \n Alterado com sucesso ! ";
                echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
                ?>
                                                       <center> <a href="newsfeed.php"> Inicio </a> </center>
                                                <?php
            }

        }





        break;
    }
    case '8': { // 
        // busca de dados em formulario de alteracao
        $ret_id_loc = $_POST['unidade_id'];
        $ret_dispositivo = $_POST['descricao_equip'];
        $ret_plaqueta = STRTOUPPER($_POST['mon_plaqueta']);
        $ret_marca = $_POST['mon_marca'];
        $ret_tam = $_POST['mon_tam'];
        $ret_resp = $_POST['resp'];
        // $ret_portas = $_POST['portas'];

        // busca de dados da base de dados
        $resumo = "Alterado em " . $hoje . "  usuario :" . $nome_usuario;
        $tbequip_id = $id_equip;
        $sql = "SELECT * from tb_diversos where id = '$tbequip_id' ORDER BY id";
        $qr = mysqli_query($conn, $sql);//or die(mysqli_error());
        while ($ln = mysqli_fetch_assoc($qr)) {
            $ret_marcab = $ln['marca'];
            $ret_plaquetab = STRTOUPPER($ln['patrimonio']);
            $ret_tamb = $ln['tam'];
            $ret_respb = $ln['resp'];

        }



        if ($id_equip != "") {
            $teste = "1";
            //altera registro 
            $query_alt = "UPDATE `tb_diversos` SET `patrimonio`='" . $ret_plaqueta . "',`marca`='" . $ret_marca . "',`tam`='" . $ret_tam . "',`resp`='" . $ret_resp . "'   WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            //$query_alt = "UPDATE `tb_diversos` SET `marca`='" . $ret_marca . "',`tipo`='" . $ret_tipo . "',`patrimonio`='" . $ret_plaqueta . "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            $result = mysqli_query($conn, $query_alt);

            if ($result == 0) {
                echo "<script>alert('DADOS DO " . $ret_dispositivo . "   CTI " . $ctrl_ti . "( " . $id_equip . ") NAO FORAM  ALTERADOS');</script>";
            } else {
                // rotina para registrar alteracao // 

                if ($ret_marcab <> $ret_marca) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Marca";
                    $dados = $ret_marcab . " --> " . $ret_marca;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_plaquetab <> $ret_plaqueta) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "plaqueta";
                    $dados = $ret_plaquetab . " --> " . $ret_plaqueta;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_tamb <> $ret_tam) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Tam  ";
                    $dados = $ret_tamb . " --> " . $ret_tam;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_respb <> $ret_resp) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Resp  ";
                    $dados = $ret_respb . " --> " . $ret_resp;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                //$retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, "usuario", $nome_usuario, $outros, $nome_usuario);
                // fim da rotina registra alter
                add_acao("Alt_Tv", $ctrl_ti, $nome_usuario);
                $loc_cad = nomedolocal($conn, $ret_id_loc);
                $msg = "<br><br>  " . $ret_dispositivo . "  CTI " . $ctrl_ti . " ( " . $id_equip . " )  \n do  Local ( " . $loc_cad . " ), \n Alterado com sucesso ! ";
                echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
                ?>
                                                       <center> <a href="newsfeed.php"> Inicio </a> </center>
                                                <?php
            }

        }





        break;
    }
    case '9': { // controlador wifi
        // busca de dados em formulario de alteracao
        $ret_id_loc = $_POST['unidade_id'];
        $ret_dispositivo = $_POST['descricao_equip'];
        $ret_plaqueta = STRTOUPPER($_POST['mon_plaqueta']);
        $ret_marca = $_POST['mon_marca'];
        $ret_tam = $_POST['mon_tam'];
      //  $ret_resp = $_POST['resp'];
        // $ret_portas = $_POST['portas'];

        // busca de dados da base de dados
        $resumo = "Alterado em " . $hoje . "  usuario :" . $nome_usuario;
        $tbequip_id = $id_equip;
        $sql = "SELECT * from tb_diversos where id = '$tbequip_id' ORDER BY id";
        $qr = mysqli_query($conn, $sql);//or die(mysqli_error());
        while ($ln = mysqli_fetch_assoc($qr)) {
            $ret_marcab = $ln['marca'];
            $ret_plaquetab = STRTOUPPER($ln['patrimonio']);
            $ret_tamb = $ln['tam'];
            $ret_respb = $ln['resp'];

        }



        if ($id_equip != "") {
            $teste = "1";
            //altera registro 
            $query_alt = "UPDATE `tb_diversos` SET `patrimonio`='" . $ret_plaqueta . "',`marca`='" . $ret_marca . "',`tam`='" . $ret_tam . "'   WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            //$query_alt = "UPDATE `tb_diversos` SET `marca`='" . $ret_marca . "',`tipo`='" . $ret_tipo . "',`patrimonio`='" . $ret_plaqueta . "'  WHERE `tb_diversos`.`id`='" . $id_equip . "' ";
            $result = mysqli_query($conn, $query_alt);

            if ($result == 0) {
                echo "<script>alert('DADOS DO " . $ret_dispositivo . "   CTI " . $ctrl_ti . "( " . $id_equip . ") NAO FORAM  ALTERADOS');</script>";
            } else {
                // rotina para registrar alteracao // 

                if ($ret_marcab <> $ret_marca) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Marca";
                    $dados = $ret_marcab . " --> " . $ret_marca;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_plaquetab <> $ret_plaqueta) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "plaqueta";
                    $dados = $ret_plaquetab . " --> " . $ret_plaqueta;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

                if ($ret_tamb <> $ret_tam) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                    $campo = "Tam  ";
                    $dados = $ret_tamb . " --> " . $ret_tam;
                    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
                }

              
                //$retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, "usuario", $nome_usuario, $outros, $nome_usuario);
                // fim da rotina registra alter
                add_acao("Alt_Cont_wifi", $ctrl_ti, $nome_usuario);
                $loc_cad = nomedolocal($conn, $ret_id_loc);
                $msg = "<br><br>  " . $ret_dispositivo . "  CTI " . $ctrl_ti . " ( " . $id_equip . " )  \n do  Local ( " . $loc_cad . " ), \n Alterado com sucesso ! ";
                echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
                ?>
                                                       <center> <a href="newsfeed.php"> Inicio </a> </center>
                                                <?php
            }

        }





        break;
    }

}




/*


//$ret_id = $_POST['id']; 
$ret_marca = $_POST['mon_marca'];
$ret_tam = $_POST['mon_tam'];
$ret_plaqueta = STRTOUPPER($_POST['mon_plaqueta']);
$ret_tipo = $_POST['mon_tipo'];

$ret_saida = $_POST['mon_saida'];
$ret_pc = $_POST['id_doequip'];
$id_loc = $_POST['unidade_id'];

//$ret_usuario = $_POST['usuario'];


// busca de dados da base de dados

$tbequip_id = $id_equip;
$sql = "SELECT * from tb_diversos where id = '$tbequip_id' ORDER BY id";
//$qr = mysql_query($sql) or die(mysql_error());
$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
while ($ln = mysqli_fetch_assoc($qr)) 
{
   // $ret_idb = $_POST['id'];
    $ret_marcab = $ln['mon_marca'];
    $ret_tamb = $ln['mon_tam'];
    $ret_plaquetab = STRTOUPPER($ln['mon_plaqueta']);
    $ret_tipob = $ln['mon_tipo'];
     $ret_saidab = $ln['mon_saida'];
     $ret_pcb = $ln['id_equip'];
    $ret_loc_id = $ln['local_id'];
}
//mysqli_close($conn); 

// rotina para registrar alteracao // 

if ($ret_marcab <> $ret_marca) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
    $campo = "Marca";
    $dados = $ret_marcab;
    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
}


if ($ret_tamb <> $ret_tam) 
 {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
    $campo = "tamanho";
    $dados = $ret_tamb;
    $retorno= registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
 }



if ($ret_plaquetab <> $ret_plaqueta) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
    $campo = "plaqueta";
    $dados = $ret_plaqueta;
    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
}

if ($ret_tipob<>$ret_tipo) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
    $campo = "tipo Tela ";
    $dados = $ret_tipob;
    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
}

if ($ret_saidab <> $ret_saida ) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
    $campo = "saida";
    $dados = $ret_saidab;
    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
}
if ($ret_pcb <> $ret_pc) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
    $campo = "equip_id";
    $dados = $ret_pcb;
    $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
}

$retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, "usuario", $nome_usuario, $outros, $nome_usuario);


// fim da rotina registra alter


if ($id_equip != "") 
{
    $teste = "1";
    //altera registro 
    $query_alt = "UPDATE `tb_monitores` SET `id_equip`='".$ret_pc."',`mon_marca`='".$ret_marca."',`mon_tam`='".$ret_tam."',`mon_plaqueta`='".$ret_plaqueta."',`mon_tipo`='".$ret_tipo."',`data`='".$hoje."',`mon_saida`='".$ret_saida."',`usuario`='".$nome_usuario." ' WHERE `id`='".$id_equip."' ";
      $result = mysqli_query($conn, $query_alt);
   
       // $retorno_checkInEng = mysqli_num_rows($result);
       //  $row = mysqli_fetch_assoc($result);
       //    $result ="0" ;
    if ($result == 0)
      {
       // echo "Erro de Alteraçao de dados ";
          echo "<script>alert('DADOS DO MONITOR CTI ".$ctrl_ti."( ".$id_equip.") NAO FORAM  ALTERADOS');</script>";
      //  echo "<script>history.go(-1);</script>";
      } 
    else
      {
        $loc_cad = nomedolocal($conn, $id_loc);
        $msg = "<br><br> MONITOR  CTI ".$ctrl_ti."( ".$id_equip." )  \n do  Local ( " . nomedolocal($conn, $ret_loc_id). " ), \n Alterado com sucesso ! ";
        echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
        ?>
       <center> <a href="newsfeed.php"> Inicio </a> </center>
        <?php
       }

}
?>
/*/