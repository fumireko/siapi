<?php
//include "../validar_session.php";  
include "../Config/config_sistema.php";
include "conn2.php";

include "bco_fun.php";
if (!isset($_SESSION)){
    session_start();
}
$tbequip_id = $_GET['tbequip_id'];

$sql = "SELECT * from tb_diversos where id = '".$tbequip_id."' ORDER BY id";
//$qr = mysql_query($sql) or die(mysql_error());
$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
 $total = mysqli_num_rows($qr);
if ($total == 0) {
    echo "Registro não localizado  " . $tbequip_id;
} else {

    while ($ln = mysqli_fetch_assoc($qr)) {
         $unidade_id = $ln['local_cod'];
        // $nomeunidade = $ln['tbcmei_nome'];
        $codequip = $ln['id'];
        $ctrl_ti = $ln['ctrl_ti'];
        // $dtlan = $ln['tbequi_datalanc'];
        //$datalanc = implode("/",array_reverse(explode("-",$dtlan)));

        //}
        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="author" content="Admin" />
        <title>SMTI - Sistema de Gestao T.I</title>
         
    </head>
    <!-- BEGIN BODY -->
    <body>
         <!-- START TOPBAR -->
        <?php
        include "index.php"
            ?> 
        <div id="main-content">
        <section class="wrapper main-wrapper">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
        <div class="pull-left">
            <h1 class="title">Sistema de Gestao T.I</h1>
        </div>
    </div>
    </div>
     <div class="clearfix"></div>
    <section class="box ">
    <header class="panel_header">
            <h2 class="title pull-left">Alterando lOCAL  do equipamento Controle T.I   <?php echo $ln['ctrl_ti'] ?> </h2> <i> COD  <?php echo $codequip; ?> </i> 
            <div class="form-group  col-md-6">
            </div>
            <div class="actions panel_actions pull-right">
                 <a href='./listaequip.php' class='btn btn-primary'>Voltar</a>
                 <i class="box_toggle fa fa-chevron-down"></i>
                 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                 <i class="box_close fa fa-times"></i>
            </div>
     </header>
    <form class="form-horizontal" method="POST" id="sdev" action="smudaequipd.php">
    <fieldset>
            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
            role="alert">Solicitacao feita com sucesso!</div>
            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
            role="alert">Erro ao realizar a solicitacao!</div>
        
       


        <!-- CAMPOS OCULTOS PARA INSERÇÃO DE DADOS-->
            <input id="codequip" name="codequip" type="text" value="<?php echo $codequip; ?>" hidden>
            <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome; ?>" hidden>
            <input id="nomeunidade" name="nomeunidade" type="text" value="<?php echo $nomeunidade; ?>" hidden>
            <input id="loc_id" name="loc_id" type="text" value="<?php echo $unidade_id; ?>" hidden>
            <input id="ctrl_ti" name="ctrl_ti" type="text" value="<?php echo $ln['ctrl_ti']; ?>" hidden>
            <!-- FIM DOS CAMPOS CULTOS PARA INSERÇÃO DE DADOS-->
           
        <br/>
          <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Controle Interno: </label>
              <div class="col-md-4">
                   <input  name="tipo_equip" id="tipo_equip" type="text" value = "<?php echo " Local :" . $ln['local_cod'] . "  Sec: " . $ln['sec_cod'] . "  CTI :  " . $ln['ctrl_ti'] . "    tabela :  " . $ln['id']; ?>"
                    placeholder="Desktop , Notebook , Tablet , Servidor ou Outros" class="form-control input-md"  readonly> 
               </div>
                    </div>
    
        
        
        <div class="form-group">
            <label class="col-md-4 control-label" for="objeto">Unidade:</label>
            <div class="col-md-4">
            <input  name="nsolicitante" id="nsolicitante" type="text" value = "<?php echo nomedolocal($conn, $ln['local_cod']); ?>"
            placeholder="Nome do solicitante" class="form-control input-md"required disabled>
            </div>
                  </div>
        <center> <i>   
                   </i></center>     
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Descrição do Objeto: </label>
                    <div class="col-md-4">
                       <input  name="descricao_equip" id="descricao_equip" type="text" title="Digite o Nome do Responsavel"  value = "<?php echo $ln['descricao']; ?>"
                    placeholder="<?php echo $prov_resp; ?>"   class="form-control input-md" readonly > 
                    </div>
                    </div>              
      
        <?php
         $ret_cod_desc= $ln['descricao_cod'];
         switch ($ret_cod_desc)  // 1 -> Patch Panel  2 ->  Rack   3 ->  Switch   4 -> TV 
		{
			case '0':
			{
                echo " NENHUM RETORNO";
                break; 
			}
            case '1':
            { // pach panel
                ?>
                                    <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
                                              <div class="col-md-4">
                                                   <input  name="descricao_cod" id="descricao_cod" type="text" value = "<?php echo $ln['descricao_cod']; ?>"
                                                    placeholder="Monitor " class="form-control input-md" readonly > 
                                               </div>
                                                    </div>

                                        <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Marca: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_marca"  type="text" value = "<?php echo $ln['marca']; ?>"
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
             
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_plaqueta"  type="text" value = "<?php echo $ln['patrimonio']; ?>"
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div



                                                     <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Rede: </label>
                                              <div class="col-md-4">
                                                   <input  name="rede"  type="text" value = "<?php echo $ln['rede']; ?>"
                                                    placeholder="Monitor" class="form-control input-md"> 
                                               </div>
                                                    </div>
              
                                                <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tipo: </label>
                                              <div class="col-md-4">
                                                   <input  name="tipo"  type="text" value = "<?php echo $ln['tipo']; ?>"
                                                    placeholder="Monitor" class="form-control input-md"> 
                                               </div>
                                                    </div>
                                          <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Portas: </label>
                                              <div class="col-md-4">
                                                   <input  name="portas"  type="text" value = "<?php echo $ln['portas']; ?>"
                                                    placeholder="Monitor" class="form-control input-md"> 
                                               </div>
                                                    </div>
              




    
                                               <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Responsavel : </label>
                                              <div class="col-md-4">
                                                   <input  name="resp"  id="resp"  type="text" value = "<?php echo $ln['resp']; ?>"
                                                     placeholder="VGA , HDMI , DVI , DISPLAY PORT"   class="form-control input-md"> 
                                               </div>
                                                    </div>
         
                                             <!-- Text input-->
                                            <div class="form-group">
                                                  <label class="col-md-4 control-label" for="telefone"> </label>
                                             <i>  <label class="col-md-4 control-label" for="telefone">Cadastrado por : <?php echo $ln['usuario'] . "   em  " . $ln['dt_cad']; ?>  </label> </i>
                                              
                                                    </div>
                
   
                                                    </div>
                                                    </div>

                                            <!-- Text input-->
                                 <div class="form-group">
                                        <label class="col-md-4 control-label" for="telefone">Nova unidade: : </label>
                                        <div class="col-md-4">
                                              <select class="form-control m-bot15" name="novaunidade_id">
	                                          <option value="">Geral</option>
		                                          <?php
                                                  $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
                                                  $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                  while ($row = mysqli_fetch_array($resultado)) {
                                                      $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome']) ? 'selected' : '';
                                                      ?>
                                              <option value="<?php echo $row['tbcmei_id']; ?>"<?php echo $selected; ?>>
                                               <?php echo $row['tbcmei_nome']; ?></option>
                                               <?php
                                                  }
                                                  ?>
                                         </select>
                                        </div>
                                 </div>
             
                                                  <!-- Button -->
                                                       <div class="form-group">
                                                         <div align="center"><input type="submit" value="ALTERAR LOCAL" name="salvar" class="btn btn-primary" /></div>
                                                        </div>
                                                        
                                    
        
        </div>
                                                       </fieldset>
                                                       </form>    
                                                          </section> 
                                                    </section>   
                                                    </div>
                                                    </body>

                                                    </html>

    
             <?php



                   break; 
            }
            case '2':
			{ // rack
                ?>
                                    <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
                                              <div class="col-md-4">
                                                   <input  name="descricao_cod" id="descricao_cod" type="text" value = "<?php echo $ln['descricao_cod']; ?>"
                                                    placeholder="Monitor " class="form-control input-md" readonly > 
                                               </div>
                                                    </div>

                                      
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_plaqueta"  type="text" value = "<?php echo $ln['patrimonio']; ?>"
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div



                                                     <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tamanho: </label>
                                              <div class="col-md-4">
                                                   <input  name="mon_tam"  type="text" value = "<?php echo $ln['tam']; ?>"
                                                    placeholder="Monitor" class="form-control input-md"> 
                                               </div>
                                                    </div>
              
                                                <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Posição: </label>
                                              <div class="col-md-4">
                                                   <input  name="posicao"  type="text" value = "<?php echo $ln['posicao']; ?>"
                                                    placeholder="Monitor" class="form-control input-md"> 
                                               </div>
                                                    </div>
                                            <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Localização: </label>
                                                    <div class="col-md-4">
                                                   <input  name="localizacao"  type="text" value = "<?php echo $ln['localizacao']; ?>"
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
                                                   
                                          <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Componentes: </label>
                                              <div class="col-md-4">
                                                   <input  name="comps"  type="text" value = "<?php echo $ln['comps']; ?>"
                                                    placeholder="Monitor" class="form-control input-md"> 
                                               </div>
                                                    </div>
                                          <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Responsavel : </label>
                                              <div class="col-md-4">
                                                   <input  name="resp"  id="resp"  type="text" value = "<?php echo $ln['resp']; ?>"
                                                     placeholder="VGA , HDMI , DVI , DISPLAY PORT"   class="form-control input-md"> 
                                               </div>
                                                    </div>
         
                                             <!-- Text input-->
                                            <div class="form-group">
                                                  <label class="col-md-4 control-label" for="telefone"> </label>
                                             <i>  <label class="col-md-4 control-label" for="telefone">Cadastrado por : <?php echo $ln['usuario'] . "   em  " . $ln['dt_cad']; ?>  </label> </i>
                                              
                                                    </div>
                
   
                                                    </div>
                                                    </div>

                                                                                   <!-- Text input-->
                                 <div class="form-group">
                                        <label class="col-md-4 control-label" for="telefone">Nova unidade: : </label>
                                        <div class="col-md-4">
                                              <select class="form-control m-bot15" name="novaunidade_id">
	                                          <option value="">Geral</option>
		                                          <?php
                                                  $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
                                                  $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                  while ($row = mysqli_fetch_array($resultado)) {
                                                      $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome']) ? 'selected' : '';
                                                      ?>
                                              <option value="<?php echo $row['tbcmei_id']; ?>"<?php echo $selected; ?>>
                                               <?php echo $row['tbcmei_nome']; ?></option>
                                               <?php
                                                  }
                                                  ?>
                                         </select>
                                        </div>
                                 </div>
             
                                                  <!-- Button -->
                                                       <div class="form-group">
                                                         <div align="center"><input type="submit" value="ALTERAR LOCAL" name="salvar" class="btn btn-primary" /></div>
                                                        </div>
                                                        
         </div>
                                                       </fieldset>
                                                       </form>    
                                                          </section> 
                                                    </section>   
                                                    </div>
                                                    </body>

                                                    </html>
    
             <?php
                   break; 
			}
            case '3':
            { //switch
                ?>
                                    <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
                                              <div class="col-md-4">
                                                   <input  name="descricao_cod" id="descricao_cod" type="text" value = "<?php echo $ln['descricao_cod']; ?>"
                                                    placeholder="Monitor " class="form-control input-md" readonly > 
                                               </div>
                                                    </div>

                                        <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Marca: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_marca"  type="text" value = "<?php echo $ln['marca']; ?>"
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
             
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_plaqueta"  type="text" value = "<?php echo $ln['patrimonio']; ?>"
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div



                                                     <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">ip: </label>
                                              <div class="col-md-4">
                                                   <input  name="ip"  type="text" value = "<?php echo $ln['ip']; ?>"
                                                    placeholder="IP" class="form-control input-md"> 
                                               </div>
                                                    </div>
              

    
                                               <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Gerenciavel : </label>
                                              <div class="col-md-4">
                                                   <input  name="gerenciavel"  id="gerenciavel"  type="text" value = "<?php echo $ln['gerenciavel']; ?>"
                                                     placeholder="sim ou nao "   class="form-control input-md"> 
                                               </div>
                                                    </div>
         
                                              <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">POE : </label>
                                              <div class="col-md-4">
                                                   <input  name="poe"  id="poe"  type="text" value = "<?php echo $ln['poe']; ?>"
                                                     placeholder="POE"   class="form-control input-md"> 
                                               </div>
                                                    </div>
         




                                                <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Portas em Uso : </label>
                                              <div class="col-md-4">
                                                   <input  name="por_util"  id="por_util"  type="text" value = "<?php echo $ln['por_util']; ?>"
                                                     placeholder=" PORT"   class="form-control input-md"> 
                                               </div>
                                                    </div>
         
                                                <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Portas Livres : </label>
                                              <div class="col-md-4">
                                                   <input  name="por_disp"  id="por_disp"  type="text" value = "<?php echo $ln['por_disp']; ?>"
                                                     placeholder=" PORT"   class="form-control input-md"> 
                                               </div>
                                                    </div>
         
                                                <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Portas Total : </label>
                                              <div class="col-md-4">
                                                   <input  name="por_tot"  id="por_tot"  type="text" value = "<?php echo $ln['por_total']; ?>"
                                                     placeholder=" PORT"   class="form-control input-md"> 
                                               </div>
                                                    </div>
         
                                             <!-- Text input-->
                                            <div class="form-group">
                                                  <label class="col-md-4 control-label" for="telefone"> </label>
                                             <i>  <label class="col-md-4 control-label" for="telefone">Cadastrado por : <?php echo $ln['usuario'] . "   em  " . $ln['dt_cad']; ?>  </label> </i>
                                              
                                                    </div>
            
                                                    </div>
                                                    </div>

                                    <!-- Text input-->
                                 <div class="form-group">
                                        <label class="col-md-4 control-label" for="telefone">Nova unidade: : </label>
                                        <div class="col-md-4">
                                              <select class="form-control m-bot15" name="novaunidade_id">
	                                          <option value="">Geral</option>
		                                          <?php
                                                  $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
                                                  $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                  while ($row = mysqli_fetch_array($resultado)) {
                                                      $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome']) ? 'selected' : '';
                                                      ?>
                                              <option value="<?php echo $row['tbcmei_id']; ?>"<?php echo $selected; ?>>
                                               <?php echo $row['tbcmei_nome']; ?></option>
                                               <?php
                                                  }
                                                  ?>
                                         </select>
                                        </div>
                                 </div>
             
                                                  <!-- Button -->
                                                       <div class="form-group">
                                                         <div align="center"><input type="submit" value="ALTERAR LOCAL" name="salvar" class="btn btn-primary" /></div>
                                                        </div>
                                                        
                                               


         </div>
                                                       </fieldset>
                                                       </form>    
                                                          </section> 
                                                    </section>   
                                                    </div>
                                                    </body>

                                                    </html>

    
             <?php

                   break; 
            }
            case '4':
            { // tv
                ?>
                                    <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
                                              <div class="col-md-4">
                                                   <input  name="descricao_cod" id="descricao_cod" type="text" value = "<?php echo $ln['descricao_cod']; ?>"
                                                    placeholder="Monitor " class="form-control input-md" readonly > 
                                               </div>
                                                    </div>

                                        <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Marca: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_marca"  type="text" value = "<?php echo $ln['marca']; ?> " readonly
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
             
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_plaqueta"  type="text" value = "<?php echo $ln['patrimonio']; ?>"
                                                     class="form-control input-md"  readonly > 
                                                    </div>
                                                    </div



                                                     <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tamanho: </label>
                                              <div class="col-md-4">
                                                   <input  name="mon_tam"  type="text" value = "<?php echo $ln['tam']; ?>"
                                                    placeholder="Monitor" class="form-control input-md"  readonly > 
                                               </div>
                                                    </div>
              

    
                                               <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Responsavel : </label>
                                              <div class="col-md-4">
                                                   <input  name="resp"  id="resp"  type="text" value = "<?php echo $ln['resp']; ?>"
                                                     placeholder="VGA , HDMI , DVI , DISPLAY PORT"   class="form-control input-md" readonly > 
                                               </div>
                                                    </div>
         
                                             <!-- Text input-->
                                            <div class="form-group">
                                                  <label class="col-md-4 control-label" for="telefone"> </label>
                                             <i>  <label class="col-md-4 control-label" for="telefone">Cadastrado por : <?php echo $ln['usuario']."   em  ". $ln['dt_cad']; ?>  </label> </i>
                                              
                                                    </div>
                
                                    <!-- Text input-->
                                 <div class="form-group">
                                        <label class="col-md-4 control-label" for="telefone">Nova unidade: : </label>
                                        <div class="col-md-4">
                                              <select class="form-control m-bot15" name="novaunidade_id">
	                                          <option value="">Geral</option>
		                                          <?php
                                                  $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
                                                  $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                  while ($row = mysqli_fetch_array($resultado)) {
                                                      $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome']) ? 'selected' : '';
                                                      ?>
                                              <option value="<?php echo $row['tbcmei_id']; ?>"<?php echo $selected; ?>>
                                               <?php echo $row['tbcmei_nome']; ?></option>
                                               <?php
                                                  }
                                                  ?>
                                         </select>
                                        </div>
                                 </div>
             
                                                  <!-- Button -->
                                                       <div class="form-group">
                                                         <div align="center"><input type="submit" value="ALTERAR LOCAL" name="salvar" class="btn btn-primary" /></div>
                                                        </div>
                                                        



   
                                                    </div>
                                                    </div>

                                                     
                                                       </fieldset>
                                                       </form>    
                                                          </section> 
                                                    </section>   
                                                    </div>
                                                    </body>

                                                    </html>

    
             <?php            
                
                break; 
            }
            case '5': {
                ?>
                                    <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
                                              <div class="col-md-4">
                                                   <input  name="descricao_cod" id="descricao_cod" type="text" value = "<?php echo $ln['descricao_cod']; ?>"
                                                    placeholder="Monitor " class="form-control input-md" readonly > 
                                               </div>
                                                    </div>

                                        <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Marca: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_marca"  type="text" value = "<?php echo $ln['marca']; ?>"
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
             
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_plaqueta"  type="text" value = "<?php echo $ln['patrimonio']; ?>"
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div



                                                     <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Componentes: </label>
                                              <div class="col-md-4">
                                                   <input  name="mon_tam"  type="text" value = "<?php echo $ln['comps']; ?>"
                                                    placeholder="Monitor" class="form-control input-md"> 
                                               </div>
                                                    </div>
              
         
                                             <!-- Text input-->
                                            <div class="form-group">
                                                  <label class="col-md-4 control-label" for="telefone"> </label>
                                             <i>  <label class="col-md-4 control-label" for="telefone">Cadastrado por : <?php echo $ln['usuario'] . "   em  " . $ln['dt_cad']; ?>  </label> </i>
                                              
                                                    </div>
                
   
                                                    </div>
                                                    </div>


                                    <!-- Text input-->
                                 <div class="form-group">
                                        <label class="col-md-4 control-label" for="telefone">Nova unidade: : </label>
                                        <div class="col-md-4">
                                              <select class="form-control m-bot15" name="novaunidade_id">
	                                          <option value="">Geral</option>
		                                          <?php
                                                  $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
                                                  $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                  while ($row = mysqli_fetch_array($resultado)) {
                                                      $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome']) ? 'selected' : '';
                                                      ?>
                                              <option value="<?php echo $row['tbcmei_id']; ?>"<?php echo $selected; ?>>
                                               <?php echo $row['tbcmei_nome']; ?></option>
                                               <?php
                                                  }
                                                  ?>
                                         </select>
                                        </div>
                                 </div>
             
                                                  <!-- Button -->
                                                       <div class="form-group">
                                                         <div align="center"><input type="submit" value="ALTERAR LOCAL" name="salvar" class="btn btn-primary" /></div>
                                                        </div>
                                                        



                                                        </div>
                                                       </fieldset>
                                                       </form>    
                                                          </section> 
                                                    </section>   
                                                    </div>
                                                    </body>

                                                    </html>

    
             <?php

                   break;
            }
            case '6': { // 
                ?>
                                    <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
                                              <div class="col-md-4">
                                                   <input  name="descricao_cod" id="descricao_cod" type="text" value = "<?php echo $ln['descricao_cod']; ?>"
                                                    placeholder="Monitor " class="form-control input-md" readonly > 
                                               </div>
                                                    </div>

                                        <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Marca: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_marca"  type="text" value = "<?php echo $ln['marca']; ?> " readonly
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
             
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_plaqueta"  type="text" value = "<?php echo $ln['patrimonio']; ?>"
                                                     class="form-control input-md"  readonly > 
                                                    </div>
                                                    </div



                                          
                                             <!-- Text input-->
                                            <div class="form-group">
                                                  <label class="col-md-4 control-label" for="telefone"> </label>
                                             <i>  <label class="col-md-4 control-label" for="telefone">Cadastrado por : <?php echo $ln['usuario'] . "   em  " . $ln['dt_cad']; ?>  </label> </i>
                                              
                                                    </div>
                
                                    <!-- Text input-->
                                 <div class="form-group">
                                        <label class="col-md-4 control-label" for="telefone">Nova unidade: : </label>
                                        <div class="col-md-4">
                                              <select class="form-control m-bot15" name="novaunidade_id">
	                                          <option value="">Geral</option>
		                                          <?php
                                                  $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
                                                  $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                  while ($row = mysqli_fetch_array($resultado)) {
                                                      $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome']) ? 'selected' : '';
                                                      ?>
                                              <option value="<?php echo $row['tbcmei_id']; ?>"<?php echo $selected; ?>>
                                               <?php echo $row['tbcmei_nome']; ?></option>
                                               <?php
                                                  }
                                                  ?>
                                         </select>
                                        </div>
                                 </div>
             
                                                  <!-- Button -->
                                                       <div class="form-group">
                                                         <div align="center"><input type="submit" value="ALTERAR LOCAL" name="salvar" class="btn btn-primary" /></div>
                                                        </div>
                                                        



   
                                                    </div>
                                                    </div>

                                                     
                                                       </fieldset>
                                                       </form>    
                                                          </section> 
                                                    </section>   
                                                    </div>
                                                    </body>

                                                    </html>

    
             <?php

                   break;
            }

            case '7': { // 
                ?>
                                    <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
                                              <div class="col-md-4">
                                                   <input  name="descricao_cod" id="descricao_cod" type="text" value = "<?php echo $ln['descricao_cod']; ?>"
                                                    placeholder="Monitor " class="form-control input-md" readonly > 
                                               </div>
                                                    </div>

                                        <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Marca: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_marca"  type="text" value = "<?php echo $ln['marca']; ?> " readonly
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
             
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_plaqueta"  type="text" value = "<?php echo $ln['patrimonio']; ?>"
                                                     class="form-control input-md"  readonly > 
                                                    </div>
                                                    </div



                                          
                                             <!-- Text input-->
                                            <div class="form-group">
                                                  <label class="col-md-4 control-label" for="telefone"> </label>
                                             <i>  <label class="col-md-4 control-label" for="telefone">Cadastrado por : <?php echo $ln['usuario'] . "   em  " . $ln['dt_cad']; ?>  </label> </i>
                                              
                                                    </div>
                
                                    <!-- Text input-->
                                 <div class="form-group">
                                        <label class="col-md-4 control-label" for="telefone">Nova unidade: : </label>
                                        <div class="col-md-4">
                                              <select class="form-control m-bot15" name="novaunidade_id">
	                                          <option value="">Geral</option>
		                                          <?php
                                                  $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
                                                  $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                  while ($row = mysqli_fetch_array($resultado)) {
                                                      $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome']) ? 'selected' : '';
                                                      ?>
                                              <option value="<?php echo $row['tbcmei_id']; ?>"<?php echo $selected; ?>>
                                               <?php echo $row['tbcmei_nome']; ?></option>
                                               <?php
                                                  }
                                                  ?>
                                         </select>
                                        </div>
                                 </div>
             
                                                  <!-- Button -->
                                                       <div class="form-group">
                                                         <div align="center"><input type="submit" value="ALTERAR LOCAL" name="salvar" class="btn btn-primary" /></div>
                                                        </div>
                                                        



   
                                                    </div>
                                                    </div>

                                                     
                                                       </fieldset>
                                                       </form>    
                                                          </section> 
                                                    </section>   
                                                    </div>
                                                    </body>

                                                    </html>

    
             <?php

                   break;
            }
            case '8': { // 
                ?>
                                    <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
                                              <div class="col-md-4">
                                                   <input  name="descricao_cod" id="descricao_cod" type="text" value = "<?php echo $ln['descricao_cod']; ?>"
                                                    placeholder="Monitor " class="form-control input-md" readonly > 
                                               </div>
                                                    </div>

                                        <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Marca: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_marca"  type="text" value = "<?php echo $ln['marca']; ?> " readonly
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
             
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_plaqueta"  type="text" value = "<?php echo $ln['patrimonio']; ?>"
                                                     class="form-control input-md"  readonly > 
                                                    </div>
                                                    </div



                                          
                                             <!-- Text input-->
                                            <div class="form-group">
                                                  <label class="col-md-4 control-label" for="telefone"> </label>
                                             <i>  <label class="col-md-4 control-label" for="telefone">Cadastrado por : <?php echo $ln['usuario'] . "   em  " . $ln['dt_cad']; ?>  </label> </i>
                                              
                                                    </div>
                
                                    <!-- Text input-->
                                 <div class="form-group">
                                        <label class="col-md-4 control-label" for="telefone">Nova unidade: : </label>
                                        <div class="col-md-4">
                                              <select class="form-control m-bot15" name="novaunidade_id">
	                                          <option value="">Geral</option>
		                                          <?php
                                                  $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
                                                  $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                  while ($row = mysqli_fetch_array($resultado)) {
                                                      $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome']) ? 'selected' : '';
                                                      ?>
                                              <option value="<?php echo $row['tbcmei_id']; ?>"<?php echo $selected; ?>>
                                               <?php echo $row['tbcmei_nome']; ?></option>
                                               <?php
                                                  }
                                                  ?>
                                         </select>
                                        </div>
                                 </div>
             
                                                  <!-- Button -->
                                                       <div class="form-group">
                                                         <div align="center"><input type="submit" value="ALTERAR LOCAL" name="salvar" class="btn btn-primary" /></div>
                                                        </div>
                                                        



   
                                                    </div>
                                                    </div>

                                                     
                                                       </fieldset>
                                                       </form>    
                                                          </section> 
                                                    </section>   
                                                    </div>
                                                    </body>

                                                    </html>

    
             <?php

                   break;
            }






            case '9': { // controladaor wifi
                ?>
                                    <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="telefone">Tipo Equip.: </label>
                                              <div class="col-md-4">
                                                   <input  name="descricao_cod" id="descricao_cod" type="text" value = "<?php echo $ln['descricao_cod']; ?>"
                                                    placeholder="Monitor " class="form-control input-md" readonly > 
                                               </div>
                                                    </div>

                                        <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Marca: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_marca"  type="text" value = "<?php echo $ln['marca']; ?> " readonly
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
             
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Plaqueta: </label>
                                                    <div class="col-md-4">
                                                   <input  name="mon_plaqueta"  type="text" value = "<?php echo $ln['patrimonio']; ?>"
                                                     class="form-control input-md"  readonly > 
                                                    </div>
                                                    </div



                                          
                                             <!-- Text input-->
                                            <div class="form-group">
                                                  <label class="col-md-4 control-label" for="telefone"> </label>
                                             <i>  <label class="col-md-4 control-label" for="telefone">Cadastrado por : <?php echo $ln['usuario'] . "   em  " . $ln['dt_cad']; ?>  </label> </i>
                                              
                                                    </div>
                
                                    <!-- Text input-->
                                 <div class="form-group">
                                        <label class="col-md-4 control-label" for="telefone">Nova unidade: : </label>
                                        <div class="col-md-4">
                                              <select class="form-control m-bot15" name="novaunidade_id">
	                                          <option value="">Geral</option>
		                                          <?php
                                                  $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
                                                  $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                  while ($row = mysqli_fetch_array($resultado)) {
                                                      $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome']) ? 'selected' : '';
                                                      ?>
                                              <option value="<?php echo $row['tbcmei_id']; ?>"<?php echo $selected; ?>>
                                               <?php echo $row['tbcmei_nome']; ?></option>
                                               <?php
                                                  }
                                                  ?>
                                         </select>
                                        </div>
                                 </div>
             
                                                  <!-- Button -->
                                                       <div class="form-group">
                                                         <div align="center"><input type="submit" value="ALTERAR LOCAL" name="salvar" class="btn btn-primary" /></div>
                                                        </div>
                                                        



   
                                                    </div>
                                                    </div>

                                                     
                                                       </fieldset>
                                                       </form>    
                                                          </section> 
                                                    </section>   
                                                    </div>
                                                    </body>

                                                    </html>

    
             <?php

                   break;
            }



         }

    }
}

                 ?>
  