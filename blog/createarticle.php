<?php
require('header.php');
$pdo = Connection::connect();

$queryBuilder = new QueryBuilder($pdo);
$tags = $queryBuilder->executeQuery("select * from tags");


if (!isset($_SESSION['logged_user'])) {
    $_SESSION['error'] = 'Please login to create article';
    header('Location: login.php');

}
?>

<div class="container">
    <h1 class="page-header">Create Article</h1>
    <form method="post" action="submitarticle.php" enctype="multipart/form-data">
        <div class="form-group">
            <label>Title: </label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Description: </label>
            <textarea name="description" class="form-control" rows="8"></textarea>
        </div>

        <div class="form-group">
            <label>Status: </label>
            <select name="status" class="form-control">
                <option value="">Select status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label>Select Tags: </label>
            <select name="tags[]" class="form-control" multiple>
            <?php foreach ($tags as $tag) { ?>
                <option value="<?php echo $tag->id; ?>"><?php echo $tag->tag_name; ?></option>
                <?php  } ?>
            </select>
        </div>

        <div class="form-group">
            <input type="file" name="image"/>
        </div>

        <div>
            <input type="submit" name="submit" value="Create Article" class="btn btn-primary"/>
        </div>
    </form>
</div>
