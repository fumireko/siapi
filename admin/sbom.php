<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$tipo_documento = $_POST['tipo_documento'];
$validade = $_POST['validade'];
$tbcmei_nome = $_SESSION['tbcmei_nome'];
function toASCII( $str )
{
    return strtr(utf8_decode($str), 
        utf8_decode(
        'ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
        'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
}

///////Documentos  
if($_FILES) { // Verificando se existe o envio de arquivos.
	if($_FILES['arquivo']) { // Verifica se o campo não está vazio.
    $dir = 'upload/Documentos_para_download/'; // Diretório que vai receber o arquivo.
    $text = $_FILES['arquivo']["name"]; // Recebe o nome do arquivo. 
    $name = toASCII( $text );

    if ($name !=""){
      $result = mysql_query('SELECT * FROM arquivo_cmei where arquivo = "'.$name.'" ');
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
    $sqlinsert  = "INSERT INTO  semed.arquivo_cmei(arquivo, id_tipo_arquivo, validade, cmei) VALUES('$name', '$tipo_documento', '$validade', '$tbcmei_nome');";
    $search = mysql_query($sqlinsert) or die("Nao foi possivel Salvar o arquivo");
    if($search)
        {
          echo "<script>alert('Arquivo Salvo');</script>";
          header("Location: ./sanitario.php");
          exit;
        }
  }
}
?>