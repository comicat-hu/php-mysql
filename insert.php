<?php
/**
 * PHP version 5.6.31
 * Insert into data
 */

require_once 'connect.php';

$db = connect('mydb');

$user = [
    ['Anthony', 'Guzman'],
    ['Cornell', 'Hampton'],
    ['Manuel', 'Mobley'],
    ['Michael', 'Roberts'],
    ['Daryl', 'Halley'],
    ['Robert', 'Nam'],
    ['Linda', 'Bass'],
];

try {

    // $sql = "INSERT INTO myguests (firstname, lastname, email) 
    //         VALUES ('John', 'Doe', 'john@example.com');";

    // $db->exec($sql);

    foreach ($user as $key => $value) {

        $firstname = $value[0];
        $lastname = $value[1];
        $email = genEmail($firstname);

        $sql = "INSERT INTO myguests (firstname, lastname, email) 
                VALUES ('$firstname', '$lastname', '$email');";

        $db->exec($sql);


    }

    echo $db->lastInsertId();


} catch (PDOException $e) {
    echo $sql . "\n" . $e->getMessage();
}

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