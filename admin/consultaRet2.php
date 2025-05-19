<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro Diversos Tecnologia da Informação SMTI </title>
</head>
<style>
 </style>

<body>
<?php
include "conn.php";
include "cabecalho.php";
if (isset($_GET["RadioOption"])) {
   $tipo  = $_GET ["RadioOption"];
  }else {
$tipo  = "Vazio";
}


if (isset($_GET["parametro"])) {
   $rec  = $_GET ["parametro"];
  }else {
$rec  = "Vazio";
}



$agora = date('d/m/Y H:i');
// processo de identificacao da maquina pelo ip .
 $ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
//echo "$ip"."<br>"; // imprimi o número IP
$ipF = $_SERVER["REMOTE_ADDR"]; //Pego o IP
//echo "$ip"."<br>"; // imprimi o número IP
$host = gethostbyaddr("$ip"); //pego o host
//echo "$host"."<br>";
//$rec = $_GET ["parametro"];


  if ($tipo=="Vazio") 
      {
       echo "Nenhuma Opção foi marcada ! ";
      }
  else 
      {
       if (($rec=="Vazio")or($rec==""))
	    { // parametro geral 
          if (($tipo=="GeralLocal")or($tipo=="LocalWifi")or($tipo=="LocalFibra")or($tipo=="LocalAdsl")or($tipo=="LocalNenhum")or($tipo=="GeralE")or($tipo=="InativoE")){
			  $rec="1";
			  }
		    else
	    	{
            echo "Parametro de Busca em branco  ";
            $tipo="Vazio"    ;
		    }
		}
     }
//echo $nome;
//echo $tipo;
//echo $local;
  switch ($tipo)
    {
     case 'Vazio':
       {
	   echo "Nenhum parametro passado";
	   echo "<br><br>";
        $tipo_consulta = "0";
	   break;
	   }
     case 'Tipo':
       {
      // echo $tipo."   ".$rec;
        $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where equip_tipo LIKE '%".$recebe."%' and status=1";//  and status LIKE '%".$recebeStatus."%'
      $tipo_consulta = "1";
	   break;
	   } // fim da busca por tipo
     case 'NomePC':
       {
      // echo $tipo;
      $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where nome LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "1";
	   break;
	   }
      case 'PatNum':
       {
      // echo $tipo;
	    $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where patrimonio LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "1";
	   break;
	   }
	  case 'SistIP':
       {
      // echo $tipo;
	    $recebe = $rec;;
       $parametroSQL =  "SELECT * FROM tbequipamentos where lan_externa LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "1";
	   break;
	   }
     case 'SistID':
       {
       //echo $tipo;
	     $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where id ='".$recebe."' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
		$tipo_consulta = "1";
	   break;
	   }
     case 'Usuario':
       {
       //echo $tipo;
      $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where utilizador LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "1";
	   break;
	   }
     case 'Data':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where data LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "1";
	   break;
	   }
     case 'Local':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where local LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "1";
	   break;
	   }
     case 'Secretaria':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where secretaria LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "1";
	   break;
	   }
	   case 'ObsE':
       {
       //echo $tipo;
   $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where obs like '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "1";
	   break;
	   }
	   case 'InativoE':
       {
       //echo $tipo;
         $recebe = "0";
       $parametroSQL =  "SELECT * FROM tbequipamentos where status = 0 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "1";
	   break;
	   }
	 
	   case 'GeralE':
       {
       //echo $tipo;
         $recebe = "1";
       $parametroSQL =  "SELECT * FROM tbequipamentos where status like '%".$recebe."%' order by nome ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "1";
	   break;
	   }
	   case 'SoE':
		{
	   // echo $tipo;
		 $recebe = $rec;
		$parametroSQL =  "SELECT * FROM tbequipamentos where so LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
		 $tipo_consulta = "1";
		break;
		} 
		case 'ArqE':
			{
		   // echo $tipo;
			 $recebe = $rec;
			$parametroSQL =  "SELECT * FROM tbequipamentos where so_arquitetura LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
			 $tipo_consulta = "1";
			break;
			}
		case 'DominioE':
			{
		   // echo $tipo;
			 $recebe = $rec;
			$parametroSQL =  "SELECT * FROM tbequipamentos where dominio LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
			 $tipo_consulta = "1";
			break;
			}
		case 'MemoriaTpE':
			{
		   // echo $tipo;
		    $recebe = $rec;
			$parametroSQL =  "SELECT * FROM tbequipamentos where memoria LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
			$tipo_consulta = "1";
			break;
			}
		case 'MemoriaQtdE':
			{
			   // echo $tipo;
				$recebe = $rec;
				$parametroSQL =  "SELECT * FROM tbequipamentos where memoria_qtd LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
				$tipo_consulta = "1";
				break;
			}
		case 'VideoE':
				{
				   // echo $tipo;
					$recebe = $rec;
					$parametroSQL =  "SELECT * FROM tbequipamentos where video LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
					$tipo_consulta = "1";
					break;
				}
		case 'HdE':
			{
					   // echo $tipo;
						$recebe = $rec;
						$parametroSQL =  "SELECT * FROM tbequipamentos where hd LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
						$tipo_consulta = "1";
						break;
			}
		case 'EstadoE':
			{
						   // echo $tipo;
							$recebe = $rec;
							$parametroSQL =  "SELECT * FROM tbequipamentos where condicao LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
							$tipo_consulta = "1";
							break;
			}								
	 
		case 'Processador':
		{
				//echo $tipo;
				  $recebe = $rec;
				$parametroSQL =  "SELECT * FROM tbequipamentos where processador LIKE '%".$recebe."' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
				 $tipo_consulta = "1";
		break;
		}
		case 'Processador_tipo':
		{
					//echo $tipo;
					  $recebe = $rec;
					$parametroSQL =  "SELECT * FROM tbequipamentos where processador_tipo LIKE '%".$recebe."' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
					 $tipo_consulta = "1";
		break;
		}
		case 'Upgrade':
	    {
						//echo $tipo;
						  $recebe = $rec;
						$parametroSQL =  "SELECT * FROM tbequipamentos where upgrade LIKE '%".$recebe."' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
						 $tipo_consulta = "1";
		break;
		}
		case 'Condicao':
		{
							//echo $tipo;
							  $recebe = $rec;
							$parametroSQL =  "SELECT * FROM tbequipamentos where condicao LIKE '%".$recebe."' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
							 $tipo_consulta = "1";
		break;
		}

		case 'remoto':
			{
			//echo $tipo;
			  $recebe = $rec;
			$parametroSQL =  "SELECT * FROM tbequipamentos where remoto LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
			 $tipo_consulta = "1";
			break;
			}
	 


		case 'GeralLocal':
       {
       //echo $tipo;
         $recebe = "1";
       $parametroSQL =  "SELECT * FROM tbinfra where status LIKE '%".$recebe."%' order by I_depto";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
      
	  case 'LocalNome':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_depto LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalID':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_id ='".$recebe."' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
      // $parametroSQL =  "SELECT * FROM tbinfra where I_id LIKE '%".$recebe."%'";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalSecNome':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_sec_nome LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalSecCod':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_sec_cod LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalEnder':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where  I_endereco LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalIP':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_rede_ip LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalCircuito':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_rede_circuito LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalFone':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_endereco LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalWifi':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_rede_wifi LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalImpOut':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_imp_out >'".$recebe."' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalImpPropria':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra  where I_imp_propria LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalFibra':
       {
       //echo $tipo;
         $recebe = "FIBRA";
       $parametroSQL =  "SELECT * FROM tbinfra where I_rede_link1 LIKE '%".$recebe."%' or I_rede_link2 LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalAdsl':
       {
       //echo $tipo;
         $recebe = "ADSL";
       $parametroSQL =  "SELECT * FROM tbinfra where I_rede_link1 LIKE '%".$recebe."%' or I_rede_link2 LIKE '%".$recebe."%' and status=1 ";
	    $tipo_consulta = "2";
	   break;
	   }
      case 'LocalNenhum':
       {
       //echo $tipo;
         $recebe = "NENHUM";
       $parametroSQL =  "SELECT * FROM tbinfra having I_rede_link1 >'".$recebe."' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "2";
	   break;
	   }
	  case 'LocalPrinc':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_rede_link1 LIKE '%".$recebe."%' and status=1 ";
	    $tipo_consulta = "2";
	   break;
	   }
	   case 'DepEquip':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where local LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "3";
	   break;
	   }
	  case 'DepInfra':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_depto LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "3";
	   break;
	   }
      case 'Sec':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_upgrade LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "4";
	   break;
	   }

	  case 'SecEquip':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbequipamentos where secretaria LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "4";
	   break;
	   }
	  case 'SecInfra':
       {
       //echo $tipo;
         $recebe = $rec;
       $parametroSQL =  "SELECT * FROM tbinfra where I_sec_cod LIKE '%".$recebe."%' and status=1 ";//  and status LIKE '%".$recebeStatus."%'
	    $tipo_consulta = "4";
	   break;
	   }
	  
	 
	 
}// fim do switch	 
	 // checagem
