<?php

define('__ROOT__', dirname(__FILE__));

$config = require_once __ROOT__. "/config.php";

try {
    $pdo = new \PDO('mysql:host=' . $config['serverName'] . ';' . "dbname=" . $config['dbName'], $config['userName'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction();

////Query 1
//    $country = "USA";
//    $firstName = "Anthony";
//    $lastName = "Bow";
//    $queryString1 = "SELECT o.officeCode, o.city
//                    FROM offices as o
//                    INNER JOIN employees as e
//                    ON o.officeCode = e.officeCode
//                    WHERE o.country = :country
//                    AND e.firstName = :firstName
//                    AND e.lastName = :lastName
//                    ;";
//    $query = $pdo->prepare($queryString1);
//    $query->bindValue(":country", $country);
//    $query->bindValue(":firstName", $firstName);
//    $query->bindValue(":lastName", $lastName);
//    $query->execute();
//    $result = $query->fetchAll(PDO::FETCH_ASSOC);
//    var_dump($result);
////Query 2
//    $queryString2 = "SELECT SUM(cs.creditlimit), COUNT(ord.ordernumber) as orderNum, cs.country
//                     FROM customers AS cs
//                     INNER JOIN orders as ord
//                     ON cs.customernumber = ord.customernumber
//                     GROUP BY cs.country
//                     ;";
//    $result = $pdo->query($queryString2);
//    var_dump($result->fetchAll(PDO::FETCH_ASSOC));
//// Query 3
//    $queryString3 = "DELETE FROM products WHERE buyPrice < :price AND quantityInStock < :stock;";
//    $query = $pdo->prepare($queryString3);
//    $query->bindValue(":price", 30);
//    $query->bindValue(":stock", 1000);
//    $query->execute();
//    echo "Deletion done";

    $pdo->commit();
    $pdo = null;

} catch(\PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
    $pdo->rollBack();
    die();
}

