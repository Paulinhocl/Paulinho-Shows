<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$hostname_ConnectDB = "localhost";
$username_ConnectDB = "root";
$password_ConnectDB = "";
$database_ConnectDB = "eventos_db";
$ConnectDB = mysqli_connect($hostname_ConnectDB, $username_ConnectDB, $password_ConnectDB) or print (mysqli_connect_error());
 
 mysqli_select_db($ConnectDB, $database_ConnectDB) or print (mysqli_connect_error());
 //print"ok";
 

 mysqli_set_charset($ConnectDB,"utf8");

?>