//	 echo "Variavel tipo_consulta ".$tipo_consulta;
//	echo "<br>";
//	 echo "  parametro Tipo  ".$tipo;
//	echo "<br>";
//	 echo "  parametro digitavel  ".$recebe."   ";
	 
	// echo $tipo_consulta; 1 = equipamentos  2 = infraestrutura  3= Departamentos   4 = Secretarias 
	 if ($tipo_consulta=="1" )
      {
     if(!$tipo=='')  //BUSCAR <> VAZIO  buscar pelo nome do Equipamento
      {
      $recebeStatus="1";
     if($recebe <>"")
{
  //   echo  $recebe ;
	   $sql = $parametroSQL;
      // $sql =  "SELECT * FROM tbequipamentos where equip_tipo LIKE '%".$recebe."%'";//  and status LIKE '%".$recebeStatus."%'
     //  $sql =  "SELECT * FROM tbequipamentos where nome='".$recebe."';";//  and status LIKE '%".$recebeStatus."%'
    $result = mysqli_query($conn, $sql);
    $retorno_check = mysqli_num_rows($result);
   if($retorno_check == 0){
	     echo"<h2> <P align='center'>" ;
		  echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#990000' style='background-color:' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo "   Nenhum Equipamento  encontrado  na busca por :  ".$tipo."    ".$recebe."    (".$retorno_check." )       <338> <br>  ";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h2> </P>";
           echo "<form>";
           echo  "<input type='button' value='Voltar' onClick='JavaScript: window.history.back();'>";
           echo "</form>";
       }
        
	else{
          if($retorno_check == 1)
		  { // certeza de so ter um unico caso .
		 ?>
	<?php
			 while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['nome'];
				  $retID  = $row['id'];
		          $retsec = $row['sec'];
				  $retsecretaria = $row['secretaria'];				   // obtencao da credencial 
				  $retsec =$row['sec'];				   // obtencao da credencial 
				  $retlocal = $row['local'];
                  $retdata = $row['data'];
		          $retpatrimonio = $row['patrimonio'];
				  $retequip = $row['equip_tipo'];				   // obtencao da credencial 
				  $retequip_estado = $row['condicao'];
                  $retso = $row['so'];
		          $retmemoria = $row['memoria'];
				  $retmemoriaqtd = $row['memoria_qtd'];				   // obtencao da credencial 
				  $retprocessador = $row['processador'];
                  $retprocessador_tipo = $row['processador_tipo'];
		          $retvideo = $row['video'];
				  $retmonitor = $row['monitor'];				   // obtencao da credencial 
				  $rethd = $row['hd'];
                  $rethdtipo = $row['hd_tipo'];
				  $retdominio = $row['dominio'];
                  $retarq = $row['so_arquitetura'];
                  $retupgrade = $row['upgrade'];
   			      $retobs = $row['obs'];
   			      $retip = $row['lan_externa'];
				  $retobs = $row['obs'];
				  $alteracao = date("d/m/Y H:i:s ");
              	  $arquivo= $row['anexo'];  
//			      $arrayDADOS = array('maknome'=>$retnome,'id'=>$retID,'sec'=>$retsec,'secnome'=>$retsecretaria,'sec' => $retsec,'local' => $retlocal,'data' => $retdata);
                  $retfuncionario= $row['utilizador'];
				  $retremoto= $row['remoto'];
			    $retmac= $row['macadress'];
				 $arrayDADOS = array($retnome,$retID,$retsec,$retsecretaria,$retsec,$retlocal,$retdata,$retpatrimonio,$retequip,$retequip_estado,$retso,$retmemoria,$retmemoriaqtd,$retprocessador,$retprocessador_tipo,$retvideo,$retmonitor,$rethd,$rethdtipo,$retdominio,$retarq,$retupgrade,$retobs,$retip,$retobs);
			 //  print_r($arrayDADOS);			  
			 // insercao dos dados no form           <form action="#" method="post">
			//  $seq=$retID;
			  ?> 
             
           <form method="post" enctype="multipart/form-data" action="funcoes.php">
            <input type="hidden" name="origem" size=50 value= "Vis_Individual"> 
             <input type="hidden" name="Hoje" size=50 value= "<?php echo $alteracao ?>" > 
            
      
<?Php
//<div align="right"  <sub><?php echo $retFoto   </sub><br /><br /> </div>
}
$wks =  $retnome;
 if (!$wks==''){
     setcookie("CookieLocal", $wks, time()+720);
 }
	else
    {
   	  $wks =  "vazio";
	   setcookie("CookieLocal", $wks, time()+720);
    }	

  ?>
       
  Equipamento : <input type="text" name="equip_nome" id="equip_nome" size=25 style= "font-family: 'Arial Black'; font-size: 15px; text-align:center;"  value= "<?php echo $retnome ?> "  disabled >  Patrimonio: <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 14px; text-align:center;"  size =15  disabled  value= <?php echo $retpatrimonio ?>  >
             <input type="hidden" name="campo1"  value= "<?php echo $retnome ?>" >            
             <input type="hidden" name="campo2"  value= "<?php echo $retpatrimonio ?>" >      
             <a  style="margin: 0 15px;" href= 'popup.php?buscar=<?php echo $arquivo;?>' title='Consulta ao Dxdiag do equipamento' > Consultar DxDiag    </a> 	
			 <a  style="font-family: 'Arial Black'; font-size: 3px  text-align:center; color:red; margin: 0 15px;"  href='<?php echo $arquivo;?>' title='Efetuar o download do arquivo' download=""> Download  </a>	
			 <p1> <a href="laboratorio.php?ref=<?php echo $retID;?>" target="_blank">  <img src="img/manutencao3.jpg" BORDER='0' WIDTH='85' HEIGHT='85' ALIGN='left' alt='Tipo' title = "MANUTENÇÃO DO EQUIPAMENTO"> </a> </p1>
			  <br /><br /> 
             <input type="hidden" name="equip_id" value="<?php echo $retID ?>">
             <input type="hidden" name="sec_cod" value="<?php echo $retsec ?>">
             Secretaria  : <input type="text" name="secretaria" size=55 value= "<?php echo $retsecretaria ?>" style="text-align:center "  > <?php echo $retsec ?>  <br /> <br /> 
             Local : <input type="text" name="local" size=55 value="<?php echo $retlocal ?> "style="text-align:center "> <br /><br /> 
             Tipo Equipamento : <input type="text"  name="equip_tipo" size=15 value=<?php echo $retequip ?>> 
             Estado : <input type="text" aling=center name="equip_estado" size=8 value=<?php echo $retequip_estado ?> style="text-align:center" >  
             SO : <input type=text name="sistema" size=15  readonly="readonly" value= "<?php echo $retso ?>"  >  <?php echo $retarq ?>  <br /><br />       
             <input type=hidden name="sistema_arq" value="<?php echo $retarq ?>">
             Processador : <input type="text" name="processador" size=8 value=<?php echo $retprocessador ?> style="text-align:center " >  
              <input type=text name="processador_tipo"  size=10 value= "<?php echo $retprocessador_tipo ?>" > 
              Memoria : <input type=text name="memoria"  size =15 value= "<?php echo $retmemoria?> " >
                            <input type=text name="memoria_qtd"  size=8 value= <?php echo $retmemoriaqtd ?> > <br />  <br />           
             Video  : <input type=text name="video" size=43 value= "<?php echo $retvideo ?>"style="text-align:center " > 
             Monitor  : <input type=text name="monitor" size=30 value= "<?php echo $retmonitor ?> "style="text-align:center "   > <br><br>
             Hd  : <input type=text name="hd" size=25 value="<?php echo $rethd ?> "style="text-align:center "> 
                  <input type=text name="hd_tipo"  size=8 value= <?php echo $rethdtipo ?> > 
             Dominio  : <input type=text name="dominio" size=12 value= <?php echo $retdominio ?> style="text-align:center " > 
             Upgrade  : <input type=text name="upgrade" size=12 value= <?php echo $retupgrade ?>><br />  <br />             
            Obs. : <input type=text name="observacao" size=90 value="<?php echo $retobs ?>"> <br />  <br />           
             Usuario : <input type=text name="utilizador" size=20 value= "<?php echo $retfuncionario ?>" style="text-align:center;">
			 Remoto : <input type=text name="remoto" size=25 value= "<?php echo $retremoto ?>" style="text-align:center;">
    		 MacAdress : <input type=text name="macadress" size=25 value= "<?php echo $retmac ?>" style="text-align:center;">
         	 <a href= 'replicar.php?RadioOption=SistID&parametro=<?php echo $retID;?>'> ** Replicar **</a> 	   
             <br />  <br />                       
             
             <div>   
            <p1><textarea name="comment" style="width:90%;height:46px; text-align:center; font-family:'Arial Black', Gadget, sans-serif  ;" disabled="disabled" > Data Cadastro:  <?php echo $retdata ?>   ID  :  <?php echo $retID ?>   Ip  : <?php echo $retip."    ".$recebe." em Rec1"     ?>        </textarea></p1>
		  
            
            </div>
	 <br />      	
             <div id="container">
                <center>
                 <input type='button'  value='Voltar' onclick='history.go(-1)'/>
                 <button><a target="_blank" href='index.php'>Inicio!</a> </button>
                 <button class="botao submit" type="submit" name="submit">Alterar</button>
    			</center>
   			   <p  style="text-align:right; font-size:8px;color: blue "    >544</p>
   
		</div>
         	</form>	
	  <?php
		  
		 }// fim do retorno de 1 registro para tipo de consulta 1
		 else{  // retorno de varios registros //
           echo" <h1> <P align='center'> " ;
		   echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#0000FF' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo $retorno_check."   registros encontrados na busca por :  ".$tipo."      ".$recebe."             <557>    <br>";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h1> </P>";
	?>
		<table class="table table-striped table-bordered table-hover"  style="font-family:'Lucida Console', Monaco, monospace" >
	      <thead style="font-size:20px ">
	       <tr>
		    <th>  </th>
            <th>ID</th>
		    <th>Equipamento</th>
		    <th>Usuario</th>
            <th>Patrimonio</th>
            <th>Mac Address</th>
            <th>Localizaçao</th>
            </tr>
	   </thead>
	<?php
			 while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['nome'];
				  $retID  = $row['id'];
		          $retsec = $row['sec'];
				  $retsecretaria = $row['secretaria'];				   // obtencao da credencial 
				  $retsec =$row['sec'];				   // obtencao da credencial 
				  $retlocal = $row['local'];
                  $retdata = $row['data'];
                  $retmac = $row['macadress'];
				  $retpatrimonio = $row['patrimonio'];
                    $tipo =  $row['equip_tipo'];
					if ($tipo=='DESKTOP')
						 {
							$caminho='img/pc.jpg';
						    $titulo = 'DESKTOP';
						 }
					 else {
	    		         if ($tipo=='NOTEBOOK')
			   				{		
								$caminho='img/note.jpg';
							    $titulo = 'NOTEBOOK';
							}
					   else{
			    			$caminho='img/tablet.jpg';
						    $titulo = 'TABLET';
					   }
					 }
		 
		 ?>
	 	 <tbody style="font-size:16px">
		 	     <tr>
   					<th>  <a href= "consultaRet2.php?RadioOption=SistID&parametro=<?php echo $row['id'];?>">    <img src=<?php echo $caminho; ?> BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = <?php echo $tipo; ?> longdesc='Equipamento' /> </a>  </th>
 					<th><?php echo $row['id']; ?></th>  
                    <td><?php echo $row['nome']; ?></td>
					<td><?php echo $row['utilizador']; ?></td>
				    <td><?php echo $row['patrimonio']; ?></td>
                    <td><?php echo $row['macadress']; ?></td>
                    <td><?php echo $row['local']; ?></td>
                
		 <?php
		       }
      echo " </tr>";
     ?>
	 </tbody>
	</table>
	  <?php
		 }
		 }
		 }
		 }
	 }// final de tipo_consulta = 1
  else {
  	 if ($tipo_consulta=="2" )
	   {
	    if( !$tipo=='')  //SECRETARIA <> VAZIO  busca em funcao das secretarias 
		   {
              $recebeStatus="1";
             // rotina para acessar a base de dados 
              if($recebe <>"")
              {
                    $sql = $parametroSQL;
//                     $sql =  "SELECT * FROM tbinfra where i_depto LIKE '%".$recebe."%'";//  and status LIKE '%".$recebeStatus."%'
                  $result = mysqli_query($conn, $sql);
                $retorno_check = mysqli_num_rows($result);
                 if($retorno_check == 0)
				     {
       	     echo"<h2> <P align='center'>" ;
		  echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#990000' style='background-color:' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo "   Nenhuma Infraestrutura  encontrada  na busca por :  ".$tipo."      ".$recebe."                 <540>   <br>  ";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h2> </P>";
           echo "<form>";
           echo  "<input type='button' value='Voltar' onClick='JavaScript: window.history.back();'>";
           echo "</form>";

					 } // fim de retorno 0
				 else{
					 if($retorno_check == 1)
					    {  // unico registro
                      // echo  "<input type='button' value='Visualizar Registros ' onClick='JavaScript: window.history.back();'>";
          ?>
        	<?php
			 while($row = mysqli_fetch_assoc($result))
			   {
                  $retID  = $row['I_id'];
		          $retsec = $row['I_sec_cod'];
				  $retsecretaria = $row['I_sec_nome'];				   // obtencao da credencial 
				  $retendereco =$row['I_endereco'];				   // obtencao da credencial 
				  $retlocal = $row['I_depto'];
                  $retdata = $row['I_data'];
		          $reteletrica_est = $row['I_eletrica_estado'];
				  $reteletrica_filtro = $row['I_eletrica_filtro'];				   // obtencao da credencial 
				  $reteletrica_adap = $row['I_eletrica_adap'];
                  $retrede_pontos = $row['I_rede_pontos'];
		          $retrede_switch = $row['I_rede_switch'];
				  $retrede_switchP = $row['I_rede_switchp'];				   // obtencao da credencial 
				  $retrede_hub = $row['I_rede_hub'];
                  $retrede_hubP = $row['I_rede_hubp'];
		          $retrede_cab_obs = $row['I_rede_cab_obs'];
				  $retrede_link1 = $row['I_rede_link1'];				   // obtencao da credencial 
				  $retrede_link2 = $row['I_rede_link2'];
                  $retrede_wifi = $row['I_rede_wifi'];
				  $retrede_wifimod = $row['I_rede_wifiMod'];
                  $retrede_rack = $row['I_rede_rack'];
                  $retrede_mpls = $row['I_rede_mpls'];
   			      $retrede_ip = $row['I_rede_ip'];
   			      $retrede_circuito = $row['I_rede_circuito'];
				  $retrede_wifi_obs = $row['I_rede_wifiobs'];
				  $retservidor = $row['I_servidor'];
                  $retservidor_qtd= $row['I_servidor_qtd'];
				  $retservidor_mod = $row['I_servidor_mod'];
                  $retimp_qtd = $row['I_imp_qtd'];
		          $retimp_jato = $row['I_imp_jato'];
				  $retimp_mat = $row['I_imp_mat'];				   // obtencao da credencial 
				  $retimp_mono = $row['I_imp_mono'];
                  $retimp_color = $row['I_imp_color'];
		          $retimp_out = $row['I_imp_out'];
				  $retimp_propria = $row['I_imp_propria'];				   // obtencao da credencial 
				  $retimp_rj = $row['I_imp_rj'];
                  $rettecnico = $row['I_tecnico'];
		          $retequip_pcs = $row['I_equip_pcs'];
				  $retequip_tvs = $row['I_equip_tvs'];				   // obtencao da credencial 
				  $retequip_note = $row['I_equip_note'];
                  $retequip_obs = $row['I_equip_obs'];
				  $retimovel = $row['I_imovel'];
                  $retstatus = $row['status'];
                  $retInclusao = $row['temp'];
			   }
			  ?> 
        <form method="post" enctype="multipart/form-data" action="funcoes.php">
            <input type="hidden" name="origem" size=50 value= "Vis_Individual_infra"> 
            <?Php
 
            ?>    
            <h2> <?php echo $retsecretaria ;?></h2>
              <input type="text" name="I_nomeInfra" id="I_nomeInfra" size=55 style= "font-family: 'Arial Black'; font-size: 15px  text-align: center;"  value= "<?php echo $retlocal ?> "  disabled="disabled" ><br /> <br />Endereço : <input type="text" name="I_endereco" size=65 value= "<?php echo $retendereco ?>" >  
             <input type="hidden" name="par_secretaria"  value= "<?php echo $retsecretaria ?>" > 
             <input type="hidden" name="par_ID"  value= "<?php echo $retID ?>" >            
             <input type="hidden" name="par_sec_cod" value="<?php echo $retsec ?>">
             <input type="hidden" name="par_nomeInfra" value="<?php echo $retlocal ?>">
             <br /><br /> 
<div id="div1">
 <table id="table1"> 
 <tr>
<td style="text-align:center"> Imovel  </td>
<td style="text-align:center"> Est. Eletrica </td>
<td style="text-align:center"> Filtro de Linha </td>
<td style="text-align:center"> Adaptador </td>
<td style="text-align:center"> Pontos de rede </td>
<td style="text-align:center"> Swicht</td>
<td style="text-align:center"> Hub</td>
<td style="text-align:center"> Rack</td>
</tr>
<tr>
<td style="text-align:center"> <input type="text" style="text-align:center" name="I_imovel" size=10 value= "<?php echo $retimovel ?>" > </td>
<td style="text-align:center"> <input type="text" name="I_eletrica" size=10 value= "<?php echo $reteletrica_est ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_eletricafiltro" size=10 value= "<?php echo $reteletrica_filtro ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_eletricaadap" size=10 value= "<?php echo $reteletrica_adap ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_redepontos" size=10 value= "<?php echo $retrede_pontos ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_redeswitch" size=10 value= "<?php echo $retrede_switch ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_redehub" size=10 value= "<?php echo $retrede_hub ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_rederack" size=10 value= "<?php echo $retrede_rack ?>" > </td>
</tr>
</table> </div>
<div id="div1">
 <table id="table2">
<tr>
<td style="text-align:centereft"> Ip  </td>
<td style="text-align:center"> Circuito </td>
<td style="text-align:center"> MPLS </td>
<td style="text-align:center"> Link Principal </td>
<td style="text-align:center"> Link Secundario</td>
<td style="text-align:center"> Wifi</td>
<td style="text-align:center"> Rack</td>
<td style="text-align:center">  Ref  </td>
</tr>
<tr>
<td style="text-align:center"> <input type="text" name="I_redeip" size=10 value= "<?php echo $retrede_ip ?>" > </td>
<td style="text-align:center"> <input type="text" name="I_redecircuito" size=10 value= "<?php echo $retrede_circuito ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_redempls" size=10 value= "<?php echo $retrede_mpls ?>" > </td>
<td style="text-align:center">  <input type="text" name="I_redelink1" size=10 value= "<?php echo $retrede_link1 ?>" > </td>
<td style="text-align:center">  <input type="text" name="I_redelink2" size=10 value= "<?php echo $retrede_link2 ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_redewifi" size=10 value= "<?php echo $retrede_wifi ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_rederack" size=10 value= "<?php echo $retrede_rack ?>" > </td>
<td style="text-align:center">   <input type="text" style="text-align:center"  name="I_imo1" size=10 value= <?php echo $retsec ?> > </td>
</tr>
</table> </div> 
<div id="div1">
 <table id="table3">
<tr>
<td style="text-align:center"> Qtd Equip.   </td>
<td style="text-align:center"> Qtd TVs  </td>
<td style="text-align:center"> Qtd Notebooks </td>
<td style="text-align:center"> Servidor </td>
<td style="text-align:center"> Servidor Mod</td>
<td style="text-align:center"> Servidor Qtd</td>
<td style="text-align:center"> Inclusao  </td>
<td style="text-align:center"> Tecnico  </td>
</tr>
<tr>
<td style="text-align:center"> <input type=text style="text-align:center" name="I_equipconectados" size=10 value= "<?php echo $retequip_pcs ?> "> </td>
<td style="text-align:center"> <input type=text style="text-align:center" name="I_equitvs" size=10 value="<?php echo $retequip_tvs ?>"> </td>
<td style="text-align:center">  <input type=text style="text-align:center" name="I_equinote"_tipo  size=10 value= <?php echo $retequip_note ?> ></td>
<td style="text-align:center">   <input type=text style="text-align:center" name="I_servidor" size=10 value= <?php echo $retservidor ?>> </td>
<td style="text-align:center">  <input type=text name="I_servidormod" size=10 value= <?php echo $retservidor_mod ?>> </td>
<td style="text-align:center">  <input type=text style="text-align:center" name="I_servidorqtd" size=10 value= <?php echo $retservidor_qtd?>> </td>
<td style="text-align:center">   <input type="text" style="text-align:center" name="I_data" size=10 value= "<?php echo $retInclusao ?> "> </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_tecnico" size=10 value= "<?php echo $rettecnico ?> " > </td>
</tr>
</table> </div>
<div id="div1">
 <table id="table4">
<tr>

<td style="text-align:center"> Jato de Tinta </td>
<td style="text-align:center"> Matricial </td>
<td style="text-align:center"> Monocromatica </td>
<td style="text-align:center"> Colorida</td>
<td style="text-align:center"> Outsourcing</td>
<td style="text-align:center"> Propria</td>
<td style="text-align:center"> Possui Rj 45  </td>
<td style="text-align:centereft"> Qtd Impressoras  </td>
</tr>
<tr>
<td style="text-align:center"> <input type="text" style="text-align:center" name="I_impjato" size=10 value= "<?php echo $retimp_jato ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_impmat" size=10 value= "<?php echo $retimp_mat ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center"  name="I_impmono" size=10 value= "<?php echo $retimp_mono ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_impcolor" size=10 value= "<?php echo $retimp_color ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_impout" size=10 value= "<?php echo $retimp_out ?>" > </td>
<td style="text-align:center">  <input type="text" style="text-align:center" name="I_imppropria" size=10 value= "<?php echo $retimp_propria ?>" > </td>
<td style="text-align:center">   <input type="text" style="text-align:center"  name="I_imprj" size=10 value= <?php echo $retimp_rj ?> > </td>
<td style="text-align:center"> <input type="text" style="text-align:center" name="I_impqtd" size=10 value= "<?php echo $retimp_qtd ?>" > </td>

</tr>
</table> </div> <br />



            OBS : <input type=text name="I_obs" size=75   value= "<?php echo $retequip_obs ?>" /> <br /><br />       
              <br />             
             

        
            <p1><textarea name="comment" style="width:90%;height:46px; text-align:center; font-family:'Arial Black', Gadget, sans-serif  ;" disabled="disabled" >   </textarea></p1>

           <br>
              <div id="container">
                <center>
                <button><a target="_blank" href='index.php'>Inicio!</a> </button>
                <button class="botao submit" type="submit" name="submit">Alterar</button>
                
                 </center>
				 <p  style="text-align:right; font-size:8px;color: blue "    >825</p>
				</div>             
           </form>
          <?php
       //    echo "</form>";      
	    }// fim de retorno 1
		 else{ // retorno de multiplos
		 echo" <h1> <P align='center'> " ;
		   echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#0000FF' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo $retorno_check."   registros encontrados na busca por :  ".$tipo."      ".$recebe."            <835>         <br>";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h1> </P>";
	?>
		<table class="table table-striped table-bordered table-hover"  style="font-family:'Lucida Console', Monaco, monospace" >
	      <thead style="font-size:20px ">
	       <tr>
		    <th>  </th>
            <th>ID</th>
		    <th>Local</th>
		    <th>Secretaria</th>
            
            </tr>
	   </thead>
	<?php
			 while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['I_depto'];
				  $retID  = $row['I_id'];
		          $retsec = $row['I_sec_cod'];
				 ?>
	 	 <tbody style="font-size:16px">
		 	     <tr>
					<td> <a href='consultaRet2.php?RadioOption=LocalID&parametro=<?php echo $retID; ?>'> Ver </a> </td>
                    <th><?php echo $retID; ?></th>  
                    <td><?php echo $retnome; ?></td>
					<td><?php echo $retsec; ?></td>
                
		      <?php
		        }
             echo " </tr>";
     ?>
	 </tbody>
	</table>
	  <?php
		 }
				 }}
   //  echo"fim de consulta em tipo 2";			  
}
	} // final de tipo_consulta = 2
	  else{ 
	   	 if ($tipo_consulta=="3" )
		   {
	         {// sobre departamentos
     //      echo  $tipo."  parametro Tipo  ";
	        if((!$tipo=='')and ($tipo=="DepEquip"))  //BUSCAR <> VAZIO  buscar pelo nome do Equipamento
      {
      $recebeStatus="1";
     if($recebe <>"")
{
   //  $recebe ;
	   $sql = $parametroSQL;
      // $sql =  "SELECT * FROM tbequipamentos where equip_tipo LIKE '%".$recebe."%'";//  and status LIKE '%".$recebeStatus."%'
     //  $sql =  "SELECT * FROM tbequipamentos where nome='".$recebe."';";//  and status LIKE '%".$recebeStatus."%'
    $result = mysqli_query($conn, $sql);
    $retorno_check = mysqli_num_rows($result);
   if($retorno_check == 0){
	     echo"<h2> <P align='center'>" ;
		  echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#990000' style='background-color:' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo "   Nenhum Equipamento  encontrado   na busca por :  ".$tipo."      ".$recebe."    <896>   <br>  ";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h2> </P>";
           echo "<form>";
           echo  "<input type='button' value='Voltar' onClick='JavaScript: window.history.back();'>";
           echo "</form>";
       }
        
	else{
          if($retorno_check == 1){ // certeza de so ter um unico caso .
		       while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['nome'];
				  $retID  = $row['id'];
		          $retsec = $row['sec'];
				  $retsecretaria = $row['secretaria'];				   // obtencao da credencial 
				  $retsec =$row['sec'];				   // obtencao da credencial 
				  $retlocal = $row['local'];
                  $retdata = $row['data'];
		          $retpatrimonio = $row['patrimonio'];
				  $retequip = $row['equip_tipo'];				   // obtencao da credencial 
				  $retequip_estado = $row['condicao'];
                  $retso = $row['so'];
		          $retmemoria = $row['memoria'];
				  $retmemoriaqtd = $row['memoria_qtd'];				   // obtencao da credencial 
				  $retprocessador = $row['processador'];
                  $retprocessador_tipo = $row['processador_tipo'];
		          $retvideo = $row['video'];
				  $retmonitor = $row['monitor'];				   // obtencao da credencial 
				  $rethd = $row['hd'];
                  $rethdtipo = $row['hd_tipo'];
				  $retdominio = $row['dominio'];
                  $retarq = $row['so_arquitetura'];
                  $retupgrade = $row['upgrade'];
   			      $retobs = $row['obs'];
   			      $retip = $row['lan_externa'];
				  $retobs = $row['obs'];
				  $alteracao = date("d/m/Y H:i:s ");
              	  $arquivo= $row['anexo'];  
//			      $arrayDADOS = array('maknome'=>$retnome,'id'=>$retID,'sec'=>$retsec,'secnome'=>$retsecretaria,'sec' => $retsec,'local' => $retlocal,'data' => $retdata);
                  $retfuncionario= $row['utilizador'];
				  $retremoto = $row['remoto'];
			     $arrayDADOS = array($retnome,$retID,$retsec,$retsecretaria,$retsec,$retlocal,$retdata,$retpatrimonio,$retequip,$retequip_estado,$retso,$retmemoria,$retmemoriaqtd,$retprocessador,$retprocessador_tipo,$retvideo,$retmonitor,$rethd,$rethdtipo,$retdominio,$retarq,$retupgrade,$retobs,$retip,$retobs);
			 //  print_r($arrayDADOS);			  
			 // insercao dos dados no form           <form action="#" method="post">
			//  $seq=$retID;
			  ?> 
             
           <form method="post" enctype="multipart/form-data" action="funcoes.php">
            <input type="hidden" name="origem" size=50 value= "Vis_Individual"> 
             <input type="hidden" name="Hoje" size=50 value= "<?php echo $alteracao ?>" > 
            

          <br >
<?Php
//<div align="right"  <sub><?php echo $retFoto   </sub><br /><br /> </div>
}
$wks =  $retnome;
 if (!$wks==''){
     setcookie("CookieLocal", $wks, time()+720);
 }
	else
    {
   	  $wks =  "vazio";
	   setcookie("CookieLocal", $wks, time()+720);
    }	

  ?>
       <br />   
  Equipamento : <input type="text" name="equip_nome" id="equip_nome" size=15 style= "font-family: 'Arial Black'; text-align:center; font-size: 15px  text-align: center;"  value= "<?php echo $retnome ?> "  disabled >  Patrimonio: <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 14px"  size =15  disabled  value= <?php echo $retpatrimonio ?>  >
             <input type="hidden" name="campo1"  value= "<?php echo $retnome ?>" >            
             <input type="hidden" name="campo2"  value= "<?php echo $retpatrimonio ?>" >      
             <a href= 'popup.php?buscar=<?php echo $arquivo;?>'> DxDiag ></a> 	
<br /><br /> 
             <input type="hidden" name="equip_id" value="<?php echo $retID ?>">
             <input type="hidden" name="sec_cod" value="<?php echo $retsec ?>">
             Secretaria  : <input type="text" name="secretaria" size=55 value= "<?php echo $retsecretaria ?>" style: text-align:center> <?php echo $retsec ?>  <br /> <br /> 
             Local : <input type="text" name="local" size=55 value="<?php echo $retlocal ?>" style: text-align:center> <br /><br /> 
             Tipo Equipamento : <input type="text"  name="equip_tipo" size=15 value=<?php echo $retequip ?> style: text-align:center> 
             Estado : <input type="text" aling=center name="equip_estado" size=8 value=<?php echo $retequip_estado ?>>  
             SO : <input type=text name="sistema" size=15  readonly="readonly" value= "<?php echo $retso ?>"  >  <?php echo $retarq ?>  <br /><br />       
             <input type=hidden name="sistema_arq" value="<?php echo $retarq ?>">
             Processador : <input type="text" name=processador size=8 value=<?php echo $retprocessador ?>style: text-align:center >  
              <input type=text name=processador_tipo  size=10 value= "<?php echo $retprocessador_tipo ?>" > 
              Memoria : <input type=text name=memoria  size =15 value= "<?php echo $retmemoria?> " style: text-align:center >
                            <input type=text name=memoria_qtd  size=8 value= <?php echo $retmemoriaqtd ?> > <br />  <br />           
             Video  : <input type=text name=video size=43 value= "<?php echo $retvideo ?>" style: text-align:center > 
             Monitor  : <input type=text name=monitor size=30 value= "<?php echo $retmonitor ?>" style: text-align:center > <br><br>
             Hd  : <input type=text name=hd size=25 value="<?php echo $rethd ?>" style: text-align:center> > 
                  <input type=text name=hd_tipo  size=4 value= <?php echo $rethdtipo ?> > 
             Dominio  : <input type=text name=dominio size=12 value= <?php echo $retdominio ?> style: text-align:center > 
             Upgrade  : <input type=text name=upgrade size=12 value= <?php echo $retupgrade ?> style: text-align:center ><br />  <br />             
             Obs. : <input type=text name=obs size=40 value= <?php echo $retobs ?>>            
             Usuario : <input type=text name=obs size=15 value= <?php echo $retfuncionario ?> style: text-align:center >
			 AnyDesk : <input type=text name=obs size=15 value= <?php echo $retremoto ?> style: text-align:center ><br />  <br />             <br />  <br />             
			 <br />  <br />             <br />  <br />             

 
             
             <div>   
            <p1><textarea name="comment" style="width:90%;height:46px; text-align:center; font-family:'Arial Black', Gadget, sans-serif  ;" disabled="disabled" > Data Cadastro:  <?php echo $retdata ?>   ID  :  <?php echo $retID ?>   Ip  : <?php echo $retip ?>            </textarea></p1>
           </div>
           <br>
            <div>
            </div>
              <div id="container">
<center>
                <input type='button'  value='Voltar' onclick='history.go(-1)'/>
                <button><a target="_blank" href='index.php'>Inicio!</a> </button>
                <button class="botao submit" type="submit" name="submit">Alterar</button>
               
 </center>
    <p  style="text-align:right; font-size:8px;color: blue "    >1009</p5>              
</div>             
             </form>	
          <?php	
		 }
		 else{  // retorno de varios registros //
           echo" <h1> <P align='center'> " ;
		   echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#0000FF' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo $retorno_check."   registros encontrados na busca por :  ".$tipo."      ".$recebe."               <1015>  <br>";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h1> </P>";
	?>
		<table class="table table-striped table-bordered table-hover"  style="font-family:'Lucida Console', Monaco, monospace" >
	      <thead style="font-size:20px ">
	       <tr>
		    <th>  </th>
            <th>ID</th>
		    <th>Equipamento</th>
		    <th>Usuario</th>
            <th>Patrimonio</th>
            <th>Localizaçao</th>
            </tr>
	   </thead>
	<?php
			 while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['nome'];
				  $retID  = $row['id'];
		          $retsec = $row['sec'];
				  $retsecretaria = $row['secretaria'];				   // obtencao da credencial 
				  $retsec =$row['sec'];				   // obtencao da credencial 
				  $retlocal = $row['local'];
                  $retdata = $row['data'];
		          $retpatrimonio = $row['patrimonio'];
                    $tipo =  $row['equip_tipo'];
					if ($tipo=='DESKTOP')
						 {
							$caminho='img/pc.jpg';
						    $titulo = 'DESKTOP';
						 }
					 else {
	    		         if ($tipo=='NOTEBOOK')
			   				{		
								$caminho='img/note.jpg';
							    $titulo = 'NOTEBOOK';
							}
					   else{
			    			$caminho='img/tablet.jpg';
						    $titulo = 'TABLET';
					   }
					 }
		 
		 ?>
	 	 <tbody style="font-size:16px">
		 	     <tr>
<th>  <a href= 'consultaRet2.php?RadioOption=SistID&parametro=<?php echo $retID; ?>'>    <img src=<?php echo $caminho; ?> BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = <?php echo $tipo; ?> longdesc='Equipamento' /> </a>  </th>
					<th><?php echo $row['id']; ?></th>  
                    <td><?php echo $row['nome']; ?></td>
					<td><?php echo $row['utilizador']; ?></td>
				    <td><?php echo $row['patrimonio']; ?></td>
                    <td><?php echo $row['local']; ?></td>
                
		 <?php
		       }
      echo " </tr>";
     ?>
	 </tbody>
	</table>
	  <?php
     }
	}
     }
	   }
	     }// fim de consulta com base em equipamentos
	       { // sobre infraestrutura
		    if(( !$tipo=='') and($tipo=='DepInfra'))  //Departamento em Infa 
		   {
              $recebeStatus="1";
             // rotina para acessar a base de dados 
              if($recebe <>"")
              {
                    $sql = $parametroSQL;
//                     $sql =  "SELECT * FROM tbinfra where i_depto LIKE '%".$recebe."%'";//  and status LIKE '%".$recebeStatus."%'
                  $result = mysqli_query($conn, $sql);
                $retorno_check = mysqli_num_rows($result);
                 if($retorno_check == 0)
				     {
       	               echo"<h2> <P align='center'>" ;
		  echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#990000' style='background-color:' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo "   Nenhum Equipamento  encontrado na busca por :  ".$tipo."      ".$recebe."                  <1099>  <br>  ";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h2> </P>";
           echo "<form>";
           echo  "<input type='button' value='Voltar' onClick='JavaScript: window.history.back();'>";
           echo "</form>";

					 } // fim de retorno 0
				 else{
					 if($retorno_check == 1)
					    {  // unico registro
                    echo"<h2> <P align='center'>" ;
		  echo "<font Face='Georgia, Times New Roman, Times, serif'  size='2' color='#000' style='background-color:' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo "   Somente 1 Equipamento  encontrado   na busca por :  ".$tipo."      ".$recebe."                  <1114>     <br>  ";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h2> </P>";
           echo "<form >";
          // echo  "<input type='button' value='Visualizar Registros ' onClick='JavaScript: window.history.back();'>";
          ?>
		   <table class="table table-striped table-bordered table-hover"  style="font-family:'Lucida Console', Monaco, monospace" >
	       <thead style="font-size:20px ">
	       <tr>
		    <th>  </th>
            <th>ID</th>
		    <th>Local</th>
		    <th>Secretaria</th>
           </tr>
	     </thead>
        	<?php
			 while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['I_depto'];
				  $retID  = $row['I_id'];
		          $retsec = $row['I_sec_cod'];
				 ?>
	 	      <tbody style="font-size:16px">
		 	    <tr>
					<td> <a href='consultaRet2.php?RadioOption=LocalID$buscar=&secretaria=VAZIO&dep=&group=on&parametro=<?php echo $retID; ?>'> Ver </a>   </td>
                    <th><?php echo $retID; ?></th>  
                    <td><?php echo $retnome; ?></td>
					<td><?php echo $retsec; ?></td>
                
		      <?php
		        }
             echo " </tr>";
            ?>
	       </tbody>
       	</table>
		      <?php
           echo "</form>";      
	    }// fim de retorno 1
		 else{ // retorno de multiplos
		 echo" <h1> <P align='center'> " ;
		   echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#0000FF' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo $retorno_check."   registros encontrados na busca por :  ".$tipo."      ".$recebe."             <1157>    <br>";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h1> </P>";
	?>
		<table class="table table-striped table-bordered table-hover"  style="font-family:'Lucida Console', Monaco, monospace" >
	      <thead style="font-size:20px ">
	       <tr>
		    <th>  </th>
            <th>ID</th>
		    <th>Local</th>
		    <th>Secretaria</th>
            
            </tr>
	   </thead>
	<?php
			 while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['I_depto'];
				  $retID  = $row['I_id'];
		          $retsec = $row['I_sec_cod'];
				 ?>
	 	 <tbody style="font-size:16px">
		 	     <tr>
					<td> <a href='consultaRet2.php?RadioOption=LocalID$buscar=&secretaria=VAZIO&dep=&group=on&parametro=<?php echo $retID; ?>'> Ver </a> </td>
                    <th><?php echo $retID; ?></th>  
                    <td><?php echo $retnome; ?></td>
					<td><?php echo $retsec; ?></td>
                
		      <?php
		        }
             echo " </tr>";
     ?>
	 </tbody>
	</table>
	  <?php
		 }
				 }}
     //echo"fim de consulta em tipo 3 infra";			  
		   }
		   } // fim de consulta com base em Infra
			 }// fim de tipo_consulta 3
	     else{
			  	 if ($tipo_consulta=="4" ){
//					 echo " Tipo    ".$tipo."   ref tipo de consulta     ".$tipo_consulta."  paremetro digitavel   ".$recebe ;
					  {
	         {// sobre equipamentos
  //         echo  $tipo."  parametro Tipo  ";
	        if((!$tipo=='')and ($tipo=="SecEquip"))  //BUSCAR <> VAZIO  buscar pelo nome do Equipamento
      {
      $recebeStatus="1";
     if($recebe <>"")
{
   //  $recebe ;
	   $sql = $parametroSQL;
      // $sql =  "SELECT * FROM tbequipamentos where equip_tipo LIKE '%".$recebe."%'";//  and status LIKE '%".$recebeStatus."%'
     //  $sql =  "SELECT * FROM tbequipamentos where nome='".$recebe."';";//  and status LIKE '%".$recebeStatus."%'
    $result = mysqli_query($conn, $sql);
    $retorno_check = mysqli_num_rows($result);
   if($retorno_check == 0){
	     echo"<h2> <P align='center'>" ;
		  echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#990000' style='background-color:' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo "   Nenhum  Equipamento  encontrado  na busca por :  ".$tipo."      ".$recebe."                 <1220>  <br>  ";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h2> </P>";
           echo "<form>";
           echo  "<input type='button' value='Voltar' onClick='JavaScript: window.history.back();'>";
           echo "</form>";
       }
        
	else{
          if($retorno_check == 1){ // certeza de so ter um unico caso .
		       while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['nome'];
				  $retID  = $row['id'];
		          $retsec = $row['sec'];
				  $retsecretaria = $row['secretaria'];				   // obtencao da credencial 
				  $retsec =$row['sec'];				   // obtencao da credencial 
				  $retlocal = $row['local'];
                  $retdata = $row['data'];
		          $retpatrimonio = $row['patrimonio'];
				  $retequip = $row['equip_tipo'];				   // obtencao da credencial 
				  $retequip_estado = $row['condicao'];
                  $retso = $row['so'];
		          $retmemoria = $row['memoria'];
				  $retmemoriaqtd = $row['memoria_qtd'];				   // obtencao da credencial 
				  $retprocessador = $row['processador'];
                  $retprocessador_tipo = $row['processador_tipo'];
		          $retvideo = $row['video'];
				  $retmonitor = $row['monitor'];				   // obtencao da credencial 
				  $rethd = $row['hd'];
                  $rethdtipo = $row['hd_tipo'];
				  $retdominio = $row['dominio'];
                  $retarq = $row['so_arquitetura'];
                  $retupgrade = $row['upgrade'];
   			      $retobs = $row['obs'];
   			      $retip = $row['lan_externa'];
				  $retobs = $row['obs'];
				  $alteracao = date("d/m/Y H:i:s ");
              	  $arquivo= $row['anexo'];  
//			      $arrayDADOS = array('maknome'=>$retnome,'id'=>$retID,'sec'=>$retsec,'secnome'=>$retsecretaria,'sec' => $retsec,'local' => $retlocal,'data' => $retdata);
                  $retfuncionario= $row['utilizador'];

			     $arrayDADOS = array($retnome,$retID,$retsec,$retsecretaria,$retsec,$retlocal,$retdata,$retpatrimonio,$retequip,$retequip_estado,$retso,$retmemoria,$retmemoriaqtd,$retprocessador,$retprocessador_tipo,$retvideo,$retmonitor,$rethd,$rethdtipo,$retdominio,$retarq,$retupgrade,$retobs,$retip,$retobs);
			 //  print_r($arrayDADOS);			  
			 // insercao dos dados no form           <form action="#" method="post">
			//  $seq=$retID;
			  ?> 
             
           <form method="post" enctype="multipart/form-data" action="funcoes.php">
            <input type="hidden" name="origem" size=50 value= "Vis_Individual"> 
             <input type="hidden" name="Hoje" size=50 value= "<?php echo $alteracao ?>" > 
            

          <br >
<?Php
//<div align="right"  <sub><?php echo $retFoto   </sub><br /><br /> </div>
}
$wks =  $retnome;
 if (!$wks==''){
     setcookie("CookieLocal", $wks, time()+720);
 }
	else
    {
   	  $wks =  "vazio";
	   setcookie("CookieLocal", $wks, time()+720);
    }	

  ?>
       <br />   
  Equipamento : <input type="text" name="equip_nome" id="equip_nome" size=15 style= "font-family: 'Arial Black'; font-size: 15px  text-align: center;"  value= "<?php echo $retnome ?> "  disabled >  Patrimonio: <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 14px"  size =15  disabled  value= <?php echo $retpatrimonio ?>  >
             <input type="hidden" name="campo1"  value= "<?php echo $retnome ?>" >            
             <input type="hidden" name="campo2"  value= "<?php echo $retpatrimonio ?>" >      
             <a href= 'popup.php?buscar=<?php echo $arquivo;?>'> DxDiag ></a> 	
<br /><br /> 
             <input type="hidden" name="equip_id" value="<?php echo $retID ?>">
             <input type="hidden" name="sec_cod" value="<?php echo $retsec ?>">
             Secretaria  : <input type="text" name="secretaria" size=55 value= "<?php echo $retsecretaria ?>" > <?php echo $retsec ?>  <br /> <br /> 
             Local : <input type="text" name="local" size=55 value="<?php echo $retlocal ?>"> <br /><br /> 
             Tipo Equipamento : <input type="text"  name="equip_tipo" size=15 value=<?php echo $retequip ?>> 
             Estado : <input type="text" aling=center name="equip_estado" size=8 value=<?php echo $retequip_estado ?>>  
             SO : <input type=text name="sistema" size=15  readonly="readonly" value= "<?php echo $retso ?>"  >  <?php echo $retarq ?>  <br /><br />       
             <input type=hidden name="sistema_arq" value="<?php echo $retarq ?>">
             Processador : <input type="text" name=processador size=8 value=<?php echo $retprocessador ?>>  
              <input type=text name=processador_tipo  size=10 value= "<?php echo $retprocessador_tipo ?>" > 
              Memoria : <input type=text name=memoria  size =15 value= "<?php echo $retmemoria?> " >
                            <input type=text name=memoria_qtd  size=8 value= <?php echo $retmemoriaqtd ?> > <br />  <br />           
             Video  : <input type=text name=video size=43 value= "<?php echo $retvideo ?> "> 
             Monitor  : <input type=text name=monitor size=30 value= "<?php echo $retmonitor ?> "> <br><br>
             Hd  : <input type=text name=hd size=7 value="<?php echo $rethd ?>"> 
                  <input type=text name=hd_tipo  size=4 value= <?php echo $rethdtipo ?> > 
             Dominio  : <input type=text name=dominio size=12 value= <?php echo $retdominio ?>> 
             Upgrade  : <input type=text name=upgrade size=12 value= <?php echo $retupgrade ?>><br />  <br />             
             Obs. : <input type=text name=obs size=40 value= <?php echo $retobs ?>>            
             Usuario : <input type=text name=obs size=20 value= <?php echo $retfuncionario ?>><br />  <br />             <br />  <br />             

 
             
             <div>   
            <p1><textarea name="comment" style="width:90%;height:46px; text-align:center; font-family:'Arial Black', Gadget, sans-serif  ;" disabled="disabled" > Data Cadastro:  <?php echo $retdata ?>   ID  :  <?php echo $retID ?>   Ip  : <?php echo $retip ?>            </textarea></p1>
           </div>
           <br>
            <div>
            </div>
              <div id="container">
<center>
                <input type='button'  value='Voltar' onclick='history.go(-1)'/>
                <button><a target="_blank" href='index.php'>Inicio!</a> </button>
                <button class="botao submit" type="submit" name="submit">Alterar</button>
               
 </center>
 <p  style="text-align:right; font-size:8px;color: blue "    >1331</p>              
</div>             
             </form>	
          <?php	
		 }
		 else{  // retorno de varios registros //
           echo" <h1> <P align='center'> " ;
		   echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#0000FF' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo $retorno_check."   registros encontrados na busca por :  ".$tipo."      ".$recebe."      < 1349>       <br>";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h1> </P>";
	?>
		<table class="table table-striped table-bordered table-hover"  style="font-family:'Lucida Console', Monaco, monospace" >
	      <thead style="font-size:20px ">
	       <tr>
		    <th>  </th>
            <th>ID</th>
		    <th>Equipamento</th>
		    <th>Secretaria</th>
            <th>Patrimonio</th>
            <th>Localizaçao</th>
            </tr>
	   </thead>
	<?php
			 while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['nome'];
				  $retID  = $row['id'];
		          $retsec = $row['sec'];
				  $retsecretaria = $row['secretaria'];				   // obtencao da credencial 
				  $retsec =$row['sec'];				   // obtencao da credencial 
				  $retlocal = $row['local'];
                  $retdata = $row['data'];
		          $retpatrimonio = $row['patrimonio'];
                    $tipo =  $row['equip_tipo'];
					if ($tipo=='DESKTOP')
						 {
							$caminho='img/pc.jpg';
						    $titulo = 'DESKTOP';
						 }
					 else {
	    		         if ($tipo=='NOTEBOOK')
			   				{		
								$caminho='img/note.jpg';
							    $titulo = 'NOTEBOOK';
							}
					   else{
			    			$caminho='img/tablet.jpg';
						    $titulo = 'TABLET';
					   }
					 }
		 
		 ?>
	 	 <tbody style="font-size:16px">
		 	     <tr>
				  <td>  <a href= "consultaRet2.php?RadioOption=SistID&parametro=<?php echo $row['id'];?>">    <img src=<?php echo $caminho; ?> BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = <?php echo $tipo; ?> longdesc='Equipamento' /> </a>  </th>		  
				  <td><?php echo $row['id']; ?></td>  
                    <td><?php echo $row['nome']; ?></td>
					<td><?php echo $row['sec']; ?></td>
				    <td><?php echo $row['patrimonio']; ?></td>
                    <td><?php echo $row['local']; ?></td>
                
		 <?php
		       }
      echo " </tr>";
     ?>
	 </tbody>
	</table>
	  <?php
     }
	}
     }
	   }
	     }// fim de consulta com base em equipamentos
	       { // sobre infraestrutura
		    if(( !$tipo=='') and($tipo=='SecInfra'))  //Departamento em Infa 
		   {
              $recebeStatus="1";
             // rotina para acessar a base de dados 
              if($recebe <>"")
              {
                    $sql = $parametroSQL;
//                     $sql =  "SELECT * FROM tbinfra where i_depto LIKE '%".$recebe."%'";//  and status LIKE '%".$recebeStatus."%'
                  $result = mysqli_query($conn, $sql);
                $retorno_check = mysqli_num_rows($result);
                 if($retorno_check == 0)
				     {
       	               echo"<h2> <P align='center'>" ;
		  echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#990000' style='background-color:' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo "   Nenhuma  Infraestrutura encontrada  na busca por :  ".$tipo."      ".$recebe."         <1423>  <br>  ";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h2> </P>";
           echo "<form>";
           echo  "<input type='button' value='Voltar' onClick='JavaScript: window.history.back();'>";
           echo "</form>";

					 } // fim de retorno 0
				 else{
					 if($retorno_check == 1)
					    {  // unico registro
                    echo"<h2> <P align='center'>" ;
		  echo "<font Face='Georgia, Times New Roman, Times, serif'  size='2' color='#000' style='background-color:' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo "   Somente 1 Infraestrutura  encontrado  na busca por :  ".$tipo."      ".$recebe."         <1438>  <br>  ";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h2> </P>";
           echo "<form >";
          // echo  "<input type='button' value='Visualizar Registros ' onClick='JavaScript: window.history.back();'>";
          ?>
		   <table class="table table-striped table-bordered table-hover"  style="font-family:'Lucida Console', Monaco, monospace" >
	       <thead style="font-size:20px ">
	       <tr>
		    <th>  </th>
            <th>ID</th>
		    <th>Local</th>
		    <th>Secretaria</th>
           </tr>
	     </thead>
        	<?php
			 while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['I_depto'];
				  $retID  = $row['I_id'];
		          $retsec = $row['I_sec_cod'];
				 ?>
	 	      <tbody style="font-size:16px">
		 	    <tr>
					<td> <a href='consultaRet2.php?RadioOption=LocalID$buscar=&secretaria=VAZIO&dep=&group=on&parametro=<?php echo $retID; ?>'> Ver </a>   </td>
                    <th><?php echo $retID; ?></th>  
                    <td><?php echo $retnome; ?></td>
					<td><?php echo $retsec; ?></td>
                
		      <?php
		        }
             echo " </tr>";
            ?>
	       </tbody>
       	</table>
		      <?php
           echo "</form>";      
	    }// fim de retorno 1
		 else{ // retorno de multiplos
		 echo" <h1> <P align='center'> " ;
		   echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#0000FF' >   ";
		  echo "--------------------------------------------------------------------------------------------------------<br>";
		  echo $retorno_check."   registros encontrados na busca por :  ".$tipo."      ".$recebe."          <1480>      <br>";
          echo "--------------------------------------------------------------------------------------------------------<br>";
          echo "</font>";
		  echo "</h1> </P>";
	?>
		<table class="table table-striped table-bordered table-hover"  style="font-family:'Lucida Console', Monaco, monospace" >
	      <thead style="font-size:20px ">
	       <tr>
		    <th>  </th>
            <th>ID</th>
		    <th>Local</th>
		    <th>Secretaria</th>
            
            </tr>
	   </thead>
	<?php
			 while($row = mysqli_fetch_assoc($result))
			   {
                  $retnome = $row['I_depto'];
				  $retID  = $row['I_id'];
		          $retsec = $row['I_sec_cod'];
				 ?>
	 	 <tbody style="font-size:16px">
		 	     <tr>
					<td> <a href='consultaRet2.php?RadioOption=LocalID$buscar=&secretaria=VAZIO&dep=&group=on&infra=<?php echo $retID; ?>'> Ver </a> </td>
                    <th><?php echo $retID; ?></th>  
                    <td><?php echo $retnome; ?></td>
					<td><?php echo $retsec; ?></td>
                
		      <?php
		        }
             echo " </tr>";
     ?>
	 </tbody>
	</table>
	  <?php
		 }
				 }}
     //echo"fim de consulta em tipo 3 infra";			  
		   }
		   } // fim de consulta com base em Infra
			 }// fim de tipo_consulta 4
		 }// fim da consulta tipo 4
			     else{
                      //  echo  $recebe ;
           	          echo "<br> <br>";
            	      echo "Selecione uma Opção para o Relatorio ";
                      echo "<br> <br>";
                	  echo "Codigo de erro ".$tipo." / ".$rec." / ".$tipo_consulta. "         <1429>";
				 }
		  }
		  }
		 }
	   {
		}    
  
?>

</body>
</html>