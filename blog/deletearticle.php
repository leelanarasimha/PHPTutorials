<?php
session_start();
$article_id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');

$sql = "Delete from articles where id=$article_id";

$statement = $pdo->prepare($sql);
$statement->execute();
$_SESSION['success'] = 'Article Deleted Successfully';
header('Location: dashboard.php');