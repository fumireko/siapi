<?php
if(isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] == 0) {
  $pdfPath = "uploads/" . $_FILES['pdfFile']['name'];
  move_uploaded_file($_FILES['pdfFile']['tmp_name'], $pdfPath);
  echo "Arquivo PDF enviado com sucesso.";
} else {
  echo "Ocorreu um erro ao enviar o arquivo PDF.";
}
?>