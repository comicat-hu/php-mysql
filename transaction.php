<?php
/**
 * PHP version 5.6.31
 * Transaction example;
 */

require_once 'connect.php';

$db = connect('mydb');

$user = [
    ['Holly', 'Broussard'],
    ['Joshua', 'Brubaker'],
    ['Glenn', 'Forbes'],
    ['Aubrey', 'Stringham'],
    ['Thomas', 'Fife'],
    ['Debra', 'Champion'],
    ['Holly', 'Giles'],
];

try {

    $db->beginTransaction();

    foreach ($user as $key => $value) {

        $firstname = $value[0];
        $lastname = $value[1];
        $email = genEmail($firstname);

        $sql = "INSERT INTO myguests (firstname, lastname, email) 
                VALUES ('$firstname', '$lastname', '$email');";

        $db->exec($sql);

    }

    echo 'lastInsertId: ' . $db->lastInsertId() . "\n";

    $db->commit();

} catch (PDOException $e) {

    $db->rollback();
    echo 'rollback...' . $e->getMessage();
}

$db = null;

/**
 * Generate a example email by name
 *
 * @param string $name Input a name
 *
 * @return string Email
 */
function genEmail($name)
{
    return strtolower($name) . '@example.com';
}