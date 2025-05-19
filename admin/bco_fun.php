<?php
// function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
// function ativa_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // ativa cti e ids de tabelas  status = 1 ;
// function add_acao($Fpar1,$Fcti, $Fusuario)  regstra movimento em arq txt
// function arquivo_grava($Fbase)  // grava o conteudo passado para um arq texto  passado .
// function arquivo_leitura($Fbase)  // devolve o conteudo de um arquivo de leitura , passando o nome do arquivo
// function busca_id($Fconexao, $Fref, $Flocal)  // recupera o id do equip salvo pela referencia
// function busca_ult_CTI($Fconexao)  // informa o ultimo CTI 
// function checa_tipobyCTI($Fconexao, $Fref)  // retorna o tipo do dispositivo ,desktop ou notebook em funcao do codigo CTI  
// function charset_decode_utf_8($string)
// function clean($string) 
// function clean2($texto) 
// function conta_equip_by_cmei_id($Fcod,$Fconexao) // retorna numeros de pcs do local cod_cmei
// function cod_cripta($Fnome, $Fkey)
// function cod_descripta($Fnome, $Fkey)
// function cod_sec($Fconexao, $Fref)  // retorna o codigo da secretaria em funcao do codigo do local  
// function compara($Fconexao, $Fctrl_ti, $Fid, $Ftabela, $Fcampo, $Fd_base, $Fd_dig, $Fusuario)
 //function codsecretaria_by_idCmei($Fconexao, $Fref)  // retorna o cod da secretaria em funcao do cmei_id
// function deletar($pasta)
// function estag_status($Fconexao, $Fref)
// function formaliza_10($Fbase) // formata para 10 caracteres qqer string
// function insere_acesso($conexao,$Fbase) // insere dados de acesso 
// function insere_icone($Fbase) devolve o icone correto do dispositivo
//function insere_vinculo($Fconexao, cti,loc,sec,usuario e desktop) armazena em txt dados iniciais
//function insere_RESERVA_BY_CTI($Fconexao, $Fcti, $Fdados)  // insere cti em tabela reservados  
// function limpa_tracoj($valor)
// function mascara_cti($Fref)    // retorna os CTI padronizado com 4 casas 
//function mostra_inicio($Fconexao, $Fref) // retorna o  nome do tecnico e a data de cadastro
//function mostra_local_monby_cti($Fconexao, $Fref) // retorna o  codigo local atraves do cti do dispositivo 
//function mostra_local_divby_cti($Fconexao, $Fref) // retorna o  codigo local atraves do cti do dispositivo 
// function mostra_local($Fconexao, $Fref) // retorna o  codigo local_id dentro de tbequip
// function mostra_monitores($Fconexao, $Fref) // retorna os dados dos monitores cadastrados em funcao do id tb_equip 
// function mostra_monitores_num($Fconexao, $Fref) // retorna numeros cti  dos monitores cadastrados em funcao do id tb_equip 
// function nomedesecretaria($Fconexao, $Fref) // retorna o nome da secretaria em funcao do codigo da mesma 
// function nomedeunidade($Fconexao, $Fref) // retorna o nome da unidade em funcao do id local_id
// function nomedolocal($Fconexao, $Fref) // retorna o nome da unidade em tabela cmei
 // function nomedoresponsavel($Fconexao, $Fref)  // retorna o nome do responsavel em tabela cmei
// function normalizeNFD($string) 
// function printa_tela($Fref)  // printa a tela e salva img
// function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )
// function remove_letras_e_simbolos($str)
// function remove_numeros($str) //  Removendo símbolos e números
// function remove_simbolos($str) //  Removendo símbolos 
// function remove_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // remover equip em status = 0 ;
// function removeracento($str) 
// function resumo_TI($Fconexao, $Fctrl_ti) // ativa cti e ids de tabelas  status = 1 ;
//function ret_dtCad_byctrl_ti($Fconexao, $Fref) // informa a data de lanc do equip by  controle_ti
// function ret_caminho_ctrl_ti($Fconexao, $Fref) // retorna o id ( caminho) cadastrado em controle_ti
// function ret_cti_by_equip_id($Fconexao, $Fref) // retorna cti do monitor ,de acordo com o equip_id em Monitores  atraves do equip_id   ;
// function ret_cti_tbequip($Fconexao, $Fref) // retorna o cti dentro da tabela tbequip 
// function ret_ctrl_ti_ref($Fconexao, $Fref) // informa o cti e situaçao em controle_ti
// function ret_ctrl_ti($Fconexao, $Fref) // informa se ja existe numeracao para controle_ti
// function ret_cti_reservado($Fconexao, $Fref) // informa se ja existe reserva para essa numeracao cti
// function ret_ctrl_ti_monitor($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab Monitores
//function ret_userbycti($Fconexao, $Fref) // retorna nomess de utilizadores do pc
//function ret_pos_tbequip_by_CTI($Fconexao, $Fref) // informa posicao de CTI em tbequip ( cti e equip_id) 
// function retresp_by_idequip($Fconexao, $Fref) // retorna o responsavel  em tbequip atraves do equip_id 
// function ret_desc_ctrl_ti($Fconexao, $Fref) // informa a descricao de  para controle_ti
//function retRESP_by_cmeiID($Fconexao, $Fref) // retorna o Responsavel do local em tbcmei  atraves do id do local 
// function ret_id_by_equip_id($Fconexao, $Fref) // retorna posicao id do monitor ,de acordo com o equip_id em Monitores  atraves do equip_id cadastrado  ;
// function ret_plaqueta_bycti($Fconexao,  $Fctrl_ti) // retorna patrimonio e local atraves do cti e   ;
// function ret_sac_by_cod($Fconexao,  $Fctrl_ti) // retorna a existencia de avaliacao  atraves do cod do chamado tecnico    ;
// function ret_uso_mon_cti_ctrl_ti($Fconexao, $Fref) // informa se o monitor ctrl_ti ja esta sendo usado por pc ( cti) controle_ti
// function retiraAcentos($string)
// function remover_acentos1($string)  // retira acentos 
// function ret_Qtd_PcbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
// function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
// function ret_resumo_ctrl_ti($Fconexao, $Fref) // retorna infs  de controle_ti
// function retAUTOR_by_idequip($Fconexao, $Fref) // retorna o local em tbequip atraves do equip_id 
// function retLOCAL_by_idequip($Fconexao, $Fref) // retorna o local em tbequip atraves do equip_id 
// function redirecionar($url, $tempo)   redireciona para um local apos x segundos
// Function ret_Qtd_CentroCustosbySec($sec) // retorna a quantidade de centros de custos existentes na secretaria
// function sanitizeString($str) // inserir pontinhos em string
// function somente_numeros($str)
//function tipodoDispByCTI($Fconexao, $Fref) // retorna o tipo de dispositivo by CTI
// function ver_res() // ver resolucao tela
// function ver_res_w()  // mostra width da resolucao da teal
// function vincula_cti_mon2tbequip($Fconexao, $Fctrl_ti, $Fmon_ctrl_ti,$Fusuario)   // insere cti do monitor junto a monitor_obs em tbequip
// function vinculaMON_cti_mon2tbequip($Fconexao, $Fctrl_ti, $Fmon_ctrl_ti, $Fusuario)   // atualiza  cti do monitor e nums monitor  junto tbequip
// function zera_Monitor_bycti($Fconexao, $Fctrl_ti, $Fusuario)   // zera id_equip em monitor atraves do cti do monitor 


date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');
$pass_acesso = date('d-m-Y');



if (isset($_GET['tipo'])) { // recebimento por post

    $ret_tipo = $_GET['tipo']; // campo digitavel em qr_ind.php    
} else {
    $ret_tipo = "0"; // campo vazio digitavel em qr_ind.php
}

