<?php
session_start();
/**
 * Created by PhpStorm.
 * User: leelanarasimha
 * Date: 03/04/17
 * Time: 8:44 PM
 */

$article_id = $_GET['id'];

$title = $_POST['title'];
$description = $_POST['description'];

$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');


$sql = "Update articles set title='$title', description='$description' where id=$article_id";

$statement = $pdo->prepare($sql);
$statement->execute();
$_SESSION['success'] = 'Article Update Successfully';
header('Location: dashboard.php');



