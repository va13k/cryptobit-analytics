<link rel="stylesheet" type="text/css" href="index.css">

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/EN/includes/head_and_nav.php");
		require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/EN/includes/connect.php");
		require($_SERVER['DOCUMENT_ROOT']."/website_files/php/EN/includes/db.php");
	?>

	<!-- -------------------------------------------------------------------------------------------------------- -->

	<div class="intropart" style="background-image: url(http://cryptobitanalytics/jpg_png_images/main_photo.jpg);">
		<div class="text-intro">
			<p class="introtext">CRYPTOBIT ANALYTICS</p>
			<p class="introtext2">PROTECTION AND RISK ANALYSIS OF</p>
			<p class="introtext3">CRYPTOCURRENCY FUNDS</p>
		</div>
	</div>

	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->

	<section class="Services">
		<div class="container-fluid">
			<p class="blueTitle">SERVICES</p>
			<div class="row">
				<div class="card col-xs-4">
					<img class="card-img" id="card-image1" 
					src="http://cryptobitanalytics/jpg_png_images/coins.png" alt="marking image">
					<div class="card-img-overlay">
					<p class="card-title">Digital Asset <br> Recovery</p>  <br> 
					<p class="card-text">We help victims of cybercrime involving cryptocurrency funds. 
						We provide actionable information and recover funds.<br><br></p>
					</div>
				</div>

				<div class="card col-xs-4">
					<img class="card-img" id="card-image2" 
					src="http://cryptobitanalytics/jpg_png_images/marking.jpg" alt="marking image">
					<div class="card-img-overlay">
						<p class="card-title">Fund <br> marking</p>
						<p class="card-text">Disseminating information about stolen cryptocurrency assets 
							on as many cryptocurrency platforms as possible 
							in order to stop the possibility of further transactions.<br></p>
					</div>
				</div>

				<div class="card col-xs-4">
					<img class="card-img" id="card-image3" 
					src="http://cryptobitanalytics/jpg_png_images/analys.jpg" alt="marking image">
					<div class="card-img-overlay">
						<p class="card-title">Transaction <br> analysis</p>
						<p class="card-text">We investigate transactions, 
							We establish the participants of cryptocurrency transactions, 
							Cooperate with the crypto-platforms on which transactions were conducted 
							in order to complicate transactions.</p>
					</div>
				</div>
			</div>
			<br>
			<div class="othr-services-btn" align="center">
				<a href="http://cryptobitanalytics/website_files/php/EN/services.php">
					<button type="button" class="btn btn-outline-primary">Move on to services</button>
				</a>
			</div>
		</div>
	</section>

	<br>
	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->
	<section class="OurTeam">
		<br><center><p class="whiteTitle">ABOUT OUR TEAM</p></center><br>
		<div class="container mx-auto">
			<div class="ourTeam-text">	
			<p>Our team consists of experienced analysts who will help you identify the risks associated with cryptocurrency
				transactions, check the counterparty for reliability and try to recover stolen cryptocurrency funds.
			</p>
			<p>
				We are located in the city of Kharkov. We work both remotely and are open for meetings. <br> Always in touch 24/7.
			</p>
			<p>
				In addition, it is possible to consider other issues or problems related to cryptocurrencies.
			</p>
			<br>
				<div class="ourTeam-stages">
					<center><p class="whiteTitle">STAGES OF WORK</p></center>
					<br>
					<div class="stages">
						<p><img src="http://cryptobitanalytics/svg_images/etap1.svg" alt="STAGE 1">Receiving a job after contacting the client</p>
						<p><img src="http://cryptobitanalytics/svg_images/etap2.svg" alt="STAGE 2">Studying and signing documents</p>
						<p><img src="http://cryptobitanalytics/svg_images/etap3.svg" alt="STAGE 3">Working on an order</p>
						<p><img src="http://cryptobitanalytics/svg_images/etap4.svg" alt="STAGE 4">Customer's evaluation of the result</p>
					</div>
				</div>
			</div>

			<br>

			<div class="more-about-team-btn" align="center">
			<a href="http://cryptobitanalytics/website_files/php/EN/aboutUs.php">
				<button type="button" class="btn btn-lg btn-outline-primary">Learn more about the team</button>
			</a>
			</div>
				<br>
				<br>
		</div>
	</section>

	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->
	<section class="Articles">
	<p class="blueTitle">STATES AND NEWS</p>
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
	<a href="http://cryptobitanalytics/website_files/php/EN/includes/single.php?id=<?php echo $article["id"]; ?>">
							<button class="btn btn-outline-primary stretched-link">Read more</button>
						</a>
					</div>
					<br>
				</div>
	<?php endforeach; ?>
			</div>
		
		<br>
		
		<div class="main-article-button center" >
			<a href="http://cryptobitanalytics/website_files/php/EN/articles.php" class="article-link">
				<button class="btn btn-outline-primary btn-lg">Go to articles</button>
			</a>
		</div>
		   </div>
	</section>

	<br>

	<!-- -------------------------------------------------------------------------------------------------------- -->
	
	<section class="Contacts">
		<div class="container">
			<br><center><p class="whiteTitle">
				CONTACT US
			</p></center><br>
			<br>
			<form action="http://cryptobitanalytics/telegramEN.php" method="POST">
				<div class="center">
					<div class="form-group col-12 col-sm-12 col-md-8 col-lg-8 mx-auto">
						<input type="text" class="form-control form-control-lg" name="user_name" placeholder="Enter your name" required>
						<br>
						<input id="phone" step="any" type="text" class="form-control form-control-lg" name="user_phone" 
						placeholder="Enter phone number" pattern="^[0-9\s-+_\.\(\)\[\]]{5,18} \D ^[A-Za-zА-Яа-яЁё]+$" required minlength="7" maxlength="15">
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

	<?php require_once($_SERVER['DOCUMENT_ROOT']."/website_files/php/EN/includes/footer.php"); ?>

</body>
</html>