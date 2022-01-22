<?php

$serverName = "mysql:host=localhost;dbname=shopforce";
$dbUser = "root";
$dbPassword = "";

$pdo = new PDO($serverName, $dbUser, $dbPassword);

if(!$pdo) {
    die("Connection failed". $pdo->errorCode());
}