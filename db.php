<?php
$db_name= "Cafeteria";
$db_host= "localhost";
$db_user= "php";
$db_pass= "Mu123456789@";

function connect_using_pdo($db_host, $db_user, $db_pass, $db_name)
{
    try {
        $dsn = "mysql:host={$db_host}; dbname={$db_name};";
        $pdo = new PDO($dsn, $db_user, $db_pass);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
        return false;
    }
    return $pdo;
}

$db = connect_using_pdo($db_host, $db_user, $db_pass, $db_name);