<?php

try
{
    $pdo = new PDO("mysql:host=localhost;dbname=ASSIN_DB;", "root", "AssinJoice456");
}
catch(PDOException $e)
{
    echo 'Ocorreu um erro com o banco de dados.' . $e;
    die;
}
