<?php
$host = "localhost";
$login = "root";
$password = "root@2019";
$db = "patrimonio";

try 
{
    $patrimonio = new PDO('mysql:host='.$host.';dbname='.$db, $login, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $patrimonio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) 
{
    echo 'ERROR: ' . $e->getMessage();
}

?>