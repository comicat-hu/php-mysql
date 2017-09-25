<?php
/**
 * PHP version 5.6.31
 * Update data
 */

require_once 'connect.php';

$db = connect('mydb');

try {

    $sql = "UPDATE myguests SET lastname='Doeeeee' WHERE id = 1";
    $statement = $db->prepare($sql);
    $statement->execute();

    echo $statement->rowCount();

} catch (PDOException $e){
    echo $e->getMessage();
}

$db = null;