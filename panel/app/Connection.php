<?php

try
{
    $pdo = new PDO("mysql:host=localhost;dbname=;", "", "");
}
catch(PDOException $e)
{
    echo 'Ocorreu um erro com o banco de dados.' . $e;
    die;
}
