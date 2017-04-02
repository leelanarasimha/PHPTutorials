
<?php
require ('header.php');
/**
 * Created by PhpStorm.
 * User: leelanarasimha
 * Date: 02/04/17
 * Time: 12:00 PM
 */

$article_id = $_GET['id'];
$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');
$statement = $pdo->prepare("select * from articles where id=$article_id");

$statement->execute();

$article = $statement->fetch(PDO::FETCH_OBJ);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <a href="dashboard.php" class="btn btn-warning">Back to articles</a>
            </div>
            <h1 class="page-header"><?php echo $article->title; ?></h1>
            <div class="text-right"><?php echo date('d M, Y', strtotime($article->created_date)); ?></div>
            <div><?php echo $article->description; ?></div>
        </div>
    </div>


    <div class="row" style="margin-top: 40px;">
        <div class="col-md-12">
            <form method="post" action="submitcomment.php">
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
