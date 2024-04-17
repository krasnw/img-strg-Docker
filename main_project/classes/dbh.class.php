<?php

class Dbh
{
    protected function connect()
    {

        try {
            $serverName = 'db';
            $dBUserName = 'root';
            $dBName = 'projekcik';
            $dBPassword = 'root';
            $pdo = new PDO("mysql:host=$serverName;dbname=$dBName", $dBUserName, $dBPassword);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}