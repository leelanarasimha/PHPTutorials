<?php
/**
 * Created by PhpStorm.
 * User: leelanarasimha
 * Date: 31/03/17
 * Time: 9:29 PM
 */

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');

//Check whether email exists in the users table or not

$statement = $pdo->prepare("select * from users where email='$email'");
$statement->execute();
$email_exists = $statement->fetchAll();


if (count($email_exists) == 0) {
    echo "Email Address Doesn't exist. Please register";
    header('Location: login.php');
} else {
    $statement = $pdo->prepare("select * from users where email='$email' and password='$password'");
    $statement->execute();
    $user_details = $statement->fetchAll();


    if (count($user_details) == 0) {
        echo 'Invalid Password.';
        header('Location: login.php');
    } else {
        header('Location: dashboard.php');
    }
}