<?php
/**
 * PHP version 5.6.31
 * Select data
 */

require_once 'connect.php';

$db = connect('mydb');

try {
    $statement = $db->prepare("SELECT * FROM myguests");
    $statement->execute();


    // set the resulting array to associative
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    print_r($statement->fetch());


    $sql = "SELECT * FROM myguests ORDER BY id ASC LIMIT 10";
    $result = $db->query($sql);

    $result->setFetchMode(PDO::FETCH_ASSOC);

    print_r($result->fetchAll());
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
