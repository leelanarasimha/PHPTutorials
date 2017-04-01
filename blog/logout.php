<?php
session_start();

session_destroy();
$_SESSION['error'] = 'You are successfully logged out';
header('Location: login.php');
