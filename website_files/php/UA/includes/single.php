<?php
require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/UA/includes/head_and_nav.php");
require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/UA/includes/connect.php");
require($_SERVER['DOCUMENT_ROOT']."/website_files/php/UA/includes/db.php");
$article = getArticleById($_GET['id']);
?>

<title><?php echo $article["title"]; ?></title>
<link rel="stylesheet" type="text/css" href="http://cryptobitanalytics/website_files/php/UA/includes/single.css">

<section class="Single">
    <div class="container">
        <br>
        <div class="image col-12">
            <img src= <?php echo $article["image"]; ?> class="img-thumbnail">
        </div>
        <br>
        <p class="single-title"><?php echo $article["title"]; ?></p>
        <p class="single-content"><?php echo $article["text"]; ?></p>
    </div>
</section>

<br>
<br>

<?php require($_SERVER['DOCUMENT_ROOT']."/website_files/php/UA/includes/footer.php"); ?>