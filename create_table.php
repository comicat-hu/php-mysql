<?php
/**
 * PHP version 5.6.31
 * Create Table
 */

require_once 'connect.php';

$db = connect('mydb');

try {
    
    $sql = 'CREATE TABLE myguests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP
            )';
    

    $db->exec($sql);

} catch (PDOException $e) {
    echo $sql . "\n" . $e->getMessage();
}
