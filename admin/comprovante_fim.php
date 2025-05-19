<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$id_solicitacao = $_POST['id_solicitacao'];

function toASCII( $str )
{
    return strtr(utf8_decode($str), 
        utf8_decode(
        'ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
        'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
}

$sql = ("UPDATE solicitacao_servicos SET fim = 'fim'  where id_solicitacao = '$id_solicitacao' ");
$consulta = mysql_query($sql);
///////Documentos  
if($_FILES) { // Verificando se existe o envio de arquivos.
	if($_FILES['arquivo']) { // Verifica se o campo não está vazio.
    $dir = 'upload/fim_obras/'; // Diretório que vai receber o arquivo.
    $text = $_FILES['arquivo']["name"]; // Recebe o nome do arquivo. 
    $name = toASCII( $text );

    if ($name !=""){
      $result = mysql_query('SELECT * FROM comprovantes where nome = "'.$name.'" ');
    if ($result){
       while ($row = mysql_fetch_assoc($result)) {
       echo "<script>alert('JA EXISTE UM ARQUIVO COM O MESMO NOME');</script>";
       echo "<script>history.go(-1);</script>";
       exit;
    }
  }
  mysql_free_result($result);
  }
    // move_uploaded_file( $arqTemporário, $nomeDoArquivo )
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$name);
    $sqlinsert  = "INSERT INTO  semed.comprovantes(nome, id_obra, tipo) VALUES('$name', '$id_solicitacao', 'fim');";
    $search = mysql_query($sqlinsert) or die("Nao foi possivel Salvar o arquivo");
    if($search)
        {
          echo "<script>alert('Arquivo Salvo');</script>";
          echo "<script>history.go(-1);</script>";
          exit;
        }
  }
}
?>