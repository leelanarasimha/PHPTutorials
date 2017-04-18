<?php
/**
 * Created by PhpStorm.
 * User: leelanarasimha
 * Date: 18/04/17
 * Time: 9:05 PM
 */
require('Connection.php');
require('Managers/QueryBuilder.php');
$response = array();
$email = $_POST['email'];
$password = $_POST['password'];
$pdo = Connection::connect();

$query = new QueryBuilder($pdo);
$result = $query->executeQuery("select * from users where email = '$email'");
if ( count($result) ==  0) {
    $response['error_message'] = 'Email address doesnot exist';
} else {
    $result = $query->executeQuery("select * from users where email = '$email' and password='$password'");
    if (count($result) == 0) {
        $response['error_message'] = 'Invalid Password';
    } else {
        $response = $result[0];
    }
}

echo json_encode($response);
