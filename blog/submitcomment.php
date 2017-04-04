<?php
/**
 * Created by PhpStorm.
 * User: leelanarasimha
 * Date: 04/04/17
 * Time: 8:30 PM
 */

session_start();



$comment = $_POST['comment'];
$user_id = $_SESSION['logged_user']['id'];
$article_id = $_GET['articleid'];
$created_date = date('Y-m-d H:i:s');

$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');
$sql = "INSERT INTO comments values(NULL, '$comment', $user_id, $article_id, '$created_date')";
$statment = $pdo->prepare($sql);
$statment->execute();
$_SESSION['success'] = 'Comment Posted Successfully';
header("Location: showarticle.php?id=$article_id");