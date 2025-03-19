<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRYPTOBIT ANALYTICS</title>

	<link rel="stylesheet" type="text/css" href="website_files/styles/style.css">


	<!-- Настройка viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Подключаем Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
	<header class="sticky-top">
		<nav class="navbar sticky-top navbar-expand-lg navbar-gray-dark bg-gray-dark">

			<a class="navbar-brand " href="index.php">
				<img class="nav-brand" src="svg_images/main_logo.svg" alt="main_logo">
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse mx-auto" id="navbar1">
				<div class="nav-links mx-auto">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="website_files/php/RU/aboutUs.php">О нас</a></li>
						<li class="nav-item"><a class="nav-link" href="website_files/php/RU/services.php">Услуги</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="website_files/php/RU/articles.php">Статьи</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="website_files/php/RU/contacts.php">Контакты</a>
						</li>
					</ul>
				</div>

				<ul class="navbar-nav" id="dropdown">
					<li class="nav-item dropdown">
						<button class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
							onKeyDown="if(event.key === 'Enter') this.click();" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<img width="30" height="20" alt="en" src="svg_images/Russia.svg">RU</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="indexEN.php" id="navbarDropdownMenuLink Lang-En">
									<img width="30" height="20" alt="en" id="Lang-En"
										src="svg_images/Great_Britain.svg">EN
								</a>
								<a class="dropdown-item" href="indexUA.php" id="navbarDropdownMenuLink Lang-Ua">
									<img width="30" height="20" alt="ua" id="Lang-Ua" src="svg_images/Ukraine.svg">UA
								</a>
							</div>
					</li>
				</ul>
			</div>

		</nav>
	</header>