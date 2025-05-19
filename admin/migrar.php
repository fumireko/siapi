
<?php
   include "../Config/config_sistema.php";
   $consulta = mysql_query("SELECT * from tbdepto");
   while($linhas = mysql_fetch_object($consulta)) 
   {
    $id_sec = $linhas->est_id;
    $nome = $linhas->cid_nome;
   
    ?> 
    <html>
     <table>   
       <tr>  
        <td>
            Cod_sec
       </td> 
       <td>
            Nome
       </td>   
       <td>
          <?php echo $id_sec; ?>
       </td>
       <td>
          <?php echo $nome; ?>
       </td>
    </tr>
   </table>
    </html>
    <?php   
    
    } 
?>   
                              
                                         