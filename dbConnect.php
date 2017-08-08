<?php

$hostname = 'localhost';
$username = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=testApplication", $username, $password);
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

?>