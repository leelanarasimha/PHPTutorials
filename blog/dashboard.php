<?php require('header.php'); ?>

<?php
if (!isset($_SESSION['logged_user'])) {
    $_SESSION['error'] = 'Please login to enter dashboard';
    header('Location: login.php');

}
$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');

$statement = $pdo->prepare('Select * from articles');
$statement->execute();
$articles = $statement->fetchAll(PDO::FETCH_OBJ);





?>


    <div class="container">
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (count($articles) > 0) {
            foreach ($articles as $article) { ?>

                <div class="row">
                    <div class="col-md-12">
                        <a href="showarticle.php?id=<?php echo $article->id; ?>">
                            <h2><?php echo $article->title; ?></h2></a>

                        <div>Created Date:
                            <?php echo date('d M, Y', strtotime($article->created_date)); ?>
                        </div>


                        <div><?php echo $article->description; ?></div>

                    </div>
                </div>

            <?php }
        } else { ?>
            <div class="alert alert-info">No articles submitted</div>
        <?php } ?>

    </div>
<?php require('footer.php'); ?>