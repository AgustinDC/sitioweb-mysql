<?php

$host = "localhost";
$db = "sitioweb";
$user = "root";
$pass = "";

try {
    $connectionDb = new pdo("mysql:host=$host; dbname=$db", $user, $pass);
    if ($connectionDb) {
        echo 'Conectado a la BD';
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
