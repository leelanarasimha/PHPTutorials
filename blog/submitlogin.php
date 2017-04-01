<?php
session_start();


$email = $_POST['email'];
$password = $_POST['password'];



if ($email == '') {
    $_SESSION['error'] = 'Please Enter Email Address';
    header('Location: login.php');

} elseif ($password == '') {
    $_SESSION['error'] = 'Please Enter Password';
    header('Location: login.php');

} else {


    $pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');

//Check whether email exists in the users table or not

    $statement = $pdo->prepare("select * from users where email='$email'");
    $statement->execute();
    $email_exists = $statement->fetchAll();


    if (count($email_exists) == 0) {
        $_SESSION['error'] = 'Email Address Doesn\'t exist. Please register';
        header('Location: login.php');
    } else {
        $statement = $pdo->prepare("select * from users where email='$email' and password='$password'");
        $statement->execute();
        $user_details = $statement->fetchAll();


        if (count($user_details) == 0) {
            $_SESSION['error'] = 'Invalid Password';
            header('Location: login.php');
        } else {
            $_SESSION['logged_user'] = $user_details[0];
            $_SESSION['success'] = 'Welcome User';
            header('Location: dashboard.php');
        }
    }
}