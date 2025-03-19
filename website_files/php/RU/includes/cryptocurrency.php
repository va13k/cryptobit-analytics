<?php

use Codenixsv\CoinGeckoApi\CoinGeckoClient;
$client = new CoinGeckoClient();

function getData($token_name) {
    global $client;
    $data = $client->simple()->getPrice($token_name, 'usd');
    foreach ($data as $dat) {
        echo $dat["usd"] . "$";
    }
}

?>