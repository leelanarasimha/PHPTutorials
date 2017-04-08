<?php

class Connection {

    public static function connect() {
        $pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');
        return $pdo;
    }
}