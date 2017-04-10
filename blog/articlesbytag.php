<?php
/**
 * Created by PhpStorm.
 * User: leelanarasimha
 * Date: 10/04/17
 * Time: 8:45 PM
 */

require('header.php');
$pdo = Connection::connect();
$tag_id = $_GET['tag_id'];
$sql = "select * from articles 
JOIN article_tag on articles.id = article_tag.article_id 
where article_tag.tag_id=$tag_id";
$querybuilder  = new QueryBuilder($pdo);
$articles = $querybuilder->executeQuery($sql);

$sql = "select * from tags where id=$tag_id";
$tag_details = $querybuilder->executeQuery($sql);



?>
<div class="container">
    <h1>Articles belong to the tag by name: <?php echo $tag_details[0]->tag_name; ?></h1>
<?php
    foreach ($articles as $article) { ?>

    <div class="row">
        <div class="col-md-12">
            <a href="showarticle.php?id=<?php echo $article->id; ?>">
                <h2><?php echo $article->title; ?></h2></a>

            <div>Created Date:
                <?php echo date('d M, Y', strtotime($article->created_date)); ?>
            </div>


            <div><?php echo $article->description; ?></div>
            <div>
                <a href="editarticle.php?id=<?php echo $article->id; ?>">Edit Article</a>
                <a href="deletearticle.php?id=<?php echo $article->id; ?>">Delete Article</a>
            </div>

        </div>
    </div>

<?php } ?>
</div>

