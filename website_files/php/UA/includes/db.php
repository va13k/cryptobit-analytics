<?php

$dbhost = 'localhost';
$dbname = 'cryptobitanalytics_ua';
$username = 'vale3k';
$password = 'R4n&&P4ss!';

try {
	$db = new PDO("mysql:host=$dbhost; port=3306; dbname=$dbname; charset=utf8", $username, $password, 
	[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
	echo 'Невозможно установить соединение с базой данных' . $e->getMessage();
}

function getArticlesOnMainPage() {
    global $db;
    $articles = $db->query("SELECT * FROM articles ORDER BY id DESC LIMIT 3;");
    return $articles;
}

function getAllArticles() {
    global $db;
    $articles = $db->query("SELECT * FROM articles ORDER BY id DESC;");
    return $articles;
}

function getArticleById($id) {
	global $db;
	$articles = $db->query("SELECT * FROM articles WHERE `id`=$id;");
	foreach ($articles as $article) {
		return $article;
	}
}

function getServices() {
    global $db;
    $services = $db->query("SELECT * FROM services;");
    return $services;
}

function textPreview($value, $limit = 300) {
	$value = stripslashes($value);		
	$value = htmlspecialchars_decode($value, ENT_QUOTES);
	$value = str_ireplace(array('<br>', '<br />', '<br/>'), ' ', $value);
	$value = strip_tags($value);
	$value = trim($value);
 
	if (mb_strlen($value) < $limit) {
		return $value;
	} else {
		$value   = mb_substr($value, 0, $limit);
		$length  = mb_strripos($value, ' ');
		$end     = mb_substr($value, $length - 1, 1);
 
		if (empty($length)) {
			return $value;
		} elseif (in_array($end, array('.', '!', '?'))) {
			return mb_substr($value, 0, $length);
		} elseif (in_array($end, array(',', ':', ';', '«', '»', '…', '(', ')', '—', '–', '-'))) {
			return trim(mb_substr($value, 0, $length - 1)) . '...';
		} else {
			return trim(mb_substr($value, 0, $length)) . '...';
		}
		
		return trim('');
	}
}

?>