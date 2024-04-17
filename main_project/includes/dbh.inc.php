<?php

$serverName = 'db';
$dBUserName = 'root';
$dBName = 'projekcik';
$dBPassword = 'root';

/* using PDO */
try {
    $pdo = new PDO("mysql:host=$serverName;dbname=$dBName", $dBUserName, $dBPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
