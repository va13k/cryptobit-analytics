	<?php 
		include_once "includes/head_and_nav.php";
		include_once "includes/connect.php";
	?>

	<!-- -------------------------------------------------------------------------------------------------------- -->

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
					<img class="card-img" id="card-image1" src="/jpg_png_images/coins.png" alt="marking image">
					<div class="card-img-overlay">
					<p class="card-title">Восстановление цифровых активов</p>
					<p class="card-text">Помогаем жертвам киберпреступлений, связанных с криптовалютными средствами. 
						Предоставляем действенную информацию и возвращаем средства.<br><br></p>
					</div>
				</div>

				<div class="card col-xs-4">
					<img class="card-img" id="card-image2" src="/jpg_png_images/marking.jpg" alt="marking image">
					<div class="card-img-overlay">
						<p class="card-title">Маркирование<br>средств</p>
						<p class="card-text">Распространяем информацию о похищенных криптовалютных активах 
							на максимальном количестве криптовалютных платформ 
							с целью прекращения возможности дальнейших операций.</p>
					</div>
				</div>

				<div class="card col-xs-4">
					<img class="card-img" id="card-image3" src="/jpg_png_images/analys.jpg" alt="marking image">
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
			<div class="othr-services-btn" align="center">
			<button type="button" class="btn btn-outline-primary">К остальным услугам</button>
			</div>
		</div>
	</section>

	<br>
	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->
	<section class="OurTeam">
		<br><center><p class="whiteTitle">О нашей команде</p></center><br>
		<div class="container mx-auto">
			<div class="ourTeam-text">	
			<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi ipsam perspiciatis officiis,
			quis voluptatibus cupiditate recusandae repudiandae quasi reiciendis quam, 
			a incidunt labore corrupti inventore sint quaerat ut repellat excepturi!</p>
			<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi ipsam perspiciatis officiis,
			quis voluptatibus cupiditate recusandae repudiandae quasi reiciendis quam, 
			a incidunt labore corrupti inventore sint quaerat ut repellat excepturi!</p>
			<br>
				<div class="ourTeam-stages">
					<center><p class="whiteTitle">Этапы работы</p></center>
					<br>
					<div class="stages">
						<p><img src="/svg_images/etap1.svg" alt="STAGE 1">Получаем задание после связи с клиентом</p>
						<p><img src="/svg_images/etap2.svg" alt="STAGE 2">Изучаем и подписываем документы</p>
						<p><img src="/svg_images/etap3.svg" alt="STAGE 3">Работаем над заказом</p>
						<p><img src="/svg_images/etap4.svg" alt="STAGE 4">Оценка результата клиентом</p>
					</div>
				</div>
			</div>
			<br>
			<div class="more-about-team-btn" align="center">
			<button type="button" class="btn btn-outline-primary">Узнать больше <br> о команде</button>
			</div>
		</div>
	</section>

	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->
	<section class="Articles">
	<p class="blueTitle">СТАТЬИ И НОВОСТИ</p>
		<div class="container-fluid">
			<div class="row">
	<?php 
		$articles = getArticlesOnMainPage();
		foreach ($articles as $article): ?>
							<div class="card col-xs-4">
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
								<div class="article-button" align="center">
									<button class="btn btn-primary-outline">Читать далее</button>
								</div>
							</div>
	<?php endforeach; ?>
			</div>
		</div>
	</section>

	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->
	
	<section class="Contacts">
		<div class="container">
			<br><center><p class="whiteTitle">СВЯЗЬ С НАМИ</p></center><br>
			<br>
			<form>
				<div class="col-12 col-sm-12 col-md-8 col-lg-8">
					<div class="form-group">
						<input type="text" class="form-control form-control-lg" name="user_name" placeholder="Введите ваше имя">
						<br>
						<input id="phone" step="any" type="number" class="form-control form-control-lg" name="user_phone" placeholder="Введите ваш номер телефона" value="">
					</div>
					<input type="submit" name="submit" class="btn btn-block btn-lg btn-outline-primary">
				</div>
			</form>
	
		</div>
	</section>

	<?php include_once "includes/footer.php"; ?>

</body>
</html>