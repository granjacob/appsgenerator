<?php
require_once('core.php');
/*
try {
    $pdo= new \system\data\DatabaseConnection( $datasource );

    // SELECT
    $stmt = $pdo->prepare('SELECT * FROM system_item where name = :name' );
    $val = 'object1';
    $stmt->bindParam(':name', $val);
    $stmt->execute();

    IO_print_r( $stmt->fetchAll() );

    // INSERT
    $i = 0;
    while ($i < 20) {
        $stmt = $pdo->prepare(
            'INSERT INTO system_item (name,alias, date_created, date_modified, description) ' .
            ' VALUES (:name,:alias, NOW(), NOW(), :description)');
        $val = 'objectgroup1-' . $i;
        $stmt->bindParam(':name', $val);
        $stmt->bindParam(':alias', $val);
        $stmt->bindParam(':description', $val);
        $stmt->execute();
        $i++;
    }

    // UPDATE

    $stmt = $pdo->prepare(
        "UPDATE system_item SET alias = :alias WHERE name like 'object%' " );
    $val = 'nuevoValor';
    $stmt->bindParam(':alias', $val);
    $stmt->execute();


    // DELETE

    $stmt = $pdo->prepare(
        "DELETE FROM system_item  WHERE name like '%-6%' " );
    $stmt->execute();


    //DROP TABLE

    $stmt = $pdo->prepare(
        "DROP TABLE `welcome_back`;"
    );
    $stmt->execute();


    // CREATE TABLE
    $stmt = $pdo->prepare(
      "CREATE TABLE `welcome_back` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `date_deleted` date DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci"
    );

    $stmt->execute();

    // ALTER ADD
    $stmt = $pdo->prepare(
        "ALTER TABLE `welcome_back` ADD EMAIL VARCHAR(100)"
    );
    $stmt->execute();

    // ALTER MODIFY
    $stmt = $pdo->prepare(
        "ALTER TABLE `welcome_back` MODIFY COLUMN EMAIL VARCHAR(5)"
    );
    $stmt->execute();

    // ALTER DROP

    $stmt = $pdo->prepare(
        "ALTER TABLE `welcome_back` DROP EMAIL"
    );
    $stmt->execute();




} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
*/


$application = new \system\AppsGenerator();

$application->run();

?>