if ($ret_tipo =="0")
{

    include(__DIR__ . '/../validar_session.php');
    include(__DIR__ . '/../Config/config_sistema.php');
    include "conn2.php";

    function arquivo_leitura($Fbase) {
    //abrimos o arquivo em leitura
    //$arquivo = "/var/www/pasta/arquivo.txt"; // EXEMPLO DE CAMINHO. USE O CAMINHO CORRETO
        $arquivo = $Fbase; //filename ;
        $fp = fopen($arquivo, "r");
            //lemos o arquivo
        $texto = fread($fp, filesize($arquivo));
            //transformamos as quebras de linha em etiquetas
        $texto = nl2br($texto);
        return $texto;
        //echo $texto;
     }

    function add_acao($Fpar1,$Fcti, $Fusuario)
    {
        $data = date("d/m/Y H:i:s ");
        $ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
        $ipF = $_SERVER["REMOTE_ADDR"]; //Pego o IP
        $host = gethostbyaddr("$ip"); //pego o host
        $IPlocal = $ip . "/" . $ipF . "/" . $host;
        $nomeArquivo = "acoes.txt";
        $conteudo = $Fpar1 . "   CTI " . $Fcti . "  Data  " . $data . "  Usuario " . $Fusuario . "  Local  " . $IPlocal . PHP_EOL;
        file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
        $arquivo = fopen($_SERVER['DOCUMENT_ROOT'] . $nomeArquivo, 'w');
        if ($arquivo) {
            // Escreve no arquivo
            fwrite($arquivo, $conteudo);
            // fecha o arquivo
            fclose($arquivo);
        }
    }


    function arquivo_grava($Fbase,$Fconteudo) 
     {
       $nomeArquivo = $Fbase;//"correcao.txt";
        $conteudo = $Fconteudo. PHP_EOL;   // " Data : ". $agora. "  Usuario ".$usuario_ant."    Titulo : ".$titulo. "  Descricao :".$descricao. PHP_EOL;  
            file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
            $arquivo = fopen($_SERVER['DOCUMENT_ROOT']. $nomeArquivo, 'w');
                if($arquivo) 
                {
                // Escreve no arquivo
                    fwrite($arquivo,$conteudo);
                // fecha o arquivo
                    fclose($arquivo);
                }
     }

    function ativa_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // ativa cti e ids de tabelas  status = 1 ;
    {      // tabela , tipo , id ,
        $status = "1";
        $descricao = "Ativado na data " . $Fhoje . " por  " . $Fusuario . "  codigo:" . $Fctrl_ti . "-" . $Ftab . "-" . $Fid . "   <>  " . $Fjustificativa;
        switch ($Ftab) {
            case '1': {   // tbequip
                // $caminho = "C" . $Fid_equip;
                $query = "UPDATE `tbequip` SET `status`='" . $status . "' , `tbequi_obs`='" . $descricao . "'  WHERE `tbequip_id`='" . $Fid . "' ";
                // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "0 --> 1", "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

                break;
            }
            case '2': {   //tb_diversos
                //$caminho = "M" . $Fid_equip;
                $query = "UPDATE `tb_diversos` SET `status`='" . $status . "' , `obs`='" . $descricao . "'  WHERE `id`='" . $Fid . "' ";
                //$query = "UPDATE `tb_monitores` SET `status` = `0` where `tb_monitores`.`id` ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "0 --> 1", "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

                break;
            }
            case '3': {  // tb_monitores
                //$caminho = "M" . $Fid_equip;
                $query = "UPDATE `tb_monitores` SET `status`='" . $status . "' , `obs`='" . $descricao . "'  WHERE `id`='" . $Fid . "' ";
                //$query = "UPDATE `tb_monitores` SET `status` = `0` where `tb_monitores`.`id` ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "0 --> 1", "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;
                break;
            }
            case '0': {  // tb_controle_ti
                //$caminho = "M" . $Fid_equip;
                $query = "UPDATE `tb_controle_ti` SET `status`='" . $status . "' , `obs`='" . $descricao . "'  WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
                // $query = "UPDATE `tb_controle_ti ` SET `status = 0 where ctrl_ti ='" . $Fctrl_ti . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "0 --> 1", "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;
            }
                break;
        }
        // }
    }





    function add_TI($Fconexao, $Ftab, $Fdescricao, $Fcaminho, $Fid_equip, $Fctrl_ti, $Fhoje, $Fusuario) // inserte /  adiciona em controle TI 
    {      // tabela , tipo , id ,
        $status = "1";
        $sqlquery = "select * from tb_controle_ti where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($Fconexao, $sqlquery);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao <> '0') {
            return "Não foi possivel inserir o Codigo " . $Fctrl_ti . " pois o mesmo ja existe ";
        } else {
            switch ($Ftab) {
                case '1': {   // tbequip
                    // $caminho = "C" . $Fid_equip;
                    $query = "insert into tb_controle_ti (ctrl_ti,tab_origem,descricao,tab_chave,tab_cam,dt_cad,status,tecnico)VALUES('" . $Fctrl_ti . "','" . $Ftab . "','" . $Fdescricao . "','" . $Fid_equip . "','" . $Fcaminho . "','" . $Fhoje . "','" . $status . "','" . $Fusuario . "')";
                    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                    //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                    if ($resultadoDaInsercao == 0)
                        $msg = 0;
                    else
                        $msg = 1;
                    return $msg;
                    break;
                }
                case '2': {   //tb_diversos
                    //$caminho = "I" . $Fid_equip;
                    $query = "insert into tb_controle_ti (ctrl_ti,tab_origem,descricao,tab_chave,tab_cam,dt_cad,status,tecnico)VALUES('" . $Fctrl_ti . "','" . $Ftab . "','" . $Fdescricao . "','" . $Fid_equip . "','" . $Fcaminho . "','" . $Fhoje . "','" . $status . "','" . $Fusuario . "')";
                    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                    //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                    if ($resultadoDaInsercao == 0)
                        $msg = 0;
                    else
                        $msg = 1;
                    return $msg;


                }
                    break;
                case '3': {  // tb_monitores
                    //$caminho = "M" . $Fid_equip;
                    $query = "insert into tb_controle_ti (ctrl_ti,tab_origem,descricao,tab_chave,tab_cam,dt_cad,status,tecnico)VALUES('" . $Fctrl_ti . "','" . $Ftab . "','" . $Fdescricao . "','" . $Fid_equip . "','" . $Fcaminho . "','" . $Fhoje . "','" . $status . "','" . $Fusuario . "')";
                    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                    //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                    if ($resultadoDaInsercao == 0)
                        $msg = 0;
                    else
                        $msg = 1;
                    return $msg;
                }
                    break;


            }
        }
    }



    function busca_id($Fconexao, $Fref, $Flocal)  // recupera o id do equip salvo pela referencia
    {
        if ($Flocal == "tb_diversos") {
            $query = "select id,ref from tb_diversos where ref ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                $linha = mysqli_fetch_assoc($dados);
                $retorno = $linha['id'];
                return $retorno;
            } else
                return "sem referencia";
        } else {
            if ($Flocal == "tb_monitores") {
                $query = "select id,ref from tb_monitores where ref ='" . $Fref . "'";
                $dados = mysqli_query($Fconexao, $query);
                $resultadoDaInsercao = mysqli_num_rows($dados);
                if ($resultadoDaInsercao == '1') {
                    $linha = mysqli_fetch_assoc($dados);
                    $retorno = $linha['id'];
                    return $retorno;
                } else
                    return "sem referencia";
            } else {
                if ($Flocal == "tb_equip") {
                    $query = "select tbequip_id,tbequi_ref from tbequip where tbequi_ref ='" . $Fref . "'";
                    $dados = mysqli_query($Fconexao, $query);
                    $resultadoDaInsercao = mysqli_num_rows($dados);
                    if ($resultadoDaInsercao == '1') {
                        $linha = mysqli_fetch_assoc($dados);
                        $retorno = $linha['tbequip_id'];
                        return $retorno;
                    } else
                        return "sem referencia";

                } else {
                    if ($Flocal == "tb_controle_ti") {
                        $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
                        $dados = mysqli_query($Fconexao, $query);
                        $resultadoDaInsercao = mysqli_num_rows($dados);
                        if ($resultadoDaInsercao == '1') {
                            $linha = mysqli_fetch_assoc($dados);
                            $retorno = $linha['tab_chave'];
                            return $retorno;
                        } else
                            return "sem referencia";
                    } else
                        return "sem Local";
                }
            }

        }
        /*/
                    $query = "select * from tbunidade where id_unidade ='" . $Fref . "'";
                    $dados = mysqli_query($Fconexao, $query);
                    $resultadoDaInsercao = mysqli_num_rows($dados);
                    if ($resultadoDaInsercao == '1') {
                        $linha = mysqli_fetch_assoc($dados);
                        $nome = $linha['descricao_unidade'];
                        return $nome;
                    } else
                        return "sem referencia";
               /*/
    }

    function busca_ult_CTI($Fconexao)  // retorna o ultimo cti da base
    {

        $queryb = "Select Max(ctrl_ti) as ctrl_ti,id from tb_controle_ti";
        $dadosb = mysqli_query($Fconexao, $queryb);
        $resultado = mysqli_num_rows($dadosb);
        $totalb = mysqli_num_rows($dadosb);
        $linhab = mysqli_fetch_assoc($dadosb);
          if ($resultado == '1') {
            $ret_ctrl_ti = $linhab['ctrl_ti'];
             return $ret_ctrl_ti;
        } else
            return "0";
    }






    function checa_tipobyCTI($Fconexao, $Fref)  // retorna o tipo do dispositivo ,desktop ou notebook em funcao do codigo CTI  
    {
        $query = "select * from tbequip where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $tipo = strtoupper($linha['tbequi_tipo']);
            //$sec = $linha['tbcmei_sec_id'];
            return $tipo;
        } else
            return "0";
    }



    function cod_sec($Fconexao, $Fref)  // retorna o codigo da secretaria em funcao do codigo do local  
    {
        $query = "select * from tbcmei where tbcmei_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['tbcmei_nome'];
            $sec = $linha['tbcmei_sec_id'];
            return $sec;
        } else
            return "0";
    }



    function cod_cripta($Fnome, $Fkey)
    {
        $plaintext = $Fnome;//"message to be encrypted";
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $Fkey, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $Fkey, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
        //echo $ciphertext ; 
        return $ciphertext;
    }
    function cod_descripta($Fnome, $Fkey)
    {
        $c = base64_decode($Fnome);
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $Fkey, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $Fkey, $as_binary = true);
        if (hash_equals($hmac, $calcmac))// timing attack safe comparison
        {
            return $original_plaintext . "\n";
        }
        return "Erro de Descodificacao";
    }

    function compara($Fconexao, $Fctrl_ti, $Fid, $Ftabela, $Fcampo, $Fd_base, $Fd_dig, $Fusuario)
    {
        $hoje = date("d/m/Y H:i:s ");

        //   $query = "INSERT INTO `tb_registra`(`ctrl_ti`, `tabela_id`, `tabela`, `tabela_cpo`, `tabela_dados`, `usuario`, `outros`, `data`) VALUES ('" . $Fctrl_ti . "','" . $Fid . "','" . $Ftabela . "','" . $Fd_b . "','" . $Fusuario . "','" . $outros . "','" . $hoje . "')";
        //$query = "insert into tb_registra (login,local,data,modulo)VALUES('" . $login_prog . "','" . $local . "','" . $hoje . "','" . $modulo . "')";
        $resultadoDaInsercao = mysqli_query($conexao, $query);
        mysqli_close($conexao);
        return $resultadoDaInsercao;
        // exit; 
    }



    function charset_decode_utf_8($string)
    {
        /* Only do the slow convert if there are 8-bit characters */ /* avoid using 0xA0 (\240) in ereg ranges. RH73 does not like that */
        if (!preg_match("[\200-\237]", $string) and !preg_match("[\241-\377]", $string))
            return $string
            ;
        // decode three byte unicode characters 
        $string = preg_replace("/([\340-\357])([\200-\277])([\200-\277])/", "'&#'.((ord('\\1')-224)*4096 + (ord('\\2')-128)*64 + (ord('\\3')-128)).';'", $string);
        // decode two byte unicode characters
        $string = preg_replace("/([\300-\337])([\200-\277])/", "'&#'.((ord('\\1')-192)*64+(ord('\\2')-128)).';'", $string);
        return $string;
    }


    function clean2($texto)
    {
        $texto = html_entity_decode($texto);
        $texto = str_replace(' ', '-', $texto); // Replaces all spaces with hyphens.
        $texto = preg_replace('![aáàãâä]+!', 'a', $texto);
        $texto = preg_replace('![eéèêë]+!', 'e', $texto);
        $texto = preg_replace('![iíìîï]+!', 'i', $texto);
        $texto = preg_replace('![oóòõôö]+!', 'o', $texto);
        $texto = preg_replace('![uúùûü]+!', 'u', $texto);
        $texto = preg_replace('![ç]+!', 'c', $texto);
        $texto = preg_replace('![ñ]+!', 'n', $texto);

        //  $texto = ereg_replace('( )', '-', $texto);
        $texto = preg_replace('![^a-z0-9\-]+!', '', $texto);
        // $texto = eregi_replace('--', '-', $texto);
        $texto = str_replace('-', ' ', $texto); // Replaces all spaces with hyphens.

        return strtolower($texto);
    }


    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }

   function conta_equip_by_cmei_id($Fcod,$Fconexao) // retorna numeros de pcs do local cod_cmei
   {
        $query = "select tbequip_id, ctrl_ti from tbequip where tbequi_tbcmei_id ='" . $Fcod . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') 
        {
            $msg = 0;
            return $msg;
        } else
        {
        return $resultadoDaInsercao;
        }
   }


    function codsecretaria_by_idCmei($Fconexao, $Fref)  // retorna o cod da secretaria em funcao do cmei_id
    {
        $query = "select * from tbcmei where tbcmei_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['tbcmei_sec_id'];
            return $nome;
        } else
            return "sem referencia";
    }



    function deletar($pasta)
    {

        $iterator = new RecursiveDirectoryIterator($pasta, FilesystemIterator::SKIP_DOTS);
        $rec_iterator = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($rec_iterator as $file) {
            $file->isFile() ? unlink($file->getPathname()) : rmdir($file->getPathname());
        }

    }


    function DESvinculaMON_cti_mon2tbequip($Fconexao, $Fctrl_ti, $Fmon_ctrl_ti, $Fusuario)   // insere cti do monitor junto a monitor_obs em tbequip mediante cti em tbequip 
    {
        $query = "select tbequip_id, ctrl_ti,tbequip_monitor_obs,tbequip_monitor_num  from tbequip where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') {
            $msg = 0;
            return $msg;
        } else {
            if ($resultadoDaInsercao == '1') {
                $pc_id = $linha['tbequip_id'];
                $pc_mon_num = $linha['tbequip_monitor_num'];
                $pc_mon_obs = $linha['tbequip_monitor_obs'];
                // atualiza numeros de monitores
                if (($pc_mon_num == "") || ($pc_mon_num == "0"))
                    $pc_mon_novo_num = 1;
                else
                    $pc_mon_novo_num = $pc_mon_num - 1;
                // retira de obs o numero cti do monitor
                $string = $pc_mon_obs;   //"O João foi ao Hotel & Spa passar férias";
                $busca = $Fmon_ctrl_ti;
                $stringCorrigida = str_replace($busca, '- ', $string);  //('item_buscado', 'item_a_ser_inserido', $string);
                $pc_mon_obs_atualizado = $stringCorrigida;   //echo $stringCorrigida; // resultado: O João foi ao Hotel e Spa passar férias
                // fim 
                //$query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $Fmon_ctrl_ti . "' , `tbequi_obs`='" . $descricao . "'  WHERE `tbequip_id`='" . $Fid . "' ";
                // altera em tbequip
                $query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $pc_mon_obs_atualizado . "' , `tbequip_monitor_num`='" . $pc_mon_novo_num . "'  WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
                // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "monitor obs ", $pc_mon_obs . " -- > " . $pc_mon_obs, "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "monitor num ", $pc_mon_num . " -- > " . $pc_mon_novo_num, "  ", $Fusuario);
                    //registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

            }
        }
    }

    function estag_status($Fconexao, $Fref)
    {
        $query = "select * from status_estag where id_status ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['descricao_status'];
            return $nome;
        } else
            return "sem referencia";
    }

    function formaliza_10($Fbase)
    {
        $tamanho = strlen($Fbase);
        $limite = 12;
        $car_ini = "";
        $car_fim = "";
        if ($tamanho % 2 == 0) // num par
        {
            $resto = (($limite - $tamanho) / 2);
            $num_car_ini = $resto;
            $num_car_fim = $resto;
            for ($y = 0; $y < $num_car_ini; $y++) {
                $car_ini .= ".";
            }
            for ($y = 0; $y < $num_car_fim; $y++) {
                $car_fim .= ".";
            }
            return $car_ini . $Fbase . $car_fim;

        } else // impar
        {
            $resto = ((($limite + 1) - $tamanho) / 2);
            $num_car_ini = $resto;
            $num_car_fim = $resto;
            for ($y = 0; $y < $num_car_ini; $y++) {
                $car_ini .= ".";
            }
            for ($y = 0; $y < ($num_car_fim - 1); $y++) {
                $car_fim .= ".";
            }
            return $car_ini . $Fbase . $car_fim;
        }
    }


    function insere_acesso($conexao,$Fbase) {
                    // processo de identificacao da maquina pelo ip .
                    $ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
                    //echo "$ip"."<br>"; // imprimi o número IP
                    $ipF = $_SERVER["REMOTE_ADDR"]; //Pego o IP
                        //echo "$ip"."<br>"; // imprimi o número IP
                    $host = gethostbyaddr("$ip"); //pego o host
                    //echo "$host"."<br>"; 
                    $local = $ip."/".$ipF."/".$host;
                    $modulo = "SIAPI";
                    $status="1";
	                $hoje = date("d/m/Y H:i:s ");
	                $login_prog = $Fbase;
                     $query = "insert into tb_acessos (login,status,local,data,modulo)VALUES('".$login_prog."','".$status."','".$local."','".$hoje."','".$modulo."')";
                     $resultadoDaInsercao = mysqli_query($conexao, $query);
                     mysqli_close($conexao); 
                     return $resultadoDaInsercao;
                             // exit; 
       	  }
    function insere_icone($Fbase)
    {
        // tratamento do icone do dispositivo                                        
        $desc = strtoupper($Fbase);
        $ret_desc_cod = substr($desc, 0, 2);
        if ($ret_desc_cod == "DE")  // desktip
            $img_nome = "tp1.png";
        else
            if ($ret_desc_cod == "NO")  // note
                $img_nome = "tp5.png";
            else
                if ($ret_desc_cod == "TA")  // tablet
                    $img_nome = "tablet.png";
                else
                    if ($ret_desc_cod == "CE")  // celular
                        $img_nome = "celular.png";
                    else
                        if ($ret_desc_cod == "SW")  // switch
                            $img_nome = "d3.png";
                        else
                            if ($ret_desc_cod == "PA") // patch panel
                                $img_nome = "d1.png";
                            else
                                if ($ret_desc_cod == "RA") // rack
                                    $img_nome = "d2.png";
                                else
                                    if ($ret_desc_cod == "TV")  // tv
                                        $img_nome = "d4.png";
                                    else   
                                         if ($ret_desc_cod == "AP")  // Acess point
                                            $img_nome = "d4.png";
                                          else
                                            if ($ret_desc_cod == "MO")  // modulo bateria
                                                $img_nome = "d4.png";
                                              else
                                                 if ($ret_desc_cod == "CO")  // Controlador ap
                                                   $img_nome = "d4.png";
                                                 else
                                                    $img_nome = "nenhum.png";
                return $img_nome;
    }

    function insere_vinculo($Fconexao,$Fcti,$Floc,$Fsec,$Fusuario,$Fdisp)
    {
     // armazena dados caso retorne erro
               $agora = date("Ymd");
                $nomeArquivo = "vinculo.txt"; // seta o arquivo TXT
                $campos = " - CTI ".$Fcti." - Disp ".$Fdisp." - Loc. ".$Floc." -Sec. ".$Fsec;
                $conteudo = "Usuario " . $Fusuario . " Data : " .$agora ."  ".$campos. PHP_EOL;

                //$msg = 'teste' . PHP_EOL;
                //file_put_contents('lista.txt', $msg, FILE_APPEND);
                file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
                $arquivo = fopen($_SERVER['DOCUMENT_ROOT'] . $nomeArquivo, 'w');
                if ($arquivo) {
                    // Escreve no arquivo
                    fwrite($arquivo, $conteudo);
                    // fecha o arquivo
                    fclose($arquivo);
                }

            // fim do armazena dados

      

    }


   /*/ function insere_RESERVA_BY_CTI($Fconexao, $Fcti, $Fdados)  // insere cti em tabela reservados  
   / {
         $status = "1";
         $query = "insert into 'tb_reserva_cti' ('status','cti','dados')VALUES('" . $status . "','" . $Fcti . "','" . $Fdados . "')";
         $resultadoDaInsercao = mysqli_query($Fconexao, $query);
         return $resultadoDaInsercao;
        //INSERT INTO `tb_reserva_cti` (`id`, `status`, `cti`, `dados`) VALUES (NULL, '1', '3500', 'claudio 11/03/2025');
       }
    /*/

    function limpa_tracoj($valor)
    {
        $valor = trim($valor);
        $valor = str_replace(array('.', '-', '/', '|'), "", $valor);
        return $valor;
    }




    function mascara_cti($Fref)
    {// retorna os CTI padronizado com 4 casas 
        $qtd = strlen($Fref);
        switch ($qtd) {
            case '0': {
                return "";
            }
            case '1': {
                return "0000" . $Fref;
            }
            case '2': {
                return "000" . $Fref;
            }
            case '3': {
                return "00" . $Fref;
            }
            case '4': {
                return "0" . $Fref;
            }
            case '5': {
                return $Fref;
            }

        }

    }

    function mostra_inicio($Fconexao, $Fref) // retorna o  nome do tecnico e a data de cadastro
    {
        $query = "select tbequip_id,tbequi_tecnico,tbequi_datalanc from tbequip where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $retorno1 = $linha['tbequi_tecnico'];
            $retorno2 = $linha['tbequi_datalanc'];
            $retorno ="Cadastrado por  ".$retorno1."  em   ".$retorno2 ;
            return $retorno;
        } else
            return "sem referencia";


    }

    function mostra_local_monby_cti($Fconexao, $Fref) // retorna o  codigo local atraves do cti do dispositivo 
    {
        $query = "select * from tb_monitores where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $retorno = $linha['local_id'];
          $retorno1 = nomedolocal($Fconexao, $retorno);
            return $retorno1;
            //return $retorno;
        } else
            return "0";
    }

    function mostra_local_divby_cti($Fconexao, $Fref) // retorna o  codigo local atraves do cti do dispositivo 
    {
        $query = "select *  from tb_diversos where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $retorno = $linha['local_cod'];
            $retorno1 = nomedolocal($Fconexao, $retorno);
            return $retorno1;
            //return $retorno;
        } else
            return "0";
    }



    function mostra_local($Fconexao, $Fref) // retorna o  codigo local_id dentro de tbequip
    {
        $query = "select tbequip_id,tbequi_tbcmei_id from tbequip where tbequip_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $retorno = $linha['tbequi_tbcmei_id'];
            $retorno1 = nomedolocal($Fconexao, $retorno);
            return $retorno1;
            
        } else
            return "sem referencia";


    }


    function mostra_monitores($Fconexao, $Fref) // retorna os dados dos monitores cadastrados em funcao do id tb_equip 
    {
        $query = "select * from tb_monitores where id_equip ='" . $Fref . "'and status=1";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') {
            $devolucao = "Nenhum Monitor associado ... ";
        } else {
            if ($resultadoDaInsercao == '1') {
                $marca = $linha['mon_marca'];
                $tam = $linha['mon_tam'];
                $plaq = $linha['mon_plaqueta'];
                $tela = $linha['mon_tipo'];
                $cti = $linha['ctrl_ti'];
                $devolucao = $marca . " " . $tam . " - CTI nº" . $cti . "-";
                // $devolucao = $marca . " " . $tam . " " . $plaq.  " " . $tela . "  - CTI nº" . $cti . "  -  ";
            } else { // varios registros
                do {
                    $marca = $linha['mon_marca'];
                    $tam = $linha['mon_tam'];
                    $plaq = $linha['mon_plaqueta'];
                    $tela = $linha['mon_tipo'];
                    $cti = $linha['ctrl_ti'];
                    $devolucao .= $marca . " " . $tam . " - CTI nº" . $cti . "-";

                } while ($linha = mysqli_fetch_assoc($dados));
            }
        }

        return $devolucao;
    }

    function mostra_monitores_num($Fconexao, $Fref) // retorna os dados dos monitores cadastrados em funcao do id tb_equip 
    {
        $query = "select * from tb_monitores where id_equip ='" . $Fref . "'and status=1";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') {
            $devolucao = "0";
        } else {
            if ($resultadoDaInsercao == '1') {
               // $marca = $linha['mon_marca'];
                //$tam = $linha['mon_tam'];
                //$plaq = $linha['mon_plaqueta'];
                //$tela = $linha['mon_tipo'];
                $cti = $linha['ctrl_ti'];
                $devolucao = $cti . " - ";
                // $devolucao = $marca . " " . $tam . " " . $plaq.  " " . $tela . "  - CTI nº" . $cti . "  -  ";
            } else { // varios registros
                do {
                  //  $marca = $linha['mon_marca'];
                   // $tam = $linha['mon_tam'];
                   // $plaq = $linha['mon_plaqueta'];
                   // $tela = $linha['mon_tipo'];
                    $cti = $linha['ctrl_ti'];
                    $devolucao .= $cti . " - ";

                } while ($linha = mysqli_fetch_assoc($dados));
            }
        }

        return $devolucao;
    }



    function nomedeunidade($Fconexao, $Fref) // retorna o nome da unidade em funcao do id local_id
    {
        $query = "select * from tbunidade where id_unidade ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['descricao_unidade'];
            return $nome;
        } else
            return "sem referencia";
    }


    function nomedolocal($Fconexao, $Fref) // retorna o nome da unidade em tabela cmei
    {
        $query = "select * from tbcmei where tbcmei_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['tbcmei_nome'];
            return $nome;
        } else
            return $Fref . "  Nao Especificado";
    }

    function nomedoresponsavel($Fconexao, $Fref)  // retorna o nome do responsavel em tabela cmei
    {
        $query = "select * from tbcmei where tbcmei_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['tbcmei_coord'];
            return $nome;
        } else
            return "sem referencia";
    }


    function nomedesecretaria($Fconexao, $Fref) // retorna o nome da secretaria em funcao do codigo da mesma 
    {
        $query = "select * from tbsecretaria where sec_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['sec_nome'];
            return $nome;
        } else
            return "sem referencia";
    }



    function normalizeNFD($string)
    {
        $nome = $string;
        $nome2 = $nome . normalize("NFD");
        return $nome2;
    }


    function printa_tela($Fref)
    {

        $im = imagegrabscreen();
        imagepng($im, "dist/img_".$Fref.".png");
        imagedestroy($im);

    }


    function remover_acentos1($string) {

    if ( !preg_match('/[\x80-\xff]/', $string) )
        return $string;

    $chars = array(
    chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
    chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
    chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
    chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
    chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
    chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
    chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
    chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
    chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
    chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
    chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
    chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
    chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
    chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
    chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
    chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
    chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
    chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
    chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
    chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
    chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
    chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
    chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
    chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
    chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
    chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
    chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
    chr(195).chr(191) => 'y',
    // Decompositions for Latin Extended-A
    chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
    chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
    chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
    chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
    chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
    chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
    chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
    chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
    chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
    chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
    chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
    chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
    chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
    chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
    chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
    chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
    chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
    chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
    chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
    chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
    chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
    chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
    chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
    chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
    chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
    chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
    chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
    chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
    chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
    chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
    chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
    chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
    chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
    chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
    chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
    chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
    chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
    chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
    chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
    chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
    chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
    chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
    chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
    chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
    chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
    chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
    chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
    chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
    chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
    chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
    chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
    chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
    chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
    chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
    chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
    chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
    chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
    chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
    chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
    chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
    chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
    chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
    chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
    chr(197).chr(190) => 'z', chr(197).chr(191) => 's'
    );

    $string = strtr($string, $chars);
    return $string;
}



    function removeacentos ($trocaracentos)
{
       $ACENTOS   = array("À","Á","Â","Ã","à","á","â","ã");
       $SEMACENTOS= array("A","A","A","A","A","A","A","A");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
     
       $ACENTOS   = array("È","É","Ê","Ë","è","é","ê","ë");
       $SEMACENTOS= array("E","E","E","E","E","E","E","E");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
       
       $ACENTOS   = array("Ì","Í","Î","Ï","ì","í","î","ï");
       $SEMACENTOS= array("I","I","I","I","I","I","I","I");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
     
       $ACENTOS   = array("Ò","Ó","Ô","Ö","Õ","ò","ó","ô","ö","õ");
       $SEMACENTOS= array("O","O","O","O","O","O","O","O","O","O");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
     
       $ACENTOS   = array("Ù","Ú","Û","Ü","ú","ù","ü","û");
       $SEMACENTOS= array("U","U","U","U","U","U","U","U");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
       
       $ACENTOS   = array("Ç","ç","ª","º","°","'","&","@");
       $SEMACENTOS= array("C","C","A.","O.","O."," ","E","A");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
       
       // Habilitar para deixar tudo maiúsculo
       //$MINUSCULAS = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","x","z","w","y");
       //$MAIUSCULAS = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","X","Z","W","Y");
       //$trocaracentos = str_replace($MINUSCULAS,$MAIUSCULAS, $trocaracentos);     

       return $trocaracentos;
}



      function removerAcentos($texto){
  return strtr($texto,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

    function remove_numeros($str)
    { //  Removendo símbolos e números
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^a-zA-Z\s]/", "", $str);
        return $nova_string;
        //return preg_replace("/[^0-9]/", "", $str);
    }

    function remove_simbolos($str)
    { //  Removendo símbolos 
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^a-zA-Z0-9\s]/", "", $str);
        return $nova_string;
        //$nova_string = preg_replace("/[^a-zA-Z0-9]/", "", $string);

    }

    function remove_letras_e_simbolos($str)
    { //  Removendo símbolos 
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^0-9\s]/", "", $str);
        return $nova_string;
        //return preg_replace("/[^0-9]/", "", $str);
    }
  
    
    
    function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )
    {
        $hoje = date("d/m/Y H:i:s ");
        if(($Fctrl_ti=='')||($Fid=='')||($Fcampo==''))
        {
         return "0";   
        }
        else
        {
            $query = "INSERT INTO `tb_registra`(`ctrl_ti`, `tabela_id`, `tabela`, `tabela_cpo`, `tabela_dados`, `usuario`, `outros`, `data`) VALUES ('" . $Fctrl_ti . "','" . $Fid . "','" . $Ftabela . "','" . $Fcampo . "','" . $Fd_b . "','" . $Fusuario . "','" . $Foutros . "','" . $hoje . "')";
            //$query = "insert into tb_registra (login,local,data,modulo)VALUES('" . $login_prog . "','" . $local . "','" . $hoje . "','" . $modulo . "')";
            $resultadoDaInsercao = mysqli_query($Fconexao, $query);
            //  mysqli_close($Fconexao);
            return $resultadoDaInsercao;
        }// exit; 
    }

    

  

    function retiraAcentos($string)
    {
        $acentos = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $sem_acentos = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        $string = strtr($string, utf8_decode($acentos), $sem_acentos);
        $string = str_replace(" ", "-", $string);
        return utf8_decode($string);
    }

    function removeracento($str)
    {
        $from = 'ÀÁÃÂÉÊÍÓÕÔÚÜÇàáãâéêíóõôúüç';
        $to = 'AAAAEEIOOOUUCaaaaeeiooouuc';
        return strtr($str, $from, $to);
    }



    function ret_uso_mon_cti_ctrl_ti($Fconexao, $Fref)  //  informa se o monitor esta sendo utilizado em equip
    {
        if (ret_ctrl_ti($Fconexao, $Fref) == "0")
            return "0";
        else {
            $caminho = ret_caminho_ctrl_ti($Fconexao, $Fref); // M143
            $pre_rota = substr($caminho, 0, 1);
            $rota = substr($caminho, 1);
            if ($pre_rota == "M") {
                $query = "select * from tb_monitores where id ='" . $rota . "'";
                $dados = mysqli_query($Fconexao, $query);
                $resultadoDaInsercao = mysqli_num_rows($dados);
                if ($resultadoDaInsercao == '1') {
                    $linha = mysqli_fetch_assoc($dados);
                    $cti = $linha['id_equip'];
                    if ($cti <> "0")
                        return ret_cti_tbequip($Fconexao, $cti);
                    else
                        return "0";
                } else
                    return "0";
            } else {
                return "0";
            }
        }

    }

    function ret_caminho_ctrl_ti($Fconexao, $Fref) // retorna o id ( caminho) cadastrado em controle_ti  < C2374 > 
    {
        $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $caminho = $linha['tab_cam'];
            return $caminho;
        } else
            return "0";
    }

    
    function ret_dtCad_byctrl_ti($Fconexao, $Fref) // informa a data de lanc do equip by  controle_ti
    {
        $query = "select * from tbequip where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $dados = $linha['tbequi_datalanc'];
            return $dados;
        } else
            return "Nao especificado";
    }


    function ret_resumo_ctrl_ti($Fconexao, $Fref) // retorna infs  de controle_ti
    {
        $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $resumo = $linha['descricao'] . "  " . $linha['tab_cam'] . "  Tabela :" . $linha['tab_origem'] . " Status  " . $linha['status'];
            //$nome = $linha['descricao'];
            return $resumo;
        } else
            return "Nao Descrito";
    }



    function ret_desc_ctrl_ti($Fconexao, $Fref) // informa a descricao de  para controle_ti
    {
        $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['descricao'];
            return $nome;
        } else
            return "Nao Descrito";
    }

    function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
    {
        if ($Fref <> "") {
            $query = "select * from tbequip where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                //$linha = mysqli_fetch_assoc($dados);
                //$nome = $linha['descricao_status'];
                return "1";
            } else
                return "0";
        } else
            return "0";
    }

    function ret_pos_tbequip_by_CTI($Fconexao, $Fref) // informa posicao de CTI em tbequip ( cti e equip_id) 
    {
        if ($Fref <> "") {
            $query = "select * from tbequip where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                //$linha = mysqli_fetch_assoc($dados);
                //$nome = $linha['descricao_status'];
                return "1";// $Fref. "   Encontrado";
            } else
                return "0";//$Fref . "   NAO  Encontrado";
        } else
            return "0";
    }
    function ret_pos_div_by_CTI($Fconexao, $Fref) // informa posicao de CTI em tbequip ( cti e equip_id) 
    {
        if ($Fref <> "") {
            $query = "select * from tb_diversos where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                //$linha = mysqli_fetch_assoc($dados);
                //$nome = $linha['descricao_status'];
                return "1";// $Fref. "   Encontrado";
            } else
                return "0";//$Fref . "   NAO  Encontrado";
        } else
            return "0";
    }

    function ret_pos_mon_by_CTI($Fconexao, $Fref) // informa posicao de CTI em tbequip ( cti e equip_id) 
    {
        if ($Fref <> "") {
            $query = "select * from tb_monitores where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                //$linha = mysqli_fetch_assoc($dados);
                //$nome = $linha['descricao_status'];
                return "1";// $Fref. "   Encontrado";
            } else
                return "0";//$Fref . "   NAO  Encontrado";
        } else
            return "0";
    }






    function ret_ctrl_ti_monitor($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab Monitores
    {
        if ($Fref <> "") {
            $query = "select * from tb_monitores where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                //$linha = mysqli_fetch_assoc($dados);
                //$nome = $linha['descricao_status'];
                return "1";
            } else
                return "0";
        } else
            return "0";
    }


    // function ret_cti_reservado($Fconexao, $Fref) // informa se ja existe reserva para essa numeracao cti
    function ret_cti_reservado($Fconexao, $Fref) // informa se ja existe reserva para essa numeracao cti
    {
        if ($Fref <> "") {
            $query = "select * from tb_reserva_cti where cti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                return "1";
            } else
                return "0";
        } else
            return "0";
    }


    
    function ret_ctrl_ti($Fconexao, $Fref) // informa se ja existe numeracao para controle_ti
    {
        if ($Fref <> "") 
        {
            $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1')
             {
              return "1";
             }
            else
               return "0";
        }
        else
            return "vazio";
    }
    function ret_ctrl_ti_ref($Fconexao, $Fref) // informa o cti e situaçao em controle_ti
    {
        if ($Fref <> "") {
            $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                return " CTI : ".$Fref."  ja Cadastrado ";
            } else
                return " CTI : " .$Fref."  Não Cadastrado ";
        } else
            return "";
    }


    function ret_id_by_equip_id($Fconexao, $Fref) // retorna posicao id do monitor ,de acordo com o equip_id em Monitores  atraves do equip_id cadastrado  ;
    {
        $conn = $Fconexao;
        $sql3 = "SELECT * FROM tb_monitores where id_equip ='" . $Fref . "' ";
        $resultado3 = mysqli_query($conn, $sql3) or die('Erro ao selecionar especialidade: ' . mysqli_error());
        $qtd3 = mysqli_num_rows($resultado3);  // $option = '';
        $dados3 = mysqli_query($conn, $sql3);
        if ($qtd3 == 0)
            return 0;
        else {
            $linha3 = mysqli_fetch_assoc($dados3);
            $ret_cti = $linha3['id'];
            //$ret_local = $linha3['local_id'];
            return $ret_cti;
        }
    }

    function ret_cti_by_equip_id($Fconexao, $Fref) // retorna cti do monitor ,de acordo com o equip_id em Monitores  atraves do equip_id   ;
    {
        $conn = $Fconexao;
        $sql3 = "SELECT * FROM tb_monitores where id_equip ='" . $Fref . "' ";
        $resultado3 = mysqli_query($conn, $sql3) or die('Erro ao selecionar especialidade: ' . mysqli_error());
        $qtd3 = mysqli_num_rows($resultado3);  // $option = '';
        $dados3 = mysqli_query($conn, $sql3);
        if ($qtd3 == 0)
            return 0;
        else {
            $linha3 = mysqli_fetch_assoc($dados3);
            $ret_cti = $linha3['ctrl_ti'];
            //$ret_local = $linha3['local_id'];
            return $ret_cti;
        }
    }

    function ret_plaqueta_bycti($Fconexao, $Fctrl_ti) // retorna patrimonio e local atraves do cti e   ;
    {
        $conn = $Fconexao;
        $query = "select id,ctrl_ti,tab_chave,tab_origem ,descricao from tb_controle_ti where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '0')
            return 0;
        else {
            $linha = mysqli_fetch_assoc($dados);
            $ret_chave = $linha['tab_chave'];
            $ret_tipo = $linha['tab_origem'];
            $ret_descricao = $linha['descricao'];
            if ($ret_tipo == "1") {
                $sql1 = "SELECT * FROM tbequip where tbequip_id ='" . $ret_chave . "' ";
                $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                $dados1 = mysqli_query($conn, $sql1);
                $qtd = mysqli_num_rows($resultado1);  // $option = '';
                if ($qtd == 0)
                    return 0;
                else {
                    $linha1 = mysqli_fetch_assoc($dados1);
                    $ret_plaqueta = $linha1['tbequip_plaqueta'];
                    $ret_local = $linha1['tbequi_tbcmei_id'];
                    return $ret_plaqueta . "     " . nomedolocal($conn, $ret_local);
                }
            } else {
                if ($ret_tipo == "2")  // diversos
                {
                    $sql2 = "SELECT * FROM tb_diversos where id ='" . $ret_chave . "' ";
                    $resultado2 = mysqli_query($conn, $sql2) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                    $qtd2 = mysqli_num_rows($resultado2);  // $option = '';
                    $dados2 = mysqli_query($conn, $sql2);
                    if ($qtd2 == 0)
                        return 0;
                    else {
                        $linha2 = mysqli_fetch_assoc($dados2);
                        $ret_plaqueta = $linha2['patrimonio'];
                        $ret_local = $linha2['local_cod'];
                        return $ret_plaqueta . "    " . nomedolocal($conn, $ret_local);
                    }
                } else // monitores
                {
                    $sql3 = "SELECT * FROM tb_monitores where id ='" . $ret_chave . "' ";
                    $resultado3 = mysqli_query($conn, $sql3) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                    $qtd3 = mysqli_num_rows($resultado3);  // $option = '';
                    $dados3 = mysqli_query($conn, $sql3);
                    if ($qtd3 == 0)
                        return 0;
                    else {
                        $linha3 = mysqli_fetch_assoc($dados3);
                        $ret_plaqueta = $linha3['mon_plaqueta'];
                        $ret_local = $linha3['local_id'];
                        return $ret_plaqueta . "    " . nomedolocal($conn, $ret_local);
                    }
                }


            }

        }


    }




    function resumo_TI($Fconexao, $Fctrl_ti) // ativa cti e ids de tabelas  status = 1 ;
    {
        $conn = $Fconexao;
        $query = "select id,ctrl_ti,tab_chave,tab_origem ,descricao from tb_controle_ti where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '0')
            return 0;
        else {
            $linha = mysqli_fetch_assoc($dados);
            $ret_chave = $linha['tab_chave'];
            $ret_tipo = $linha['tab_origem'];
            $ret_descricao = $linha['descricao'];
            if ($ret_tipo == "1") {
                $sql1 = "SELECT * FROM tbequip where tbequip_id ='" . $ret_chave . "' ";
                $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                $dados1 = mysqli_query($conn, $sql1);
                $qtd = mysqli_num_rows($resultado1);  // $option = '';
                if ($qtd == 0)
                    return 0;
                else {
                    $linha1 = mysqli_fetch_assoc($dados1);
                    $ret_plaqueta = $linha1['tbequip_plaqueta'];
                    $ret_local = $linha1['tbequi_tbcmei_id'];
                    return "  Patrimonio : " . $ret_plaqueta . "    Local : " . nomedolocal($conn, $ret_local);
                }
            } else {
                if ($ret_tipo == "2")  // diversos
                {
                    $sql2 = "SELECT * FROM tb_diversos where id ='" . $ret_chave . "' ";
                    $resultado2 = mysqli_query($conn, $sql2) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                    $qtd2 = mysqli_num_rows($resultado2);  // $option = '';
                    $dados2 = mysqli_query($conn, $sql2);
                    if ($qtd2 == 0)
                        return 0;
                    else {
                        $linha2 = mysqli_fetch_assoc($dados2);
                        $ret_plaqueta = $linha2['patrimonio'];
                        $ret_local = $linha2['local_cod'];
                        return "  Patrimonio : " . $ret_plaqueta . "     Local : " . nomedolocal($conn, $ret_local);
                    }
                } else // monitores
                {
                    $sql3 = "SELECT * FROM tb_monitores where id ='" . $ret_chave . "' ";
                    $resultado3 = mysqli_query($conn, $sql3) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                    $qtd3 = mysqli_num_rows($resultado3);  // $option = '';
                    $dados3 = mysqli_query($conn, $sql3);
                    if ($qtd3 == 0)
                        return 0;
                    else {
                        $linha3 = mysqli_fetch_assoc($dados3);
                        $ret_plaqueta = $linha3['mon_plaqueta'];
                        $ret_local = $linha3['local_id'];
                        return "   Patrimonio : " . $ret_plaqueta . "    Local : " . nomedolocal($conn, $ret_local);
                    }
                }


            }

        }


    }


    function remove_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // atualiza status 0 em tabelas  em status = 0 passando o id ;
    {      // tabela , tipo , id ,
        $status = "0";
        $descricao = "Excluido na data " . $Fhoje . " por  " . $Fusuario . "  codigo:" . $Fctrl_ti . "-" . $Ftab . "-" . $Fid . "   <>  " . $Fjustificativa;
        switch ($Ftab) {
            case '1': {   // tbequip
                // $caminho = "C" . $Fid_equip;
                $query = "UPDATE `tbequip` SET `status`='" . $status . "' , `tbequi_obs`='" . $descricao . "'  WHERE `tbequip_id`='" . $Fid . "' ";
                // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "1 --> 0", "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

                break;
            }
            case '2': {   //tb_diversos
                //$caminho = "M" . $Fid_equip;
                $query = "UPDATE `tb_diversos` SET `status`='" . $status . "' , `obs`='" . $descricao . "'  WHERE `id`='" . $Fid . "' ";
                //$query = "UPDATE `tb_monitores` SET `status` = `0` where `tb_monitores`.`id` ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "1 --> 0", "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

                break;
            }
            case '3': {  // tb_monitores
                //$caminho = "M" . $Fid_equip;
                $query = "UPDATE `tb_monitores` SET `status`='" . $status . "' , `obs`='" . $descricao . "'  WHERE `id`='" . $Fid . "' ";
                //$query = "UPDATE `tb_monitores` SET `status` = `0` where `tb_monitores`.`id` ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "1 --> 0", "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;
                break;
            }
            case '0': {  // tb_controle_ti
                //$caminho = "M" . $Fid_equip;
                $query = "UPDATE `tb_controle_ti` SET `status`='" . $status . "' , `obs`='" . $descricao . "'  WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
                // $query = "UPDATE `tb_controle_ti ` SET `status = 0 where ctrl_ti ='" . $Fctrl_ti . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "1 --> 0", "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;
            }
                break;
        }
        // }
    }

    function ret_sac_by_cod($Fconexao,  $Fref) // retorna a existencia de avaliacao  atraves do cod do chamado tecnico    ;
    {
        $query = "select * from tb_sac  where cham_cod ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            //$linha = mysqli_fetch_assoc($dados);
            //$caminho = $linha['ctrl_ti'];
            return "1";
        } else
            return "0";
    }

    function ret_cti_tbequip($Fconexao, $Fref) // retorna o cti dentro da tabela tbequip 
    {
        $query = "select tbequip_id ,ctrl_ti from tbequip  where tbequip_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $caminho = $linha['ctrl_ti'];
            return $caminho;
        } else
            return "0";
    }

    function retLOCAL_by_idequip($Fconexao, $Fref) // retorna o local em tbequip atraves do equip_id 
    {
        $query = "select tbequip_id ,ctrl_ti ,tbequi_tbcmei_id from tbequip  where tbequip_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $id_cmei = $linha['tbequi_tbcmei_id'];
            return nomedolocal($Fconexao, $id_cmei);
            
        } else
            return "0";
    }


    
    function ret_userbycti($Fconexao, $Fref) // retorna nomess de utilizadores do pc
    {
        $query = "select tbequip_id ,ctrl_ti ,tbequip_util_nomes from tbequip  where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $dados = $linha['tbequip_util_nomes'];
            if ($dados=="")
               return "0";
            else
              return $dados;

        } else
            return "0";
    }



    function retAUTOR_by_idequip($Fconexao, $Fref) // retorna o local em tbequip atraves do equip_id 
    {
        $query = "select tbequip_id ,ctrl_ti ,tbequi_tecnico,tbequi_ref from tbequip  where tbequip_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $dados = $linha['tbequi_tecnico']."  ". $linha['tbequi_ref'];
            return $dados;

        } else
            return "0";
    }
    
    function retresp_by_idequip($Fconexao, $Fref) // retorna o local em tbequip atraves do equip_id 
    {
        $query = "select tbequip_id ,ctrl_ti ,tbequi_tecnico,tbequi_ref ,tbequip_resp from tbequip  where tbequip_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $dados = $linha['tbequip_resp'] ;
           if ($dados=="")
                return "vazio";
           else
            return $dados;

        } else
            return "0";
    }

    function retRESP_by_cmeiID($Fconexao, $Fref) // retorna o Responsavel do local em tbcmei  atraves do id do local 
    {
        $query = "select * from tbcmei where tbcmei_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $dados = $linha['tbcmei_coord'];
            if ($dados == "")
                return "vazio";
            else
                return $dados;

        } else
            return "0".$Fref;
    }



    function ret_Qtd_CentroCustosbySec($Fref)
    {
        //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
        {
            $sql = "SELECT * FROM tbcmei WHERE tbcmei_sec_id = '" . $Fref . "'";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0)
                return 0;
            else
                return $total;
        }
    }
    function ret_Qtd_PcbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
    {
        //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
        {
            $sql = "SELECT * FROM tbequip WHERE tbequip_sec = '" . $Fref . "'";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0)
                return 0;
            else
                return $total;
        }
      }

    function ret_Qtd_MonbySec($Fconexao, $Fref) // informa qtd de Monitores por secretaria
    {
        //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
        {
            $sql = "SELECT * FROM tb_monitores WHERE sec_id = '" . $Fref . "'";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0)
                return 0;
            else
                return $total;
        }
    }
    function redirecionar($url, $tempo) // redireciona para um local apos x segundos
    {
        $url = str_replace('&;', '&', $url);

        if ($tempo > 3) {
            header("Refresh: $tempo; URL=$url");
        } else {
            @ob_flush();
            @ob_end_clean();
            header("Location: index.php");
            exit;
        }
    }


    function somente_numeros($str)
    {
        // echo somente_numerso('Olá 1456Mundo!');
        // vai retornar 1456 
        return preg_replace("/[^0-9]/", "", $str);
    }

    function sanitizeString($str)
    {

        // matriz de entrada
        $what = array('ä', 'ã', 'à', 'á', 'â', 'ê', 'ë', 'è', 'é', 'ï', 'ì', 'í', 'ö', 'õ', 'ò', 'ó', 'ô', 'ü', 'ù', 'ú', 'û', 'Ã', 'À', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ', 'ç', 'Ç', ' ', '-', '(', ')', ',', ';', ':', '|', '!', '"', '#', '$', '%', '&', '/', '=', '?', '~', '^', '>', '<', 'ª', 'º');

        // matriz de saída
        $by = array('a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'A','A', 'A', 'E', 'I', 'O', 'U', 'n', 'n', 'c', 'C', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_');
        $texto = str_replace($what, $by, $str);
        $texto_final = str_replace('_', ' ', $texto); // Replaces all spaces with hyphens.

        // devolver a string
        return $texto_final;
      //  return str_replace($what, $by, $str);
        /*
        $str = html_entity_decode($str);
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
        $str = preg_replace('/[^a-z0-9]/i', '_', $str);
        $str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
        return $str;
/*/    

}

    function tirarAcentos($string)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);
    }
            
   function tipo_DispByCTI($Fconexao, $Fref) // retorna o tipo de dispositivo by CTI
    {
        if ($Fref <> "") {
            $conn = $Fconexao;
            $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($conn, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') 
            {
                $linha = mysqli_fetch_assoc($dados);
                $tipo = $linha['descricao'];
                return $tipo;
            } else
                return "00";
        } else
            return "00"; 


    }

    function ver_res_w()
    {
        if (!isset($_COOKIE['resolucao'])) {
            ?>
                <script language='javascript'>
                document.cookie = "resolucao="+screen.width+"x"+screen.height;
                self.location.reload();
                </script>
           <?php
        } else
            $resolucao = list($width, $height) = explode("x", $_COOKIE['resolucao']);
        //echo "<h3>Sua resolu&ccedil;&atilde;o &eacute; $width por $height</h3>";
        return $width ;
    }




    function ver_res()
    {
        if (!isset($_COOKIE['resolucao'])) {
            ?>
                <script language='javascript'>
                document.cookie = "resolucao="+screen.width+"x"+screen.height;
                self.location.reload();
                </script>
           <?php 
        } else
             $resolucao = list($width, $height) = explode("x", $_COOKIE['resolucao']);
        //echo "<h3>Sua resolu&ccedil;&atilde;o &eacute; $width por $height</h3>";
            return $width."x".$height;
       }
    
    
  

  
   

    function zera_Monitor_bycti($Fconexao, $Fctrl_ti, $Fusuario)   // zera id_equip em monitor atraves do cti do monitor 
    {
        $query0 = "select * from tb_monitores where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados0 = mysqli_query($Fconexao, $query0);
        $resultadoDaInsercao0 = mysqli_num_rows($dados0);
        $linha0 = mysqli_fetch_assoc($dados0);

        if ($resultadoDaInsercao0 == '0') {
            $msg = 0;
        } else {
            $pc_id = $linha0['id'];
            $pc_ant = $linha0['id_equip'];
            $loc_ant = $linha0['local_id'];
            $sec_ant = $linha0['sec_id'];
        }      // atualiza numeros de monitores

        registra_alt($Fconexao, $Fctrl_ti, $pc_id, "3", "id_equip ", $pc_ant . " -- > " . " 0 ", "  ", $Fusuario);
        registra_alt($Fconexao, $Fctrl_ti, $pc_id, "3", "local ", $local_ant . " -- > " . " 0 ", "  ", $Fusuario);
        registra_alt($Fconexao, $Fctrl_ti, $pc_id, "3", "sec ", $sec_ant . " -- > " . " 0 ", "  ", $Fusuario);
        $query = "UPDATE `tb_monitores` SET `id_equip`='0', `local_id`='0',`sec_id`='0'   WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
        // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
        $resultadoDaInsercao = mysqli_query($Fconexao, $query);
        //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
        if ($resultadoDaInsercao == 0)
            $msg = 0;
        else
            $msg = 1;
        return $msg;
    }


 


    function vinculaMON_cti_mon2tbequip($Fconexao, $Fctrl_ti, $Fmon_ctrl_ti, $Fvid,$Fusuario)   // insere cti do monitor junto a monitor_obs e tipo de saida de video junto a mon_vid_uso em tbequip mediante cti em tbequip 
    {
        $query = "select tbequip_id, ctrl_ti,tbequip_monitor_obs,tbequip_monitor_num,tbequip_vid_uso from tbequip where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') {
            $msg = 0;
            return $msg;
        } else {
            if ($resultadoDaInsercao == '1') {
                $pc_id = $linha['tbequip_id'];
                $pc_mon_num = $linha['tbequip_monitor_num'];
                $pc_mon_obs = $linha['tbequip_monitor_obs'];
                $pc_mon_vid = $linha['tbequip_vid_uso'];
                 if (($pc_mon_num == "") || ($pc_mon_num == "0"))
                    $pc_mon_num = 0;
                                   
                     $pc_mon_novo_num = $pc_mon_num + 1;
                //$query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $Fmon_ctrl_ti . "' , `tbequi_obs`='" . $descricao . "'  WHERE `tbequip_id`='" . $Fid . "' ";
                $pc_mon_vid2 = $pc_mon_vid . " " . $Fvid;
                    $query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $pc_mon_obs . " CTI : " . $Fmon_ctrl_ti . "' , `tbequip_monitor_num`='" . $pc_mon_novo_num . "' , `tbequip_vid_uso`='" . $pc_mon_vid2 . "'  WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
                // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "monitor obs ", $pc_mon_obs . " -- > " . $Fmon_ctrl_ti, "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "monitor num ", $pc_mon_num . " -- > " . $pc_mon_novo_num, "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "video saida ", " 1 " . " -- > " . $Fvid, "  ", $Fusuario);
                    //registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

            }
        }
    }


    function vincula_cti_mon2tbequip($Fconexao, $Fctrl_ti, $Fmon_ctrl_ti,$Fusuario)   // insere cti do monitor junto a monitor_obs em tbequip
    {
        $query = "select tbequip_id, ctrl_ti,tbequip_monitor_obs,tbequip_monitor_num  from tbequip where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') 
        {
            $msg = 0;
            return $msg;
        } else 
        {
            if ($resultadoDaInsercao == '1') {
                $pc_id = $linha['tbequip_id'];
               // $pc_mon_num = $linha['tbequip_monitor_num'];
                $pc_mon_obs = $linha['tbequip_monitor_obs'];
               // if (($pc_mon_num == "") || ($pc_mon_num == "0"))
                //    $pc_mon_num = 0;
                //else
                //$pc_mon_novo_num = $pc_mon_num + 1;
                //$query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $Fmon_ctrl_ti . "' , `tbequi_obs`='" . $descricao . "'  WHERE `tbequip_id`='" . $Fid . "' ";
                $query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $pc_mon_obs . " CTI : " . $Fmon_ctrl_ti . "'  WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
                // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "monitor obs ", $pc_mon_obs . " -- > " . $Fmon_ctrl_ti, "  ", $Fusuario);
                    //registra_alt($Fconexao, $Fctrl_ti, $pc_id, "Equip", "monitor num ", $pc_mon_num . " -- > " . $pc_mon_novo_num, "  ", $Fusuario);
                    //registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

            }
        }
    }

  
} // fim do retorno tipo 0
else{  // **********************************************************   DIVISA  *****************************************************************************************************

include "conn2.php";

    function ret_userbycti($Fconexao, $Fref) // retorna nomess de utilizadores do pc
    {
        $query = "select tbequip_id ,ctrl_ti ,tbequip_util_nomes from tbequip  where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $dados = $linha['tbequip_util_nomes'];
            return $dados;

        } else
            return "0";
    }


    function add_acao($Fpar1, $Fcti, $Fusuario)
    {
        $data = date("d/m/Y H:i:s ");
        $ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
        $ipF = $_SERVER["REMOTE_ADDR"]; //Pego o IP
        $host = gethostbyaddr("$ip"); //pego o host
        $IPlocal = $ip . "/" . $ipF . "/" . $host;
        $nomeArquivo = "acoes.txt";
        $conteudo = $Fpar1 . "   CTI " . $Fcti . "  Data  " . $data . "  Usuario " . $Fusuario . "  Local  " . $IPlocal . PHP_EOL;
        file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
        $arquivo = fopen($_SERVER['DOCUMENT_ROOT'] . $nomeArquivo, 'w');
        if ($arquivo) {
            // Escreve no arquivo
            fwrite($arquivo, $conteudo);
            // fecha o arquivo
            fclose($arquivo);
        }
    }



    function arquivo_leitura($Fbase) {
    //abrimos o arquivo em leitura
    //$arquivo = "/var/www/pasta/arquivo.txt"; // EXEMPLO DE CAMINHO. USE O CAMINHO CORRETO
        $arquivo = $Fbase; //filename ;

        $fp = fopen($arquivo, "r");

            //lemos o arquivo
        $texto = fread($fp, filesize($arquivo));

            //transformamos as quebras de linha em etiquetas
        $texto = nl2br($texto);
        return $texto;

        //echo $texto;

     }

     function arquivo_grava($Fbase,$Fconteudo) 
     {
       $nomeArquivo = $Fbase;//"correcao.txt";
        $conteudo = $Fconteudo; // " Data : ". $agora. "  Usuario ".$usuario_ant."    Titulo : ".$titulo. "  Descricao :".$descricao. PHP_EOL;  
            file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
            $arquivo = fopen($_SERVER['DOCUMENT_ROOT']. $nomeArquivo, 'w');
                if($arquivo) 
                {
                // Escreve no arquivo
                    fwrite($arquivo,$conteudo);
                // fecha o arquivo
                    fclose($arquivo);
                }
     }



  function insere_acesso($conexao,$Fbase) {
                    // processo de identificacao da maquina pelo ip .
                    $ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
                    //echo "$ip"."<br>"; // imprimi o número IP
                    $ipF = $_SERVER["REMOTE_ADDR"]; //Pego o IP
                        //echo "$ip"."<br>"; // imprimi o número IP
                    $host = gethostbyaddr("$ip"); //pego o host
                    //echo "$host"."<br>"; 
                    $local = $ip."/".$ipF."/".$host;
                    $modulo = "SIAPI";
                    $status="1";
	                $hoje = date("d/m/Y H:i:s ");
	                $login_prog = $Fbase;
                  $query = "insert into tb_acessos (login,status,local,data,modulo)VALUES('".$login_prog."','".$status."','".$local."','".$hoje."','".$modulo."')";
				  //   $query = "insert into tb_acessos (login,local,data,modulo)VALUES('".$login_prog."','".$local."','".$hoje."','".$modulo."')";
                     $resultadoDaInsercao = mysqli_query($conexao, $query);
                     mysqli_close($conexao); 
                     return $resultadoDaInsercao;
                             // exit; 
       	  }

  
     function remover_acentos1($string) {

    if ( !preg_match('/[\x80-\xff]/', $string) )
        return $string;

    $chars = array(
    chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
    chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
    chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
    chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
    chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
    chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
    chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
    chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
    chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
    chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
    chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
    chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
    chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
    chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
    chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
    chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
    chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
    chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
    chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
    chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
    chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
    chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
    chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
    chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
    chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
    chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
    chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
    chr(195).chr(191) => 'y',
    // Decompositions for Latin Extended-A
    chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
    chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
    chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
    chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
    chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
    chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
    chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
    chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
    chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
    chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
    chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
    chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
    chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
    chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
    chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
    chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
    chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
    chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
    chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
    chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
    chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
    chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
    chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
    chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
    chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
    chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
    chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
    chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
    chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
    chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
    chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
    chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
    chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
    chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
    chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
    chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
    chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
    chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
    chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
    chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
    chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
    chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
    chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
    chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
    chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
    chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
    chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
    chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
    chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
    chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
    chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
    chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
    chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
    chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
    chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
    chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
    chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
    chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
    chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
    chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
    chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
    chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
    chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
    chr(197).chr(190) => 'z', chr(197).chr(191) => 's'
    );

    $string = strtr($string, $chars);
    return $string;
}




    function removeacentos ($trocaracentos)
{
       $ACENTOS   = array("À","Á","Â","Ã","à","á","â","ã");
       $SEMACENTOS= array("A","A","A","A","A","A","A","A");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
     
       $ACENTOS   = array("È","É","Ê","Ë","è","é","ê","ë");
       $SEMACENTOS= array("E","E","E","E","E","E","E","E");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
       
       $ACENTOS   = array("Ì","Í","Î","Ï","ì","í","î","ï");
       $SEMACENTOS= array("I","I","I","I","I","I","I","I");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
     
       $ACENTOS   = array("Ò","Ó","Ô","Ö","Õ","ò","ó","ô","ö","õ");
       $SEMACENTOS= array("O","O","O","O","O","O","O","O","O","O");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
     
       $ACENTOS   = array("Ù","Ú","Û","Ü","ú","ù","ü","û");
       $SEMACENTOS= array("U","U","U","U","U","U","U","U");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
       
       $ACENTOS   = array("Ç","ç","ª","º","°","'","&","@");
       $SEMACENTOS= array("C","C","A.","O.","O."," ","E","A");
       $trocaracentos=str_replace($ACENTOS,$SEMACENTOS, $trocaracentos);
       
       // Habilitar para deixar tudo maiúsculo
       //$MINUSCULAS = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","x","z","w","y");
       //$MAIUSCULAS = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","X","Z","W","Y");
       //$trocaracentos = str_replace($MINUSCULAS,$MAIUSCULAS, $trocaracentos);     

       return $trocaracentos;
}


    function removerAcentos($texto){
  return strtr($texto,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}
    
    function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

    function formaliza_10($Fbase)
    {
        $tamanho = strlen($Fbase);
        $limite = 12;
        $car_ini = "";
        $car_fim = "";
        if ($tamanho % 2 == 0) // num par
        {
            $resto = (($limite - $tamanho) / 2);
            $num_car_ini = $resto;
            $num_car_fim = $resto;
            for ($y = 0; $y < $num_car_ini; $y++) {
                $car_ini .= ".";
            }
            for ($y = 0; $y < $num_car_fim; $y++) {
                $car_fim .= ".";
            }
            return $car_ini . $Fbase . $car_fim;

        } else // impar
        {
            $resto = ((($limite + 1) - $tamanho) / 2);
            $num_car_ini = $resto;
            $num_car_fim = $resto;
            for ($y = 0; $y < $num_car_ini; $y++) {
                $car_ini .= ".";
            }
            for ($y = 0; $y < ($num_car_fim - 1); $y++) {
                $car_fim .= ".";
            }
            return $car_ini . $Fbase . $car_fim;




        }


    }


      function ret_uso_mon_cti_ctrl_ti($Fconexao, $Fref)  //  informa se o monitor esta sendo utilizado em equip
    {
      if (ret_ctrl_ti($Fconexao,$Fref)=="0")
        return "0";
      else
      {
       $caminho =  ret_caminho_ctrl_ti($Fconexao,$Fref); // M143
       $pre_rota = substr($caminho,0,1);
       $rota=substr($caminho,1);
       if($pre_rota=="M")
        {
            $query = "select * from tb_monitores where id ='" . $rota . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                $linha = mysqli_fetch_assoc($dados);
                $cti = $linha['id_equip'];
             return  ret_cti_tbequip($Fconexao, $cti); 
            }
             else
              return "0";
        }
        else {
	        return "0";
}      }

    }


    function mascara_cti($Fref)
    {// retorna os CTI padronizado com 4 casas 
        $qtd = strlen($Fref);
        switch ($qtd) {
            case '0': {
                return "";
            }
            case '1': {
                return "0000" . $Fref;
            }
            case '2': {
                return "000" . $Fref;
            }
            case '3': {
                return "00" . $Fref;
            }
            case '4': {
                return "0" .$Fref;
            }
            case '5': {
                return $Fref;
            }
        
        }

    }

    function DESvinculaMON_cti_mon2tbequip($Fconexao, $Fctrl_ti, $Fmon_ctrl_ti, $Fusuario)   // insere cti do monitor junto a monitor_obs em tbequip mediante cti em tbequip 
    {
        $query = "select tbequip_id, ctrl_ti,tbequip_monitor_obs,tbequip_monitor_num  from tbequip where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') {
            $msg = 0;
            return $msg;
        } else {
            if ($resultadoDaInsercao == '1') {
                $pc_id = $linha['tbequip_id'];
                $pc_mon_num = $linha['tbequip_monitor_num'];
                $pc_mon_obs = $linha['tbequip_monitor_obs'];
                // atualiza numeros de monitores
                if (($pc_mon_num == "") || ($pc_mon_num == "0"))
                    $pc_mon_novo_num = 1;
                
                    $pc_mon_novo_num = $pc_mon_novo_num - 1;
                // retira de obs o numero cti do monitor


                $string = $pc_mon_obs;   //"O João foi ao Hotel & Spa passar férias";
                $busca = $Fmon_ctrl_ti;
                $stringCorrigida = str_replace($busca, '- ', $string);  //('item_buscado', 'item_a_ser_inserido', $string);
                $pc_mon_obs_atualizado = $stringCorrigida;   //echo $stringCorrigida; // resultado: O João foi ao Hotel e Spa passar férias






                // fim 
                //$query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $Fmon_ctrl_ti . "' , `tbequi_obs`='" . $descricao . "'  WHERE `tbequip_id`='" . $Fid . "' ";
                $query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $pc_mon_obs_atualizado . "' , `tbequip_monitor_num`='" . $pc_mon_novo_num . "'  WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
                // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "monitor obs ", $pc_mon_obs . " -- > " . $pc_mon_obs, "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "monitor num ", $pc_mon_num . " -- > " . $pc_mon_novo_num, "  ", $Fusuario);
                    //registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

            }
        }
    }

    function zera_Monitor_bycti($Fconexao, $Fctrl_ti, $Fusuario)   // zera id_equip em monitor atraves do cti do monitor 
    {
        $query0 = "select * from tb_monitores where ctrl_ti ='" . $Fctrl_ti . "'";
          $dados0 = mysqli_query($Fconexao, $query0);
        $resultadoDaInsercao0 = mysqli_num_rows($dados0);
        $linha0 = mysqli_fetch_assoc($dados0);

        if ($resultadoDaInsercao0 == '0') {
            $msg = 0;
        } else {
            $pc_id = $linha0['id'];
            $pc_ant = $linha0['id_equip'];
            $loc_ant = $linha0['local_id'];
            $sec_ant = $linha0['sec_id'];
        }      // atualiza numeros de monitores

        registra_alt($Fconexao, $Fctrl_ti, $pc_id, "3", "id_equip ", $pc_ant . " -- > ". " 0 ", "  ", $Fusuario);
        registra_alt($Fconexao, $Fctrl_ti, $pc_id, "3", "local ", $local_ant . " -- > " . " 0 ", "  ", $Fusuario);
        registra_alt($Fconexao, $Fctrl_ti, $pc_id, "3", "sec ", $sec_ant . " -- > " . " 0 ", "  ", $Fusuario);
        $query = "UPDATE `tb_monitores` SET `id_equip`='0', `local_id`='0',`sec_id`='0'   WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
        // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
        $resultadoDaInsercao = mysqli_query($Fconexao, $query);
        //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
        if ($resultadoDaInsercao == 0)
            $msg = 0;
        else
            $msg = 1;
        return $msg;
    }


    function vinculaMON_cti_mon2tbequip($Fconexao, $Fctrl_ti, $Fmon_ctrl_ti, $Fvid, $Fusuario)   // insere cti do monitor junto a monitor_obs e tipo de saida de video junto a mon_vid_uso em tbequip mediante cti em tbequip 
    {
        $query = "select tbequip_id, ctrl_ti,tbequip_monitor_obs,tbequip_monitor_num,tbequip_vid_uso from tbequip where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') {
            $msg = 0;
            return $msg;
        } else {
            if ($resultadoDaInsercao == '1') {
                $pc_id = $linha['tbequip_id'];
                $pc_mon_num = $linha['tbequip_monitor_num'];
                $pc_mon_obs = $linha['tbequip_monitor_obs'];
                $pc_mon_vid = $linha['tbequip_vid_uso'];
                if (($pc_mon_num == "") || ($pc_mon_num == "0"))
                    $pc_mon_num = 0;

                $pc_mon_novo_num = $pc_mon_num + 1;
                //$query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $Fmon_ctrl_ti . "' , `tbequi_obs`='" . $descricao . "'  WHERE `tbequip_id`='" . $Fid . "' ";
                $pc_mon_vid2 = $pc_mon_vid . " " . $Fvid;
                $query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $pc_mon_obs . " CTI : " . $Fmon_ctrl_ti . "' , `tbequip_monitor_num`='" . $pc_mon_novo_num . "' , `tbequip_vid_uso`='" . $pc_mon_vid2 . "'  WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
                // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "monitor obs ", $pc_mon_obs . " -- > " . $Fmon_ctrl_ti, "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "monitor num ", $pc_mon_num . " -- > " . $pc_mon_novo_num, "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "video saida ", " 1 " . " -- > " . $Fvid, "  ", $Fusuario);
                    //registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

            }
        }
    }



    function vincula_cti_mon2tbequip($Fconexao, $Fctrl_ti, $Fmon_ctrl_ti, $Fusuario)   // insere cti do monitor junto a monitor_obs em tbequip
    {
        $query = "select tbequip_id, ctrl_ti,tbequip_monitor_obs,tbequip_monitor_num  from tbequip where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') {
            $msg = 0;
            return $msg;
        } else {
            if ($resultadoDaInsercao == '1') {
                $pc_id = $linha['tbequip_id'];
                // $pc_mon_num = $linha['tbequip_monitor_num'];
                $pc_mon_obs = $linha['tbequip_monitor_obs'];
                // if (($pc_mon_num == "") || ($pc_mon_num == "0"))
                //    $pc_mon_num = 0;
                //else
                //$pc_mon_novo_num = $pc_mon_num + 1;
                //$query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $Fmon_ctrl_ti . "' , `tbequi_obs`='" . $descricao . "'  WHERE `tbequip_id`='" . $Fid . "' ";
                $query = "UPDATE `tbequip` SET `tbequip_monitor_obs`='" . $pc_mon_obs . " CTI : " . $Fmon_ctrl_ti . "'  WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
                // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $pc_id, "1", "monitor obs ", $pc_mon_obs . " -- > " . $Fmon_ctrl_ti, "  ", $Fusuario);
                    //registra_alt($Fconexao, $Fctrl_ti, $pc_id, "Equip", "monitor num ", $pc_mon_num . " -- > " . $pc_mon_novo_num, "  ", $Fusuario);
                    //registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

            }
        }
    }

    function registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftabela, $Fcampo, $Fd_b, $Foutros, $Fusuario)
    {
        $hoje = date("d/m/Y H:i:s ");
        if (($Fctrl_ti == '') || ($Fid == '') || ($Fcampo == '')) {
            return "0";
        } else {
            $query = "INSERT INTO `tb_registra`(`ctrl_ti`, `tabela_id`, `tabela`, `tabela_cpo`, `tabela_dados`, `usuario`, `outros`, `data`) VALUES ('" . $Fctrl_ti . "','" . $Fid . "','" . $Ftabela . "','" . $Fcampo . "','" . $Fd_b . "','" . $Fusuario . "','" . $Foutros . "','" . $hoje . "')";
            //$query = "insert into tb_registra (login,local,data,modulo)VALUES('" . $login_prog . "','" . $local . "','" . $hoje . "','" . $modulo . "')";
            $resultadoDaInsercao = mysqli_query($Fconexao, $query);
            //  mysqli_close($Fconexao);
            return $resultadoDaInsercao;
        }// exit; 
    }



    function somente_numeros($str)
    {
        // echo somente_numerso('Olá 1456Mundo!');
        // vai retornar 1456 
        return preg_replace("/[^0-9]/", "", $str);
    }

    function remove_numeros($str)
    { //  Removendo símbolos e números
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^a-zA-Z\s]/", "", $str);
        return $nova_string;
        //return preg_replace("/[^0-9]/", "", $str);
    }

    function remove_simbolos($str)
    { //  Removendo símbolos 
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^a-zA-Z0-9\s]/", "", $str);
        return $nova_string;
        //$nova_string = preg_replace("/[^a-zA-Z0-9]/", "", $string);

    }

    function remove_letras_e_simbolos($str)
    { //  Removendo símbolos 
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^0-9\s]/", "", $str);
        return $nova_string;
        //return preg_replace("/[^0-9]/", "", $str);
    }

    function limpa_tracoj($valor)
    {
        $valor = trim($valor);
        $valor = str_replace(array('.', '-', '/', '|'), "", $valor);
        return $valor;
    }


    function deletar($pasta)
    {

        $iterator = new RecursiveDirectoryIterator($pasta, FilesystemIterator::SKIP_DOTS);
        $rec_iterator = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($rec_iterator as $file) {
            $file->isFile() ? unlink($file->getPathname()) : rmdir($file->getPathname());
        }

    }
    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }


    function ret_cti_tbequip($Fconexao, $Fref) // retorna o cti dentro da tabela tbequip 
    {
        $query = "select tbequip_id, ctrl_ti from tbequip  where tbequip_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $caminho = $linha['ctrl_ti'];
            return $caminho;
        } else
            return "0";
    }


      function ret_id_by_equip_id($Fconexao, $Fref) // retorna posicao id do monitor ,de acordo com o equip_id em Monitores  atraves do equip_id cadastrado  ;
      {
        $conn = $Fconexao;        
                    $sql3 = "SELECT * FROM tb_monitores where id_equip ='" . $Fref . "' ";
                    $resultado3 = mysqli_query($conn, $sql3) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                    $qtd3 = mysqli_num_rows($resultado3);  // $option = '';
                    $dados3 = mysqli_query($conn, $sql3);
                    if ($qtd3 == 0)
                        return 0;
                    else {
                        $linha3 = mysqli_fetch_assoc($dados3);
                        $ret_cti = $linha3['id'];
                        //$ret_local = $linha3['local_id'];
                        return  $ret_cti;
                    }
      }

      function ret_cti_by_equip_id($Fconexao, $Fref) // retorna cti do monitor ,de acordo com o equip_id em Monitores  atraves do equip_id   ;
      {
        $conn = $Fconexao;        
                    $sql3 = "SELECT * FROM tb_monitores where id_equip ='" . $Fref . "' ";
                    $resultado3 = mysqli_query($conn, $sql3) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                    $qtd3 = mysqli_num_rows($resultado3);  // $option = '';
                    $dados3 = mysqli_query($conn, $sql3);
                    if ($qtd3 == 0)
                        return 0;
                    else {
                        $linha3 = mysqli_fetch_assoc($dados3);
                        $ret_cti = $linha3['ctrl_ti'];
                        //$ret_local = $linha3['local_id'];
                        return  $ret_cti;
                    }
      }



    function ret_caminho_ctrl_ti($Fconexao, $Fref) // retorna o id ( caminho) cadastrado em controle_ti
    {
        $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
           $caminho = $linha['tab_cam'];
            return $caminho;
        } else
            return "0";
    }

       function ret_resumo_ctrl_ti($Fconexao, $Fref) // retorna infs  de controle_ti
    {
        $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $resumo= $linha['descricao']."  ".$linha['tab_cam']."  Tabela :".$linha['tab_origem']." Status  ".$linha['status'];
            //$nome = $linha['descricao'];
            return $resumo;
        } else
            return "Nao Descrito";
    }



    function ret_desc_ctrl_ti($Fconexao, $Fref) // informa a descricao  controle_ti
    {
        $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['descricao'];
            return $nome;
        } else
            return "Nao Descrito";
    }

    function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
    {
        if ($Fref <> "") {
            $query = "select * from tbequip where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                //$linha = mysqli_fetch_assoc($dados);
                //$nome = $linha['descricao_status'];
                return "1";
            } else
                return "0";
        } else
            return "0";
    }

    function ret_ctrl_ti_monitor($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab Monitores
    {
        if ($Fref <> "") {
            $query = "select * from tb_monitores where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                //$linha = mysqli_fetch_assoc($dados);
                //$nome = $linha['descricao_status'];
                return "1";
            } else
                return "0";
        } else
            return "0";
    }





    function ret_ctrl_ti($Fconexao, $Fref)  // informa se ja existe numeracao para controle_ti
    {
        $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            //$linha = mysqli_fetch_assoc($dados);
            //$nome = $linha['descricao_status'];
            return "1";
        } else
            return "0";
    }

    function add_TI($Fconexao, $Ftab, $Fdescricao, $Fcaminho, $Fid_equip, $Fctrl_ti, $Fhoje, $Fusuario) // inserte /  adiciona em controle TI 
    {      // tabela , tipo , id ,
        $status = "1";
        $sqlquery = "select * from tb_controle_ti where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($Fconexao, $sqlquery);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao <> '0') {
            return "Não foi possivel inserir o Codigo " . $Fctrl_ti . " pois o mesmo ja existe ";
        } else {
            switch ($Ftab) {
                case '1': {   // tbequip
                    // $caminho = "C" . $Fid_equip;
                    $query = "insert into tb_controle_ti (ctrl_ti,tab_origem,descricao,tab_chave,tab_cam,dt_cad,status,tecnico)VALUES('" . $Fctrl_ti . "','" . $Ftab . "','" . $Fdescricao . "','" . $Fid_equip . "','" . $Fcaminho . "','" . $Fhoje . "','" . $status . "','" . $Fusuario . "')";
                    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                    //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                    if ($resultadoDaInsercao == 0)
                        $msg = 0;
                    else
                        $msg = 1;
                    return $msg;
                    break;
                }
                case '2': {   //tb_diversos
                    //$caminho = "I" . $Fid_equip;
                    $query = "insert into tb_controle_ti (ctrl_ti,tab_origem,descricao,tab_chave,tab_cam,dt_cad,status,tecnico)VALUES('" . $Fctrl_ti . "','" . $Ftab . "','" . $Fdescricao . "','" . $Fid_equip . "','" . $Fcaminho . "','" . $Fhoje . "','" . $status . "','" . $Fusuario . "')";
                    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                    //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                    if ($resultadoDaInsercao == 0)
                        $msg = 0;
                    else
                        $msg = 1;
                    return $msg;


                }
                    break;
                case '3': {  // tb_monitores
                    //$caminho = "M" . $Fid_equip;
                    $query = "insert into tb_controle_ti (ctrl_ti,tab_origem,descricao,tab_chave,tab_cam,dt_cad,status,tecnico)VALUES('" . $Fctrl_ti . "','" . $Ftab . "','" . $Fdescricao . "','" . $Fid_equip . "','" . $Fcaminho . "','" . $Fhoje . "','" . $status . "','" . $Fusuario . "')";
                    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                    //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                    if ($resultadoDaInsercao == 0)
                        $msg = 0;
                    else
                        $msg = 1;
                    return $msg;
                }
                    break;


            }
        }
    }

    function ret_plaqueta_bycti($Fconexao,  $Fctrl_ti) // retorna patrimonio e local atraves do cti e   ;
    {
        $conn = $Fconexao;
        $query = "select id,ctrl_ti,tab_chave,tab_origem ,descricao from tb_controle_ti where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '0')
            return 0;
        else {
            $linha = mysqli_fetch_assoc($dados);
            $ret_chave = $linha['tab_chave'];
            $ret_tipo = $linha['tab_origem'];
            $ret_descricao = $linha['descricao'];
            if ($ret_tipo == "1") {
                $sql1 = "SELECT * FROM tbequip where tbequip_id ='" . $ret_chave . "' ";
                $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                $dados1 = mysqli_query($conn, $sql1);
                $qtd = mysqli_num_rows($resultado1);  // $option = '';
                if ($qtd == 0)
                    return 0;
                else {
                    $linha1 = mysqli_fetch_assoc($dados1);
                    $ret_plaqueta = $linha1['tbequip_plaqueta'];
                    $ret_local = $linha1['tbequi_tbcmei_id'];
                    return $ret_plaqueta . "     " . nomedolocal($conn, $ret_local);
                }
            } else {
                if ($ret_tipo == "2")  // diversos
                {
                    $sql2 = "SELECT * FROM tb_diversos where id ='" . $ret_chave . "' ";
                    $resultado2 = mysqli_query($conn, $sql2) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                    $qtd2 = mysqli_num_rows($resultado2);  // $option = '';
                    $dados2 = mysqli_query($conn, $sql2);
                    if ($qtd2 == 0)
                        return 0;
                    else {
                        $linha2 = mysqli_fetch_assoc($dados2);
                        $ret_plaqueta = $linha2['patrimonio'];
                        $ret_local = $linha2['local_cod'];
                        return $ret_plaqueta . "    " . nomedolocal($conn, $ret_local);
                    }
                } else // monitores
                {
                    $sql3 = "SELECT * FROM tb_monitores where id ='" . $ret_chave . "' ";
                    $resultado3 = mysqli_query($conn, $sql3) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                    $qtd3 = mysqli_num_rows($resultado3);  // $option = '';
                    $dados3 = mysqli_query($conn, $sql3);
                    if ($qtd3 == 0)
                        return 0;
                    else {
                        $linha3 = mysqli_fetch_assoc($dados3);
                        $ret_plaqueta = $linha3['mon_plaqueta'];
                        $ret_local = $linha3['local_id'];
                        return $ret_plaqueta . "    " . nomedolocal($conn, $ret_local);
                    }
                }


            }

        }


    }




    function resumo_TI($Fconexao, $Fctrl_ti) // ativa cti e ids de tabelas  status = 1 ;
    {
        $conn = $Fconexao;
        $query = "select id,ctrl_ti,tab_chave,tab_origem ,descricao from tb_controle_ti where ctrl_ti ='" . $Fctrl_ti . "'";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '0')
            return 0;
        else {
            $linha = mysqli_fetch_assoc($dados);
            $ret_chave = $linha['tab_chave'];
            $ret_tipo = $linha['tab_origem'];
            $ret_descricao = $linha['descricao'];
            if ($ret_tipo == "1") {
                $sql1 = "SELECT * FROM tbequip where tbequip_id ='" . $ret_chave . "' ";
                $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                $dados1 = mysqli_query($conn, $sql1);
                $qtd = mysqli_num_rows($resultado1);  // $option = '';
                if ($qtd == 0)
                    return 0;
                else {
                    $linha1 = mysqli_fetch_assoc($dados1);
                    $ret_plaqueta = $linha1['tbequip_plaqueta'];
                    $ret_local = $linha1['tbequi_tbcmei_id'];
                    return "  Patrimonio : " . $ret_plaqueta . "    Local : " . nomedolocal($conn, $ret_local);
                }
            } else {
                if ($ret_tipo == "2")  // diversos
                {
                    $sql2 = "SELECT * FROM tb_diversos where id ='" . $ret_chave . "' ";
                    $resultado2 = mysqli_query($conn, $sql2) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                    $qtd2 = mysqli_num_rows($resultado2);  // $option = '';
                    $dados2 = mysqli_query($conn, $sql2);
                    if ($qtd2 == 0)
                        return 0;
                    else {
                        $linha2 = mysqli_fetch_assoc($dados2);
                        $ret_plaqueta = $linha2['patrimonio'];
                        $ret_local = $linha2['local_cod'];
                        return "  Patrimonio : " . $ret_plaqueta . "     Local : " . nomedolocal($conn, $ret_local);
                    }
                } else // monitores
                {
                    $sql3 = "SELECT * FROM tb_monitores where id ='" . $ret_chave . "' ";
                    $resultado3 = mysqli_query($conn, $sql3) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                    $qtd3 = mysqli_num_rows($resultado3);  // $option = '';
                    $dados3 = mysqli_query($conn, $sql3);
                    if ($qtd3 == 0)
                        return 0;
                    else {
                        $linha3 = mysqli_fetch_assoc($dados3);
                        $ret_plaqueta = $linha3['mon_plaqueta'];
                        $ret_local = $linha3['local_id'];
                        return "   Patrimonio : " . $ret_plaqueta . "    Local : " . nomedolocal($conn, $ret_local);
                    }
                }


            }

        }


    } 
    
    function resumo_TI2($Fconexao, $Fctrl_ti) // ativa cti e ids de tabelas  status = 1 ;
     {
        $conn = $Fconexao;
         $query = "select id,ctrl_ti,tab_chave,tab_origem ,descricao from tb_controle_ti where ctrl_ti ='" . $Fctrl_ti . "'";
           $dados = mysqli_query($conn, $query);
           $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '0')
            return 0;
        else
        {
            $linha = mysqli_fetch_assoc($dados);
            $ret_chave = $linha['tab_chave'];
            $ret_tipo = $linha['tab_origem'];
            $ret_descricao = $linha['descricao'];
            if ($ret_tipo == "1") 
            {
                $sql1 = "SELECT * FROM tbequip where tbequip_id ='" . $ret_chave . "' ";
                $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                $dados1 = mysqli_query($conn, $sql1);
                $qtd = mysqli_num_rows($resultado1);  // $option = '';
               if ($qtd == 0) 
                 return 0;      
               else
               {
                    $linha1 = mysqli_fetch_assoc($dados1);
                   $ret_plaqueta = $linha1['tbequip_plaqueta'];
                   $ret_local = $linha1['tbequi_tbcmei_id'];
                   return "  Patrimonio :".$ret_plaqueta ."    Descricao : ".$ret_descricao."    Local : ".nomedolocal($conn,$ret_local);
               }
            }
            else{
                if ($ret_tipo == "2")  // diversos
                  {
                        $sql2 = "SELECT * FROM tb_diversos where id ='" . $ret_chave . "' ";
                        $resultado2 = mysqli_query($conn, $sql2) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                        $qtd2 = mysqli_num_rows($resultado2);  // $option = '';
                        $dados2 = mysqli_query($conn, $sql2);
                        if ($qtd2 == 0) 
                         return 0;      
                       else
                       {
                          $linha2 = mysqli_fetch_assoc($dados2);
                           $ret_plaqueta = $linha2['patrimonio'];
                           $ret_local = $linha2['local_cod'];
                           return "  Patrimonio :".$ret_plaqueta ."   Descricao : ".$ret_descricao."     Local : ".nomedolocal($conn,$ret_local);
                       }
                }
               else // monitores
                {
                        $sql3 = "SELECT * FROM tb_monitores where id ='" . $ret_chave . "' ";
                        $resultado3 = mysqli_query($conn, $sql3) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                        $qtd3 = mysqli_num_rows($resultado3);  // $option = '';
                        $dados3 = mysqli_query($conn, $sql3);
                        if ($qtd3 == 0) 
                         return 0;      
                       else
                       {
                           $linha3 = mysqli_fetch_assoc($dados3);
                            $ret_plaqueta = $linha3['mon_plaqueta'];
                           $ret_local = $linha3['local_id'];
                           return "   Patrimonio :".$ret_plaqueta ."    Descricao : ".$ret_descricao."    Local : ".nomedolocal($conn,$ret_local);
                       }
                }


            }
        
        }


     }

    function insere_icone($Fbase)
    {
        // tratamento do icone do dispositivo                                        
        $desc = strtoupper($Fbase);
        $ret_desc_cod = substr($desc, 0, 2);
        if ($ret_desc_cod == "DE")  // desktip
            $img_nome = "tp1.png";
        else
            if ($ret_desc_cod == "NO")  // note
                $img_nome = "tp5.png";
            else
                if ($ret_desc_cod == "TA")  // tablet
                    $img_nome = "tablet.png";
                else
                    if ($ret_desc_cod == "CE")  // celular
                        $img_nome = "celular.png";
                    else
                        if ($ret_desc_cod == "SW")  // switch
                            $img_nome = "d3.png";
                        else
                            if ($ret_desc_cod == "PA") // patch panel
                                $img_nome = "d1.png";
                            else
                                if ($ret_desc_cod == "RA") // rack
                                    $img_nome = "d2.png";
                                else
                                    if ($ret_desc_cod == "TV")  // tv
                                        $img_nome = "d4.png";
                                    else
                                        if ($ret_desc_cod == "AP")  // Acess point
                                            $img_nome = "d4.png";
                                        else
                                            if ($ret_desc_cod == "MO")  // modulo bateria
                                                $img_nome = "d4.png";
                                            else
                                                if ($ret_desc_cod == "CO")  // Controlador ap
                                                    $img_nome = "d4.png";
                                                else
                                                    $img_nome = "nenhum.png";
        return $img_nome;
    }


    function ativa_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // ativa cti e ids de tabelas  status = 1 ;
    {      // tabela , tipo , id ,
        $status = "1";
        $descricao = "Ativado na data " . $Fhoje . " por  " . $Fusuario . "  codigo:" . $Fctrl_ti . "-" . $Ftab . "-" . $Fid . "   <>  " . $Fjustificativa;
        switch ($Ftab) {
            case '1': {   // tbequip
                // $caminho = "C" . $Fid_equip;
                $query = "UPDATE `tbequip` SET `status`='" . $status . "' , `tbequi_obs`='" . $descricao . "'  WHERE `tbequip_id`='" . $Fid . "' ";
                // $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "0 --> 1", "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

                break;
            }
            case '2': {   //tb_diversos
                //$caminho = "M" . $Fid_equip;
                $query = "UPDATE `tb_diversos` SET `status`='" . $status . "' , `obs`='" . $descricao . "'  WHERE `id`='" . $Fid . "' ";
                //$query = "UPDATE `tb_monitores` SET `status` = `0` where `tb_monitores`.`id` ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "0 --> 1", "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;

                break;
            }
            case '3': {  // tb_monitores
                //$caminho = "M" . $Fid_equip;
                $query = "UPDATE `tb_monitores` SET `status`='" . $status . "' , `obs`='" . $descricao . "'  WHERE `id`='" . $Fid . "' ";
                //$query = "UPDATE `tb_monitores` SET `status` = `0` where `tb_monitores`.`id` ='" . $Fid . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "0 --> 1", "  ", $Fusuario);
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "obs ", $descricao, "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;
                break;
            }
            case '0': {  // tb_controle_ti
                //$caminho = "M" . $Fid_equip;
                $query = "UPDATE `tb_controle_ti` SET `status`='" . $status . "' , `obs`='" . $descricao . "'  WHERE `ctrl_ti`='" . $Fctrl_ti . "' ";
                // $query = "UPDATE `tb_controle_ti ` SET `status = 0 where ctrl_ti ='" . $Fctrl_ti . "'";
                $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                if ($resultadoDaInsercao == 0)
                    $msg = 0;
                else {
                    registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "0 --> 1", "  ", $Fusuario);
                    $msg = 1;
                }
                return $msg;
            }
                break;
        }
        // }
    }
    function checa_tipobyCTI($Fconexao, $Fref)  // retorna o tipo do dispositivo ,desktop ou notebook em funcao do codigo CTI  
    {
        $query = "select * from tbequip where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $tipo = strtoupper($linha['tbequi_tipo']);
            //$sec = $linha['tbcmei_sec_id'];
            return $tipo;
        } else
            return "0";
    }
    function retLOCAL_by_idequip($Fconexao, $Fref) // retorna o local em tbequip atraves do equip_id 
    {
        $query = "select tbequip_id ,ctrl_ti ,tbequi_tbcmei_id from tbequip  where tbequip_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $id_cmei = $linha['tbequi_tbcmei_id'];
            return nomedolocal($Fconexao, $id_cmei);

        } else
            return "0";
    }

    function retresp_by_idequip($Fconexao, $Fref) // retorna o local em tbequip atraves do equip_id 
    {
        $query = "select tbequip_id ,ctrl_ti ,tbequi_tecnico,tbequi_ref ,tb_equip_resp from tbequip  where tbequip_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $dados = $linha['tbequip_resp'];
            if ($dados == "")
                return "vazio";
            else
                return $dados;

        } else
            return "0";
    }

    function mostra_inicio($Fconexao, $Fref) // retorna o  nome do tecnico e a data de cadastro
    {
        $query = "select tbequip_id,tbequi_tecnico,tbequi_datalanc from tbequip where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $retorno1 = $linha['tbequi_tecnico'];
            $retorno2 = $linha['tbequi_datalanc'];
            $retorno = "Cadastrado por  " . $retorno1 . "  em   " . $retorno2;
            return $retorno;
        } else
            return "sem referencia";


    }


    function remove_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // remover equip em status = 0 ;
    {      // tabela , tipo , id ,
        $status = "0";
         switch ($Ftab)
         {
                case '1': {   // tbequip
                    // $caminho = "C" . $Fid_equip;
                    $query = "UPDATE `tbequip` SET `status = 0 where tbequip_id ='" . $Fid . "'";
                    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                    //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                    if ($resultadoDaInsercao == 0)
                        $msg = 0;
                    else
                     {
                        registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "1 --> 0", "  ", $Fusuario);
                        $msg = 1;
                     }
                        return $msg;
                    
                    break;
                }
                case '2': {   //tb_diversos
                    //$caminho = "I" . $Fid_equip;
                  $query = "UPDATE `tb_diversos` SET `status = 0 where id ='" . $Fid . "'";
                    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                    //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                    if ($resultadoDaInsercao == 0)
                        $msg = 0;
                    else
                     {
                         registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "1 --> 0", "  ", $Fusuario);
                        $msg = 1;
                     }
                        return $msg;
                 }
                    break;
                case '3': {  // tb_monitores
                    //$caminho = "M" . $Fid_equip;
                    $query = "UPDATE `tb_monitores` SET `status = 0 where id ='" . $Fid . "'";
                    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                    //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                    if ($resultadoDaInsercao == 0)
                        $msg = 0;
                    else
                    {
                        registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "1 --> 0", "  ", $Fusuario);
                        $msg = 1;
                    }
                    return $msg;
                }
                    break;
                 case '0': {  // tb_controle_ti
                    //$caminho = "M" . $Fid_equip;
                    $query = "UPDATE `tb_controle_ti ` SET `status = 0 where ctrl_ti ='" . $Fctrl_ti . "'";
                    $resultadoDaInsercao = mysqli_query($Fconexao, $query);
                    //$retorno_cad = mysqli_num_rows($resultadoDaInsercao);
                    if ($resultadoDaInsercao == 0)
                        $msg = 0;
                    else
                    {
                      registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftab, "status", "1 --> 0", "  ", $Fusuario);
                        $msg = 1;
                    }
                        return $msg;
                }
                    break;
            }
       // }
    }


  



    function mostra_local($Fconexao, $Fref) // retorna o local_id dentro de tbequip
    {
        $query = "select tbequip_id,tbequi_tbcmei_id from tbequip where tbequip_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $retorno = $linha['tbequi_tbcmei_id'];
            return $retorno;
        } else
            return "sem referencia";


    }

    function tipo_DispByCTI($Fconexao, $Fref) // retorna o tipo de dispositivo by CTI
    {
        if ($Fref <> "") {
            $conn = $Fconexao;
            $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($conn, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                $linha = mysqli_fetch_assoc($dados);
                $tipo = $linha['descricao'];
                return $tipo;
            } else
                return "00";
        } else
            return "00";


    }

    function ret_dtCad_byctrl_ti($Fconexao, $Fref) // informa a data de lanc do equip by  controle_ti
    {
        $query = "select * from tbequip where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $dados = $linha['tbequi_datalanc'];
            return $dados;
        } else
            return "Nao especificado";
    }

    function nomedolocal($Fconexao, $Fref)
    {
        $query = "select * from tbcmei where tbcmei_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['tbcmei_nome'];
            return $nome;
        } else
            return "sem referencia";
    }

    function nomedesecretaria($Fconexao, $Fref)
    {
        $query = "select * from tbsecretaria where sec_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['sec_nome'];
            return $nome;
        } else
            return "sem referencia";
    }


    function cod_sec($Fconexao, $Fref)
    {
        $query = "select * from tbcmei where tbcmei_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $nome = $linha['tbcmei_nome'];
            $sec = $linha['tbcmei_sec_id'];
            return $sec;
        } else
            return "vazio";
    }

    function retAUTOR_by_idequip($Fconexao, $Fref) // retorna o local em tbequip atraves do equip_id 
    {
        $query = "select tbequip_id ,ctrl_ti ,tbequi_tecnico,tbequi_ref from tbequip  where tbequip_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $dados = $linha['tbequi_tecnico'] . "  " . $linha['tbequi_ref'];
            return $dados;

        } else
            return "0";
    }

    function mostra_monitores($Fconexao, $Fref)
    {
        $query = "select * from tb_monitores where id_equip ='" . $Fref . "'and status=1";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') {
            $devolucao = "Nenhum Monitor cadastado ";
        } else {
            if ($resultadoDaInsercao == '1') {
                $marca = $linha['mon_marca'];
                $tam = $linha['mon_tam'];
                $plaq = $linha['mon_plaqueta'];
                $devolucao = $marca . " " . $tam . " " . $plaq;
            } else { // varios registros
                do {
                    $marca = $linha['mon_marca'];
                    $tam = $linha['mon_tam'];
                    $plaq = $linha['mon_plaqueta'];
                    $devolucao .= $marca . " " . $tam . " " . $plaq;

                } while ($linha = mysqli_fetch_assoc($dados));
            }
        }

        return $devolucao;
    }

    function busca_ult_CTI($Fconexao)  // retorna o ultimo cti da base
    {

        $queryb = "Select Max(ctrl_ti) as ctrl_ti,id from tb_controle_ti";
        $dadosb = mysqli_query($conn, $queryb);
        $resultado = mysqli_num_rows($dadosb);
        $totalb = mysqli_num_rows($dadosb);
        $linhab = mysqli_fetch_assoc($dadosb);
        if ($resultado == '1') {
            $ret_ctrl_ti = $linhab['ctrl_ti'];
            return $ret_ctrl_ti;
        } else
            return "0";
    }


    function printa_tela($Fref)
    {

        $im = imagegrabscreen();
        imagepng($im, "img_" . $Fref . ".png");
        imagedestroy($im);

    }


    function cod_cripta($Fnome, $Fkey)
    {
        $plaintext = $Fnome;//"message to be encrypted";
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $Fkey, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $Fkey, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
        //echo $ciphertext ; 
        return $ciphertext;
    }

    function ret_ctrl_ti_ref($Fconexao, $Fref) // informa o cti e situaçao em controle_ti
    {
        if ($Fref <> "") {
            $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                return " CTI : " . $Fref . "  ja Cadastrado ";
            } else
                return " CTI : " . $Fref . "  Não Cadastrado ";
        } else
            return "";
    }


    function cod_descripta($Fnome, $Fkey)
    {
        $c = base64_decode($Fnome);
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $Fkey, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $Fkey, $as_binary = true);
        if (hash_equals($hmac, $calcmac))// timing attack safe comparison
        {
            return $original_plaintext . "\n";
        }
        return "Erro de Descodificacao";
    }

    function conta_equip_by_cmei_id($Fcod, $Fconexao) // retorna numeros de pcs do local cod_cmei
    {
        $query = "select tbequip_id, ctrl_ti from tbequip where tbequi_tbcmei_id ='" . $Fcod . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        $devolucao = " ";

        if ($resultadoDaInsercao == '0') {
            $msg = 0;
            return $msg;
        } else {
            return $resultadoDaInsercao;
        }

    }

    function retRESP_by_cmeiID($Fconexao, $Fref) // retorna o Responsavel do local em tbcmei  atraves do id do local 
    {
        $query = "select * from tbcmei where tbcmei_id ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $dados = $linha['tbcmei_coord'];
            if ($dados == "")
                return "vazio";
            else
                return $dados;

        } else
            return "0" . $Fref;
    }

    function mostra_local_monby_cti($Fconexao, $Fref) // retorna o  codigo local atraves do cti do dispositivo 
    {
        $query = "select *  from tbmonitores where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $retorno = $linha['local_id'];
            return $retorno;
        } else
            return "0";
    }

    function ret_pos_tbequip_by_CTI($Fconexao, $Fref) // informa posicao de CTI em tbequip ( cti e equip_id) 
    {
        if ($Fref <> "") {
            $query = "select * from tbequip where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                //$linha = mysqli_fetch_assoc($dados);
                //$nome = $linha['descricao_status'];
                //return "  ".mascara_cti($Fref) . "  Encontrado ";
                return "1";
            } else
                return "0";
        } else
            return "0";
    }

    function ret_pos_div_by_CTI($Fconexao, $Fref) // informa posicao de CTI em tbdiversos ( cti e id) 
    {
        if ($Fref <> "") {
            $query = "select * from tb_diversos where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                //$linha = mysqli_fetch_assoc($dados);
                //$nome = $linha['descricao_status'];
                return "1";// $Fref. "   Encontrado";
            } else
                return "0";//$Fref . "   NAO  Encontrado";
        } else
            return "0";
    }

    function ret_pos_mon_by_CTI($Fconexao, $Fref) // informa posicao de CTI em tbmonitores ( cti e id) 
    {
        if ($Fref <> "") {
            $query = "select * from tb_monitores where ctrl_ti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                //$linha = mysqli_fetch_assoc($dados);
                //$nome = $linha['descricao_status'];
                return "1";// $Fref. "   Encontrado";
            } else
                return "0";//$Fref . "   NAO  Encontrado";
        } else
            return "0";
    }


    
    function insere_vinculo($Fconexao, $Fcti, $Floc, $Fsec, $Fusuario, $Fdisp)
    {
        // armazena dados caso retorne erro
        $agora = date("Ymd");
        $nomeArquivo = "vinculo.txt"; // seta o arquivo TXT
        $campos = " - CTI " . $Fcti . " - Disp " . $Fdisp . " - Loc. " . $Floc . " -Sec. " . $Fsec;
        $conteudo = "Usuario " . $Fusuario . " Data : " . $agora . "  " . $campos . PHP_EOL;

        //$msg = 'teste' . PHP_EOL;
        //file_put_contents('lista.txt', $msg, FILE_APPEND);
        file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
        $arquivo = fopen($_SERVER['DOCUMENT_ROOT'] . $nomeArquivo, 'w');
        if ($arquivo) {
            // Escreve no arquivo
            fwrite($arquivo, $conteudo);
            // fecha o arquivo
            fclose($arquivo);
        }

        // fim do armazena dados



    }

    function mostra_local_divby_cti($Fconexao, $Fref) // retorna o  codigo local atraves do cti do dispositivo 
    {
        $query = "select *  from tbdiversos where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            $linha = mysqli_fetch_assoc($dados);
            $retorno = $linha['local_cod'];
            return $retorno;
        } else
            return "0";
    }

    function ret_sac_by_cod($Fconexao, $Fref) // retorna a existencia de avaliacao  atraves do cod do chamado tecnico    ;
    {
        $query = "select * from tb_sac  where cham_cod ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            //$linha = mysqli_fetch_assoc($dados);
            //$caminho = $linha['ctrl_ti'];
            return "1";
        } else
            return "0";
    }

    function ret_cti_reservado($Fconexao, $Fref) // informa se ja existe reserva para essa numeracao cti
    {
        if ($Fref <> "") {
            $query = "select * from tb_reserva_cti where cti ='" . $Fref . "'";
            $dados = mysqli_query($Fconexao, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            if ($resultadoDaInsercao == '1') {
                return "1";
            } else
                return "0";
        } else
            return "0";
    }
    
    





}

?>