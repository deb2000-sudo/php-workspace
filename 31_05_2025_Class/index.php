<?php
$consumer_key = 'ck_1fb32939694a40a0808d17fd7d5ac7b6ac70f256';
$consumer_secret = 'cs_8ef9be340955aa1bdad2e5905d7f979a2a40ef3e';
$url = 'https://darkgray-locust-488529.hostingersite.com/wp-json/wc/v3/products';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_USERPWD, $consumer_key . ':' . $consumer_secret);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);

curl_close($ch);

$products = json_decode($response, true);

foreach ($products as $product) {
    echo 'Product: ' . $product['name'] . ' - Price: ' . $product['price'] . "\n";
}
?>