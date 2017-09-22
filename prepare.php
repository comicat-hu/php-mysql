<?php
/**
 * PHP version 5.6.31
 * Prepare example;
 */

require_once 'connect.php';

$db = connect('mydb');

$user = [
    ['Cassandra', 'Haynes'],
    ['Pedro', 'Gary'],
    ['Peggy', 'Madrid'],
    ['Patricia', 'Teague'],
    ['Rosa', 'Schulz'],
    ['Sharon', 'Gutierrez'],
    ['Jerry', 'P. Davis'],
];

try {

    $db->beginTransaction();

    // PDO Statement
    $statement1 = $db->prepare("INSERT INTO myguests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
    $statement2 = $db->prepare("INSERT INTO myguests (firstname, lastname, email) VALUES (?, ?, ?)");
    

    $statement1->bindParam(':firstname', $firstname);
    $statement1->bindParam(':lastname', $lastname);
    $statement1->bindParam(':email', $email);
    
    foreach ($user as $key => $value) {

        $firstname = $value[0];
        $lastname = $value[1];
        $email = genEmail($firstname);

        $statement1->execute();

    }

    $firstname = 'BBB';
    $lastname = 'BBB';
    $email = 'BBB@example.com';

    $statement2->bindParam(1, $firstname, PDO::PARAM_STR);
    $statement2->bindParam(2, $lastname, PDO::PARAM_STR);
    $statement2->bindParam(3, $email, PDO::PARAM_STR);

    $statement2->execute();

    echo 'lastInsertId: ' . $db->lastInsertId() . "\n";

    $db->commit();

} catch (POOException $e) {
    echo $e->getMessage();
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