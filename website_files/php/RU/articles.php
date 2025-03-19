<link rel="stylesheet" type="text/css" href="http://cryptobitanalytics/website_files/styles/articles.css">
<title>Статьи и новости</title>

<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/RU/includes/head_and_nav.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/RU/includes/connect.php");
    require($_SERVER['DOCUMENT_ROOT']."/website_files/php/RU/includes/db.php");
    require($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");
    require($_SERVER['DOCUMENT_ROOT']."/website_files/php/RU/includes/cryptocurrency.php");
?>

<div class="intropart" style="background-image: url(http://cryptobitanalytics/jpg_png_images/articles.jpg);">
        <center><p class="introText">Статьи и новости</p></center>
</div>

<br>
<br>

<section class="ArticlesMain justify-content-center">

<aside class="aside">
        <div class="cryptocurrency-table">
            <table class="table table-bordered">
                <tr>
                    <td colspan="2" style="font-weight: 600; font-size: 18px; color: #4252e6;">
                    <center>Курс криптовалют</center></td>
                </tr>
                <tr>
                    <th>Bitcoin</th>
                    <td><?php getData('bitcoin') ?></td>
                </tr>
                <tr>
                    <th>Etherium</th>
                    <td><?php getData('ethereum') ?></td>
                </tr>
                <tr>
                    <th>Litecoin</th>
                    <td><?php getData('litecoin') ?></td>
                </tr>
                <tr>
                    <th>Binance coin</th>
                    <td><?php getData('binancecoin') ?></td>
                </tr>
                <tr>
                    <th>Dogecoin</th>
                    <td><?php getData('dogecoin') ?></td>
                </tr>     
            </table>
        </div>
    </aside>

    <div class="articles">
        <div class="container">
            <div class="row">
        <?php 
            $articles = getAllArticles();
            foreach ($articles as $article): ?>
                <div class="card">
                    <img class="card-img-top" src=<?php echo $article["image"]; ?>>
                    <div class="card-body">
                        <p class="card-title"><?php echo $article["title"]; ?></p>
                        <br>
                        <div id="articles" class="card-text">
                            <?php echo textPreview($article["text"], 300); ?>
                        </div>
                    </div>
                    <div class="time">
                        <time class="date"><?php echo $article["date"]; ?></time>
                    </div>
                    <br>
                    <div class="article-button" align="center">
    <a href="http://cryptobitanalytics/website_files/php/RU/includes/single.php?id=<?php $article_id = $article['id']; echo $article["id"]; ?>">
                        <button class="btn btn-outline-primary stretched-link">Читать далее</button>
    </a>
                    </div>
                    <br>
                </div>
        <?php endforeach; ?>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

</section>

    <div class="otherNews">
        <div class="container">
        <br>
            <center><p class="whiteTitle">Другие новостные площадки</p></center>
        <br>
        <div class="row">
            <a href="https://www.coinbase.com/" target="_blank">
                <img src="https://images.ctfassets.net/q5ulk4bp65r7/3TBS4oVkD1ghowTqVQJlqj/2dfd4ea3b623a7c0d8deb2ff445dee9e/Consumer_Wordmark.svg" alt="Coinbase">
            </a>
            <a href="https://forklog.com/" target="_blank">
                <img src="https://forklog.com/wp-content/themes/forklogv2/img/logo_w_i.svg" alt="Forklog">
            </a>
            <a href="https://cryptonews.com/" target="_blank">
                <img src="https://v2.cimg.co/p/logo.svg" alt="CryptoNews">
            </a>
        </div>
        </div>
    </div>



<?php require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/RU/includes/footer.php"); ?>