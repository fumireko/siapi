<?php
if (isset($_GET['tipo'])) { // recebimento por post

    $ret_tipo = $_GET['tipo']; // campo digitavel em qr_ind.php    
} else {
    $ret_tipo = "0"; // campo vazio digitavel em qr_ind.php
}

if ($ret_tipo =="0")
{

 
 //   function somente_numeros($str)
   // {
        // echo somente_numerso('Olá 1456Mundo!');
        // vai retornar 1456 
     //   return preg_replace("/[^0-9]/", "", $str);
   // }

    function remove_numeros($str)
    { //  Removendo símbolos e números
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^a-zA-Z\s]/", "", $str);
        return $nova_string;
        //return preg_replace("/[^0-9]/", "", $str);
    }

    function remove_simbolos($str)
    { //  Removendo símbolos 
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^a-zA-Z0-9\s]/", "", $str);
        return $nova_string;
        //$nova_string = preg_replace("/[^a-zA-Z0-9]/", "", $string);

    }

    function remove_letras_e_simbolos($str)
    { //  Removendo símbolos 
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^0-9\s]/", "", $str);
        return $nova_string;
        //return preg_replace("/[^0-9]/", "", $str);
    }

    function limpa_tracoj($valor)
    {
        $valor = trim($valor);
        $valor = str_replace(array('.', '-', '/', '|'), "", $valor);
        return $valor;
    }


    function deletar($pasta)
    {

        $iterator = new RecursiveDirectoryIterator($pasta, FilesystemIterator::SKIP_DOTS);
        $rec_iterator = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($rec_iterator as $file) {
            $file->isFile() ? unlink($file->getPathname()) : rmdir($file->getPathname());
        }

    }
    function ver_res_w()
    {
        if (!isset($_COOKIE['resolucao'])) {
            ?>
                <script language='javascript'>
                document.cookie = "resolucao="+screen.width+"x"+screen.height;
                self.location.reload();
                </script>
           <?php
        } else
            $resolucao = list($width, $height) = explode("x", $_COOKIE['resolucao']);
        //echo "<h3>Sua resolu&ccedil;&atilde;o &eacute; $width por $height</h3>";
        return $width;
    }

    function ver_res()
    {
        if (!isset($_COOKIE['resolucao'])) {
            ?>
                <script language='javascript'>
                document.cookie = "resolucao="+screen.width+"x"+screen.height;
                self.location.reload();
                </script>
           <?php 
        } else
             $resolucao = list($width, $height) = explode("x", $_COOKIE['resolucao']);
        //echo "<h3>Sua resolu&ccedil;&atilde;o &eacute; $width por $height</h3>";
            return $width."x".$height;
       }
    
    
    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }


    
    function cod_cripta($Fnome, $Fkey)
    {
        $plaintext = $Fnome;//"message to be encrypted";
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $Fkey, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $Fkey, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
        //echo $ciphertext ; 
        return $ciphertext;
    }
    function add_acao($Fpar1, $Fcti, $Fusuario)
    {
        $data = date("d/m/Y H:i:s ");
        $ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
        $ipF = $_SERVER["REMOTE_ADDR"]; //Pego o IP
        $host = gethostbyaddr("$ip"); //pego o host
        $IPlocal = $ip . "/" . $ipF . "/" . $host;
        $nomeArquivo = "acoes.txt";
        $conteudo = $Fpar1 . "   CTI " . $Fcti . "  Data  " . $data . "  Usuario " . $Fusuario . "  Local  " . $IPlocal . PHP_EOL;
        file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
        $arquivo = fopen($_SERVER['DOCUMENT_ROOT'] . $nomeArquivo, 'w');
        if ($arquivo) {
            // Escreve no arquivo
            fwrite($arquivo, $conteudo);
            // fecha o arquivo
            fclose($arquivo);
        }
    }
    
    function cod_descripta($Fnome, $Fkey)
    {
        $c = base64_decode($Fnome);
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $Fkey, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $Fkey, $as_binary = true);
        if (hash_equals($hmac, $calcmac))// timing attack safe comparison
        {
            return $original_plaintext . "\n";
        }
        return "Erro de Descodificacao";
    }
} // fim do retorno tipo 0
else{

    function add_acao($Fpar1, $Fcti, $Fusuario)
    {
        $data = date("d/m/Y H:i:s ");
        $ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
        $ipF = $_SERVER["REMOTE_ADDR"]; //Pego o IP
        $host = gethostbyaddr("$ip"); //pego o host
        $IPlocal = $ip . "/" . $ipF . "/" . $host;
        $nomeArquivo = "acoes.txt";
        $conteudo = $Fpar1 . "   CTI " . $Fcti . "  Data  " . $data . "  Usuario " . $Fusuario . "  Local  " . $IPlocal . PHP_EOL;
        file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
        $arquivo = fopen($_SERVER['DOCUMENT_ROOT'] . $nomeArquivo, 'w');
        if ($arquivo) {
            // Escreve no arquivo
            fwrite($arquivo, $conteudo);
            // fecha o arquivo
            fclose($arquivo);
        }
    }
    function somente_numeros($str)
    {
        // echo somente_numerso('Olá 1456Mundo!');
        // vai retornar 1456 
        return preg_replace("/[^0-9]/", "", $str);
    }

    function remove_numeros($str)
    { //  Removendo símbolos e números
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^a-zA-Z\s]/", "", $str);
        return $nova_string;
        //return preg_replace("/[^0-9]/", "", $str);
    }

    function remove_simbolos($str)
    { //  Removendo símbolos 
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^a-zA-Z0-9\s]/", "", $str);
        return $nova_string;
        //$nova_string = preg_replace("/[^a-zA-Z0-9]/", "", $string);

    }

    function remove_letras_e_simbolos($str)
    { //  Removendo símbolos 
        $str = "String com numeros 123456789 e símbolos !@#$%¨&*()_+";
        $nova_string = preg_replace("/[^0-9\s]/", "", $str);
        return $nova_string;
        //return preg_replace("/[^0-9]/", "", $str);
    }

    function limpa_tracoj($valor)
    {
        $valor = trim($valor);
        $valor = str_replace(array('.', '-', '/', '|'), "", $valor);
        return $valor;
    }

    function ver_res()
    {
        if (!isset($_COOKIE['resolucao'])) {
            ?>
                <script language='javascript'>
                document.cookie = "resolucao="+screen.width+"x"+screen.height;
                self.location.reload();
                </script>
           <?php
        } else
            $resolucao = list($width, $height) = explode("x", $_COOKIE['resolucao']);
        //echo "<h3>Sua resolu&ccedil;&atilde;o &eacute; $width por $height</h3>";
        return $width . "x" . $height;
    }




    function deletar($pasta)
    {

        $iterator = new RecursiveDirectoryIterator($pasta, FilesystemIterator::SKIP_DOTS);
        $rec_iterator = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($rec_iterator as $file) {
            $file->isFile() ? unlink($file->getPathname()) : rmdir($file->getPathname());
        }

    }
    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }


    function cod_cripta($Fnome, $Fkey)
    {
        $plaintext = $Fnome;//"message to be encrypted";
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $Fkey, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $Fkey, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
        //echo $ciphertext ; 
        return $ciphertext;
    }
    function cod_descripta($Fnome, $Fkey)
    {
        $c = base64_decode($Fnome);
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $Fkey, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $Fkey, $as_binary = true);
        if (hash_equals($hmac, $calcmac))// timing attack safe comparison
        {
            return $original_plaintext . "\n";
        }
        return "Erro de Descodificacao";
    }


}





?>