<title>Contacts</title>
<link rel="stylesheet" type="text/css" href="http://cryptobitanalytics/website_files/styles/Contacts.css">

<?php 
  require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/EN/includes/head_and_nav.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/EN/includes/connect.php");
  require($_SERVER['DOCUMENT_ROOT']."/website_files/php/EN/includes/db.php");
?>


<div class="intropart" style="background-image: url(http://cryptobitanalytics/jpg_png_images/contacts.jpg); background-size: 1520px;">
  <div class="text-intro">
    <p class="introtext">Contact Cryptobit Analytics</p>
  </div>
</div>

<section class="Contacts">
    <div class="container">
      <br><center><p class="whiteTitle">CONTACT US</p></center><br>
      <br>
      <form action="http://cryptobitanalytics/telegramEN.php" method="POST">
        <div class="center">
          <div class="form-group col-12 col-sm-12 col-md-8 col-lg-8 mx-auto">
            <input type="text" class="form-control form-control-lg" name="user_name" placeholder="Enter your name" required>
            <br>
            <input id="phone" step="any" type="text" name="user_phone" class="form-control form-control-lg" placeholder="Enter phone number" value="" required minlength="11" maxlength="15">
            <br>
            <p class="contacts-title">Select where you want to be contacted</p>
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
                
                Phone
                </p>
              </label>
            </div>            
            </div>  

            <br>
            <input type="submit" name="submit" class="btn btn-block btn-lg btn-outline-primary" value="Submit">
            <br>
            <br>
          </div>
        </div>
      </form>
  
    </div>
  </section>

<?php require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/RU/includes/footer.php"); ?>