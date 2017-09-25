<?php
/**
 * PHP version 5.6.31
 * Delete data
 */

require_once 'connect.php';

$db = connect('mydb');

try {

    $sql = "DELETE FROM myguests WHERE id = 2";

    echo $db->exec($sql);

} catch (PDOException $e){
    echo $e->getMessage();
}

$db = null;