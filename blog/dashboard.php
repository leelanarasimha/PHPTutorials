<?php require('header.php'); ?>

<?php
if (!isset($_SESSION['logged_user'])) {
    $_SESSION['error'] = 'Please login to enter dashboard';
    header('Location: login.php');

}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = '';
}


$pdo = new PDO('mysql:host=localhost;dbname=tutorial_blog', 'root', '');

if ($search == '') {
    $statement = $pdo->prepare('Select * from articles');
} else {
    $statement = $pdo->prepare("Select * from articles where title LIKE '%$search%'");
}


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

        <form method="GET" action="dashboard.php">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo $search; ?>"/>
            </div>
            <div class="col-md-2">
                <input type="submit" name="submit" value="Search" class="btn btn-success"/>
            </div>
        </div>
        </form>

        <?php if ($search != '') { ?>
            <div><a href="dashboard.php" class="btn btn-info">Back to Articles</a></div>
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
                        <div>
                            <a href="editarticle.php?id=<?php echo $article->id; ?>">Edit Article</a>
                            <a href="deletearticle.php?id=<?php echo $article->id; ?>">Delete Article</a>
                        </div>

                    </div>
                </div>

            <?php }
        } else { ?>
            <?php if ($search == '') { ?>
            <div class="alert alert-info">No articles submitted</div>
        <?php } else {  ?>
                <div class="alert alert-info">No articles found with search "<?php echo $search; ?>"</div>
        <?php } ?>
        <?php } ?>

    </div>
<?php require('footer.php'); ?>