
<?php
//$ref_ini = $_POST['num_ini'];
//$ref_fim = $_POST['num_fim'];


?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8" />
    <?php    
    header('Content-Type: text/html; charset=iso-8859-1');
    ?>
    <title></title>
</head>
<style>
 body {
         font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
         margin: 20px;
      }
      span {
         font-size: 18px;
         font-weight: 600;
         color: white;
         padding: 8px;
      }
      .success {
         background-color: #4caf50;
      }
      .info {
         background-color: #2196f3;
      }
      .warning {
         background-color: #ff9800;
      }
      .danger {
         background-color: #f44336;
      }
      .other {
         background-color: #e7e7e7;
         color: black;
      }
      </style>


<body>

<?php
//$ref_ini = $_POST['inicio'];
//$ref_fim = $_POST['fim'];


//$id_loc = $_POST['loc_id'];
//include "../validar_session.php";
//include "../Config/config_sistema.php";
//include ("bco_fun.php");
//include ("conn2.php");

//$conn = mysqli_connect($servidor, $usuario, $senha, $bancodedados);



if(array_key_exists('button1', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }



function button1e()
{
    include ("conn2.php");    // rotina utilizada para deixar somente numeros no campo plaqueta da BASE 
    include ("bco_fun.php");    // rotina utilizada para deixar somente numeros no campo plaqueta da BASE 


     for ($i = 1; $i < 750; $i++) {
        //  for ($i=$ref_ini; $i < $ref_fim; $i++) {
        // $parametroSQL =  "SELECT * FROM tb_vistproprietario where p_id = '".$i."'";//  and status LIKE '%".$recebeStatus."%'
        $parametroSQL = "SELECT * FROM tbequip where ctrl_ti = '" . $i . "'";//  and status LIKE '%".$recebeStatus."%'
        $sql = $parametroSQL;
        $result = mysqli_query($conn, $sql);
        $retorno_check = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if ($retorno_check == 1)
        {
            //echo " Controle CTI : " . $i . " Encontrado em Equip";    

        } else
        {
            $parametroSQL1 = "SELECT * FROM tb_controle_ti where ctrl_ti = '" . $i . "'";//  and status LIKE '%".$recebeStatus."%'
            $sql1 = $parametroSQL1;
            $result1 = mysqli_query($conn, $sql1);
            $retorno_check1 = mysqli_num_rows($result1);
            $row = mysqli_fetch_assoc($result1);
            if ($retorno_check == 0)
               echo " Controle CTI : " . $i . " nao Encontrado   <br>";
        }
    }

}


function button1()
{
    include ("conn2.php");    // rotina utilizada para excluir espaço inicial dentro do nome do local na tabela cmei 

    
        $parametroSQL = "SELECT * FROM tb_controle_ti  order by ctrl_ti ";//  and status LIKE '%".$recebeStatus."%'
        $sql = $parametroSQL;
        $result = mysqli_query($conn, $sql);
        $retorno_check = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
            do{
        //            $row = mysqli_fetch_assoc($result);    
                    $ret_ctrl_ti = $row['ctrl_ti'];
                     $parametroSQL = "SELECT * FROM tbequip where ctrl_ti = '" . $ret_ctrl_ti . "'";//  and status LIKE '%".$recebeStatus."%'
                     $sql2 = $parametroSQL;
                     $result2 = mysqli_query($conn, $sql2);
                    $retorno_check2 = mysqli_num_rows($result2);
                    $row2 = mysqli_fetch_assoc($result2);
                if ($retorno_check2 == 1) {
                    // echo " Controle CTI : " . $ret_ctrl_ti . " Encontrado em Equip <br>";    
                 } else
                   { // busca em Diversos
                      $parametroSQL = "SELECT * FROM tb_diversos  where ctrl_ti = '" . $ret_ctrl_ti . "'";//  and status LIKE '%".$recebeStatus."%'
                      $sql3 = $parametroSQL;
                      $result3 = mysqli_query($conn, $sql3);
                      $retorno_check3 = mysqli_num_rows($result3);
                      $row3 = mysqli_fetch_assoc($result3);
                      if ($retorno_check2 == 1) {
                        // echo " Controle CTI : " . $ret_ctrl_ti . " Encontrado em Equip <br>";    
                      } else
                        {
                         $parametroSQL = "SELECT * FROM tb_monitores where ctrl_ti = '" . $ret_ctrl_ti . "'";//  and status LIKE '%".$recebeStatus."%'
                         $sql4 = $parametroSQL;
                         $result4 = mysqli_query($conn, $sql4);
                         $retorno_check4 = mysqli_num_rows($result4);
                         $row4 = mysqli_fetch_assoc($result4);
                         if ($retorno_check4 == 1) {
                            // echo " Controle CTI : " . $ret_ctrl_ti . " Encontrado em Equip <br>";    
                          } else 
                            {
                              echo "---------------------------- CTI : " . $ret_ctrl_ti . " nao Encontrado <br>";
                            }
            
                       }
                 }
             } while ($row = mysqli_fetch_assoc($result));
    
}






function button1d()
{
    include ("conn2.php");    // rotina utilizada para excluir espaço inicial dentro do nome do local na tabela cmei 

    for ($i = 1; $i < 2315; $i++) {
        //  for ($i=$ref_ini; $i < $ref_fim; $i++) {
        // $parametroSQL =  "SELECT * FROM tb_vistproprietario where p_id = '".$i."'";//  and status LIKE '%".$recebeStatus."%'
        $parametroSQL = "SELECT * FROM tbcmei where tbcmei_id = '" . $i . "'";//  and status LIKE '%".$recebeStatus."%'
        $sql = $parametroSQL;
        $result = mysqli_query($conn, $sql);
        $retorno_check = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if ($retorno_check == 1) {
            do {
                $padrao = "0";
                $nome_base = $row['tbcmei_nome']; // armazena o tipo de escolar
                $carac_1= substr($nome_base, 0, 1);
                                
                if($carac_1==""){
                    echo "nome do local inicial com espaço " . $nome_base . "  Id = " . $i . "<br>";
               }
                else
               {
                    //$ref = somente_numeros($ret_plaq);    
                    //$query = "UPDATE `tbequip` SET `status` = '" . $padrao . "' WHERE `tbequip`.`tbequip_id` =" . $i . "";
                    //$resultadoDaInsercao = mysqli_query($conn, $query);
                    //if ($resultadoDaInsercao == 0)
                      //  echo "NAO Alterarado id " . $i . "  " . $padrao . "   <br>";
                    //else{
                      //  echo "Aterado   id " . $i . " PLAQUETA   " . $ret_plaq."<br>";  // . "    " . nomedolocal($conn, $ret_equip_local) . "    Secretaria  " . $ref . "  <br>";    
                   // }
                    echo "local correto  " . $nome_base . "  Id = " . $i . "<br>";
               
               }
               
            } while ($row = mysqli_fetch_assoc($result));

        } else {
            echo "Retorno " . $retorno_check . " no ID " . $i . " <br>";
        }
    }

}

function button1a()
{
    include ("conn2.php");    // rotina utilizada para deixar somente numeros no campo plaqueta da BASE 

    for ($i = 1; $i < 2315; $i++) {
        //  for ($i=$ref_ini; $i < $ref_fim; $i++) {
        // $parametroSQL =  "SELECT * FROM tb_vistproprietario where p_id = '".$i."'";//  and status LIKE '%".$recebeStatus."%'
        $parametroSQL = "SELECT * FROM tbequip where tbequip_id = '" . $i . "'";//  and status LIKE '%".$recebeStatus."%'
        $sql = $parametroSQL;
        $result = mysqli_query($conn, $sql);
        $retorno_check = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if ($retorno_check == 1) {
            do {
                $padrao = "0";
                $ret_plaq = $row['tbequip_plaqueta']; // armazena o tipo de escolar
                if ($ret_plaq == "PENDENTE") {

                } else {
                    $ref = somente_numeros($ret_plaq);
                    $query = "UPDATE `tbequip` SET `status` = '" . $padrao . "' WHERE `tbequip`.`tbequip_id` =" . $i . "";
                    $resultadoDaInsercao = mysqli_query($conn, $query);
                    if ($resultadoDaInsercao == 0)
                        echo "NAO Alterarado id " . $i . "  " . $padrao . "   <br>";
                    else {
                        echo "Aterado   id " . $i . " PLAQUETA   " . $ret_plaq . "<br>";  // . "    " . nomedolocal($conn, $ret_equip_local) . "    Secretaria  " . $ref . "  <br>";    
                    }


                }

            } while ($row = mysqli_fetch_assoc($result));

        } else {
            echo "Retorno " . $retorno_check . " no ID " . $i . " <br>";
        }
    }

}




function button1b()
{
    include ("conn2.php");    // rotina utilizada para identificar equips da BASE ATRAVES DE  UMA LISTA TXT COM PATRIMONIO.       
    // Open your file in read mode
    $input = fopen("arquivo_origem.txt", "r");

    // Display a line of the file until the end 
    while (!feof($input)) 
    {
         // Display each line
        // echo substr(fgets($input),1,6)."<br>";
         $linha = fgets($input);
        $padrao = substr(fgets($input), 1, 6) ;

        if (($padrao == "PENDEN") or ($padrao == "") or ($padrao == "0")) 
        {

        } else
        {
            $parametroSQL = "SELECT * FROM tbequip where tbequip_plaqueta = '" . $padrao . "'";//  and status LIKE '%".$recebeStatus."%'
            $sql = $parametroSQL;
            $result = mysqli_query($conn, $sql);
            $retorno_check = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            if ($retorno_check == 1) {
                //echo "Plaqueta informada : " . $padrao . "  Plaqueta encontrada : " . $row['tbequip_plaqueta'] . "  local  " . $row['tbequi_tbcmei_id'] . "  Id :" . $row['tbequip_id'] . "<br>";
            } else {
                echo $linha . "<br>";
                //echo "Plaqueta informada : " . $padrao . "  nao encontrada <br>";

            }

        }
    
    
    }
    
    
    
    
    /*
       
    
    
    for ($i = 1; $i < 2315; $i++) {
        //  for ($i=$ref_ini; $i < $ref_fim; $i++) {
        // $parametroSQL =  "SELECT * FROM tb_vistproprietario where p_id = '".$i."'";//  and status LIKE '%".$recebeStatus."%'
        $parametroSQL = "SELECT * FROM tbequip where tbequip_id = '" . $i . "'";//  and status LIKE '%".$recebeStatus."%'
        $sql = $parametroSQL;
        $result = mysqli_query($conn, $sql);
        $retorno_check = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if ($retorno_check == 1) {
            do {
                $padrao = "0";
                $ret_equip_local = $row['tbequi_tbcmei_id']; // armazena o tipo de escolar
                $ref = cod_sec($conn, $ret_equip_local);
                if (($ref == "38") or ($ref == "36")) {
                    echo "LOCALIZADO  id " . $i . " local  " . $ret_equip_local . "    " . nomedolocal($conn, $ret_equip_local) . "    Secretaria  " . $ref . "  <br>";
                    $query = "UPDATE `tbequip` SET `status` = '" . $padrao . "' WHERE `tbequip`.`tbequip_id` =" . $i . "";
                    $resultadoDaInsercao = mysqli_query($conn, $query);
                    if ($resultadoDaInsercao == 0)
                        echo "NAO Alterarado id " . $i . "  " . $padrao . "   <br>";
                    else
                        echo "delete from `tbequip` where `tbequip_id`=" . $i . ";<br>";
                    // echo "Aterado   id " . $i . " local  " . $ret_equip_local . "    " . nomedolocal($conn, $ret_equip_local) . "    Secretaria  " . $ref . "  <br>";
                    //echo "Alterarado id ".$i."  ".$padrao."   <br>";
                } else {
                    //  echo "id  ".$i."  Outro Local   ".$ref."    <br>";
                }


            } while ($row = mysqli_fetch_assoc($result));

        } else {
            echo "Retorno " . $retorno_check . " no ID " . $i . " <br>";
        }
    }
    // mysqli_close($conn);
/*/
}



function button1c() {
         include ("conn2.php");    // rotina utilizada para identificar equips da saude e do obras para excluilos da importacao.       
         for ($i=1; $i < 2315; $i++) {   
       //  for ($i=$ref_ini; $i < $ref_fim; $i++) {
            // $parametroSQL =  "SELECT * FROM tb_vistproprietario where p_id = '".$i."'";//  and status LIKE '%".$recebeStatus."%'
             $parametroSQL =  "SELECT * FROM tbequip where tbequip_id = '".$i."'";//  and status LIKE '%".$recebeStatus."%'
            $sql = $parametroSQL;
              $result = mysqli_query($conn,$sql);
              $retorno_check = mysqli_num_rows($result);
              $row = mysqli_fetch_assoc($result);
                    if($retorno_check == 1)
             {
                                 do {
                                   $padrao = "0";
                                   $ret_equip_local = $row['tbequi_tbcmei_id']; // armazena o tipo de escolar
                                   $ref = cod_sec($conn,$ret_equip_local);
                                   if (($ref=="38")or($ref=="36")){
                                         echo "LOCALIZADO  id ".$i." local  ".$ret_equip_local."    ".nomedolocal($conn, $ret_equip_local).   "    Secretaria  ".$ref."  <br>";   
                                          $query = "UPDATE `tbequip` SET `status` = '".$padrao."' WHERE `tbequip`.`tbequip_id` =".$i.""; 
                                            $resultadoDaInsercao = mysqli_query($conn, $query);
                                           if ($resultadoDaInsercao==0 )
                                               echo "NAO Alterarado id ".$i."  ".$padrao."   <br>";
                                          else
                                               echo "delete from `tbequip` where `tbequip_id`=" . $i .";<br>";
                                              // echo "Aterado   id " . $i . " local  " . $ret_equip_local . "    " . nomedolocal($conn, $ret_equip_local) . "    Secretaria  " . $ref . "  <br>";
                                                //echo "Alterarado id ".$i."  ".$padrao."   <br>";
                                   }
                                     else {
	                                  //  echo "id  ".$i."  Outro Local   ".$ref."    <br>";
                                         }


                            }while($row = mysqli_fetch_assoc($result));
                     
            }
             else
            {
                    echo "Retorno ".$retorno_check. " no ID ".$i." <br>";
             }
           }   
          // mysqli_close($conn);
        }
      
        function button2a() {  // rotina utilizada para identificar plaquetas duplicadas
          include("conn2.php");
            for ($i=1; $i < 2315; $i++) {
           // for ($i=$ref_ini; $i < $ref_fim; $i++) {
                $parametroSQL =  "SELECT * FROM tbequip where tbequip_id = '".$i."'";//  and status LIKE '%".$recebeStatus."%'
             
                    $sql = $parametroSQL;
                    $result = mysqli_query($conn, $sql);
                    $retorno_check = mysqli_num_rows($result);
                    $row = mysqli_fetch_assoc($result);
             
                    if($retorno_check == 1)
             {
             //                    do {
                                   $plaqueta = $row['tbequip_plaqueta']; // armazena o nome da atividade
                                  // $padrao = "MICRO-ÔNIBUS";
                                   //$tipo = $row['VEICULO']; // armazena o tipo de escolar
                                   //$ref = substr($tipo,0,5);
                                  // busca na base por referencias iguais
                                    $SQLbusca = "SELECT * FROM tbequip where tbequip_plaqueta LIKE '%" . $plaqueta . "%' and STATUS=1" ;//  and status LIKE '%".$recebeStatus."%'
                                    $sql2 = $SQLbusca;
                                    $result2 = mysqli_query($conn, $sql2);
                                    $retorno_check2 = mysqli_num_rows($result2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    if (($retorno_check2 == "0") or ($retorno_check2 == "1")or ($retorno_check2 == "2")) {
                                        //echo "LOCALIZADO  " . $retorno_check2 . " com o Patrimonio " . $plaqueta . "<br> ";
                                    } else {
                                        echo "Registro nº " . $i ."    Patrimonio " . $plaqueta . " LOCALIZADO  " . $retorno_check2 . " Registros   <a href=ver_patrimonio.php?plaq=". $plaqueta ."> Visualizar</a>         <br> ";
                                        

                                    }

                                    //    if (($ref=="MICRO")OR($ref=="MICRO-")){
                                     //    echo "LOCALIZADO EM  id ".$i." "  .$tipo." ";   
                                      //    $query = "UPDATE `dadoste` SET `VEICULO` = '".$padrao."' WHERE `dadoste`.`D_ID` =".$i.""; 
                                       //     $resultadoDaInsercao = mysqli_query($conn, $query);
                                       //     if ($resultadoDaInsercao==0 )
                                        //      echo "nao Alterarado";
                                        //    else     
                                        //       echo "Alterarado id ".$i."<br>";
                                  // }
                                    // else {
	                                  //  echo "id ".$i." Veiculo Nao compativel  ".$tipo."  Referencia  ".$ref."   <br>";
                                        // }

                                     //$nomeM =  strtoupper($nome);   
                                 
                                // }while($row = mysqli_fetch_assoc($result2));
                       //$query = "UPDATE `tbatividades` SET `titulo` = '".$nomeM."' WHERE `tbatividades`.`id` =".$i."";
                                    }
             else
            {
                      echo "Retorno ".$retorno_check. " no ID ".$i." <br>";
             }
           }   
       // mysqli_close($conn);
        }
    ?>
 <form method="post">
 <?php
 
?>
 <input type="submit" name="button1"
                class="button" value=" compara" />
          
        <input type="submit" name="button2"
                class="button" value="checa duplicidade" />

 <h1>Labels Example</h1>
   <span class="success">Success</span>
   <span class="info">Info</span>
   <span class="warning">Warning</span>
   <span class="danger">Danger</span>
   <span class="other">Other</span>
<a href="teste3.php" title="SELECIONAR ">TEste </a>  <br /><br /> 
     <a href="index.php" title="SELECIONAR ">Inicio </a>  <br /><br /> 
</form>
</body>
</html>