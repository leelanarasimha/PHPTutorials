<?php
session_start();
$comment = $_POST['comment'];
$comment_id = $_GET['comment_id'];

$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');


$sql = "select * from comments where id=$comment_id";
$statement = $pdo->prepare($sql);
$statement->execute();

$comment_details = $statement->fetch(PDO::FETCH_OBJ);


$sql = "UPDATE comments set comment='$comment' where id=$comment_id";

$statement = $pdo->prepare($sql);
$statement->execute();
$_SESSION['success'] = 'Comment Updated Successfully';
header('Location: showarticle.php?id='.$comment_details->article_id);