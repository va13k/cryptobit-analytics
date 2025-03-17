<?php
require_once 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dbhost = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

$db = new PDO("mysql:host=$dbhost; dbname=$dbname;", $username, $password);

function getArticlesOnMainPage()
{
	global $db;
	$articles = $db->query("SELECT * FROM articles LIMIT 3");
	return $articles;
}

function textPreview($value, $limit = 300)
{
	$value = stripslashes($value);
	$value = htmlspecialchars_decode($value, ENT_QUOTES);
	$value = str_ireplace(['<br>', '<br />', '<br/>'], ' ', $value);
	$value = strip_tags($value);
	$value = trim($value);

	if (mb_strlen($value) < $limit) {
		return $value;
	}
	$value = mb_substr($value, 0, $limit);
	$length = mb_strripos($value, ' ');
	$end = mb_substr($value, $length - 1, 1);

	if (empty($length)) {
		return $value;
	} elseif (in_array($end, array('.', '!', '?'))) {
		return mb_substr($value, 0, $length);
	} elseif (in_array($end, array(',', ':', ';', '«', '»', '…', '(', ')', '—', '–', '-'))) {
		return trim(mb_substr($value, 0, $length - 1)) . '...';
	}

	return trim(mb_substr($value, 0, $length)) . '...';
}

?>