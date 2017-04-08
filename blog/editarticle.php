<?php

require ('header.php');

$article_id = $_GET['id'];


$pdo = Connection::connect();
$statement = $pdo->prepare("select * from articles where id=$article_id");

$statement->execute();

$article = $statement->fetch(PDO::FETCH_OBJ);
?>


<div class="container">
    <h1 class="page-header">Update Article</h1>
    <form method="post" action="updatearticle.php?id=<?php echo $article_id; ?>">
        <div class="form-group">
            <label>Title: </label>
            <input type="text" name="title" class="form-control" value="<?php echo $article->title; ?>">
        </div>
        <div class="form-group">
            <label>Description: </label>
            <textarea name="description" class="form-control" rows="8"><?php echo $article->description; ?></textarea>
        </div>

        <div>
            <input type="submit" name="submit" value="Update Article" class="btn btn-primary"/>
        </div>
    </form>
</div>


<?php require('footer.php'); ?>
