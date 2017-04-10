<?php
session_start();
require('connection.php');
require('Managers/QueryBuilder.php');
date_default_timezone_set('Asia/Kolkata');
$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];

$file_name = $_FILES['image']['name'];


$path = 'uploads/';

move_uploaded_file($_FILES['image']['tmp_name'], $path.$file_name);

$current_date = date('Y-m-d H:i:s');


$pdo = Connection::connect();
$queryBuilder = new QueryBuilder($pdo);
$queryBuilder->insert("Insert into articles values(NULL,'$title', '$description', '$current_date', '$status', '$file_name')");

$result = $queryBuilder->executeQuery("select max(id) as id from articles");
$article_id = $result[0]->id;

$tags = $_POST['tags'];

foreach ($tags as $tag) {
    $sql = "Insert into article_tag values(NULL, $article_id, $tag)";
    $queryBuilder->insert($sql);
}


$_SESSION['success'] = 'Article Created ';

header('Location: dashboard.php');
