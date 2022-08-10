<?php

try
{
    $pdo = new PDO("mysql:host=localhost;dbname=ASSIN_DB;", "phpmyadmin", "$3nh@doMySQL");
}
catch(PDOException $e)
{
    echo 'Ocorreu um erro com o banco de dados.' . $e;
    die;
}
