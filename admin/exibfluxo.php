<?php
$pdfPath = "uploads/fluxo.pdf";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exibir arquivo PDF</title>
</head>
<body>
  <embed src="<?php echo $pdfPath; ?>" width="100%" height="800px" type="application/pdf" />
</body>
</html>