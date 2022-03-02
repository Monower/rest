<?php 

try {
    $server='localhost';
    $user='root';
    $password='';
    $db='test';

    $conn=new PDO("mysql:host=$server; dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);



} catch (Exception $e) {
    echo "ERROR: ".$e->getMessage();
}












?>