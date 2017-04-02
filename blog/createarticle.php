<?php
require('header.php');


if (!isset($_SESSION['logged_user'])) {
    $_SESSION['error'] = 'Please login to create article';
    header('Location: login.php');

}
?>

<div class="container">
    <h1 class="page-header">Create Article</h1>
    <form method="post" action="submitarticle.php">
        <div class="form-group">
            <label>Title: </label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Description: </label>
            <textarea name="description" class="form-control" rows="8"></textarea>
        </div>

        <div>
            <input type="submit" name="submit" value="Create Article" class="btn btn-primary"/>
        </div>
    </form>
</div>
