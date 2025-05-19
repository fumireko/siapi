<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
  <?php
//  include "../validar_session.php";
  include "../Config/config_sistema.php";
  include "bco_fun.php";

  if (!empty($_POST['digito'])) { // algo ja foi selecionado 
      $ret_campo = $_POST['digito'];
      $sql = "SELECT * FROM tbsecretaria where sec_id =".$ret_campo." ";// where sec_nome LIKE '%" . $campo . "%' order by sec_nome"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
      $dados = mysqli_query($conn, $sql) or die(mysqli_error());
      $linha = mysqli_fetch_assoc($dados);
      $total = mysqli_num_rows($dados);
      if ($total == 0) {
          $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
          echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
      } else {
          if ($total > 0) {
              //   echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp  &nbsp&nbsp &nbsp&nbsp    ID  ".$ret_campo."    </strong>";               
              ?>                      
							<form method="post" enctype="multipart/form-data" action="ver_dados.php">    
							<input type="hidden" name="origem" size=50 value= "Sec_esp">
							<input type="hidden" name="opcao" size=50 value= "Sec_esp">
							<div class="container-fluid">
                              <div class="form-horizontal meuform">
                                <div class="form-group row">
                                  <div class="col-md-9">   
                                 <br /><br />
									  <label>  Nome da Secretaria  ( <?php echo $ret_campo ?> )  </label>
									   &nbsp &nbsp &nbsp	&nbsp										
										 
									
									  
									 
					            		<?php
                                    //	echo "  <select name='digitobusca' >";          						 
                                    //	echo "<option value='0'>  </option>";
                                    do {
                                        //  $linha = mysqli_fetch_assoc($dados);
                                        $retnome = $linha['sec_nome'];
                                        $retID = $linha['sec_id'];
                                        //$unidade = $nome_local;
                                        // $option .= "<option value = '" . $retID . "'>" . $retnome . "   </option>";
                                        $option = "  "  . $retnome . "   ";
                                        echo  "<b> ". $option ." </b> ";
                                    } while ($linha = mysqli_fetch_assoc($dados));
                                  
                                    ?>        
						          
                                          </div>
 				 			  
							 <br /> &nbsp &nbsp &nbsp	&nbsp	
						   	<label>Lista de Departamentos associados  </label>		<br /><br />
<?php
       $sqlD = "SELECT * FROM tbcmei where tbcmei_sec_id =".$ret_campo." order by tbcmei_nome ";// where sec_nome LIKE '%" . $campo . "%' order by sec_nome"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
      $dadosD = mysqli_query($conn, $sqlD) or die(mysqli_error());
      $linhaD = mysqli_fetch_assoc($dadosD);
      $totalD = mysqli_num_rows($dadosD);
      if ($totalD == 0) {
          $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
          echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
      } else
        {
          if ($totalD > 0)
            {
                         do {
                               //  $linha = mysqli_fetch_assoc($dados);
                                $retnome = $linhaD['tbcmei_nome'];
                                $retID = $linhaD['tbcmei_id'];
                                $option = " ( " . $retID . " )       " . $retnome . "   [   ".  conta_equip_by_cmei_id($retID,$conn)."  ]" ;
                                echo $option;
                                    echo "<br>";
                            } while ($linhaD = mysqli_fetch_assoc($dadosD));
                          ?>        
					    <br /> &nbsp &nbsp &nbsp	&nbsp	
						
						
							<br />				
							<?php
            }
        }
      ?>
							</div>
								</div>
							  </div>	 
							<br />				
							<?php
          }
      }
      // nova consulta 

        $sql = "SELECT * FROM tbsecretaria ";// where sec_nome LIKE '%" . $campo . "%' order by sec_nome"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
      $dados = mysqli_query($conn, $sql) or die(mysqli_error());
      $linha = mysqli_fetch_assoc($dados);
      $total = mysqli_num_rows($dados);
      if ($total == 0) {
          $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
          echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
      } else {
          if ($total > 0) {
              //   echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp  &nbsp&nbsp &nbsp&nbsp    ID  ".$ret_campo."    </strong>";               
              ?>                      
							<form method="post" enctype="multipart/form-data" action="ver_dados.php">    
							<input type="hidden" name="origem" size=50 value= "Sec_esp">
							<input type="hidden" name="opcao" size=50 value= "Sec_esp">
							<div class="container-fluid">
                              <div class="form-horizontal meuform">
                                <div class="form-group row">
                                  <div class="col-md-9">   
                                 <br /><br />
									   <label>  Nova Consulta </label> <br /><br />
                                      <label>  Selecione o Nome da Secretaria </label>
									   &nbsp &nbsp &nbsp	&nbsp										
										  <select name='digito' id='digito'>
									  	  <option value='0'>  </option>
									<?php
                                    //	echo "  <select name='digitobusca' >";          						 
                                    //	echo "<option value='0'>  </option>";
                                    do {
                                        //  $linha = mysqli_fetch_assoc($dados);
                                        $retnome = $linha['sec_nome'];
                                        $retID = $linha['sec_id'];
                                        //$unidade = $nome_local;
                                        // $option .= "<option value = '" . $retID . "'>" . $retnome . "   </option>";
                                        $option = "<option value = '" . $retID . "'>" . $retnome . "   </option>";
                                        echo $option;
                                    } while ($linha = mysqli_fetch_assoc($dados));
                                    echo "</select> ";
                                    ?>        
						            </div>
 				 			  
							 <br /> &nbsp &nbsp &nbsp	&nbsp	
						   				<button class="button-48" type="submit"  role="button"><span class="text">Nova Consulta </span></button>
							</div>
								</div>
							  </div>	 
							 
							 
						
							<br />				
							<?php
          }
      }
 // }					 

  } else {
      $ret_campo = "0";
      $sql = "SELECT * FROM tbsecretaria ";// where sec_nome LIKE '%" . $campo . "%' order by sec_nome"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
      $dados = mysqli_query($conn, $sql) or die(mysqli_error());
      $linha = mysqli_fetch_assoc($dados);
      $total = mysqli_num_rows($dados);
      if ($total == 0) {
          $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
          echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
      } else {
          if ($total > 0) {
              //   echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp  &nbsp&nbsp &nbsp&nbsp    ID  ".$ret_campo."    </strong>";               
              ?>                      
							<form method="post" enctype="multipart/form-data" action="ver_dados.php">    
							<input type="hidden" name="origem" size=50 value= "Sec_esp">
							<input type="hidden" name="opcao" size=50 value= "Sec_esp">
							<div class="container-fluid">
                              <div class="form-horizontal meuform">
                                <div class="form-group row">
                                  <div class="col-md-9">   
                                 <br /><br />
									  <label>  Selecione o Nome da Secretaria </label>
									   &nbsp &nbsp &nbsp	&nbsp										
										  <select name='digito' id='digito'>
									  	  <option value='0'>  </option>
									<?php
                                    //	echo "  <select name='digitobusca' >";          						 
                                    //	echo "<option value='0'>  </option>";
                                    do {
                                        //  $linha = mysqli_fetch_assoc($dados);
                                        $retnome = $linha['sec_nome'];
                                        $retID = $linha['sec_id'];
                                        //$unidade = $nome_local;
                                        // $option .= "<option value = '" . $retID . "'>" . $retnome . "   </option>";
                                        $option = "<option value = '" . $retID . "'>" . $retnome . "   </option>";
                                        echo $option;
                                    } while ($linha = mysqli_fetch_assoc($dados));
                                    echo "</select> ";
                                    ?>        
						            </div>
 				 			  
							 <br /> &nbsp &nbsp &nbsp	&nbsp	
						   				<button class="button-48" type="submit"  role="button"><span class="text">Consulta </span></button>
							</div>
								</div>
							  </div>	 
							 
							 
						
							<br />				
							<?php
          }
      }
  }					 
		
?>

 

	
</body>
</html>