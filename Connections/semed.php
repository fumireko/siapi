<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_semed = "localhost";
$database_semed = "semed";
$username_semed = "root";
$password_semed = "";
$semed = mysql_pconnect($hostname_semed, $username_semed, $password_semed) or trigger_error(mysql_error(),E_USER_ERROR); 
?>