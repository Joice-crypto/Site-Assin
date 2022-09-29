<?php

try
{
    $pdo = new PDO("mysql:host=localhost;dbname=assin_db;", "root", "AssinJoice456");
}
catch(PDOException $e)
{
    echo 'Ocorreu um erro com o banco de dados.' . $e;
    die;
}
