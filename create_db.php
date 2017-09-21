<?php
/**
 * PHP version 5.6.31
 * Create DB
 */

require_once 'connect.php';

$db = connect('');

try {
    $sql = 'CREATE DATABASE mydb';
    $db->exec($sql);
} catch (PDOException $e) {
    echo $sql . "\n" . $e->getMessage();
}