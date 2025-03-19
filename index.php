<link rel="stylesheet" type="text/css" href="index.css">

<?php
require_once 'website_files/php/RU/includes/head_and_nav.php';
require_once 'website_files/php/RU/includes/connect.php';
require_once 'website_files/includes/db.php';
?>

<div class="intropart">
	<div class="text-intro">
		<p class="introtext">CRYPTOBIT ANALYTICS</p>
		<p class="introtext2">ЗАЩИТА И АНАЛИЗ РИСКОВ</p>
		<p class="introtext3">КРИПТОВАЛЮТНЫХ СРЕДСТВ</p>
	</div>
</div>

<br>

<!-- -------------------------------------------------------------------------------------------------------- -->

<section class="Services">
	<div class="container-fluid">
		<p class="blueTitle">УСЛУГИ</p>
		<div class="row">
			<div class="card col-xs-4">
				<img class="card-img" id="card-image1" src="jpg_png_images/coins.png" alt="marking">
				<div class="card-img-overlay">
					<p class="card-title">Восстановление цифровых активов</p>
					<p class="card-text">Помогаем жертвам киберпреступлений, связанных с криптовалютными средствами.
						Предоставляем действенную информацию и возвращаем средства.<br><br></p>
				</div>
			</div>

			<div class="card col-xs-4">
				<img class="card-img" id="card-image2" src="jpg_png_images/marking.jpg" alt="marking">
				<div class="card-img-overlay">
					<p class="card-title">Маркирование<br>средств</p>
					<p class="card-text">Распространяем информацию о похищенных криптовалютных активах
						на максимальном количестве криптовалютных платформ
						с целью прекращения возможности дальнейших операций.<br></p>
				</div>
			</div>

			<div class="card col-xs-4">
				<img class="card-img" id="card-image3" src="jpg_png_images/analys.jpg" alt="marking">
				<div class="card-img-overlay">
					<p class="card-title">Анализ<br>транзакций</p>
					<p class="card-text">Исследуем транзакции,
						устанавливаем участников криптовалютных операций,
						кооперируемся с криптоплатформами на которых проводились операции
						с целью усложнения транзакций.</p>
				</div>
			</div>
		</div>
		<br>
		<div class="othr-services-btn text-center">
			<a href="website_files/php/RU/services.php">
				<button type="button" class="btn btn-outline-primary">К услугам</button>
			</a>
		</div>
	</div>
</section>

<br>
<br>

<!-- -------------------------------------------------------------------------------------------------------- -->
<section class="OurTeam">
	<br>
	<div class="text-center">
		<p class="whiteTitle">О НАШЕЙ КОМАНДЕ</p>
	</div>
	<br>
	<div class="container mx-auto">
		<div class="ourTeam-text">
			<p>Наша команда состоит из опытных аналитиков, которые помогут вам выявить риски, связанные с
				криптовалютными
				операциями, проверить контрагента на благонадежность и попытаться вернуть украденные криптовалютные
				средства.
			</p>
			<p>
				Мы находимся в городе Харьков. Работаем как дистанционно, так и открыты для встреч. <br> Всегда на связи
				24/7.
			</p>
			<p>
				Кроме того, возможно рассмотрение других вопросов или проблем, связанных с криптовалютами.
			</p>
			<br>
			<div class="ourTeam-stages">
				<div class="text-center">
					<p class="whiteTitle">ЭТАПЫ РАБОТЫ</p>
				</div>
				<br>
				<div class="stages">
					<p><img src="svg_images/etap1.svg" alt="STAGE 1">Получаем задание после
						связи с клиентом</p>
					<p><img src="svg_images/etap2.svg" alt="STAGE 2">Изучаем и подписываем
						документы</p>
					<p><img src="svg_images/etap3.svg" alt="STAGE 3">Работаем над заказом</p>
					<p><img src="svg_images/etap4.svg" alt="STAGE 4">Оценка результата
						клиентом</p>
				</div>
			</div>
		</div>

		<br>

		<div class="more-about-team-btn text-center">
			<a href="website_files/php/RU/aboutUs.php">
				<button type="button" class="btn btn-lg btn-outline-primary">Узнать больше о команде</button>
			</a>
		</div>
		<br>
		<br>
	</div>
