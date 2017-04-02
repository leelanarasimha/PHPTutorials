<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$title = $_POST['title'];
$description = $_POST['description'];

$current_date = date('Y-m-d H:i:s');




$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');
$statement = $pdo->prepare("Insert into articles values(NULL,'$title', '$description', '$current_date')");

$statement->execute();
$_SESSION['success'] = 'Article Created ';

header('Location: dashboard.php');
