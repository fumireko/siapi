<?php   
include("conn2.php");
if(isset($_GET['tipo']))
  {
   $param=$_GET ["tipo"];
  }
else
    $param = "geral";





if ($param =="finalizado" )
  {
                        $parametroSQL =  "SELECT * FROM tbldados where status='finalizado'  order by id_dados desc";  // where competencia like '%".$parametro."%' and complemento like '%".$complemento."%' and status=1 order by fatura";
                                                    $sql = $parametroSQL;
                                                    $result = mysqli_query($conn, $sql);
                                                     $retorno_check = mysqli_num_rows($result);
                                                     $row = mysqli_fetch_assoc($result);

                            //$sql=$mysqli->prepare('select id,servico,tags,proprietario from tbsac ORDER BY SERVICO');
                            //$sql=$mysqli->prepare('select id,fatura,competencia,valor,local from printer ORDER BY id desc');
                            //$sql->execute();
                            //$sql->bind_result($id,$fatura,$competencia,$valor,$local);
                        //<button type="button" name="Delete" Onclick="if(confirm('Tem certeza de que deseja marcar este Registro?')) deletar();" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i><i class="glyphicon glyphicon-remove-sign"></i></button>
                        ?>


                        <!DOCTYPE html>

                        <html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta charset="ISO-8895-1" />
                            <title></title>
                        <!-- Última versão CSS compilada e minificada -->
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                        <style type="text/css">
                        .colorir {background-color:#81BEF7;}
                        .linha { cursor:pointer}
                        .linha:hover { background-color:salmon;}
                        .red { color:red; }


                        }
                        </style>


                        </head>
                        <body>
                        <form method="post" enctype="multipart/form-data" action="sac_cad.php">
                           <input type="hidden" name="origem" size=50 value= "pre_chamado">
 
                        <button type="submit" name="Delete" Onclick="if(confirm('Tem certeza de que deseja Avaliar este Registro?')) ;" class="btn btn-primary"  title=" Clique aki para Avaliar o Atendimento  "  ><i class="glyphicon glyphicon-thumbs-up "></i></button>
                        &nbsp &nbsp <a href="sac_chamados.php?tipo=Pendente"> Chamados Pendentes </a>
                       &nbsp &nbsp <a href="sac_consulta2.php"> Avaliaçoes Realizadas </a>
                        <table class="table table-responsive table-striped table-bordered table-condensed table-hover"> 
                         <thead>
                           <tr> 
                           <th> </th>  
                           <th>Id</th>  
                           <th></th>  
                           <th>status</th>  
                           <th></th> 
                           <th>De</th>
                           <th>Assunto</th>
                           <th>Prob</th>
                           <th>Local</th> 
                           <th>Recebido</th>                
                           </tr>
                         </thead>
 
                           <tr>
                             <?php  
                               do{
                               $id_dados = $row["id_dados"];  
                               // if($nomede != $produto["De"]){  value="<?php echo $id_dados   <td><?php echo preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($row["tpservico"])));  ?>
      
                         <tbody>
                         <td><input type="checkbox" id="cod" name="cod" value="<?php echo $id_dados ?>"> </td>
                          <td> <?php echo $row["id_dados"]; ?></td>
                         <td> </td>
                          <td> <?php echo $row["status"]; ?></td>
                          <td> </td> 
                          <td><?php echo $row["nsolicitante"]; ?></td>
                          
                         <td><?php echo $row["tpservico"]; ?></td>
                         <td><?php echo $row["prob"]; ?></td> 
                            
                            <td><?php echo $row["telefone"]; ?></td>
                            <td><?php echo $row["data"]; ?></td>
                            </tr>
                        <?php  }while($row = mysqli_fetch_assoc($result));
 
                        ?>
                           </tbody>
                        </table>




                        </form>
                        </body>
                        </html>
<?php 
  }
   else
   { // busca zerada
            $parametroSQL =  "SELECT * FROM tbldados where status like '%Pendente%' order by id_dados desc";  // where competencia like '%".$parametro."%' and complemento like '%".$complemento."%' and status=1 order by fatura";
                            $sql = $parametroSQL;
                            $result = mysqli_query($conn, $sql);
                             $retorno_check = mysqli_num_rows($result);
                             $row = mysqli_fetch_assoc($result);

    //$sql=$mysqli->prepare('select id,servico,tags,proprietario from tbsac ORDER BY SERVICO');
    //$sql=$mysqli->prepare('select id,fatura,competencia,valor,local from printer ORDER BY id desc');
    //$sql->execute();
    //$sql->bind_result($id,$fatura,$competencia,$valor,$local);
//<button type="button" name="Delete" Onclick="if(confirm('Tem certeza de que deseja marcar este Registro?')) deletar();" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i><i class="glyphicon glyphicon-remove-sign"></i></button>
?>


<!DOCTYPE html>

<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
<!-- Última versão CSS compilada e minificada -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style type="text/css">
.colorir {background-color:#81BEF7;}
.linha { cursor:pointer}
.linha:hover { background-color:salmon;}
.red { color:red; }


}
</style>


</head>
<body>
<form method="post" enctype="multipart/form-data" action="sac_cad.php">
   <input type="hidden" name="origem" size=50 value= "pre_chamado">
 
          <button type="submit" name="Delete" Onclick="if(confirm('Tem certeza de que deseja Avaliar este Registro?')) ;" class="btn btn-primary"  title=" Clique aki para Avaliar o Atendimento  "  ><i class="glyphicon glyphicon-thumbs-up "></i></button>
     &nbsp &nbsp <a href="sac_chamados.php?tipo=Pendente" >Chamados Gerais </a> &nbsp &nbsp
    <a href="sac_chamados.php?tipo=finalizado" >Chamados Finalizados </a>
    &nbsp &nbsp <a href="sac_consulta2.php"> Avaliaçoes Realizadas </a>
<table class="table table-responsive table-striped table-bordered table-condensed table-hover"> 
 <thead>
   <tr> 
   <th> </th>  
   <th>Id</th>  
   <th></th>  
   <th>status</th>  
   <th></th> 
   <th>De</th>
   <th>Assunto</th>
   <th>Prob</th>
   <th>Local</th> 
   <th>Recebido</th>                
   </tr>
 </thead>
 
   <tr>
     <?php  
       do{
       $id_dados = $row["id_dados"];  
       // if($nomede != $produto["De"]){  value="<?php echo $id_dados ?>
      
 <tbody>
 <td><input type="checkbox" id="cod" name="cod" value="<?php echo $id_dados ?>"> </td>
  <td> <?php echo $row["id_dados"]; ?></td>
 <td> </td>
  <td> <?php echo $row["status"]; ?></td>
  <td> </td> 
  <td><?php echo $row["nsolicitante"]; ?></td>
  <dh></td> 
  <td><?php echo preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($row["tpservico"]))); ?></td> 
    <td><?php echo $row["prob"]; ?></td>
    <td><?php echo $row["telefone"]; ?></td>
    <td><?php echo $row["data"]; ?></td>
    </tr>
<?php  }while($row = mysqli_fetch_assoc($result));
//} 

} // fim 
?>
   </tbody>
</table>




</form>
</body>
</html>