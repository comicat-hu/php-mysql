<?php
/**
 * PHP version 5.6.31
 * Connect to mysql
 */


function connect($dbname)
{
    try {
        $config = include_once 'config.php';

        $servername = $config['servername'];
        $username = $config['username'];
        $password = $config['password'];

        $dsn = "mysql:host=$servername;";

        if ($dbname !== '') {
            $dsn .= "dbname=$dbname;";
        }


    } catch (Exception $e) {
        echo 'Missing config.php';
        exit;
    }

    try {
        $db = new PDO($dsn, $username, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected successfully' . "\n";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $db;
}
// close connect
// $conn = null;