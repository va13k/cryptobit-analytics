<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/RU/includes/head_and_nav.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/RU/includes/connect.php");
    require($_SERVER['DOCUMENT_ROOT']."/website_files/php/RU/includes/db.php");
?>

<link rel="stylesheet" type="text/css" href="http://cryptobitanalytics/website_files/styles/services.css">

<section class="ServicesMain">
    <div class="intropart" style="background-image: url(http://cryptobitanalytics/jpg_png_images/services.jpg);">
        <center><p class="introText">Услуги</p></center>
    </div>

    <br>
    <br>
    <br>

    <section class="servicesMain">
        <div class="container-fluid">
            <div class="row">
    <?php 
		$services = getServices();
		foreach ($services as $service): ?>

                <div class="card col-6 col-md-4">
                    <p class="card-title"><?php echo $service["title"]; ?></p>
                    <p class="card-text"><?php echo $service["description"]; ?></p>
                    <div class="more-info">
                    <hr>
                        <div class="details">
                            <p class="card-details"><b>Длительность выполнения:</b> <?php echo $service["complation_time"]; ?></p> 
                            <p class="card-details"><b>Результат:</b> <?php echo $service["result"]; ?></p>
                            <p class="card-details"><b>Стоимость:</b> <?php echo $service["price"]; ?></p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary mt-auto stretched-link" data-toggle="modal" data-target=".bd-example-modal-lg">Заказать</button>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
        <div class="modal-content">
<section class="Contacts">
    <div class="container">
            <div align="right">
        <button type="button" class="btn btn-xl text-white" data-dismiss="modal" style="font-size: 20px;">
            X
        </button>
            </div>
      <br><center><p class="blueTitle">СВЯЗЬ С НАМИ</p></center><br>
      
      <form action="http://cryptobitanalytics/telegram.php" method="POST">
        <div class="center">
          <div class="form-group col-12 col-sm-12 col-md-8 col-lg-8 mx-auto">
            <input type="text" class="form-control form-control-lg" name="user_name" placeholder="Введите ваше имя" required>
            <br>
            <input id="phone" step="any" type="text" class="form-control form-control-lg" name="user_phone" 
            placeholder="Введите номер телефона" value="" required minlength="11" maxlength="15">
            <br>
            <p class="contacts-title">Выберите где вам лучше связаться </p>
            <br>
            <div class="row">
            <div class="form-check">
              <input type="radio" class="form-check-input" name="ContactVar" id="Viber" value="Viber">
              <label class="form-check-label" for="Viber">
                <p class="center">
                <img src="http://cryptobitanalytics/jpg_png_images/Viber.png" alt="Viber" height="49" width="49">
                
                Viber
                </p>
              </label>
            </div>

            <div class="form-check">
              <input type="radio" class="form-check-input" name="ContactVar" id="Telegram" value="Telegram">
              <label class="form-check-label" for="Telegram">
                <p class="center">
                <img src="http://cryptobitanalytics/jpg_png_images/Telegram.png" alt="Telegram" height="50" width="50">
                Telegram
                </p>
              </label>
            </div>  

            <div class="form-check">
              <input type="radio" class="form-check-input" name="ContactVar" id="WhatsApp" value="WhatsApp">
              <label class="form-check-label" for="WhatsApp">
                <p class="center">
                <img src="http://cryptobitanalytics/jpg_png_images/WhatsApp.png" alt="WhatsUp" height="50" width="50">
                WhatsApp
                </p>
              </label>
            </div>

            <div class="form-check">
              <input type="radio" class="form-check-input" name="ContactVar" id="Phone" value="Phone" checked>
              <label class="form-check-label" for="Phone">
                <p class="center">
                <img src="http://cryptobitanalytics/jpg_png_images/Phone.png" alt="OnlyPhone" height="50" width="50">
                
                Телефон
                </p>
              </label>
            </div>            
            </div>  

            <br>
            <input type="submit" name="submit" class="btn btn-block btn-lg btn-outline-primary" value="Отправить">
          </div>
            
            <br>
        </div>
      </form>
  
    </div>
  </section>
                            </div>
                        </div>
                        </div>
                    <br>
                </div>

    <?php endforeach; ?>

            </div>
        </div>
    </section>

    <br>
    <br>
    <br>

</section>

<section class="ourClients">
    <div class="container">
        <br>
        <center><p class="whiteTitle">Наши клиенты</p></center>
        <br>
        <div class="row">
            <a href="https://crystalblockchain.com/" target="_blank">
                <img src="https://crystalblockchain.com/licuvar/uploads/2021/10/logo3.webp" alt="Crystal Blockchain">
            </a>
            <a href="https://whitebit.com/" target="_blank">
                <img src="http://cryptobitanalytics/jpg_png_images/WhiteBIT-logo.png" alt="WhiteBit">
            </a>
            <a href="https://e-scrooge.is/" target="_blank">
                <img src="https://e-scrooge.is/img/logo.png" alt="E-Scrooge">
            </a>
            <a href="https://www.boxexchanger.net/" target="_blank">
                <img src="https://www.boxexchanger.net/_nuxt/img/logo.ff487b0.svg" alt="Box exchanger">
            </a>
            <a href="https://eclipcoin.com/" target="_blank">
                <img src="https://eclipcoin.com/img/logo.png" alt="EclipCoin">
            </a>
            <a href="https://purefi.io/" target="_blank">
                <img src="https://purefi.io/assets/images/logo-purefi.svg" alt="PureFi">
            </a>
            <a href="https://cryptohome.me/" target="_blank">
                <img src="https://cryptohome.me/wp-content/themes/cryptohomepr/logo.png" alt="Cryptohome">
            </a>
            <a href="https://www.binance.com/" target="_blank">
                <img src="http://cryptobitanalytics/jpg_png_images/Binance_logo.svg.png" alt="Binance">
            </a>
        </div>
    </div>
</section>
<script type="text/javascript" src="http://cryptobitanalytics/website_files/script/script.js"></script>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/RU/includes/footer.php"); ?>