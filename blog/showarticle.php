<?php
require ('header.php');
$logged_user = $_SESSION['logged_user']['id'];

$article_id = $_GET['id'];

$pdo = Connection::connect();
$querybuilder = new QueryBuilder($pdo);

$sql = "select articles.*, tags.tag_name, tags.id as tag_id from articles 
  JOIN article_tag ON article_tag.article_id = articles.id 
  JOIN tags ON tags.id = article_tag.tag_id
where articles.id=$article_id";
$article = $querybuilder->executeQuery($sql);

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
            <h1 class="page-header"><?php echo $article[0]->title; ?></h1>
            <div>Tags: </div>
            <?php foreach ($article as $tag) { ?>
                <span><a href="articlesbytag.php?tag_id=<?php echo $tag->tag_id; ?>"><?php echo $tag->tag_name; ?></a></span>
            <?php  } ?>
            <div class="text-right"><?php echo date('d M, Y', strtotime($article[0]->created_date)); ?></div>
            <div>
                <img src="uploads/<?php echo $article[0]->image; ?>"/>
            </div>
            <div><?php echo $article[0]->description; ?></div>
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
