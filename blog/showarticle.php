<?php
require ('header.php');
$logged_user = $_SESSION['logged_user']['id'];

$article_id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');
$statement = $pdo->prepare("select * from articles where id=$article_id");

$statement->execute();

$article = $statement->fetch(PDO::FETCH_OBJ);

if ($article == false) {
    $_SESSION['error'] = 'Article doesnt exist ';
    header('Location: dashboard.php');
    return;
}


$statement = $pdo->prepare("Select comments.*, users.email from comments 
JOIN users ON comments.user_id = users.id where comments.article_id=$article_id");
$statement->execute();
$comments = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_GET['comment_id'])) {
    $comment_id = $_GET['comment_id'];
} else {
    $comment_id = '';
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <a href="dashboard.php" class="btn btn-warning">Back to articles</a>
            </div>
            <h1 class="page-header"><?php echo $article->title; ?></h1>
            <div class="text-right"><?php echo date('d M, Y', strtotime($article->created_date)); ?></div>
            <div>
                <img src="uploads/<?php echo $article->image; ?>"/>
            </div>
            <div><?php echo $article->description; ?></div>
        </div>
    </div>


    <!-- Comments Section -->
    <h2 class="page-header">Comments</h2>
    <?php foreach ($comments as $comment) { ?>
    <div class="row">
        <div class="col-md-12">
            <?php if ($comment_id != $comment->id) { ?>
            <h3><?php echo $comment->email; ?></h3>
            <div><small>Posted On: <?php echo date('d M, Y', strtotime($comment->created_date)); ?></small></div>
            <div><?php echo $comment->comment; ?></div>
            <?php if ($logged_user == $comment->user_id) { ?>
            <div><a href="showarticle.php?id=<?php echo $article->id; ?>&comment_id=<?php echo $comment->id; ?>">Edit Comment</a></div>
            <?php } ?>
            <?php } else { ?>
                <form method="post" action="updatecomment.php?comment_id=<?php echo $comment->id; ?>">
                    <div class="form-group">
                        <textarea class="form-control" name="comment"><?php echo $comment->comment; ?></textarea>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Update Comment"  class="btn btn-primary"/>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
    <?php } ?>

    <!-- End Comments -->


    <div class="row" style="margin-top: 40px;">
        <div class="col-md-12">
            <form method="post" action="submitcomment.php?articleid=<?php echo $article->id; ?>">
                <div class="form-group">
                    <label>Comment:</label>
                    <textarea class="form-control" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit" name="submit" value="Submit Comment"/>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
require ('footer.php'); ?>
