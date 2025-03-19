<link rel="stylesheet" type="text/css" href="index.css">

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/UA/includes/head_and_nav.php");
		require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/UA/includes/connect.php");
		require($_SERVER['DOCUMENT_ROOT']."/website_files/php/UA/includes/db.php");
	?>

	<!-- -------------------------------------------------------------------------------------------------------- -->

	<div class="intropart" style="background-image: url(http://cryptobitanalytics/jpg_png_images/main_photo.jpg);">
		<div class="text-intro">
			<p class="introtext">CRYPTOBIT ANALYTICS</p>
			<p class="introtext2">ЗАХИСТ ТА АНАЛІЗ РИЗИКІВ</p>
			<p class="introtext3">КРИПТОВАЛЮТНИХ КОШТІВ</p>
		</div>
	</div>

	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->

	<section class="Services">
		<div class="container-fluid">
			<p class="blueTitle">ПОСЛУГИ</p>
			<div class="row">
				<div class="card col-xs-4">
					<img class="card-img" id="card-image1" 
					src="http://cryptobitanalytics/jpg_png_images/coins.png" alt="marking image">
					<div class="card-img-overlay">
					<p class="card-title">Відновлення цифрових активів</p>
					<p class="card-text">Допомагаємо жертвам кіберзлочинів, пов'язаних із криптовалютними засобами. 
						Предоставляем действенную информацию и возвращаем средства.<br><br></p>
					</div>
				</div>

				<div class="card col-xs-4">
					<img class="card-img" id="card-image2" 
					src="http://cryptobitanalytics/jpg_png_images/marking.jpg" alt="marking image">
					<div class="card-img-overlay">
						<p class="card-title">Маркування<br>коштів</p>
						<p class="card-text">
						Поширюємо інформацію про викрадені криптовалютні активи
						на максимальній кількості криптовалютних платформ
						з метою припинення можливості подальших операцій.<br></p>
					</div>
				</div>

				<div class="card col-xs-4">
					<img class="card-img" id="card-image3" 
					src="http://cryptobitanalytics/jpg_png_images/analys.jpg" alt="marking image">
					<div class="card-img-overlay">
						<p class="card-title">Аналіз<br>транзакцій</p>
						<p class="card-text">Досліджуємо транзакції,
						встановлюємо учасників криптовалютних операцій,
						кооперуємося з криптоплатформами, на яких проводилися операції
						із метою ускладнення транзакцій.</p>
					</div>
				</div>
			</div>
			<br>
			<div class="othr-services-btn" align="center">
				<a href="http://cryptobitanalytics/website_files/php/UA/services.php">
					<button type="button" class="btn btn-outline-primary">До послуг</button>
				</a>
			</div>
		</div>
	</section>

	<br>
	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->
	<section class="OurTeam">
		<br><center><p class="whiteTitle">ПРО НАШУ КОМАНДУ</p></center><br>
		<div class="container mx-auto">
			<div class="ourTeam-text">	
			<p>
			Наша команда складається з досвідчених аналітиків, які допоможуть виявити ризики, пов'язані з криптовалютними операціями, 
			перевірити контрагента на благонадійність та спробувати повернути вкрадені криптовалютні засоби.
			</p>
			<p>
				Ми знаходимося у місті Харків. Працюємо як дистанційно, так і відкриті для зустрічей. <br>
				Завжди на зв'язку 24/7.
			</p>
			<p>
				Крім того, можливий розгляд інших питань або проблем, пов'язаних із криптовалютами.
			</p>
			<br>
				<div class="ourTeam-stages">
					<center><p class="whiteTitle">ЕТАПИ РОБОТИ</p></center>
					<br>
					<div class="stages">
						<p><img src="http://cryptobitanalytics/svg_images/etap1.svg" alt="STAGE 1">Отримуємо завдання після зв'язку з клієнтом</p>
						<p><img src="http://cryptobitanalytics/svg_images/etap2.svg" alt="STAGE 2">Вивчаємо та підписуємо документи</p>
						<p><img src="http://cryptobitanalytics/svg_images/etap3.svg" alt="STAGE 3">Працюємо над замовленням</p>
						<p><img src="http://cryptobitanalytics/svg_images/etap4.svg" alt="STAGE 4">Оцінка результату клієнтом</p>
					</div>
				</div>
			</div>

			<br>

			<div class="more-about-team-btn" align="center">
			<a href="http://cryptobitanalytics/website_files/php/UA/aboutUs.php">
				<button type="button" class="btn btn-lg btn-outline-primary">Дізнатись більше про команду</button>
			</a>
			</div>
				<br>
				<br>
		</div>
	</section>

	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->
	<section class="Articles">
	<p class="blueTitle">СТАТТІ ТА НОВИНИ</p>
		<div class="container">
			<div class="row">
	<?php 
		$articles = getArticlesOnMainPage();
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
						<br>
						<br>
					</div>
					<div class="article-button" align="center">
	<a href="http://cryptobitanalytics/website_files/php/UA/includes/single.php?id=<?php echo $article["id"]; ?>">
							<button class="btn btn-outline-primary stretched-link">Читати далі</button>
						</a>
					</div>
					<br>
				</div>
	<?php endforeach; ?>
			</div>
		
		<br>
		
		<div class="main-article-button center" >
			<a href="http://cryptobitanalytics/website_files/php/UA/articles.php" class="article-link">
				<button class="btn btn-outline-primary btn-lg">Перейти до статей</button>
			</a>
		</div>
		   </div>
	</section>

	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->
	
	<section class="Contacts">
		<div class="container">
			<br><center><p class="whiteTitle">ЗВ'ЯЗОК З НАМИ</p></center><br>
			<br>
			<form action="http://cryptobitanalytics/telegramUA.php" method="POST">
				<div class="center">
					<div class="form-group col-12 col-sm-12 col-md-8 col-lg-8 mx-auto">
						<input type="text" class="form-control form-control-lg" name="user_name" placeholder="Введіть ваше ім'я" required>
						<br>
						<input id="phone" step="any" type="text" class="form-control form-control-lg" name="user_phone" 
						placeholder="Введіть номер телефону" pattern="^[0-9\s-+_\.\(\)\[\]]{5,18} \D ^[A-Za-zА-Яа-яЁё]+$" required minlength="7" maxlength="15">
						<br>
						<p class="contacts-title">Виберіть яким способом вам краще зв'язатися</p>
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
						<input type="submit" name="submit" class="btn btn-block btn-lg btn-outline-primary" value="Відправити">
						<br>
						<br>
					</div>
				</div>
			</form>
	
		</div>
	</section>

	<?php require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/UA/includes/footer.php"); ?>

</body>
</html>