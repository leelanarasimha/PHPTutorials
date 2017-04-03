<?php
session_start();
/**
 * Created by PhpStorm.
 * User: leelanarasimha
 * Date: 03/04/17
 * Time: 8:48 PM
 */

$article_id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');

$sql = "Delete from articles where id=$article_id";

$statement = $pdo->prepare($sql);
$statement->execute();
$_SESSION['success'] = 'Article Deleted Successfully';
header('Location: dashboard.php');
