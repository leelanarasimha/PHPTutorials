<?php
/**
 * Created by PhpStorm.
 * User: leelanarasimha
 * Date: 08/04/17
 * Time: 8:58 PM
 */

class QueryBuilder {
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function executeQuery($query) {
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($query) {
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }
}