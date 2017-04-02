<?php require('header.php'); ?>
<?php



if (isset($_SESSION['logged_user'])) {
    $_SESSION['success'] = 'You are already logged in';
    header('Location: dashboard.php');
}



if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
} else {
    $error = '';
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <?php if ($error != '') { ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>

            <?php  } ?>

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Login</h1>
                    <form method="post" action="submitlogin.php">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control"/>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="submit" value="Login" class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('footer.php'); ?>