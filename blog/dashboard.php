<?php require('header.php'); ?>

<?php
if ( ! isset($_SESSION['logged_user'])) {
    $_SESSION['error'] = 'Please login to enter dashboard';
    header('Location: login.php');

}  ?>


<?php
echo $_SESSION['success'].$_SESSION['logged_user']['email'];

?>

<?php require('footer.php'); ?>