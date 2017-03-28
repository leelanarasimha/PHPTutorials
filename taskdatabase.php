<?php

$pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');

$statement = $pdo->prepare('select * from tasks');

$statement->execute();

$tasks = $statement->fetchAll(PDO::FETCH_OBJ);


var_dump($tasks);


?>