</section>

<br>

<!-- -------------------------------------------------------------------------------------------------------- -->
<section class="Articles">
	<p class="blueTitle">СТАТЬИ И НОВОСТИ</p>
	<div class="container">
		<div class="row">
			<?php
			$articles = getArticlesOnMainPage();
			foreach ($articles as $article): ?>
				<div class="card">
					<img class="card-img-top" src=<?php echo $article["image"]; ?> alt="article_pic">
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
					<div class="article-button text-center">
						<a href="website_files/php/RU/includes/single.php?id=<?php echo $article["id"]; ?>">
							<button class="btn btn-outline-primary stretched-link">Читать далее</button>
						</a>
					</div>
					<br>
				</div>
			<?php endforeach; ?>
		</div>

		<br>

		<div class="main-article-button center">
			<a href="website_files/php/RU/articles.php" class="article-link">
				<button class="btn btn-outline-primary btn-lg">Перейти к статьям</button>
			</a>
		</div>
	</div>
</section>

<br>

<!-- -------------------------------------------------------------------------------------------------------- -->

<section class="Contacts">
	<div class="container">
		<br>
		<div class="text-center">
			<p class="whiteTitle">СВЯЗЬ С НАМИ</p>
		</div><br>
		<br>
		<form action="telegram.php" method="POST">
			<div class="center">
				<div class="form-group col-12 col-sm-12 col-md-8 col-lg-8 mx-auto">
					<input type="text" class="form-control form-control-lg" name="user_name"
						placeholder="Введите ваше имя" required>
					<br>
					<input id="phone" step="any" type="text" class="form-control form-control-lg" name="user_phone"
						placeholder="Введите номер телефона"
						pattern="^[0-9\s-+_\.\(\)\[\]]{5,18} \D ^[A-Za-zА-Яа-яЁё]+$" required minlength="7"
						maxlength="15">
					<br>
					<p class="contacts-title">Выберите где вам лучше связаться </p>
					<br>
					<div class="row">
						<div class="form-check">
							<input type="radio" class="form-check-input" name="ContactVar" id="Viber" value="Viber">
							<label class="form-check-label" for="Viber">
								<p class="center">
									<img src="jpg_png_images/Viber.png" alt="Viber" height="49" width="49">
									Viber
								</p>
							</label>
						</div>

						<div class="form-check">
							<input type="radio" class="form-check-input" name="ContactVar" id="Telegram"
								value="Telegram">
							<label class="form-check-label" for="Telegram">
								<p class="center">
									<img src="jpg_png_images/Telegram.png" alt="Telegram" height="50" width="50">
									Telegram
								</p>
							</label>
						</div>

						<div class="form-check">
							<input type="radio" class="form-check-input" name="ContactVar" id="WhatsApp"
								value="WhatsApp">
							<label class="form-check-label" for="WhatsApp">
								<p class="center">
									<img src="jpg_png_images/WhatsApp.png" alt="WhatsUp" height="50" width="50">
									WhatsApp
								</p>
							</label>
						</div>

						<div class="form-check">
							<input type="radio" class="form-check-input" name="ContactVar" id="Phone" value="Phone"
								checked>
							<label class="form-check-label" for="Phone">
								<p class="center">
									<img src="jpg_png_images/Phone.png" alt="OnlyPhone" height="50" width="50">

									Телефон
								</p>
							</label>
						</div>
					</div>

					<br>
					<input type="submit" name="submit" class="btn btn-block btn-lg btn-outline-primary"
						value="Отправить">
					<br>
					<br>
				</div>
			</div>
		</form>

	</div>
</section>

<?php require_once 'website_files/php/RU/includes/footer.php' ?>

</body>

</html>